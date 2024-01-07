<!DOCTYPE html>
<html>
 @include('Admin.Layout.Header')

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <!-- sidenav  -->
        @include('Admin.Layout.SideNav')
    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
            @include('Admin.Layout.Navbar')
      <!-- end Navbar -->

    {{-- Content --}}
      @include('Admin.Dashboard.index')
    </main>

  </body>
  <!-- plugin for charts  -->
  <script src="../assets/js/plugins/chartjs.min.js" async></script>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>