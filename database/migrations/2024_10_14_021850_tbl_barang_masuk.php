<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_barang_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nm_produk');
            $table->string('jenis');
            $table->integer('jumlah');
            $table->double('harga');
            $table->string('nm_suplier');
            $table->date('tanggal');
            $table->text('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_barang_masuk');
    }
};
