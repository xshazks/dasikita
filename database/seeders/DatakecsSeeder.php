<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatakecsSeeder extends Seeder
{
    public function run()
    {
        // Data untuk indikator_id 29
        $pencapaian_2023 = [
            100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0,
            100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0,
            100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0,
            100.0, 100.0, 100.0, 100.0
        ];

        $pencapaian_2024 = [
            100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0,
            100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0,
            100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0, 100.0,
            100.0, 100.0, 100.0, 100.0
        ];

        for ($i = 0; $i < count($pencapaian_2023); $i++) {
            DB::table('datakecs')->insert([
                'kecamatan_id' => $i + 1, // Ganti sesuai dengan ID kecamatan yang sesuai
                'indikator_id' => 29,
                'pencapaian_2023' => $pencapaian_2023[$i],
                'pencapaian_2024' => $pencapaian_2024[$i],
            ]);
        }
    }
}
