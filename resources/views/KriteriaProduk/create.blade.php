@extends('layout')
@section('content')

<div class="card-header">
    <h4>Tambah Data Kriteria Produk</h4>
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

<form method="POST" class="form-group col-8 my-4 p-4" action="{{ route('kriteria.store') }}">
  @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Kode Kriteria</label>
        <input name="kd_kriteria" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Produk">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
        <select name="nm_kriteria" class="form-control form-select" aria-label="Default select example">
            <option selected>Jenis Barang</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Makanan">Makanan</option>
            <option value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
          </select>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="d-flex justify-content-end my-3">
        <input type="submit" class="btn btn-secondary" value="Update Data"/>
      </div>
    </form>
@endsection