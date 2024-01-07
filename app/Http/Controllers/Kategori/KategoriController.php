<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('Admin.Table.Kategori.TableKategori', ['kategori' => $kategori]);
    }
    public function tambahKategori(){
        return view('Admin.Insert.TambahKategori');
    }
    public function prosesTambahKategori(Request $request)
    {
 
        $request->validate([
            'NamaKategori' => 'required|string|max:255|unique:kategoris,NamaKategori',
        ]);
        $kategori = new Kategori();
        $kategori->NamaKategori = $request->input('NamaKategori');
        $kategori->save();
        return redirect()->route('admin.kategori.index')->with('success', 'Category berhasil ditambahkan');
    }

    public function editKategori($KategoriID)
    {
        $kategori = Kategori::find($KategoriID);
        if (!$kategori) {
            abort(404); 
        }
        return view('Admin.Update.UpdateKategori', ['kategori' => $kategori]);
    }
    

    public function updateKategori(Request $request, $KategoriID)
    {
        $request->validate([
            'NamaKategori' => 'required|string|max:255|unique:kategoris,NamaKategori,'  . $KategoriID . ',KategoriID',
        ]);
        $kategori = Kategori::findOrFail($KategoriID);
        $kategori->update([
            'NamaKategori' => $request->input('NamaKategori'),
        ]);
        return redirect()->route('admin.kategori.index')->with('success', 'Category updated successfully');
    }

    public function deleteKategori($KategoriID)
    {
        $kategori = Kategori::find($KategoriID);
        if (!$kategori) {
            return redirect()->route('admin.kategori.index')->with('error', 'Category not found');
        }
        $kategori->delete();
        return redirect()->route('admin.kategori.index')->with('success', 'Category deleted successfully');
    }

   
}
