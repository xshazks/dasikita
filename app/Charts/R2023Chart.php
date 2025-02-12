<?php

namespace App\Charts;

use App\Models\datakec;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class R2023Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Mengambil data dari database untuk kecamatan ID 1-30 dan indikator 1
        $data = datakec::where('kecamatan_id', '<=', 30)
            ->where('indikator_id', 1) // Pastikan kolom indikator ada di tabel
            ->select('kecamatan_id', 'pencapaian_2023')
            ->get();

        // Debugging: Tampilkan data yang diambil dengan lebih jelas
        foreach ($data as $item) {
            echo 'Kecamatan ID: ' . $item->kecamatan_id . ', Pencapaian: ' . $item->pencapaian_2023 . '<br>';
        }

        // Menyiapkan label dan nilai untuk chart
        $labels = [];
        $values = [];

        foreach ($data as $item) {
            $labels[] = $item->kecamatan_id; // Menambahkan kecamatan sebagai label
            $values[] = $item->pencapaian_2023; // Menambahkan pencapaian_2023 sebagai nilai
        }

        return $this->chart->pieChart()
            ->setTitle('Pencapaian 2023 per Kecamatan')
            ->setSubtitle('Persentase Pencapaian')
            ->addData($values)
            ->setLabels($labels);
    }
}
