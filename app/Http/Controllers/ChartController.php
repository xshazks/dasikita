<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel; // Sesuaikan dengan model yang kamu pakai

class ChartController extends Controller
{
    public function chartData()
    {
        // Ambil data dari database
        $data = DataModel::select('kategori', 'jumlah')->get();

        // Kirimkan data dalam format JSON
        return response()->json([
            'labels' => $data->pluck('kategori'),
            'data' => $data->pluck('jumlah')
        ]);
    }
}
