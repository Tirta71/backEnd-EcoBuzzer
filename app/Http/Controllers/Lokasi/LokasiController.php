<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index(){
        $lokasi = Lokasi::all();
        return view('Admin.Table.Lokasi.TableLokasi', ['lokasi' => $lokasi]);
    }
    public function tambahLokasi(){
        return view('Admin.Insert.TambahLokasi');
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

     
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil ditambahkan');
    }
    public function editLokasi($LokasiID)
    {
        $lokasi = Lokasi::find($LokasiID);
        if (!$lokasi) {
            abort(404); 
        }
        return view('Admin.Update.UpdateLokasi', ['lokasi' => $lokasi]);
    }

    public function updateLokasi(Request $request, $LokasiID)
    {

        $validatedData = $request->validate([
            'Kota' => 'required|string|max:255',
            'Provinsi' => 'required|string|max:255',
        ]);
    
        try {
            $lokasi = Lokasi::where('LokasiID', $LokasiID)->first();
            $lokasi->update($validatedData);
    
    
            return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->route('admin.lokasi.index')->with('error', 'Error updating lokasi: ' . $e->getMessage());
        }
    }
    public function deleteLokasi($LokasiID)
    {
        $lokasi = Lokasi::find($LokasiID);
        if (!$lokasi) {
            return redirect()->route('admin.lokasi.index')->with('error', 'Lokasi not found');
        }
        $lokasi->delete();
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi deleted successfully');
    }

}
