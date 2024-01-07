<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with(['kategori', 'user', 'lokasi'])->get();

        return view('Admin.Table.Produk.TableProduk', compact('produks'));
    }

    public function tambahProduk()
    {
        $kategoris = Kategori::all(); // Fetch all categories
        $users = User::all(); // Fetch all users
        $lokasis = Lokasi::all(); // Fetch all locations

   
        return view('Admin.Insert.TambahProduk', [
            'kategoris' => $kategoris,
            'users' => $users,
            'lokasis' => $lokasis,
        ]);
    }

    public function prosesTambahProduk(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'NamaProduk' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'Harga' => 'required|numeric|min:0',
            'Status' => 'required|in:Sold,Available',
            'UserID' => 'required|exists:users,UserID',
            'LokasiID' => 'required|exists:lokasis,LokasiID',
            'TanggalDiposting' => 'required|date',
            'Kondisi' => 'required|in:Baik,Rusak,Sebagian Rusak',
        ]);

        // Create a new product
        $product = new Produk();
        $product->NamaProduk = $validatedData['NamaProduk'];
        $product->Deskripsi = $validatedData['Deskripsi'];
        $product->KategoriID = $validatedData['KategoriID'];
        $product->Harga = $validatedData['Harga'];
        $product->Status = $validatedData['Status'];
        $product->UserID = $validatedData['UserID'];
        $product->LokasiID = $validatedData['LokasiID'];
        $product->TanggalDiposting = $validatedData['TanggalDiposting'];
        $product->Kondisi = $validatedData['Kondisi'];

        // Save the product
        $product->save();

   
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function editProduk($ProductID)
    {
     
        $produk = Produk::findOrFail($ProductID);


        // Fetch additional data if needed (e.g., for dropdowns)
        $kategoris = Kategori::all();
        $users = User::all();
        $lokasis = Lokasi::all();
    
        // Pass the data to the view
        return view('Admin.Update.UpdateProduk', compact('produk', 'kategoris', 'users', 'lokasis'));
    }

    public function updateProduk(Request $request, $ProductID)
    {
        // Validate the form data
        $request->validate([
            'NamaProduk' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'Harga' => 'required|numeric',
            'Status' => 'required|in:Sold,Available',
            'UserID' => 'required|exists:users,UserID',
            'LokasiID' => 'required|exists:lokasis,LokasiID',
            'TanggalDiposting' => 'required|date',
            'Kondisi' => 'required|in:Baik,Rusak,Sebagian Rusak',
            // Add more validation rules as needed
        ]);

        // Update the product data
        $produk = Produk::findOrFail($ProductID);
        $produk->update([
            'NamaProduk' => $request->input('NamaProduk'),
            'Deskripsi' => $request->input('Deskripsi'),
            'KategoriID' => $request->input('KategoriID'),
            'Harga' => $request->input('Harga'),
            'Status' => $request->input('Status'),
            'UserID' => $request->input('UserID'),
            'LokasiID' => $request->input('LokasiID'),
            'TanggalDiposting' => $request->input('TanggalDiposting'),
            'Kondisi' => $request->input('Kondisi'),
            // Update more fields as needed
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk updated successfully');
    }
    

}
