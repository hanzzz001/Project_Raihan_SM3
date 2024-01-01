<?php

namespace App\Http\Controllers;


use App\Charts\PemasukanBulananChart;
use App\Models\Pelanggan;
use App\Models\Cash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    public function index(PemasukanBulananChart $chart)
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

        // Menghitung penjualan untuk bulan ini
        $penjualanBulanIni = Pelanggan::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('harga');

        // Menghitung penjualan untuk bulan sebelumnya
        $penjualanCashBulan = Cash::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('harga');

        $data = [
            'chart' => $chart->build(),
            'penjualanAkhir' => number_format($penjualanBulanIni, 2, '.', ','),
            'penjualanCashBulan' => number_format($penjualanCashBulan, 2, '.', ','),
            'bulan' => now()->format('F'), // Nama bulan, contoh: January
            'tahun' => now()->format('Y'), // Tahun, contoh: 2023
            'dataBulan' => $dataBulan,
            'dataTotalPemasukan' => $dataTotalPemasukan,
            'dataTotalCash' => $dataTotalCash,
        ];

        return view('layout.home', $data)->with([
            'user' => Auth::user()
        ]);
    }


}
