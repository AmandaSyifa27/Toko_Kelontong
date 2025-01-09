@extends('layout')
@section('content')
<div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Transaksi</div>
        <div class="m-4">
            <a class="btn btn-secondary" href="{{route('transaksi.create')}}">Tambah Data</a>
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
                            <th>No Transaksi</th>
                            <th>Nama Customer</th>
                            <th>Nama Produk</th>
                            <th>umlah Beli</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Nama Customer</th>
                            <th>Nama Produk</th>
                            <th>umlah Beli</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($transaksis as $key => $transaksi)
                            
                        <tr>
                            {{-- <td>{{ ++$i }}</td> --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->no_transaksi }}</td>
                            <td>{{ $transaksi->nm_customer }}</td>
                            <td>{{ $transaksi->produk->nm_produk }}</td>
                            <td>{{ $transaksi->jumlah_beli }}</td>
                            <td>{{ $transaksi->diskon }}</td>
                            <td>{{ $transaksi->total }}</td>
                            <td>
                                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning" href="{{ route('transaksi.edit', $transaksi->id) }}">Edit</a>
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