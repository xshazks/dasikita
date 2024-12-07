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
                    <label for="name">Nama</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                 </div>
                {{-- form hp --}}
                 <div class ="form-group mt-3">
                    <label for="nohp">Nomor Hp</label>
                    {!! Form::text('nohp', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('nohp') }}</span>
                 </div>
                 @if (\Route::is('Admin.create'))
                 {{-- form akses --}}
                 <div class ="form-group mt-3">
                    
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
                 {{-- form email --}}
                 <div class ="form-group mt-3">
                    <label for="email">Email</label>
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                 </div>
                {{-- form password --}}
                <div class ="form-group mt-3">
                 <label for="password">Password</label>
                 {!! Form::password('password', ['class' => 'form-control']) !!}
                 <span class="text-danger">{{ $errors->first('password') }}</span>
                 </div>
                 
         
                 {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection