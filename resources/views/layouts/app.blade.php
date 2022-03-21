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
                    <div class="page-content">
                        @yield('content')
                    </div>
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
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('assets/js/pages/sparkline/sparkline-data.js')}}"></script>
    <!-- Common js-->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <script src="{{asset('assets/js/theme-color.js')}}"></script>
    <!-- material -->
    <script src="{{asset('assets/plugins/material/material.min.js')}}"></script>
    <!--apex chart-->
    <script src="{{asset('assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/chart/apex/home-data.js')}}"></script>
    <!-- summernote -->
    <script src="{{asset('assets/plugins/summernote/summernote.js')}}"></script>
    <script src="{{asset('assets/js/pages/summernote/summernote-data.js')}}"></script>
</body>

</html>
