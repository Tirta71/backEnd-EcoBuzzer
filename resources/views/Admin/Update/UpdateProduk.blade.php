@extends('Admin.Master.MasterTable')

@section('table')
    <div class="container mx-auto mt-10" style="margin-top: 10%">
        <div class="w-full max-w-lg mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6 text-center p-6">Edit Produk</h2>

                <form method="POST" action="{{ route('admin.produk.updateProduk', ['ProductID' => $produk->ProductID]) }}">
                    @csrf
                    @method('PUT')
                

                    <div class="mb-4">
                        <label for="NamaProduk" class="block text-sm font-medium text-gray-600">Nama Produk</label>
                        <input placeholder="Masukkan Nama Produk" id="NamaProduk" type="text" class="form-input mt-1 block w-full border p-2 rounded @error('NamaProduk') border-red-500 @enderror" name="NamaProduk" value="{{ $produk->NamaProduk }}" required autofocus>
                        @error('NamaProduk')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                        <input placeholder="Masukkan Despkripsi" id="Deskripsi" type="text" class="form-input mt-1 block w-full border p-2 rounded @error('Deskripsi') border-red-500 @enderror" name="Deskripsi" value="{{ $produk->Deskripsi }}" required autofocus>
                        @error('Deskripsi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    

                    <div class="mb-4">
                        <label for="KategoriID" class="block text-sm font-medium text-gray-600">Kategori</label>
                        <!-- Add a dropdown/select input for KategoriID -->
                        <select id="KategoriID" name="KategoriID" class="form-select mt-1 block w-full border p-2 rounded @error('KategoriID') border-red-500 @enderror" required>
                            <!-- Populate the options dynamically based on your Kategoris table -->
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->KategoriID }}">{{ $kategori->NamaKategori }}</option>
                            @endforeach
                        </select>
                        @error('KategoriID')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Harga" class="block text-sm font-medium text-gray-600">Harga</label>
                        <input placeholder="Masukkan Harga" id="Harga" type="text" class="form-input mt-1 block w-full border p-2 rounded @error('Harga') border-red-500 @enderror" name="Harga" value="{{ $produk->Harga }}" required>
                        @error('Harga')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Status" class="block text-sm font-medium text-gray-600">Status</label>
                        <select id="Status" name="Status" class="form-select mt-1 block w-full border p-2 rounded @error('Status') border-red-500 @enderror" required>
                            <option value="Sold" @if(old('Status', $produk->Status) === 'Sold') selected @endif>Sold</option>
                            <option value="Available" @if(old('Status', $produk->Status) === 'Available') selected @endif>Available</option>
                        </select>
                        @error('Status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    

                    <div class="mb-4">
                        <label for="UserID" class="block text-sm font-medium text-gray-600">Pemilik</label>
                        <select id="UserID" name="UserID" class="form-select mt-1 block w-full border p-2 rounded @error('UserID') border-red-500 @enderror" required>
                            @foreach($users as $user)
                                <option value="{{ $user->UserID }}">{{ $user->Nama }}</option>
                            @endforeach
                        </select>
                        @error('UserID')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="LokasiID" class="block text-sm font-medium text-gray-600">Provinsi</label>
                        <select id="LokasiID" name="LokasiID" class="form-select mt-1 block w-full border p-2 rounded @error('LokasiID') border-red-500 @enderror" required>
             
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->LokasiID }}">{{ $lokasi->Provinsi }}</option>
                            @endforeach
                        </select>
                        @error('LokasiID')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="LokasiID" class="block text-sm font-medium text-gray-600">Kota</label>
                        <select id="LokasiID" name="LokasiID" class="form-select mt-1 block w-full border p-2 rounded @error('LokasiID') border-red-500 @enderror" required>
             
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->LokasiID }}">{{ $lokasi->Kota }}</option>
                            @endforeach
                        </select>
                        @error('LokasiID')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    
                
                    <div class="mb-4">
                        <label for="TanggalDiposting" class="block text-sm font-medium text-gray-600">Tanggal Post</label>
                        <input placeholder="Masukkan Despkripsi" id="TanggalDiposting" type="text" class="form-input mt-1 block w-full border p-2 rounded @error('TanggalDiposting') border-red-500 @enderror" name="TanggalDiposting" value="{{ $produk->TanggalDiposting }}" required autofocus>
                        @error('TanggalDiposting')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    

                    <div class="mb-4">
                        <label for="Kondisi" class="block text-sm font-medium text-gray-600">Kondisi</label>
                        <select id="Kondisi" name="Kondisi" class="form-select mt-1 block w-full border p-2 rounded @error('Kondisi') border-red-500 @enderror" required>
                            <option value="Baik" {{ $produk->Kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak" {{ $produk->Kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                            <option value="Sebagian Rusak" {{ $produk->Kondisi == 'Sebagian Rusak' ? 'selected' : '' }}>Sebagian Rusak</option>
                        </select>
                        @error('Kondisi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    

       

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ url()->previous() }}" class="text-gray-600 hover:underline">Back</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full">
                           Edit Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
