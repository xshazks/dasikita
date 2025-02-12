<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatakecSeeder extends Seeder
{
    public function run()
    {
        // Data pencapaian_2023
        $pencapaian_2023 = [
            96.7,
            76.1,
            58.3,
            96.2,
            74.3,
            60.1,
            91.2,
            83.4,
            63.1,
            100.0,
            89.5,
            85.9,
            86.3,
            92.6,
            100.0,
            100.0,
            100.0,
            87.3,
            80.1,
            89.5,
            36.7,
            77.9,
            100.0,
            94.9,
            85.5,
            87.1,
            88.2,
            100.0,
            77.7,
            66.2
        ];

        // Data pencapaian_2024
        $pencapaian_2024 = [
            96.7,
            76.1,
            58.3,
            96.2,
            74.3,
            60.1,
            91.2,
            83.4,
            63.1,
            100.0,
            89.5,
            85.9,
            86.3,
            92.6,
            100.0,
            100.0,
            100.0,
            87.3,
            80.1,
            89.5,
            36.7,
            77.9,
            100.0,
            94.9,
            85.5,
            87.1,
            88.2,
            100.0,
            77.7,
            66.2
        ];

        // Loop untuk memasukkan data ke dalam tabel datakec
        for ($i = 1; $i <= 30; $i++) {
            DB::table('datakec')->insert([
                'kecamatan_id' => $i,
                'indikator_id' => 1,
                'pencapaian_2023' => $pencapaian_2023[$i - 1],
                'pencapaian_2024' => $pencapaian_2024[$i - 1],
                'target_2023' => null, // Anda bisa menambahkan nilai target jika ada
                'target_2024' => null  // Anda bisa menambahkan nilai target jika ada
            ]);
        }
    }
}
