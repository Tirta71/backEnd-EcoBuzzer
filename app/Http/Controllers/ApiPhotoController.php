<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class ApiPhotoController extends Controller
{
    public function getAllPhoto()
    {
        try {
            $photos = Photo::all();
            return response()->json([
                'message' => 'Data Photo Ditemukan',
                'status' => 'OK',
                'data' => $photos
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data photo',
                'status' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($photoId)
    {
        try {
            $photo = Photo::find($photoId);

            if (!$photo) {
                return response()->json([
                    'message' => 'Photo Not Found'
                ], 404);
            }

            return response()->json([
                'message' => 'Data Photo Berhasil diambil',
                'data' => $photo
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data photo',
                'status' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
