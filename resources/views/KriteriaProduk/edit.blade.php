@extends('layout')
@section('content')

<div class="card-header">
    <h4>Ubah Data Kriteria Produk</h4>
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

<form method="POST" class="form-group col-8 my-4 p-4" action="{{ route('kriteria.update', $kriteria->id) }}">
  @csrf
  @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Kode Kriteria</label>
        <input name="kd_kriteria" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Produk" value="{{ $kriteria->kd_kriteria }}">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
        <select name="nm_kriteria" class="form-control form-select" aria-label="Default select example">
            <option selected>Jenis Barang</option>
            <option {{ $kriteria->nm_kriteria == 'Pakaian' ? 'selected' : '' }} value="Pakaian">Pakaian</option>
            <option {{ $kriteria->nm_kriteria == 'Elektronik' ? 'selected' : '' }} value="Elektronik">Elektronik</option>
            <option {{ $kriteria->nm_kriteria == 'Makanan' ? 'selected' : '' }} value="Makanan">Makanan</option>
            <option {{ $kriteria->nm_kriteria == 'Peralatan Rumah Tangga' ? 'selected' : '' }} value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
          </select>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $kriteria->keterangan }}</textarea>
      </div>
      <div class="d-flex justify-content-end my-3">
        <input type="submit" class="btn btn-secondary" value="Update Data"/>
      </div>
    </form>
@endsection