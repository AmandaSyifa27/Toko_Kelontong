@extends('layout')
@section('content')

<div class="card-header">
    <h4>Tambah Data TRansaksi</h4>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Maaf,</strong>Data yang anda masukkan tidak benar. <br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>      
    @endforeach
  </ul>
</div>  
@endif

<form method="POST" class="form-group col-8 my-4 p-4" action="{{route('transaksi.store')}}" enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nomor Transaksi</label>
        <input name="no_transaksi" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Transaksi">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nama Customer</label>
        <input name="nm_customer" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Customer">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nama Produk</label>
        <select name="id_produk" type="text" class="form-control" id="exampleFormControlInput1">
            <option value="">Pilih Nama Produk</option>
            @foreach ($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nm_produk }}</option>
            @endforeach
        </select>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="exampleFormControlTextarea1" class="form-label">Jumlah</label>
            <input name="jumlah_beli" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Beli">
        </div>
        <div class="col">
            <label for="exampleFormControlTextarea1" class="form-label">Diskon</label>
            <input name="diskon" type="number" class="form-control" id="exampleFormControlInput1" placeholder="..%">
        </div>
        <div class="col">
            <label for="exampleFormControlTextarea1" class="form-label">Total</label>
            <input name="total" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Total Bayar">
        </div>
    </div>    
      <div class="d-flex justify-content-end my-3">
        <input type="submit" class="btn btn-secondary" value="Tambah"/>
      </div>
    </form>
@endsection