<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
            <img src="{{ asset('/assets/img/logo-ct-dark.png') }}" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
            <img src="{{ asset('/assets/img/logo-ct.png') }}" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Argon Dashboard 2</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold transition-colors <?php echo (request()->routeIs('admin.dashboard*') && !request()->routeIs('admin.users*')) ? 'bg-blue-500/13 text-slate-700 dark:text-white font-semibold' : ''; ?>" href="{{ route('admin.dashboard') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.">
                        <i class="relative top-0 text-sm leading-normal ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>
   
            <li class="mt-0.5 w-full">
                <a class="text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php echo (request()->routeIs('admin.users*')) ? 'bg-blue-500/13 text-slate-700 dark:text-white font-semibold p-2 rounded-lg' : ''; ?>" href="{{ route('admin.users.index') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.">
                        <i class="relative top-0 text-sm leading-normal ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Client User</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php echo (request()->routeIs('admin.kategori*')) ? 'bg-blue-500/13 text-slate-700 dark:text-white font-semibold p-2 rounded-lg' : ''; ?>" href="{{ route('admin.kategori.index') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.">
                        <i class="relative top-0 text-sm leading-normal ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kategori</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php echo (request()->routeIs('admin.lokasi*')) ? 'bg-blue-500/13 text-slate-700 dark:text-white font-semibold p-2 rounded-lg' : ''; ?>" href="{{ route('admin.lokasi.index') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.">
                        <i class="relative top-0 text-sm leading-normal ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Lokasi</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php echo (request()->routeIs('admin.produk*')) ? 'bg-blue-500/13 text-slate-700 dark:text-white font-semibold p-2 rounded-lg' : ''; ?>" href="{{ route('admin.produk.index') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.">
                        <i class="relative top-0 text-sm leading-normal ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Produk</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors <?php echo (request()->routeIs('admin.photos*')) ? 'bg-blue-500/13 text-slate-700 dark:text-white font-semibold p-2 rounded-lg' : ''; ?>" href="{{ route('admin.photos.index') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.">
                        <i class="relative top-0 text-sm leading-normal ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Foto Produk</span>
                </a>
            </li>
            
          

            <!-- Other navigation items -->

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/profile.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
