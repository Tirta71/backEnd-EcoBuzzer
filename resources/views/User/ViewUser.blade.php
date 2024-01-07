@extends('Admin.Master.MasterTable')

@section('table')
    <div class="container mx-auto mt-10 ">
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-2/3 p-6">
            <h2 class="text-3xl font-semibold mb-6 ">User Details</h2>

            <div class="container-viewUser">
               
                <div class="userCard">
                    <h3 class="text-xl font-semibold mb-4">Basic Information</h3>
                    
                    <div class="ValueCardUser">
                        <p>Nama</p>
                        <p>{{ $user->Nama }}</p>
                    </div>

                    <div class="ValueCardUser">
                        <p >Email</p>
                        <p>{{ $user->Email }}</p>
                    </div>

                    <div class="ValueCardUser">
                        <p >Nomor Telepon</p>
                        <p>{{ $user->NomorTelepon }}</p>
                    </div>
                    <div class="ValueCardUser">
                        <p>Status</p>
                        <p>{{ $user->Status ?? 'Offline' }}</p>
                    </div>
                    
                </div>

             
                
                <div class="userCard">
                    <h3 class="text-xl font-semibold mb-4">Address Details</h3>
                    <div class="ValueCardUser">
                        <p>Provinsi</p>
                        <p>{{ $user->Provinsi }}</p>
                    </div>

                    <div class="ValueCardUser">
                        <p >Kota</p>
                        <p>{{ $user->Kota }}</p>
                    </div>

                    <div class="ValueCardUser">
                        <p >Kode Pos</p>
                        <p>{{ $user->KodePos }}</p>
                    </div>
                    <div class="ValueCardUser">
                        <p >Alamat</p>
                        <p>{{ $user->Alamat }}</p>
                    </div>

            </div>

            <!-- Back to Users Button -->
           
        </div>
        <div class="flex items-center justify-end mt-8">
            <a href="{{ route('admin.users.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full">
                Back to Users
            </a>
        </div>
    </div>
@endsection
