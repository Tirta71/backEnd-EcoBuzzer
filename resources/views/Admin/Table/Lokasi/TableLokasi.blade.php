@extends('Admin.Master.MasterTable')

@section('table')
<div class="flex-none w-full max-w-full px-3">
    <div class="mt-4 mb-4">
        <a href="{{ route('admin.lokasi.tambahLokasi') }}" class="px-4 py-2 bg-white text-blue-500 rounded-lg hover:bg-red-600 transition duration-300">Tambah Data</a>
    </div>
    
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="dark:text-white">Table Lokasi</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Provinsi</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Kota</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lokasi as $index => $kt)
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $kt->Provinsi }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $kt->Kota }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent relative group" id="row{{ $index + 1 }}">
                                <a href="javascript:;" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 hover:text-blue-500">
                                    Edit
                                </a>
                                <div class="hidden absolute top-0  left-full bg-white border shadow-md p-2 space-y-2" id="actions-row{{ $index + 1 }}">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.lokasi.editLokasi', ['LokasiID' => $kt->LokasiID]) }}" class="text-xs text-gray-600 hover:text-red-500 py-1 px-2 rounded-md transition duration-300">Edit</a>


                                    <!-- Tombol Delete -->
                                    <a href="{{ route('admin.lokasi.delete', ['LokasiID' => $kt->LokasiID]) }}" class="text-xs text-gray-600 hover:text-red-500 py-1 px-2 rounded-md transition duration-300" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $kt->LokasiID }}').submit();">
                                        Delete
                                    </a>
                                    
                                    <form id="delete-form-{{ $kt->LokasiID }}" action="{{ route('admin.lokasi.delete', ['LokasiID' => $kt->LokasiID]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    
                             
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    @foreach($lokasi as $index => $kt)
        document.getElementById('row{{ $index + 1 }}').addEventListener('mouseover', function() {
            document.getElementById('actions-row{{ $index + 1 }}').classList.remove('hidden');
        });

        document.getElementById('row{{ $index + 1 }}').addEventListener('mouseout', function() {
            document.getElementById('actions-row{{ $index + 1 }}').classList.add('hidden');
        });
    @endforeach
</script>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@endsection
