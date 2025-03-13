@extends('layouts.app_sneat_pns')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Komponen Anggaran</h5>

            <div class="card-body">
                <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Program</th>
                                <th>Kegiatan</th>
                                <th>Perangkat Daerah</th>
                                <th>Anggaran</th>
                                <th>Komponen belanja khusus stunting</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($models as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->program }}</td>
                                <td>{{ $item->kegiatan }}</td>
                                <td>{{ $item->sub_kegiatan }}</td>
                                <td>{{ $item->anggaran}}</td>
                                <td>{{ $item->komponen_belanja_khusus_stunting }}</td>
                                <td>

                                    {!! Form::open([
                                    'route' => [$routePrefix. '.destroy', $item->id],
                                    'method' => 'DELETE',
                                    'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                    ]) !!}

                                    <a href="{{ route($routePrefix.'.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                    {!! Form::close() !!}

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="4">Data tidak ada
                                <td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $models->links() !!} <!-- Render pagination links -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
