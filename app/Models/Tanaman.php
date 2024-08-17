<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;
    protected $table = 'tanaman';
    protected $primaryKey = 'id';
    protected $fillable = ['namaTanaman'];

    public function produksi()
    {
        return $this->hasMany(produksi::class, 'idTanaman');
    }
}
