<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ApiProdukController extends Controller
{
    public function getAllProduk() {
        try {
            $produk = Produk::all();
            return response()->json([
                'message' => 'Data Produk Ditemukan',
                'status' => 'OK',
                'data' => $produk
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data produk',
                'status' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function show($ProductID){
        $produk = Produk::find($ProductID);

        if(!$produk){
            return response()->json([
                'message' => 'Produk Not Found'
            ],404);
        }
        return response()->json([
            'message' => 'Data Produk Berhasil diambil',
            'data' => $produk
        ],200);
    }
    
    public function getProdukByCategory($KategoriID)
    {
        $produk = Produk::where('KategoriID', $KategoriID)->get();

        return response()->json([
            'message' => 'Data Produk Ditemukan',
            'status' => 'OK',
            'data' => $produk,
        ]);
    }
    public function create(Request $request)
    {
       
        $validatedData = $request->validate([
            'NamaProduk' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'KategoriID' => 'required|integer',
            'Harga' => 'required|numeric',
            'Status' => 'required|string',
            'UserID' => 'required|integer',
            'LokasiID' => 'required|integer',
            'TanggalDiposting' => 'required|date',
            'Kondisi' => 'required|string',
        ]);

    
        $product = Produk::create($validatedData);

     
        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }
}
