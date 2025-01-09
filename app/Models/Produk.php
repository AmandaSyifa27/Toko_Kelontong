<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $table = "tbl_produk";

    protected $fillable = [
        'nm_produk', 'jenis', 'stok', 'harga', 'id_kriteria', 'ket', 'gambar'
    ];

    public function kriteria(){
        return $this->belongsTo(KriteriaProduk::class, 'id_kriteria', 'id');
    }
}
