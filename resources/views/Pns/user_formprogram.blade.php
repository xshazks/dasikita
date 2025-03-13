@extends('layouts.app_sneat_pns')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">{{ $title }}</h5>

            <div class="card-body">
                {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}

                {{-- form nama --}}
                <div class="form-group">
                    <label for="id_opd">id_opd</label>
                    {!! Form::text('id_opd', null, ['class' => 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('id_opd') }}</span>
                </div>
                {{-- form hp --}}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>

                {{-- form hp --}}
                <div class="form-group">
                    <label for="indikator">Indikator</label>
                    {!! Form::text('indikator', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('indikator') }}</span>
                </div>

                {{-- form hp --}}
                <div class="form-group">
                    <label for="target">Target</label>
                    {!! Form::text('target', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('target') }}</span>
                </div>

                @if (\Route::is('Admin.create'))
                {{-- form akses --}}
                <div class="form-group mt-3">

                    <label for="akses">Hak Akses</label>

                    {!! Form::select(
                    'akses',
                    [
                    'admin'=> 'Administrator',
                    'pns' => 'PNS'
                    ],
                    null,
                    ['class' => 'form-control'] ,
                    ) !!}
                    <span class="text-danger">{{ $errors->first('akses') }}</span>
                </div>
                @endif


                {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
