<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "pelanggans";
    protected $primaryKey = "id";
    protected $fillable = ['namaC', 'noHp', 'alamat', 'kategori', 'merk', 'namaB', 'tipe_ukuran', 'jenisP', 'nominal', 'lama', 'ktp', 'kk', 'created_at', 'harga'];

    protected static function booted()
    {
        parent::booted();

        static::saving(function ($pelanggan) {
            // Hitung harga berdasarkan angsuran ke dan nominal
            $harga = $pelanggan->lama * $pelanggan->nominal;
            $pelanggan->harga = $harga;
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Barang::class, 'kategori');
    }
}