<?php

namespace App\Http\Controllers;

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
        return view('cash.tambah',compact ('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cash = Cash::create([
            'merk' => $request->merk,
            'namaB' => $request->namaB,
            'namaC' => $request->namaC,
            'harga' => $request->harga,
        ]);

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
