@extends('layout')
@section('content')

<div class="card-header">
    <h4>Ubah Data Transaksi</h4>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Maaf,</strong> Data yang Anda masukkan tidak benar. <br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>      
    @endforeach
  </ul>
</div>  
@endif

<form method="POST" class="form-group col-8 my-4 p-4" action="{{ route('transaksi.update', $transaksi->id) }}">
  @csrf
  @method('PUT')
    <div class="mb-3">
        <label for="no_transaksi" class="form-label">Nomor Transaksi</label>
        <input value="{{ $transaksi->no_transaksi }}" name="no_transaksi" type="text" class="form-control" id="no_transaksi" placeholder="Nomor Transaksi">
    </div>
    <div class="mb-3">
        <label for="nm_customer" class="form-label">Nama Customer</label>
        <input value="{{ $transaksi->nm_customer }}" name="nm_customer" type="text" class="form-control" id="nm_customer" placeholder="Nama Customer">
    </div>
    <div class="mb-3">
        <label for="id_produk" class="form-label">Nama Produk</label>
        <select name="id_produk" class="form-control" id="id_produk">
            <option value="">Pilih Nama Produk</option>
            @foreach ($produks as $produk)
                <option {{ $transaksi->id_produk == $produk->id ? 'selected' : '' }} value="{{ $produk->id }}">{{ $produk->nm_produk }}</option>
            @endforeach
        </select>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="jumlah_beli" class="form-label">Jumlah</label>
            <input value="{{ $transaksi->jumlah_beli }}" name="jumlah_beli" type="number" class="form-control" id="jumlah_beli" placeholder="Jumlah Beli">
        </div>
        <div class="col">
            <label for="diskon" class="form-label">Diskon</label>
            <input value="{{ $transaksi->diskon }}" name="diskon" type="number" class="form-control" id="diskon" placeholder="..%">
        </div>
        <div class="col">
            <label for="total" class="form-label">Total</label>
            <input value="{{ $transaksi->total }}" name="total" type="number" class="form-control" id="total" placeholder="Total Bayar">
        </div>
    </div>    
    <div class="d-flex justify-content-end my-3">
        <button type="submit" class="btn btn-secondary">Simpan</button>
    </div>
</form>
@endsection
