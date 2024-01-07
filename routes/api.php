<?php

use App\Http\Controllers\ApiKategoriController;
use App\Http\Controllers\ApiLokasiController;
use App\Http\Controllers\ApiPhotoController;
use App\Http\Controllers\ApiProdukController;
use App\Http\Controllers\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Kategori
Route::get('/kategoris', [ApiKategoriController::class, 'getAllKategoris']);
Route::get('/kategoris/{KategoriID}', [ApiKategoriController::class, 'show']);

// Lokasi
Route::get('/lokasi', [ApiLokasiController::class, 'getAllLokasi']);
Route::get('/lokasi/{LokasiID}', [ApiLokasiController::class, 'show']);


// Produk
Route::get('/produk',[ApiProdukController::class,'getAllProduk']);
Route::get('/produk/{ProductID}', [ApiProdukController::class, 'show']);
Route::get('/produk-by-category/{KategoriID}', [ApiProdukController::class, 'getProdukByCategory']);
Route::post('/produk-create', [ApiProdukController::class, 'create']);

// Photo Produk
Route::get('/photo',[ApiPhotoController::class,'getAllPhoto']);
Route::get('/photo/{PhotoID}',[ApiPhotoController::class,'show']);

// User 
Route::get('login', [AuthApiController::class, 'login']);
Route::get('login/{UserID}', [AuthApiController::class, 'show']);
Route::post('/register', [AuthApiController::class, 'register']);
Route::get('user', [AuthApiController::class, 'user']);
Route::get('user/{UserID}', [AuthApiController::class, 'spesifikUser']);
