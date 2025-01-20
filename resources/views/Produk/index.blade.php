@extends('layout')
@section('content')
<div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Produk</div>
        <div class="m-4">
            {{-- <form action="{{route('produk.cari')}}" method="GET">
            @csrf
            <div class="form-row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input name="cari" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success">Cari Data</button>
                    </div>
                </div>
            </div>
        </form> --}}

        <form action="/cari" method="GET">
            @csrf
            <div class="form-row">
                <div class="col-md-3"><div class="form-group">
                    <input type="text" name="cari" class="form-control">
                </div></div>
                <div class="col-md-3"><div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" values="Cari Data">
                </div></div>
            </div>
        </form>

        {{-- <form action="/cari" method="GET">
            @csrf
            <div class="form-row">
                <div class="col-md-3"><div class="form-group">
                    <input type="date" name="dari" class="form-control">
                </div></div>
                <div class="col-md-3"><div class="form-group">
                    <input type="date" name="sampai" class="form-control">
                </div></div>
                <div class="col-md-3"><div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" values="Cari Data">
                </div></div>
            </div>
        </form> --}}
        
        {{-- <form action="/cari" method="GET">
                      @csrf
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" name="cari" placeholder="Cari Produk">
                          <button class="btn btn-primary" type="submit">Cari</button>
                      </div>
                  </form> --}}
        </div>
        <div class="m-4">
            <a class="btn btn-secondary" href="{{route('produk.create')}}">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
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
                            <th>Kriteria Produk</th>
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
                            <th>Kriteria Produk</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- @foreach ($produks as $produk)
                            
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><center><img src="{{ url('/Foto_Produk/'.$produk->gambar) }}" width="100" alt="{{ $produk->nm_produk }}"></center></td>
                            <td>{{ $produk->nm_produk }}</td>
                            <td>{{ $produk->jenis }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td>{{ $produk->nm_kriteria }}</td>
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
                        @endforeach --}}
                        @foreach ($produks as $key => $produk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><center><img src="{{ url('/Foto_Produk/'.$produk->gambar) }}" width="100" alt="{{ $produk->nm_produk }}"></center></td>
                            <td>{{ $produk->nm_produk }}</td>
                            <td>{{ $produk->jenis }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->harga }}</td>
                            @if (request()->is('cari'))                                
                            <td>{{ $produk->nm_kriteria }}</td>
                            @else
                            <td>{{ $produk->kriteria->nm_kriteria }}</td>
                            @endif
                            <td>{{ $produk->ket }}</td>
                        <td>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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