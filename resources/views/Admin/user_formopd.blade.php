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
                    <label for="program">Program</label>
                    {!! Form::text('program', null, ['class' => 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('program') }}</span>
                 </div>
                  
                <div class ="form-group">  
                    <label for="kegiatan">Kegiatan</label>  
                    {!! Form::text('kegiatan', null, ['class' => 'form-control']) !!}  
                    <span class="text-danger">{{ $errors->first('kegiatan') }}</span>  
                </div>  
                  
                <div class ="form-group">  
                    <label for="sub_kegiatan">Perangkat Daerah</label>  
                    {!! Form::text('sub_kegiatan', null, ['class' => 'form-control']) !!}  
                    <span class="text-danger">{{ $errors->first('sub_kegiatan') }}</span>  
                </div>  
                  
                <div class ="form-group">  
                    <label for="anggaran">Anggaran</label>  
                    {!! Form::text('anggaran', null, ['class' => 'form-control']) !!}  
                    <span class="text-danger">{{ $errors->first('anggaran') }}</span>  
                </div>  
                  
                <div class ="form-group">  
                    <label for="komponen_belanja_khusus_stunting">Komponen belanja khusus stunting</label>  
                    {!! Form::text('komponen_belanja_khusus_stunting', null, ['class' => 'form-control']) !!}  
                    <span class="text-danger">{{ $errors->first('komponen_belanja_khusus_stunting') }}</span>  
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
                 
         
                 {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection