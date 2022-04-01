{{--Created by Beatific Angel    20222/3/21 11.00 am --}}
<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}
@include('common.head')

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        @include('common.header')
            <div class="page-container">
                <!-- Sidebar -->
                @include('common.sidebar')
                <!-- End of Sidebar -->
                <div class="page-content-wrapper">
                    @yield('content')
                </div>
            </div>
        @include('common.footer')
    </div>

    @yield('scripts')
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/popper/popper.js')}}"></script>
    <script src="{{'assets/plugins/jquery-blockui/jquery.blockui.min.js'}}"></script>
    <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/plugins/feather/feather.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- Common js-->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <script src="{{asset('assets/js/theme-color.js')}}"></script>
    <!-- material -->
    <script src="{{asset('assets/plugins/material/material.min.js')}}"></script>
    <script src="{{asset('assets/plugins/flatpicker/js/flatpicker.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/material-select/getmdl-select.js')}}"></script>

    <!-- data table -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/table/table_data.js')}}"></script>


</body>

</html>
