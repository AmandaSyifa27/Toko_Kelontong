@extends('layout')
@section('content')
<div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Produk</div>
        <div class="m-4">
            <a class="btn btn-secondary" href="{{route('produk.create')}}">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                <div class="aler alert-success">
                    <p>{{ $message }}</p>
                </div>                    
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Produk</th>
                            <th>Nama Produk</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Foto Produk</th>
                            <th>Nama Produk</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($produks as $produk)
                            
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><center><img src="{{ url('/Foto_Produk/'.$produk->gambar) }}" width="100" alt="{{ $produk->nm_produk }}"></center></td>
                            <td>{{ $produk->nm_produk }}</td>
                            <td>{{ $produk->jenis }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td>{{ $produk->ket }}</td>
                            <td>
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning" href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                                    <button type="submit" name="submit" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Data Ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection