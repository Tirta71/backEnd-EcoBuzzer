@extends('Admin.Master.MasterTable')

@section('table')
    <div class="container mx-auto mt-10" style="margin-top: 10%">
        <div class="w-full max-w-lg mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6 text-center p-6">Tambah Kategori</h2>

                <form method="POST" action="{{ route('admin.kategori.prosesTambahKategori') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="NamaKategori" class="block text-sm font-medium text-gray-600">Nama Kategori</label>
                        <input placeholder="Masukan Nama Kategori" id="NamaKategori" type="text" class="form-input mt-1 block w-full border p-2 rounded @error('NamaKategori') border-red-500 @enderror" name="NamaKategori" value="{{ old('NamaKategori') }}" required autofocus>
                        @error('NamaKategori')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ url()->previous() }}" class="text-gray-600 hover:underline">Back</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full">
                           Tambah Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
