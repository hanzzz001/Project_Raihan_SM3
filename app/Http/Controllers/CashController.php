<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cash = Cash::latest()->paginate(10);
        return view( "cash.index", compact ('cash','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $barangs = Barang::all();
        return view('cash.tambah',compact ('user','barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barangId = $request->input('barang_id');
        $barang = Barang::find($barangId);

        if (!$barang) {
            return redirect()->route('pelanggan.index')->with(['error' => 'Barang tidak ditemukan']);
        }

        if ($barang->stok < $request->unit) {
            return redirect()->route('pelanggan.index')->with(['error' => 'Stok barang tidak mencukupi']);
        }
        $cash = Cash::create([
            'barang_id' => $barangId,
            'kategori' => $request->kategori,
            'merk' => $barang->merk,
            'namaB' => $barang->namaB,
            'tipe_ukuran' => $barang->tipe_ukuran,
            'unit' => $request->unit,
            'harga' => $request->harga,
        ]);

        $barang->stok -= $request->unit;
        $barang->save();

        if ($cash) {
            return redirect()->route('cash.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('cash.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cash $cash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cash $cash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cash $cash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cash $cash)
    {
        //
    }
}
