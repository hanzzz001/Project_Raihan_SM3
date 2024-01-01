<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\View;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pelanggan = Pelanggan::latest()->paginate(10);
        return view("pelanggan.index", compact('pelanggan', 'user'));
    }

    public function terjual()
    {
        $user = Auth::user();
        $pelanggan = Pelanggan::latest()->paginate(10);
        return view("pelanggan.terjual", compact('pelanggan', 'user'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('pelanggan.tambah', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ktp = $request->file('ktp');
        $ktp->storeAs('public/pelanggan', $ktp->hashName());
        $kk = $request->file('kk');
        $kk->storeAs('public/pelanggan', $kk->hashName());
        $pelanggan = Pelanggan::create([
            'namaC' => $request->namaC,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'kategori' => $request->kategori,
            'merk' => $request->merk,
            'namaB' => $request->namaB,
            'tipe_ukuran' => $request->tipe_ukuran,
            'nominal' => $request->nominal,
            'lama' => $request->lama,
            'ktp' => $ktp->hashName(),
            'kk' => $kk->hashName(),
            'harga' => $request->harga,
            'unit' => $request->unit,
        ]);

        if ($pelanggan) {
            return redirect()->route('pelanggan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('pelanggan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.index', compact('pelanggan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        // Mendapatkan nilai angsuran ke sebelumnya
        $angsuranSebelumnya = $pelanggan->lama;

        // Mendapatkan nilai angsuran ke yang diinputkan oleh pengguna
        $angsuranInput = $request->lama;

        if ($angsuranInput != $angsuranSebelumnya + 1) {
            return redirect()->route('pelanggan.index')->with(['error' => 'Angsuran harus diisi secara berurutan.']);
        }

        $pelanggan->update([
            'lama' => $angsuranInput,
        ]);

        // Jika angsuran ke-10, tandai sebagai 'Lunas'
        if ($angsuranInput == 10) {
            $pelanggan->update([
                'status' => 'Lunas',
            ]);
        }

        if ($pelanggan) {
            return redirect()->route('pelanggan.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('pelanggan.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }


}
