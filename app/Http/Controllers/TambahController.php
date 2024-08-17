<?php

namespace App\Http\Controllers;

use App\Models\Clustering;
use App\Models\produksi;
use Illuminate\Http\Request;

class TambahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $produksi = produksi::where('idTanaman', $id)->with('tanaman')->get();

        return view('pages.cabai', [
            'produksis' => $produksi,
            'tanamanId' => $id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idTanaman' => 'required',
            'namaKabKota' => 'required',
            'tahun1' => 'required|numeric',
            'tahun2' => 'required|numeric',
            'tahun3' => 'required|numeric',
            'tahun4' => 'required|numeric',
            'tahun5' => 'required|numeric',
        ], [
            'namaKabKota.required' => 'Pilih Kabupaten/kota',
            'tahun1.required' => 'Data produksi wajib di isi',
            'tahun1.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun2.required' => 'Data produksi wajib di isi',
            'tahun2.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun3.required' => 'Data produksi wajib di isi',
            'tahun3.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun4.required' => 'Data produksi wajib di isi',
            'tahun4.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun5.required' => 'Data produksi wajib di isi',
            'tahun5.numeric' => 'Data produksi wajib di isi dengan angka',
        ]);

        // dd($request);

        $data = [
            'idTanaman' => $request->idTanaman,
            'namaKabKota' => $request->namaKabKota,
            'tahun1' => $request->tahun1,
            'tahun2' => $request->tahun2,
            'tahun3' => $request->tahun3,
            'tahun4' => $request->tahun4,
            'tahun5' => $request->tahun5,
        ];
        produksi::create($data);
        return redirect()->back()->with('success', 'Berhasil Memasukkan Data');
    }

    public function show(string $id)
    {
        $data = produksi::where('id', $id)->first();
        return view('produksi/cabai')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request->all());
        $request->validate([
            'idTanaman' => 'required',
            'namaKabKota' => 'required',
            'tahun1' => 'required|numeric',
            'tahun2' => 'required|numeric',
            'tahun3' => 'required|numeric',
            'tahun4' => 'required|numeric',
            'tahun5' => 'required|numeric',
        ], [
            'namaKabKota.required' => 'Pilih Kabupaten/kota',
            'tahun1.required' => 'Data produksi wajib di isi',
            'tahun1.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun2.required' => 'Data produksi wajib di isi',
            'tahun2.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun3.required' => 'Data produksi wajib di isi',
            'tahun3.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun4.required' => 'Data produksi wajib di isi',
            'tahun4.numeric' => 'Data produksi wajib di isi dengan angka',
            'tahun5.required' => 'Data produksi wajib di isi',
            'tahun5.numeric' => 'Data produksi wajib di isi dengan angka',
        ]);

        $data = [
            'idTanaman' => $request->idTanaman,
            'namaKabKota' => $request->namaKabKota,
            'tahun1' => $request->tahun1,
            'tahun2' => $request->tahun2,
            'tahun3' => $request->tahun3,
            'tahun4' => $request->tahun4,
            'tahun5' => $request->tahun5,
        ];

        // dd($data);

        produksi::where('id', $id)->update($data);
        // return redirect('/{tanaman}')->with('success', 'Berhasil Mengedit Data');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        produksi::where('id', $id)->delete();
        return redirect()->back();
        // return redirect('produksi/{tanaman}')->with('success', 'Berhasil Menghapus Data');
    }

    public function tambahParameter(Request $request)
    {
        $request->validate([
            'jumlahKlaster' => 'required|numeric',
            'nilaiBobot' => 'required|numeric',
            'maxIterasi' => 'required|numeric',
        ], [
            'jumlahKlaster.required' => 'masukkan jumlah cluster',
            'jumlahKlaster.numeric' => 'jumlah cluster berupa bilangan numeric',
            'nilaiBobot.required' => 'masukkan nilai bobot',
            'nilaiBobot.numeric' => 'nilai bobot berupa bilangan numeric',
            'maxIterasi.required' => 'masukkan jumlah cluster',
            'maxIterasi.numeric' => 'jumlah cluster berupa bilangan numeric',
        ]);

        $data = [
            'idTanaman' => $request->idTanaman,
            'jumlahKlaster' => $request->jumlahKlaster,
            'nilaiBobot' => $request->nilaiBobot,
            'maxIterasi' => $request->maxIterasi,
        ];
        Clustering::create($data);
        return redirect()->back()->with('success', 'Berhasil Memasukkan Data');
    }

    public function updateParameter(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jumlahKlaster' => 'required|integer',
            'nilaiBobot' => 'required|numeric',
            'maxIterasi' => 'required|integer'
        ]);

        // Cari parameter yang ada
        $parameter = Clustering::where('idTanaman', $id)->first();
        if (!$parameter) {
            return redirect()->route('showResults', $id)->with('error', 'Parameter tidak ditemukan.');
        }

        // Update parameter
        $parameter->jumlahKlaster = $request->input('jumlahKlaster');
        $parameter->nilaiBobot = $request->input('nilaiBobot');
        $parameter->maxIterasi = $request->input('maxIterasi');
        $parameter->save();

        return redirect()->back()->with('success', 'Berhasil Memasukkan Data');
    }
}
