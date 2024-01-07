@extends('Admin.Master.MasterTable')

@section('table')

<div class="container mx-auto mt-10" style="margin-top: 10%">
    <div class="w-full max-w-lg mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 p-6 text-center">Edit Kategori</h2>

            <form action="{{ route('admin.lokasi.updateLokasi', $lokasi->LokasiID) }}" method="POST" class="p-6">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="Provinsi" class="block text-sm font-medium text-gray-600">Provinsi</label>
                    <select id="Provinsi" name="Provinsi" class="form-select mt-1 block w-full border p-2 rounded" required>
                        <option value="" selected disabled>{{ $lokasi->Provinsi }}</option>
                        <option value="Aceh">Aceh</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Riau">Riau</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Lampung">Lampung</option>
                        <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="DKI Jakarta">DKI Jakarta</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Banten">Banten</option>
                        <option value="Bali">Bali</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Papua">Papua</option>
                        <option value="Papua Barat">Papua Barat</option>
                    </select>
                    @error('Provinsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="Kota" class="block text-sm font-medium text-gray-600">Kota</label>
                    <input id="Kota" type="text" class="form-input mt-1 block w- border-2 p-2 w-full" name="Kota" value="{{ $lokasi->Kota }}" required autofocus>
                </div>

        

                <div class="flex items-center justify-between mt-6">
                    <a href="{{ url()->previous() }}" class="text-gray-600 hover:underline">Back</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full">
                        Update Lokasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
