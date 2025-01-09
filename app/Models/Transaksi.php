<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $table = "tbl_transaksi";

    protected $fillable = [
        'no_transaksi', 'nm_customer', 'id_produk', 'jumlah_beli', 'diskon', 'total'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
