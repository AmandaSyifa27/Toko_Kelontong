@extends('layout')
@section('content')
<div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kriteria Produk</div>
        <div class="m-4">
            <a class="btn btn-secondary" href="{{route('kriteria.create')}}">Tambah Data</a>
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
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($kriterias as $kriteria)
                            
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $kriteria->kd_kriteria }}</td>
                            <td>{{ $kriteria->nm_kriteria }}</td>
                            <td>{{ $kriteria->keterangan }}</td>
                            <td>
                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning" href="{{ route('kriteria.edit', $kriteria->id) }}">Edit</a>
                                    {{-- <a class="btn btn-danger" href="">Hapus</a> --}}
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