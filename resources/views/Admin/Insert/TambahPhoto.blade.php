@extends('Admin.Master.MasterTable')

@section('table')
    <div class="container mx-auto mt-10" style="margin-top: 10%">
        <div class="w-full max-w-lg mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6 text-center p-6">Tambah Photo</h2>

                <form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="product_id" class="block text-sm font-medium text-gray-600">Produk</label>
                        <select id="product_id" name="ProductID" class="form-select mt-1 block w-full border p-2 rounded @error('ProductID') border-red-500 @enderror" required>
                            <!-- Populate the options dynamically based on your products table -->
                            @foreach($products as $product)
                                <option value="{{ $product->ProductID }}">{{ $product->NamaProduk }}</option>
                            @endforeach
                        </select>
                        @error('ProductID')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    

                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-600">Photo</label>
                        <!-- Formulir -->
                        <input type="file" id="photo" name="URLFoto" accept="image/*" class="form-input mt-1 block w-full border p-2 rounded @error('URLFoto') border-red-500 @enderror" required>


                        @error('URLFoto')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- You can add more fields as needed -->

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
