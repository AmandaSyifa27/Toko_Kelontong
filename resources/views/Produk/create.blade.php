@extends('layout')
@section('content')

<div class="card-header">
    <h4>Tambah Data Produk</h4>
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

<form method="POST" class="form-group col-8 my-4 p-4" action="{{route('produk.store')}}" enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nama Produk</label>
        <input name="nm_produk" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Produk">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jenis</label>
        <select name="jenis" class="form-control form-select" aria-label="Default select example">
            <option selected>Jenis Barang</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Makanan">Makanan</option>
            <option value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
          </select>
      </div>
      <div class="row mb-3">
        <div class="col">
            <label for="exampleFormControlTextarea1" class="form-label">Stok</label>
            <input name="stok" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Stok">
        </div>
        <div class="col">
            <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp.">
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Kriteria Produk</label>
        <select name="id_kriteria" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp.">
          <option value="">Pilih Kriteria Produk</option>
          @foreach ($kriterias as $kriteria)
            <option value="{{ $kriteria->id }}">{{ $kriteria->nm_kriteria }}</option>
          @endforeach
        </select>
    </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
        <textarea name="ket" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="gambar" class="form-label">Upload Foto Produk</label>
        <input type="file" class="form-control" name="gambar" id="gambar"/>
      </div>
      <div class="d-flex justify-content-end my-3">
        <input type="submit" class="btn btn-secondary" value="Tambah"/>
      </div>
    </form>
@endsection