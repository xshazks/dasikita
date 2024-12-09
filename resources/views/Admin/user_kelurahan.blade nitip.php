@extends('layouts.app_sneat')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h1>Filter Data Pencapaian</h1>

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

            <h2>Data Pencapaian</h2>

            <table border="1">
                <thead>
                    <tr>
                        <th>Kelurahan</th>
                        <th>Indikator</th>
                        <th>Target 2023</th>
                        <th>Pencapaian 2023</th>
                        <th>Target 2024</th>
                        <th>Pencapaian 2024</th>
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
</div>
</div>
</div>
@endsection