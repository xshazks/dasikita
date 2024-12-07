<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Indikator;

class IndikatorSeeder extends Seeder
{
    public function run()
    {
        $indikators = [
            'Remaja putri yang mengonsumsi Tablet Tambah Darah (TTD)',
            'Remaja putri yang menerima layanan pemeriksaan status anemia (hemoglobin)',
            'Calon pengantin /calon ibu yang menerima Tablet Tambah Darah (TTD)',
            'Calon pasangan usia subur (PUS) yang memperoleh pemeriksaan kesehatan sebagai bagian dari pelayanan nikah',
            'Cakupan calon Pasangan Usia Subur (PUS) yang menerima pendampingan kesehatan reproduksi dan edukasi gizi sejak 3 bulan pranikah',
            'Pasangan calon pengantin yang mendapatkan bimbingan perkawinan dengan materi pencegahan stunting',
            'Pasangan Usia Subur (PUS) dengan status miskin dan penyandang masalah kesejahteraan sosial yang menerima bantuan tunai bersyarat',
            'Cakupan Pasangan Usia Subur (PUS) dengan status miskin dan penyandang masalah kesejahteraan sosial yang menerima bantuan pangan nontunai',
            'Cakupan Pasangan Usia Subur (PUS) fakir miskin dan orang tidak mampu yang menjadi Penerima Bantuan Iuran (PBI) Jaminan Kesehatan',
            'Ibu hamil Kurang Energi Kronik (KEK) yang mendapatkan tambahan asupan gizi',
            'Ibu hamil yang mengonsumsi Tablet Tambah Darah (TTD) minimal 90 tablet selama masa kehamilan',
            'Persentase Unmet Need pelayanan keluarga berencana',
            'Persentase Kehamilan yang tidak diinginkan',
            'Bayi usia kurang dari 6 bulan mendapat air susu ibu (ASI) eksklusif',
            'Anak usia 6-23 bulan yang mendapat Makanan Pendamping Air Susu Ibu (MP-ASI)',
            'Anak berusia di bawah lima tahun (balita) gizi buruk yang mendapat pelayanan tata laksana gizi buruk',
            'Anak berusia di bawah lima tahun (balita) yang dipantau pertumbuhan dan perkembangannya',
            'Anak berusia di bawah lima tahun (balita) gizi kurang yang mendapat tambahan asupan gizi',
            'Balita yang memperoleh imunisasi dasar lengkap',
            'Keluarga yang Stop BABS',
            'Keluarga yang melaksanakan PHBS',
            'Keluarga berisiko stunting yang mendapatkan promosi peningkatan konsumsi ikan dalam negeri',
            'Pelayanan Keluarga Berencana (KB) pascapersalinan',
            'Keluarga berisiko stunting yang memperoleh pendampingan',
            'Keluarga berisiko stunting yang mendapatkan manfaat sumber daya pekarangan untuk peningkatan asupan gizi',
            'Rumah tangga yang mendapatkan akses air minum layak',
            'Rumah tangga yang mendapatkan akses sanitasi (air limbah domestik) layak',
            'Kelompok Keluarga Penerima Manfaat (KPM) Program Keluarga Harapan (PKH) yang mengikuti Pertemuan Peningkatan Kemampuan Keluarga (P2K2) dengan modul kesehatan dan gizi',
            'Keluarga Penerima Manfaat (KPM) dengan ibu hamil, ibu menyusui, dan baduta yang menerima variasi bantuan pangan selain beras dan telur',
        ];

        foreach ($indikators as $nama_indikator) {
            Indikator::create(['nama_indikator' => $nama_indikator]);
        }
    }
}
