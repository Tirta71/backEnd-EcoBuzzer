<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
     

        $users = User::all();
        return view('Admin.Table.TableUser', ['users' => $users]);
    }

    public function viewUser($UserID)
    {
     
        $user = User::find($UserID);

        if (!$user) {
           
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('User.ViewUser', compact('user'));
    }

    public function tambahDataUserForm()
    {   
       
        return view('Admin.Insert.TambahUser');
    }

    public function prosesTambahDataUser(Request $request)
    {
        
        $request->validate([
            'Nama' => 'required|string|max:255',
            'Email' => 'required|email|unique:users',
            'Password' => 'required|string|min:6',
            'NomorTelepon' => 'required|string|max:15',
            'Alamat' => 'required|string|max:255',
            'Kota' => 'required|string|max:255',
            'Provinsi' => 'required|string|max:255',
            'KodePos' => 'required|string|max:10',
          
        ]);

        
        $user = new User([
            'Nama' => $request->input('Nama'),
            'Email' => $request->input('Email'),
            'Password' => bcrypt($request->input('Password')),
            'NomorTelepon' => $request->input('NomorTelepon'),
            'Alamat' => $request->input('Alamat'),
            'Kota' => $request->input('Kota'),
            'Provinsi' => $request->input('Provinsi'),
            'KodePos' => $request->input('KodePos'),
         
        ]);

        $user->save();

     
        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function editUser($UserID)
    {
    
        $user = User::where('UserID', $UserID)->first();

    
    
        if (!$user) {
            abort(404); 
        }
    
        return view('Admin.Update.UpdateUser', ['user' => $user]);
    }

    public function updateUser(Request $request, $UserID)
    {

        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
            'Email' => 'required|email|unique:users,Email,' . $UserID . ',UserID',
            'Password' => 'nullable|string|min:6',
            'NomorTelepon' => 'required|string|max:15',
            'Alamat' => 'required|string|max:255',
            'Kota' => 'required|string|max:255',
            'Provinsi' => 'required|string|max:255',
            'KodePos' => 'required|string|max:10',
        ]);
    
        try {
          
            $user = User::where('UserID', $UserID)->first();
    
            $user->update($validatedData);
    
           
            if ($request->filled('Password')) {
                $user->update(['Password' => bcrypt($request->input('Password'))]);
            }
    
            return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Error updating user: ' . $e->getMessage());
        }
    }

    public function destroy($UserID)
    {
        $user = User::find($UserID);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
    
    
    

    

}
