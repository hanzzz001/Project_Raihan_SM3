<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;
    protected $fillable = ['barang_id','kategori','merk', 'namaB','tipe_ukuran', 'harga','unit','total'];

    protected static function booted()
    {
        parent::booted();

        static::saving(function ($cash) {
            // Hitung harga berdasarkan angsuran ke dan nominal
            $total = $cash->unit * $cash->harga;
            $cash->total = $total;
        });
    }
}
