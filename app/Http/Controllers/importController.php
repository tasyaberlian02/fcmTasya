<?php

namespace App\Http\Controllers;

use App\Imports\ProduksiImport;
use App\Models\produksi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class importController extends Controller
{
    public function import(Request $request, $idTanaman){
        // dd($request->all());
        Excel::import(new ProduksiImport($idTanaman), $request->file);
        return redirect()->back()->with('success', 'All good!');
    }

}
