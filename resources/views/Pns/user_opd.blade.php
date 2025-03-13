@extends('layouts.app_sneat_pns')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>

                <div class="card-body">

                   <div class="table-responsive">
                    <table class="table table-bordered custom-table">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Indikator</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($models as $item)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_indikator }}</td>
                                <td>

                                    {!! Form::open([
                                        'route' => [$routePrefix. '.destroy', $item->id],
                                        'method' => 'DELETE',
                                        'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                    ]) !!}

                                    <a href="{{ route($routePrefix.'.show', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                        Detail
                                    </a>
                                    {!! Form::close() !!}

                                </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4">Data tidak ada<td>
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
