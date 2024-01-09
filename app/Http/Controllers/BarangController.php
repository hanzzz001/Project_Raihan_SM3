<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $barang = Barang::latest()->paginate(10);
        return view( "barang.index", compact ('barang','user'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('barang.tambah',compact ('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/barang', $foto->hashName());
        $barang = Barang::create([
            'kategori' => $request->kategori,
            'merk' => $request->merk,
            'foto' => $foto->hashName(),
            'namaB' => $request->namaB,
            'tipe_ukuran' => $request->tipe_ukuran,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        if ($barang) {
            return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('barang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $barang = Barang::find($id);
        return view('barang.update', compact('barang','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        if ($request->file('foto') == "") {
            $barang->update([
                'kategori' => $request->kategori,
                // 'merk' => $request->merk,
                'namaB' => $request->namaB,
                // 'tipe_ukuran' => $request->tipe_ukuran,
                'stok' => $request->stok,

            ]);
        } else {
            Storage::disk('local')->delete('public/barang/' . $barang->foto);
            $foto = $request->file('foto');
            $foto->storeAs("public/barang", $foto->hashName());
            $barang->update([
                'kategori' => $request->kategori,
                'merk' => $request->merk,
                'foto' => $foto->hashName(),
                'namaB' => $request->namaB,
                'tipe_ukuran' => $request->tipe_ukuran,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);
        }

        if ($barang) {
            return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('barang.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        Storage::disk('local')->delete("public/barang/" . $barang->gambar);
        $barang->delete();
        if ($barang) {
            return redirect()->route('barang.index')->with("success", "Data Berhasil Dihapus");
        } else {
            return redirect()->route('barang.index')->with("error", "Data Gagal Dihapus");
        }
    }
}
