@extends('layouts.app_sneat')

@section('content')

<form action="{{ route('data.index') }}" method="GET">
    <label for="kecamatan_id">Kecamatan:</label>
    <select name="kecamatan_id" id="kecamatan_id">
        <option value="">-- Pilih Kecamatan --</option>
        @if($kecamatan->isNotEmpty())
        @foreach ($kecamatan as $kecamatan)
        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
        @endforeach
        @else
        <option value="">Tidak ada kecamatan</option>
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
                                <th>kecamatan</th>
                                <th>Indikator</th>
                                <th>Target Program</th>
                                <th>Realisasi 2023</th>
                                <th>Realisasi 2024</th>
                            </tr>
                        </thead>
                            <tbody>
                                @if($datakec->isNotEmpty())
                                @foreach ($datakec as $item)
                                <tr>
                                    <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                    <td>{{ $item->indikator->nama_indikator }}</td>
                                    <td>{{ $item->target_2023 }}</td>
                                    <td>{{ $item->pencapaian_2023 }}</td>
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
                @foreach ($datakec as $item)
                <div>
                    <!-- Tampilkan data item di sini -->
                    {{ $item->name }} <!-- Ganti dengan atribut yang sesuai -->
                </div>
            @endforeach
            
            <!-- Tautan untuk navigasi halaman -->
            {{ $datakec->links() }}
            
            </div>
        </div>
    </div>
</div>
@endsection

