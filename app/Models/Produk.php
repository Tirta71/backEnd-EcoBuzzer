<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProductID';

    protected $fillable = [
        'NamaProduk',
        'Deskripsi',
        'KategoriID',
        'Harga',
        'Status',
        'UserID',
        'LokasiID',
        'TanggalDiposting',
        'Kondisi',
    ];

    // Definisi relasi dengan tabel lain, jika diperlukan
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'KategoriID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'LokasiID');
    }
}
