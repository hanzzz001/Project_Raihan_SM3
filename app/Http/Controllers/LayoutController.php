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
            $BarangKredit = Pelanggan::whereMonth('created_at', $i)
                ->whereYear('created_at', $tahun)
                ->sum('unit');
            $BarangCash = Cash::whereMonth('created_at', $i)
                ->whereYear('created_at', $tahun)
                ->sum('unit');
            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalPemasukan[] = $totalPemasukan;
            $dataTotalCash[] = $totalCash;
            $dataBarangKredit[] = $BarangKredit;
            $dataBarangCash[] = $BarangCash;
        }

        // Menghitung penjualan untuk bulan ini
        $penjualanBulanIni = Pelanggan::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('harga');

        // Menghitung penjualan untuk bulan sebelumnya
        $penjualanCashBulan = Cash::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('total');

        // Total Jumlah barang terjual kredit
        $totalBarangKredit = Pelanggan::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('unit');

        // Total Jumlah barang terjual cash
        $totalBarangCash = Cash::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('unit');

        $totalSemua = $totalBarangCash + $totalBarangKredit;


        $data = [
            'chart' => $chart->build(),
            'penjualanAkhir' => number_format($penjualanBulanIni, 2, '.', ','),
            'penjualanCashBulan' => number_format($penjualanCashBulan, 2, '.', ','),
            'bulan' => now()->format('F'), // Nama bulan, contoh: January
            'tahun' => now()->format('Y'), // Tahun, contoh: 2023
            'dataBulan' => $dataBulan,
            'dataTotalPemasukan' => $dataTotalPemasukan,
            'dataTotalCash' => $dataTotalCash,
            'totalBarangKredit' => $totalBarangKredit,
            'totalBarangCash' => $totalBarangCash,
            'totalSemua' => $totalSemua,
            'dataBarangKredit' => $dataBarangKredit,
            'dataBarangCash' => $dataBarangCash
        ];

        return view('layout.home', $data)->with([
            'user' => Auth::user()
        ]);
    }


}
