@extends('layouts.app_sneat')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <form action="{{ route('kelurahan.index') }}" method="GET">
                    <div>
                        <label for="kelurahan">Pilih Kelurahan:</label>
                        <select name="kelurahan" id="kelurahan">
                            <option value="">Semua Kelurahan</option>
                            @foreach($kelurahansList as $kelurahan)
                                <option value="{{ $kelurahan->id }}" 
                                        {{ request('kelurahan') == $kelurahan->id ? 'selected' : '' }}>
                                    {{ $kelurahan->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="indikator">Pilih Indikator:</label>
                        <select name="indikator" id="indikator">
                            <option value="">Semua Indikator</option>
                            @foreach($indikatorsList as $indikator)
                                <option value="{{ $indikator->id }}" 
                                        {{ request('indikator') == $indikator->id ? 'selected' : '' }}>
                                    {{ $indikator->indikator }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <button type="submit">Filter</button>
                </form>
                
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelurahan</th>
                            <th>Indikator</th>
                            <th>Target 2023</th>
                            <th>Pencapaian 2023</th>
                            <th>Target 2024</th>
                            <th>Pencapaian 2024</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelurahans as $kelurahan)
                            @foreach($kelurahan->indikators as $indikator)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kelurahan->name }}</td>
                                    <td>{{ $indikator->indikator }}</td>
                                    <td>{{ $indikator->target_2023 }}</td>
                                    <td>{{ $indikator->pencapaian_2023 }}</td>
                                    <td>{{ $indikator->target_2024 }}</td>
                                    <td>{{ $indikator->pencapaian_2024 }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                
                {{ $kelurahans->links() }} <!-- Pagination Links -->
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection