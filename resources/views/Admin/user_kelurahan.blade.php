@extends('layouts.app_sneat')

@section('content')

<form action="{{ route('data.index') }}" method="GET">
    <label for="kelurahan_id">Kelurahan:</label>
    <select name="kelurahan_id" id="kelurahan_id">
        <option value="">-- Pilih Kelurahan --</option>
        @if($kelurahans->isNotEmpty())
        @foreach ($kelurahans as $kelurahan)
        <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama_kelurahan }}</option>
        @endforeach
        @else
        <option value="">Tidak ada kelurahan</option>
        @endif
    </select>

    <label for="indikator_id">Indikator:</label>
    <select name="indikator_id" id="indikator_id">
        <option value="">-- Pilih Indikator --</option>
        @if($indikators->isNotEmpty())
        @foreach ($indikators as $indikator)
        <option value="{{ $indikator->id }}">{{ $indikator->nama_indikator }}</option>
        @endforeach
        @else
        <option value="">Tidak ada indikator</option>
        @endif
    </select>

    <button type="submit">Filter</button>
</form>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kelurahan</th>
                                <th>Indikator</th>
                                <th>Target 2023</th>
                                <th>Realisasi 2023</th>
                                <th>Target 2024</th>
                                <th>Realisasi 2024</th>
                            </tr>
                        </thead>
                            <tbody>
                                @if($pencapaian->isNotEmpty())
                                @foreach ($pencapaian as $item)
                                <tr>
                                    <td>{{ $item->kelurahan->nama_kelurahan }}</td>
                                    <td>{{ $item->indikator->nama_indikator }}</td>
                                    <td>{{ $item->target_2023 }}</td>
                                    <td>{{ $item->pencapaian_2023 }}</td>
                                    <td>{{ $item->target_2024 }}</td>
                                    <td>{{ $item->pencapaian_2024 }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">Tidak ada data pencapaian.</td>
                                </tr>
                                @endif
                            </tbody>
                    </table>
                   </div> 
                </div>
                @foreach ($pencapaian as $item)
                <div>
                    <!-- Tampilkan data item di sini -->
                    {{ $item->name }} <!-- Ganti dengan atribut yang sesuai -->
                </div>
            @endforeach
            
            <!-- Tautan untuk navigasi halaman -->
            {{ $pencapaian->links() }}
            
            </div>
        </div>
    </div>
</div>
@endsection