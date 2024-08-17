<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{
    use HasFactory;
    protected $table = "produksi";
    protected $fillable = ['idTanaman', 'namaKabKota', 'tahun1', 'tahun2', 'tahun3', 'tahun4', 'tahun5'];

    // protected $guarded = [''];

    public $timestamps = false;

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class, 'idTanaman');
    }
}
