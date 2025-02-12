<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateTargetSeeder extends Seeder
{
    public function run()
    {
        // Mengupdate kolom target_2023 untuk semua data dengan indikator_id 1
        DB::table('datakecs')
            ->where('indikator_id', 1)
            ->update(['target_2023' => 58]);
    }
}
