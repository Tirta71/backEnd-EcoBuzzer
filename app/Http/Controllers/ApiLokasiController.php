<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class ApiLokasiController extends Controller
{
    public function getAllLokasi() {
        try {
            $lokasi = Lokasi::all();
            return response()->json([
                'message' => 'Data Lokasi Ditemukan',
                'status' => 'OK',
                'data' => $lokasi
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data lokasi',
                'status' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function show($LokasiID){
        $lokasi = Lokasi::find($LokasiID);

        if(!$lokasi){
            return response()->json([
                'message' => 'Lokasi Not Found'
            ],404);
        }
        return response()->json([
            'message' => 'Data Lokasi Berhasil diambil',
            'data' => $lokasi
        ],200);
    }
    public function prosesTambahLokasi(Request $request)
    {
        $request->validate([
            'Kota' => 'required|string|max:255',
            'Provinsi' => 'required|string|max:255',          
        ]);

        $lokasi = new Lokasi([
            'Kota' => $request->input('Kota'),
            'Provinsi' => $request->input('Provinsi'),
        ]);

        $lokasi->save();

        return response()->json(['message' => 'Location added successfully', 'data' => $lokasi], 201);
    }
}
