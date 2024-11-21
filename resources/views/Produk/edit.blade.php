@extends('layout')
@section('content')

<div class="card-header">
    <h4>Ubah Data Produk</h4>
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

<form method="POST" class="form-group col-8 my-4 p-4" action="{{route('produk.update', $produk->id)}}">
  @csrf
  @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nama Produk</label>
        <input name="nm_produk" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Produk" value="{{ $produk->nm_produk }}">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jenis</label>
        <select name="jenis" class="form-control form-select" aria-label="Default select example">
            <option selected>Jenis Barang</option>
            <option {{ $produk->jenis == 'Pakaian' ? 'selected' : '' }} value="Pakaian">Pakaian</option>
            <option {{ $produk->jenis == 'Elektronik' ? 'selected' : '' }} value="Elektronik">Elektronik</option>
            <option {{ $produk->jenis == 'Makanan' ? 'selected' : '' }} value="Makanan">Makanan</option>
            <option {{ $produk->jenis == 'Peralatan Rumah Tangga' ? 'selected' : '' }} value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
          </select>
      </div>
      <div class="row mb-3">
        <div class="col">
            <label for="exampleFormControlTextarea1" class="form-label">Stok</label>
            <input name="stok" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Stok" value="{{ $produk->stok }}">
        </div>
        <div class="col">
            <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp." value="{{ $produk->harga }}">
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
        <textarea name="ket" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $produk->ket }}</textarea>
      </div>
      <div class="d-flex justify-content-end my-3">
        <input type="submit" class="btn btn-secondary" value="Update Data"/>
      </div>
    </form>
@endsection