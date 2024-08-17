@extends('layouts.app')
@section('content')

    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Parameter Klaster</h3>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            @if (isset($parameter))
                                Edit Parameter
                            @else
                                Tambah Parameter
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah parameter -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="parameterModalLabel">
                        @if (isset($parameter))
                            Edit Parameter
                        @else
                            Tambah Parameter
                        @endif
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if (isset($parameter))
                    <div class="modal-body">
                        <form method="post" action="{{ route('UpdateParameter', $tanamanId) }}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{ $tanamanId }}" name="idTanaman">
                            <div class="mb-3 row">
                                <label for="jumlahKlaster" class="col-sm-5 col-form-label">Jumlah K : </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="jumlahKlaster" id="jumlahKlaster"
                                        value="{{ $parameter['jumlahKlaster'] }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nilaiBobot" class="col-sm-5 col-form-label">Bobot : </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="nilaiBobot" id="nilaiBobot"
                                        value="{{ $parameter['nilaiBobot'] }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="maxIterasi" class="col-sm-5 col-form-label">Max Iterasi : </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="maxIterasi" id="maxIterasi"
                                        value="{{ $parameter['maxIterasi'] }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Proses</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="modal-body">
                        <form method="POST" action="{{ route('parameter', $tanamanId) }}">
                            @csrf
                            <input type="hidden" value="{{ $tanamanId }}" name="idTanaman">
                            <div class="mb-3 row">
                                <label for="jumlahKlaster" class="col-sm-5 col-form-label">Jumlah K : </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="jumlahKlaster" id="jumlahKlaster"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nilaiBobot" class="col-sm-5 col-form-label">Bobot : </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="nilaiBobot" id="nilaiBobot" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="maxIterasi" class="col-sm-5 col-form-label">Max Iterasi : </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="maxIterasi" id="maxIterasi" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Proses</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @else
        <h3 class="mt-2">Normalisasi</h3>
        <div class="card card-bordered">
            @if (isset($error))
                <p>{{ $error }}</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kabupaten/Kota</th>
                            <th>Tahun 1</th>
                            <th>Tahun 2</th>
                            <th>Tahun 3</th>
                            <th>Tahun 4</th>
                            <th>Tahun 5</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (isset($dataInput))
                            @foreach ($dataInput as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kabupaten[$index] }}</td>
                                    <td>{{ $data[0] }}</td>
                                    <td>{{ $data[1] }}</td>
                                    <td>{{ $data[2] }}</td>
                                    <td>{{ $data[3] }}</td>
                                    <td>{{ $data[4] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @endif
        </div>

        <h3 class="mt-2">Bilangan Acak Iterasi Pertama</h3>
        <div class="card card-bordered">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kabupaten/Kota</th>
                        @for ($i = 1; $i <= count($firstMembershipMatrix[0]); $i++)
                            <th>µik{{ $i }}</th>
                        @endfor
                        <th>validasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($firstMembershipMatrix as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kabupaten[$index] }}</td>
                            @foreach ($data as $value)
                                <td>{{ number_format($value, 2) }}</td> <!-- Format angka -->
                            @endforeach
                            <td>{{ array_sum($data) }}</td> <!-- Format angka -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3 class="mt-2">Centroids</h3>
        <div class="card card-bordered">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cluster</th>
                        @foreach (range(1, count($centroids[0])) as $attr)
                            <th>Tahun {{ $attr }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($centroids as $index => $centroid)
                        <tr>
                            <td>Cluster {{ $index + 1 }}</td>
                            @foreach ($centroid as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3 class="mt-2">Objective Function Values</h3>
        <div class="card card-bordered">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Iteration</th>
                        <th>Objective Function Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objectiveFunctions as $iteration => $value)
                        <tr>
                            <td>{{ $iteration + 1 }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3 class="mt-2">Derajat Keanggotaan Akhir</h3>
        <div class="card card-bordered">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kabupaten/Kota</th>
                        @for ($i = 1; $i <= count($membershipMatrix[0]); $i++)
                            <th>C{{ $i }}</th>
                        @endfor
                        <th>validasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($membershipMatrix as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kabupaten[$index] }}</td>
                            @foreach ($data as $value)
                                <td>{{ number_format($value, 2) }}</td> <!-- Format angka -->
                                @php
                                    $pciTotal += $value ** 2;
                                @endphp
                            @endforeach
                            <td>{{ array_sum($data) }}</td> <!-- Format angka -->
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td><b>Hasil</b></td>
                        <td colspan="3">{{ $pciTotal / ($index + 1) }}</td>
                        <td></td> <!-- Format angka -->
                    </tr>
                </tbody>
            </table>
        </div>

        <h3 class="mt-2">Clusters</h3>
        <div class="card card-bordered p-3">
            @php
                $clusterRangking = [];
                rsort($clusters);
            @endphp
            @foreach ($clusters as $clusterIndex => $clusterData)
                <h4 class="mt-2">Cluster {{ $clusterIndex + 1 }}</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kabupaten/Kota</th>
                            @foreach (range(1, count($clusterData[0])) as $attr)
                                <th>Tahun {{ $attr }}</th>
                            @endforeach
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sumTotal = 0;
                            $numDataPoints = count($clusterData);
                        @endphp
                        @foreach ($clusterData as $dataPoint)
                            @php
                                $sumPerDataPoint = array_sum($dataPoint);
                                $sumTotal += $sumPerDataPoint;
                            @endphp
                            <tr>
                                <td>{{ $kabupaten[array_search($dataPoint, $dataInput)] }}</td>
                                @foreach ($dataPoint as $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                                <td><strong>{{ $sumPerDataPoint }}</strong></td>
                            </tr>
                        @endforeach
                        <!-- Hitung dan tampilkan rata-rata dari penjumlahan nilai -->
                        @php
                            $averageSum = $sumTotal / $numDataPoints;
                            $clusterRangking[] = $averageSum;
                        @endphp
                        <tr>
                            <td><strong>Rata-rata</strong></td>
                            @foreach (range(1, count($clusterData[0])) as $attr)
                                <td></td>
                            @endforeach
                            <td><strong>{{ number_format($averageSum, 2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
            <h4 class="mt-2">Label</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Klaster</th>
                        <th>Label</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sortedClusterRangking = $clusterRangking;
                        rsort($sortedClusterRangking);
                        $highCluster = $sortedClusterRangking[0];
                        $mediumCluster = $sortedClusterRangking[1];
                    @endphp
                    @for ($i = 0; $i <= count($clusterRangking) - 1; $i++)
                        <tr>
                            <td><strong>Klaster {{ $i + 1 }}</strong></td>
                            <td>
                                <strong>
                                    @if ($clusterRangking[$i] == $highCluster)
                                        Tinggi
                                    @elseif ($clusterRangking[$i] == $mediumCluster)
                                        Sedang
                                    @else
                                        Rendah
                                    @endif
                                </strong>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>


        <!-- Canvas for Bubble Chart -->
        {{-- <div class="pt-4 col-5 mx-auto">
            <h3>Visualisasi Clustering</h3>
            <canvas id="clusterChart" width="400" height="400"></canvas>
        </div> --}}
        <!-- Canvas for Pie Chart -->
        <div class="pt-4 col-5 mx-auto">
            <h3>Persentase Data per Cluster</h3>
            <canvas id="pieChart" width="400" height="400"></canvas>
        </div>

        <nav class="">
            <div class="nav nav-tabs gap-3" id="nav-tab" role="tablist">
                <button class="nav-link active" id="cluster-1" data-bs-toggle="tab" data-bs-target="#plot1"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Scatter 1</button>
                <button class="nav-link" id="cluster-2" data-bs-toggle="tab" data-bs-target="#plot2" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 2</button>
                <button class="nav-link" id="cluster-3" data-bs-toggle="tab" data-bs-target="#plot3" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 3</button>
                <button class="nav-link" id="cluster-4" data-bs-toggle="tab" data-bs-target="#plot4" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 4</button>
                <button class="nav-link" id="cluster-5" data-bs-toggle="tab" data-bs-target="#plot5" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 5</button>
                <button class="nav-link" id="cluster-6" data-bs-toggle="tab" data-bs-target="#plot6" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 6</button>
                <button class="nav-link" id="cluster-7" data-bs-toggle="tab" data-bs-target="#plot7" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 7</button>
                <button class="nav-link" id="cluster-8" data-bs-toggle="tab" data-bs-target="#plot8" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 8</button>
                <button class="nav-link" id="cluster-9" data-bs-toggle="tab" data-bs-target="#plot9" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 9</button>
                <button class="nav-link" id="cluster-10" data-bs-toggle="tab" data-bs-target="#plot10" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Scatter 10</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="plot1" role="tabpanel" aria-labelledby="cluster-1">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart1" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot2" role="tabpanel" aria-labelledby="cluster-2">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart2" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot3" role="tabpanel" aria-labelledby="cluster-3">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart3" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot4" role="tabpanel" aria-labelledby="cluster-4">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart4" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot5" role="tabpanel" aria-labelledby="cluster-5">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart5" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot6" role="tabpanel" aria-labelledby="cluster-6">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart6" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot7" role="tabpanel" aria-labelledby="cluster-7">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart7" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot8" role="tabpanel" aria-labelledby="cluster-8">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart8" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot9" role="tabpanel" aria-labelledby="cluster-9">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart9" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="plot10" role="tabpanel" aria-labelledby="cluster-10">
                <div class="col-8 mx-auto mt-4">
                    <canvas id="clusterChart10" width="400" height="400"></canvas>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Data dari server
                const clusters = @json($clusters);
                const centroids = @json($centroids);

                // Siapkan data untuk Chart.js Bubble Chart
                const colors = ['red', 'blue', 'green', 'purple', 'orange'];

                // Fungsi untuk menyiapkan data
                function prepareData(clusters, xIndex, yIndex) {
                    const dataPoints = [];
                    Object.keys(clusters).forEach((clusterIndex, i) => {
                        clusters[clusterIndex].forEach(point => {
                            dataPoints.push({
                                x: point[xIndex],
                                y: point[yIndex],
                                r: 5,
                                backgroundColor: colors[i % colors.length]
                            });
                        });
                    });
                    return dataPoints;
                }

                const dataPoints1 = prepareData(clusters, 0, 1);
                const dataPoints2 = prepareData(clusters, 0, 2);
                const dataPoints3 = prepareData(clusters, 0, 3);
                const dataPoints4 = prepareData(clusters, 0, 4);
                const dataPoints5 = prepareData(clusters, 1, 2);
                const dataPoints6 = prepareData(clusters, 1, 3);
                const dataPoints7 = prepareData(clusters, 1, 4); // Plot ketujuh menggunakan kolom 1 dan 4
                const dataPoints8 = prepareData(clusters, 2, 3); // Plot kedelapan menggunakan kolom 2 dan 3
                const dataPoints9 = prepareData(clusters, 2, 4); // Plot kesembilan menggunakan kolom 2 dan 4
                const dataPoints10 = prepareData(clusters, 3, 4);


                function prepareCentroidData(centroids, xIndex, yIndex) {
                    return centroids.map((centroid, i) => ({
                        x: centroid[xIndex],
                        y: centroid[yIndex],
                        r: 10,
                        backgroundColor: 'black',
                        borderColor: colors[i % colors.length],
                        borderWidth: 2
                    }));
                }

                const centroidPoints1 = prepareCentroidData(centroids, 0, 1);
                const centroidPoints2 = prepareCentroidData(centroids, 0, 2);
                const centroidPoints3 = prepareCentroidData(centroids, 0, 3);
                const centroidPoints4 = prepareCentroidData(centroids, 0, 4);
                const centroidPoints5 = prepareCentroidData(centroids, 1, 2);
                const centroidPoints6 = prepareCentroidData(centroids, 1, 3);
                const centroidPoints7 = prepareCentroidData(centroids, 1,
                    4); // Centroid untuk plot ketujuh menggunakan kolom 1 dan 4
                const centroidPoints8 = prepareCentroidData(centroids, 2,
                    3); // Centroid untuk plot kedelapan menggunakan kolom 2 dan 3
                const centroidPoints9 = prepareCentroidData(centroids, 2,
                    4); // Centroid untuk plot kesembilan menggunakan kolom 2 dan 4
                const centroidPoints10 = prepareCentroidData(centroids, 3, 4);


                // Scatter plot pertama
                const ctx1 = document.getElementById('clusterChart1').getContext('2d');
                new Chart(ctx1, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 1',
                                data: dataPoints1,
                                backgroundColor: dataPoints1.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 1',
                                data: centroidPoints1,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot kedua
                const ctx2 = document.getElementById('clusterChart2').getContext('2d');
                new Chart(ctx2, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 2',
                                data: dataPoints2,
                                backgroundColor: dataPoints2.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 2',
                                data: centroidPoints2,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot ketiga
                const ctx3 = document.getElementById('clusterChart3').getContext('2d');
                new Chart(ctx3, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 3',
                                data: dataPoints3,
                                backgroundColor: dataPoints3.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 3',
                                data: centroidPoints3,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot keempat
                const ctx4 = document.getElementById('clusterChart4').getContext('2d');
                new Chart(ctx4, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 4',
                                data: dataPoints4,
                                backgroundColor: dataPoints4.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 4',
                                data: centroidPoints4,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot kelima
                const ctx5 = document.getElementById('clusterChart5').getContext('2d');
                new Chart(ctx5, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 5',
                                data: dataPoints5,
                                backgroundColor: dataPoints5.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 5',
                                data: centroidPoints5,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot keenam
                const ctx6 = document.getElementById('clusterChart6').getContext('2d');
                new Chart(ctx6, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 6',
                                data: dataPoints6,
                                backgroundColor: dataPoints6.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 6',
                                data: centroidPoints6,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot ketujuh
                const ctx7 = document.getElementById('clusterChart7').getContext('2d');
                new Chart(ctx7, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 7',
                                data: dataPoints7,
                                backgroundColor: dataPoints7.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 7',
                                data: centroidPoints7,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot kedelapan
                const ctx8 = document.getElementById('clusterChart8').getContext('2d');
                new Chart(ctx8, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 8',
                                data: dataPoints8,
                                backgroundColor: dataPoints8.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 8',
                                data: centroidPoints8,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot kesembilan
                const ctx9 = document.getElementById('clusterChart9').getContext('2d');
                new Chart(ctx9, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 9',
                                data: dataPoints9,
                                backgroundColor: dataPoints9.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 9',
                                data: centroidPoints9,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Scatter plot kesepuluh
                const ctx10 = document.getElementById('clusterChart10').getContext('2d');
                new Chart(ctx10, {
                    type: 'bubble',
                    data: {
                        datasets: [{
                                label: 'Data Points 10',
                                data: dataPoints10,
                                backgroundColor: dataPoints10.map(point => point.backgroundColor)
                            },
                            {
                                label: 'Centroids 10',
                                data: centroidPoints10,
                                backgroundColor: 'black'
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            },
                            y: {
                                type: 'linear',
                                position: 'left'
                            }
                        }
                    }
                });

                // Siapkan data untuk Chart.js Pie Chart
                const clusterSizes = Object.values(clusters).map(cluster => cluster.length);
                const clusterLabels = Object.keys(clusters).map(index => `Cluster ${parseInt(index) + 1}`);

                const pieCtx = document.getElementById('pieChart').getContext('2d');
                new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        labels: clusterLabels,
                        datasets: [{
                            label: 'Cluster Distribution',
                            data: clusterSizes,
                            backgroundColor: colors.slice(0, clusterLabels.length)
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw;
                                        const total = context.chart._metasets[0].total;
                                        const percentage = ((value / total) * 100).toFixed(2);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endif

@endsection
