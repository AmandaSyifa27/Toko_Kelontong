<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaProduk extends Model
{
    use HasFactory;

    public $table = "tbl_kriteria_produk";

    protected $fillable = [
        'kd_kriteria', 'nm_kriteria', 'keterangan'
    ];
}
