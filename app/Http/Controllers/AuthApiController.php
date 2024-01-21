<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nama' => 'required',
            'Email' => 'required|email|unique:users',
            'Password' => 'required|min:6',
            'NomorTelepon' => 'required',
            'Alamat' => 'required',
            'Kota' => 'required',
            'Provinsi' => 'required',
            'KodePos' => 'required'

        ]);
        

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors(), 
            ], 400); 
        }

        $input = $request->all();
        $input['Password'] = bcrypt($input['Password']);
        
        try {
            $user = User::create($input);

            $success['token'] = $user->createToken('auth_token')->plainTextToken;

            $success['Nama'] = $user->Nama;

            return response()->json([
                'success' => true,
                'message' => 'Register Sukses',
                'data' => $success
            ], 201); // Ubah status response menjadi 201 Created
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal melakukan registrasi',
                'data' => $e->getMessage(),
            ], 500); // Ubah status response menjadi 500 Internal Server Error
        }
    }

    public function login() {
        try {
            $user = User::all();
            return response()->json([
                'message' => 'Data User Ditemukan',
                'status' => 'OK',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data user',
                'status' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($UserID){
        $User = User::find($UserID);

        if(!$User){
            return response()->json([
                'message' => 'User Not Found'
            ],404);
        }
        return response()->json([
            'message' => 'Data User Berhasil diambil',
            'data' => $User
        ],200);
    }

    public function user() {
        try {
            $user = User::all();
            return response()->json([
                'message' => 'Data User Ditemukan',
                'status' => 'OK',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data user',
                'status' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function spesifikUser($UserID){
        $User = User::find($UserID);

        if(!$User){
            return response()->json([
                'message' => 'User Not Found'
            ],404);
        }
        return response()->json([
            'message' => 'Data User Berhasil diambil',
            'data' => $User
        ],200);
    }

       public function edit(Request $request, $UserID)
    {

        $request->validate([
            'Nama' => 'required|string',
            'Email' => 'required',
            'NomorTelepon' => 'required|string',
            'Alamat' => 'required|string',
            'Kota' => 'required|string',
            'Provinsi' => 'required|string',
            'KodePos' => 'required|string',
         
        ]);

      
        $user = User::find($UserID);

      
        if (!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

       
        $user->update($request->all());

        return response()->json(['message' => 'Data pengguna berhasil diperbarui']);
    }

  
    
    
    
}
