<?php

namespace App\Charts;

use App\Http\Controllers\CashController;
use App\Models\Cash;
use App\Models\Pelanggan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class PemasukanBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalPemasukan = Pelanggan::whereMonth('created_at', $i)
                ->whereYear('created_at', $tahun)
                ->sum('harga');
            $totalCash = Cash::whereMonth('created_at', $i)
                ->whereYear('created_at', $tahun)
                ->sum('harga');
            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalPemasukan[] = $totalPemasukan;
            $dataTotalCash[] = $totalCash;
        }
        return $this->chart->areaChart()
            ->setTitle('Pemasukan Bulanan')
            ->setSubtitle('Total Pemasukan Kredit dan Cash Secara keseluruhan Per-Bulan')
            ->addData('Total Kredit', $dataTotalPemasukan,)
            ->addData('Total Cash', $dataTotalCash)
            ->setHeight(370)
            ->setXAxis($dataBulan);
    }
}
