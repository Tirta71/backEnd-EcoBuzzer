<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function prosesTambahPhoto(Request $request)
    {
        $request->validate([
            'ProductID' => 'required|exists:produks,ProductID',
            'URLFoto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $extension = $request->file('URLFoto')->getClientOriginalExtension();

        $productName = Produk::findOrFail($request->input('ProductID'))->NamaProduk;

        $fileName = 'fotoProduk_' . $request->input('ProductID') . '_' . time() . '.' . $extension;

    
        $path = $request->file('URLFoto')->storeAs('photos', $fileName, 'public');

        $photo = Photo::create([
            'ProductID' => $request->input('ProductID'),
            'URLFoto' => Storage::url($path),
        ]);

        return response()->json(['message' => 'Photo added successfully.']);
    }
    
    // public function prosesEditPhoto(Request $request, $ProductID)
    // {
    //     try {
    //         // Validate the request
    //         $request->validate([
    //             'ProductID' => 'required|exists:produks,ProductID', // Validate the existence of the product
    //             'URLFoto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    //         ]);
    
    //         // Find the photo associated with the product
    //         $photo = Photo::where('ProductID', $ProductID)->first();
    
    //         if (!$photo) {
    //             return response()->json([
    //                 'message' => 'Photo Not Found'
    //             ], 404);
    //         }
    
    //         // Update ProductID if provided (validate uniqueness if needed)
    //         if ($request->has('ProductID')) {
    //             // Validate uniqueness if needed
    //             // $request->validate([
    //             //     'ProductID' => 'unique:photos,ProductID'
    //             // ]);
    
    //             // Update the ProductID
    //             $photo->ProductID = $request->input('ProductID');
    //         }
    
    //         // Update URLFoto if provided
    //         if ($request->hasFile('URLFoto')) {
    //             // Handle file upload
    //             $extension = $request->file('URLFoto')->getClientOriginalExtension();
    //             $fileName = 'fotoProduk_' . $photo->ProductID . '_' . time() . '.' . $extension;
    
    //             // Handle file upload with the new file name
    //             $path = $request->file('URLFoto')->storeAs('photos', $fileName, 'public');
    
    //             // Delete the old file
    //             Storage::disk('public')->delete($photo->URLFoto);
    
    //             // Update the URLFoto field
    //             $photo->URLFoto = Storage::url($path);
    //         }
    
    //         // Save changes
    //         $photo->save();
    
    //         return response()->json(['message' => 'Photo updated successfully', 'data' => $photo]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'Terjadi kesalahan dalam mengedit data photo',
    //             'status' => 'Error',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
    

    public function showPhotoByProduct($ProductID)
    {
        $Photo = Photo::where('ProductID', $ProductID)->get();

        return response()->json([
            'message' => 'Data Produk Ditemukan',
            'status' => 'OK',
            'data' => $Photo,
        ]);
    }
}
