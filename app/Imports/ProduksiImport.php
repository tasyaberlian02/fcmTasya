<?php

namespace App\Imports;

use App\Models\produksi;
use Dotenv\Validator;
use Maatwebsite\Excel\Concerns\ToModel;

class ProduksiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $idTanaman;

    public function __construct($idTanaman)
    {
        $this->idTanaman = $idTanaman;
    }

    public function model(array $row)
    {
        // dd($row);
        return new produksi([
            'idTanaman' => $this->idTanaman,
            'namaKabKota' => $row[0],
            'tahun1' => $row[1],
            'tahun2' => $row[2],
            'tahun3' => $row[3],
            'tahun4' => $row[4],
            'tahun5' => $row[5]
        ]);
    }
}
