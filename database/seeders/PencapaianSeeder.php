<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pencapaian;

class PencapaianSeeder extends Seeder
{
    public function run()
    {
        Pencapaian::create([
            'kelurahan_id' => 1, // ID kelurahan yang sesuai
            'indikator_id' => 1, // ID indikator yang sesuai
            'target_2023' => 81,
            'pencapaian_2023' => 98,
            'target_2024' => 84,
            'pencapaian_2024' => 98,
        ]);
        // Tambahkan lebih banyak pencapaian sesuai kebutuhan
    }
}
