<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kategori\KategoriController;
use App\Http\Controllers\Lokasi\LokasiController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Produk\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Admin.Master.MasterDashboard');
});


Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');




// Tambah User
Route::get('/admin/users/tambah', [UserController::class, 'tambahDataUserForm'])->name('admin.users.tambahForm');
Route::post('/admin/users/tambah', [UserController::class, 'prosesTambahDataUser'])->name('admin.users.prosesTambahDataUser');

// Edit User
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/edit/{UserID}', [UserController::class, 'editUser'])->name('admin.users.edit');
Route::put('admin/users/update/{UserID}', [UserController::class, 'updateUser'])->name('admin.users.update');
Route::get('admin/users/view//{UserID}',[UserController::class,'viewUser'])->name('admin.users.view');
Route::delete('admin/users/{UserID}', [UserController::class, 'destroy'])->name('admin.users.destroy');

// Kategori
Route::get('admin/kategori',[KategoriController::class, 'index'])->name('admin.kategori.index');
Route::get('/admin/kategori/tambah', [KategoriController::class, 'tambahKategori'])->name('admin.kategori.tambahKategori');
Route::post('admin/kategori/tambah',[KategoriController::class, 'prosesTambahKategori'])->name('admin.kategori.prosesTambahKategori');
Route::get('admin/kategori/edit/{KategoriID}',[KategoriController::class,'editKategori'])->name('admin.kategori.edit');
Route::put('admin/kategori/update/{KategoriID}', [KategoriController::class, 'updateKategori'])->name('admin.kategori.update');
Route::delete('admin/kategori/delete/{KategoriID}', [KategoriController::class, 'deleteKategori'])->name('admin.kategori.delete');

// Lokasi
Route::get('admin/lokasi',[LokasiController::class, 'index'])->name('admin.lokasi.index');
Route::get('admin/lokasi/tambah',[LokasiController::class, 'tambahLokasi'])->name('admin.lokasi.tambahLokasi');
Route::post('admin/lokasi/tambah',[LokasiController::class, 'prosesTambahLokasi'])->name('admin.lokasi.prosesTambahLokasi');
Route::get('admin/lokasi/edit{LokasiID}',[LokasiController::class, 'editLokasi'])->name('admin.lokasi.editLokasi');
Route::put('admin/lokasi/edit{LokasiID}',[LokasiController::class, 'updateLokasi'])->name('admin.lokasi.updateLokasi');
Route::delete('admin/lokasi/delete/{LokasiID}', [LokasiController::class, 'deleteLokasi'])->name('admin.lokasi.delete');


// Produk
Route::get('admin/produk', [ProdukController::class, 'index'])->name('admin.produk.index');
Route::get('admin/produk/tambah',[ProdukController::class,'tambahProduk'])->name('admin.produk.tambahProduk');
Route::post('admin/produk/tambah',[ProdukController::class,'prosesTambahProduk'])->name('admin.produk.prosesTambahProduk');
Route::get('admin/produk/edit/{ProductID}', [ProdukController::class, 'editProduk'])->name('admin.produk.editProduk');
Route::put('admin/produk/edit/{ProductID}', [ProdukController::class, 'updateProduk'])->name('admin.produk.updateProduk');


Route::get('/admin/photos', [PhotoController::class, 'index'])->name('admin.photos.index');
Route::get('/admin/photos/tambah', [PhotoController::class, 'tambahPhoto'])->name('admin.photos.tambahPhoto');
Route::post('/admin/photos/tambah', [PhotoController::class, 'prosesTambahPhoto'])->name('admin.photos.store');
