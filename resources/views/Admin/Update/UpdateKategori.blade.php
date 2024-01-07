@extends('Admin.Master.MasterTable')

@section('table')

<div class="container mx-auto mt-10" style="margin-top: 10%">
    <div class="w-full max-w-lg mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 p-6 text-center">Edit Kategori</h2>

            <form action="{{ route('admin.kategori.update', $kategori->KategoriID) }}" method="POST" class="p-6">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="NamaKategori" class="block text-sm font-medium text-gray-600">NamaKategori Kategori</label>
                    <input id="NamaKategori" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="NamaKategori" value="{{ $kategori->NamaKategori }}" required autofocus>
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
