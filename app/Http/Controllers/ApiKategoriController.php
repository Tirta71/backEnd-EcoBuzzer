<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class ApiKategoriController extends Controller
{
    public function getAllKategoris() {
        try {
            $kategori = Kategori::all();
            return response()->json([
                'message' => 'Data Kategori Ditemukan',
                'status' => 'OK',
                'data' => $kategori
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data pelamar',
                'status' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function show($KategoriID){
        $Kategori = Kategori::find($KategoriID);

        if(!$Kategori){
            return response()->json([
                'message' => 'Produk Not Found'
            ],404);
        }
        return response()->json([
            'message' => 'Data Produk Berhasil diambil',
            'data' => $Kategori
        ],200);
    }
}
