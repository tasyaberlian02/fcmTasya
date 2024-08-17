<?php

namespace App\Http\Controllers;

use App\Models\produksi;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function index($id)
    {
        // $getIdTanaman = Tanaman::where('namaTanaman', $tanaman)->first();
        // $produksi = produksi::where('idTanaman', $getIdTanaman->id)->with('tanaman')->get();
        // $produksi = produksi::with('tanaman')->get();
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
        // $tanamann = Tanaman::all();
        return view('pages.dashboard', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaTanaman' => 'required',
        ]);
        Tanaman::create($request->all());

        return redirect()->back()->with('success', 'Tanaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaTanaman' => 'required',
        ]);

        $tanaman = Tanaman::findOrFail($id);
        $tanaman->namaTanaman = $request->namaTanaman;
        $tanaman->save();

        //Tanaman::where('id', $id)->update($tanaman);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tanaman::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
