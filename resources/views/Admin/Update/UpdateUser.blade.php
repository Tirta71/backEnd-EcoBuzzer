@extends('Admin.Master.MasterTable')

@section('table')

<div class="container mx-auto mt-10" style="margin-top: 10%">
    <div class="w-full max-w-lg mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 p-6 text-center">Edit User</h2>

            <form action="{{ route('admin.users.update', $user->UserID) }}" method="POST" class="p-6">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="Nama" class="block text-sm font-medium text-gray-600">Nama</label>
                    <input id="Nama" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="Nama" value="{{ $user->Nama }}" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="Email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input id="Email" type="email" class="form-input mt-1 block w- border-2 p-2 w-full" name="Email" value="{{ $user->Email }}" required>
                </div>

                <div class="mb-4">
                    <label for="Password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input id="Password" type="password" class="form-input mt-1 block w- border-2 p-2 w-full" name="Password" required>
                </div>

                <div class="mb-4">
                    <label for="NomorTelepon" class="block text-sm font-medium text-gray-600">Nomor Telepon</label>
                    <input id="NomorTelepon" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="NomorTelepon" value="{{ $user->NomorTelepon }}" required>
                </div>

                <div class="mb-4">
                    <label for="Alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                    <input id="Alamat" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="Alamat" value="{{ $user->Alamat }}" required>
                </div>

                <div class="mb-4">
                    <label for="Kota" class="block text-sm font-medium text-gray-600">Kota</label>
                    <input id="Kota" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="Kota" value="{{ $user->Kota }}" required>
                </div>

                <div class="mb-4">
                    <label for="Provinsi" class="block text-sm font-medium text-gray-600">Provinsi</label>
                    <input id="Provinsi" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="Provinsi" value="{{ $user->Provinsi }}" required>
                </div>

                <div class="mb-4">
                    <label for="KodePos" class="block text-sm font-medium text-gray-600">Kode Pos</label>
                    <input id="KodePos" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="KodePos" value="{{ $user->KodePos }}" required>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a href="{{ url()->previous() }}" class="text-gray-600 hover:underline">Back</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
