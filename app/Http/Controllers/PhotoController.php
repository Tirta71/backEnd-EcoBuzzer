<?php


namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return view('Admin.Table.Photo.TablePhoto', compact('photos'));
    }

    public function tambahPhoto()
    {
        $products = Produk::all();
        return view('Admin.Insert.TambahPhoto', compact('products'));
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
    
        // Handle file upload dengan nama file yang sudah dibuat
        $path = $request->file('URLFoto')->storeAs('photos', $fileName, 'public');
    
       
        $photo = Photo::create([
            'ProductID' => $request->input('ProductID'),
            'URLFoto' => Storage::url($path),
        ]);
    
        return redirect()->route('admin.photos.index')->with('success', 'Photo added successfully.');
    }
    
    
}

    
    
    

    
    

