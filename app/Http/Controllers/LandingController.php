<?php

namespace App\Http\Controllers;

use App\Models\Clustering;
use App\Models\produksi;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LandingController extends Controller
{

    public function userTanaman()
    {
        return view('pages.user.tanaman');
    }

    public function normalizeData($data)
    {
        $transposedData = array_map(null, ...$data);
        $normalizedData = [];

        $findMin = function ($array) {
            $min = $array[0];
            foreach ($array as $value) {
                if ($value < $min) {
                    $min = $value;
                }
            }
            return $min;
        };

        $findMax = function ($array) {
            $max = $array[0];
            foreach ($array as $value) {
                if ($value > $max) {
                    $max = $value;
                }
            }
            return $max;
        };

        foreach ($transposedData as $column) {
            $min = $findMin($column);
            $max = $findMax($column);

            $normalizedColumn = array_map(function ($value) use ($min, $max) {
                $normalizedValue = ($max - $min) != 0 ? ($value - $min) / ($max - $min) : 0;
                return round($normalizedValue, 5);
            }, $column);

            $normalizedData[] = $normalizedColumn;
        }

        $normalizedData = array_map(null, ...$normalizedData);
        return response()->json([
            'original_data' => $data,
            'normalized_data' => $normalizedData
        ]);
    }

    public function cluster($id)
    {
        try {
            $produksi = produksi::where('idTanaman', $id)->get();
            $tanaman = tanaman::where('id', $id)->first()['namaTanaman'];
            $kabupaten = [];
            $data = $produksi->map(function ($item) use (&$kabupaten) {
                $kabupaten[] = $item->namaKabKota;
                return [$item->tahun1, $item->tahun2, $item->tahun3, $item->tahun4, $item->tahun5];
            })->toArray();

            if (!$data) {
                return response()->json(['error' => 'Inputkan Data Terlebih Dahulu'], 400);
            }

            $normalizedDataResponse = $this->normalizeData($data);
            $data = json_decode($normalizedDataResponse->getContent(), true)['normalized_data'];

            $parameter = Clustering::where('idTanaman', $id)->first();

            if (!$parameter) {
                return response()->json(['error' => 'Parameter Clustering Belum Di Inputkan'], 400);
            }

            // Parameter FCM
            $clusterCount = $parameter->jumlahKlaster; // Jumlah klaster
            $m = $parameter->nilaiBobot; // Fuzziness parameter
            $epsilon = 0.01; // Error threshold
            $maxIterations = $parameter->maxIterasi; // Maksimum iterasi
            $dataCount = count($data);
            $firstMembershipMatrix = $this->initializeMembershipMatrix($dataCount, $clusterCount);
            $membershipMatrix = $firstMembershipMatrix;
            $iteration = 0;
            $previousObjectiveFunction = 0;
            $centroids = [];
            $objectiveFunctions = [];


            while ($iteration < $maxIterations) {
                $centroids = $this->calculateNewCentroids($data, $membershipMatrix, $m);
                $objectiveFunction = $this->calculateObjectiveFunction($data, $centroids, $membershipMatrix, $m);
                $objectiveFunctions[] = $objectiveFunction;

                if (abs($objectiveFunction - $previousObjectiveFunction) < $epsilon) {
                    break;
                }

                // Perbarui matriks partisi
                $membershipMatrix = $this->updateMembershipMatrix($data, $centroids, $m);

                // Perbarui iterasi dan fungsi objektif sebelumnya
                $previousObjectiveFunction = $objectiveFunction;
                $iteration++;
            }

            // Tetapkan data ke klaster
            $clusters = $this->assignClusters($data, $membershipMatrix);
            $produksi = produksi::where('idTanaman', $id)->get();


            return response()->json([
                'tanaman' => $tanaman,
                'dataInput' => $data,
                'kabupaten' => $kabupaten,
                'membershipMatrix' => $membershipMatrix,
                'firstMembershipMatrix' => $firstMembershipMatrix,
                'clusters' => $clusters,
                'centroids' => $centroids,
                'objectiveFunctions' => $objectiveFunctions,
                'parameter' => $parameter,
                'produksi' => $produksi
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function initializeMembershipMatrix($dataCount, $clusterCount)
    {
        $membershipMatrix = [];

        for ($i = 0; $i < $dataCount; $i++) {
            $randomNumbers = [];
            $sum = 0;

            for ($j = 0; $j < $clusterCount; $j++) {
                $randomNumbers[$j] = rand(0, 100) / 100.0;
                $sum += $randomNumbers[$j];
            }

            for ($j = 0; $j < $clusterCount; $j++) {
                $randomNumbers[$j] /= $sum;
            }

            $membershipMatrix[$i] = $randomNumbers;
        }
        return $membershipMatrix;
    }

    private function calculateNewCentroids($data, $membershipMatrix, $m)
    {
        $dataCount = count($data);
        $clusterCount = count($membershipMatrix[0]);
        $dimensions = count($data[0]);
        $newCentroids = [];

        for ($k = 0; $k < $clusterCount; $k++) {
            $numerator = array_fill(0, $dimensions, 0.0);
            $denominator = 0.0;

            for ($i = 0; $i < $dataCount; $i++) {
                $weight = pow($membershipMatrix[$i][$k], $m);
                for ($j = 0; $j < $dimensions; $j++) {
                    $numerator[$j] += $weight * $data[$i][$j];
                }
                $denominator += $weight;
            }

            for ($j = 0; $j < $dimensions; $j++) {
                $newCentroids[$k][$j] = $numerator[$j] / $denominator;
                $newCentroids[$k][$j] = round($newCentroids[$k][$j], 5);
            }
        }

        return $newCentroids;
    }

    private function calculateObjectiveFunction($data, $centroids, $membershipMatrix, $m)
    {

        $objectiveFunction = 0.0;
        $dataCount = count($data);
        $clusterCount = count($centroids);
        $dimensions = count($data[0]);

        for ($i = 0; $i < $dataCount; $i++) {
            for ($k = 0; $k < $clusterCount; $k++) {
                $distanceSum = 0.0;

                for ($j = 0; $j < $dimensions; $j++) {
                    $distanceSum += pow($data[$i][$j] - $centroids[$k][$j], 2);
                }

                $objectiveFunction += pow($membershipMatrix[$i][$k], $m) * $distanceSum;
            }
        }

        return round($objectiveFunction, 5);
    }

    private function updateMembershipMatrix($data, $centroids, $m)
    {
        $dataCount = count($data);
        $clusterCount = count($centroids);
        $dimensions = count($data[0]);
        $membershipMatrix = [];

        for ($i = 0; $i < $dataCount; $i++) {
            $membershipMatrix[$i] = [];
            for ($k = 0; $k < $clusterCount; $k++) {
                $numerator = 0.0;
                for ($j = 0; $j < $dimensions; $j++) {
                    $numerator += pow($data[$i][$j] - $centroids[$k][$j], 2);
                }
                $numerator = pow($numerator, -1 / ($m - 1));

                $denominator = 0.0;
                for ($l = 0; $l < $clusterCount; $l++) {
                    $denominatorInner = 0.0;
                    for ($j = 0; $j < $dimensions; $j++) {
                        $denominatorInner += pow($data[$i][$j] - $centroids[$l][$j], 2);
                    }
                    $denominator += pow($denominatorInner, -1 / ($m - 1));
                }

                $membershipMatrix[$i][$k] = $numerator / $denominator;
            }
        }

        return $membershipMatrix;
    }

    private function assignClusters($data, $membershipMatrix)
    {
        $clusters = [];
        for ($i = 0; $i < count($data); $i++) {
            $maxMembership = max($membershipMatrix[$i]);
            $cluster = array_search($maxMembership, $membershipMatrix[$i]);
            $clusters[$cluster][] = $data[$i];
        }
        return $clusters;
    }

    public function tampilUser()
    {
        $firstId = Tanaman::select('id')->first();
        $id = $firstId->id;
        return redirect('/tanaman/' . $id);
    }

    public function showResults($id)
    {
        $results = $this->cluster($id);

        if ($results->getStatusCode() !== 200) {
            $error = json_decode($results->getContent(), true)['error'];
            return view('pages.user.tanaman', [
                'error' => $error,
                'tanamanId' => $id
            ]);
        }
        $data = json_decode($results->getContent(), true);
        return view('pages.user.tanaman', [
            'tanamanId' => $id,
            'namaTanaman' => $data['tanaman'],
            'kabupaten' => $data['kabupaten'],
            'dataInput' => $data['dataInput'],
            'membershipMatrix' => $data['membershipMatrix'],
            'firstMembershipMatrix' => $data['firstMembershipMatrix'],
            'centroids' => $data['centroids'],
            'clusters' => $data['clusters'],
            'objectiveFunctions' => $data['objectiveFunctions'],
            'parameter' => $data['parameter'],
            'produksi' => $data['produksi'],
        ]);
    }

    public function showRecap()
    {
        $tanaman = tanaman::all();
        $dataTanaman = [];
        foreach ($tanaman as $index) {
            $results = $this->cluster($index->id);
            if ($results->getStatusCode() !== 200) {
                $error = json_decode($results->getContent(), true)['error'];
                return view('pages.user.tanaman', [
                    'error' => $error,
                    'tanamanId' => $index->id
                ]);
            }
            $data = json_decode($results->getContent(), true);
            $dataTanaman["$index->id"] = [
                'tanamanId' => $index->id,
                'tanaman' => $index->namaTanaman,
                'kabupaten' => $data['kabupaten'],
                'dataInput' => $data['dataInput'],
                'membershipMatrix' => $data['membershipMatrix'],
                'firstMembershipMatrix' => $data['firstMembershipMatrix'],
                'centroids' => $data['centroids'],
                'clusters' => $data['clusters'],
                'objectiveFunctions' => $data['objectiveFunctions'],
                'parameter' => $data['parameter'],
                'produksi' => $data['produksi'],
            ];
        }
        // dd($dataTanaman);
        return view('pages.user.rekap', [
            'dataTanaman' => $dataTanaman,
        ]);
    }
    public function eksporPdf($id)
    {
        $results = $this->cluster($id);

        if ($results->getStatusCode() !== 200) {
            $error = json_decode($results->getContent(), true)['error'];
            return view('pages.user.tanaman', [
                'error' => $error,
                'tanamanId' => $id
            ]);
        }
        $data = json_decode($results->getContent(), true);
        $dataEkspor = [
            'tanamanId' => $id,
            'namaTanaman' => $data['tanaman'],
            'kabupaten' => $data['kabupaten'],
            'dataInput' => $data['dataInput'],
            'membershipMatrix' => $data['membershipMatrix'],
            'firstMembershipMatrix' => $data['firstMembershipMatrix'],
            'centroids' => $data['centroids'],
            'clusters' => $data['clusters'],
            'objectiveFunctions' => $data['objectiveFunctions'],
            'parameter' => $data['parameter'],
            'produksi' => $data['produksi'],
        ];
        $pdf_download = PDF::loadView('pages.pdf.tanaman', $dataEkspor);

        // Unduh file PDF
        return $pdf_download->download('clusters.pdf');
    }
}
