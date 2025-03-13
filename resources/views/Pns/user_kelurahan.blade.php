@extends('layouts.app_sneat_pns')

@section('content')
<div style="margin-bottom: 40px;">
    <canvas id="chartPencapaian"></canvas>
</div>
<form action="{{ route('data_pns.index') }}" method="GET">
    <label for="kecamatan_id">Kecamatan:</label>
    <select name="kecamatan_id" id="kecamatan_id" style="padding: 10px; margin-bottom: 20px;border: 1px solid #d9d4d4;">
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
    <select name="indikator_id" id="indikator_id" style="padding: 10px;border: 1px solid #d9d4d4;">
        <option value="">-- Pilih Indikator --</option>
        @if($indikators->isNotEmpty())
        @foreach ($indikators as $indikator)
        <option value=" {{ $indikator->id }}">{{ $indikator->nama_indikator }}</option>
        @endforeach
        @else
        <option value="">Tidak ada indikator</option>
        @endif
    </select>

    <button class="btn-filter" type="submit" style="padding: 8px 20px 8px 20px; border-radius: 10px; background-color: #787dfa; color: white;border: none; cursor: pointer;">Filter</button>
</form>
<div class="row justify-content-center mt-2">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari Laravel (pastikan datanya JSON)
    var chartLabels = @json($chartData['labels']);
    var target2023 = @json($chartData['target_2023']);
    var realisasi2023 = @json($chartData['realisasi_2023']);
    var realisasi2024 = @json($chartData['realisasi_2024']);

    var ctx = document.getElementById('chartPencapaian').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Bisa diganti dengan 'line', 'pie', dll.
        data: {
            labels: chartLabels,
            datasets: [{
                    label: 'Target 2023',
                    data: target2023,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Realisasi 2023',
                    data: realisasi2023,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Realisasi 2024',
                    data: realisasi2024,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
