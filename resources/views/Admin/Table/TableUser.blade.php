@extends('Admin.Master.MasterTable')

@section('table')


<div class="flex-none w-full max-w-full px-3">
    <div class="mt-4 mb-4">
        <a href="{{ route('admin.users.tambahForm') }}" class="px-4 py-2 bg-white text-blue-500 rounded-lg hover:bg-red-600 transition duration-300">Tambah Data</a>
    </div>
    
    
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

      
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="dark:text-white">Table Client User</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama User</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Telp</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Alamat</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Provinsi</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kode Pos</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Edit</th>
                            
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div>
                                        <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" alt="user1" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $user->Nama }}</h6>
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $user->Email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $user->NomorTelepon }}</span>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ $user->Kota }}</p>
                                <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $user->Alamat }}</p>
                            </td>
                         
                            <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $user->Provinsi }}</span>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $user->KodePos }}</span>
                            </td>
                            
                            <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    @if($user->status == 'online')
                                    Online
                                    @else
                                    Offline
                                    @endif
                                </span>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent relative group" id="row{{ $index + 1 }}">
                                <a href="javascript:;" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 hover:text-blue-500">
                                    Edit
                                </a>
                            
                                <div class="hidden absolute top-0 right-4 left-full bg-white border shadow-md p-2 space-y-2" id="actions-row{{ $index + 1 }}">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.users.edit', ['UserID' => $user->UserID]) }}" class="text-xs text-gray-600 hover:text-red-500 py-1 px-2 rounded-md transition duration-300">Edit</a>

                                    <!-- Tombol Delete -->
                                    <a href="#" class="text-xs text-gray-600 hover:text-red-500 py-1 px-2 rounded-md transition duration-300"
                                    onclick="confirmDelete('{{ $user->UserID }}')">
                                     Delete
                                 </a>
                            
                                 <form id="delete-form-{{ $user->UserID }}" action="{{ route('admin.users.destroy', $user->UserID) }}" method="POST" style="display: none;">
                                     @csrf
                                     @method('DELETE')
                                 </form>
                                     
                            
                                    <!-- Tombol View Data -->
                                    <a href="{{ route('admin.users.view', ['UserID' => $user->UserID]) }}" class="text-xs text-gray-600 hover:text-green-500 py-1 px-2 rounded-md transition duration-300">
                                        View Data
                                    </a>
                                    
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
    @foreach($users as $index => $user)
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

<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: 'User Akan Terhapus Dari Database',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>

@endsection
