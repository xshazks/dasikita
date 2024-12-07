@extends('layouts.app_sneat')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>

                <div class="card-body">
                 {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}

                 {{-- form nama --}}
                 <div class ="form-group">
                    <label for="id_program">id_program</label>
                    {!! Form::text('id_program', null, ['class' => 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('id_program') }}</span>
                 </div>
                {{-- form hp --}}
                <div class ="form-group">
                    <label for="nama">Nama</label>
                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                 </div>

                   {{-- form hp --}}
                <div class ="form-group">
                    <label for="indikator">Indikator</label>
                    {!! Form::text('indikator', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('indikator') }}</span>
                 </div>

                   {{-- form hp --}}
                <div class ="form-group">
                    <label for="target">Target</label>
                    {!! Form::text('target', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('target') }}</span>
                 </div>

                {{-- form program --}}
                <div class ="form-group">
                    <label for="id_program">id_program</label>
                    <select name="id_program" class="form-control">
                        <option value="">- Pilih -</option>
                        @foreach ($programs as $item)
                        <option value="{{ $item->id_program }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                 </div>
         
                 {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection