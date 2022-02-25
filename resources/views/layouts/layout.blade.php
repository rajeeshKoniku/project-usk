<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/dashboard-eCommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 08:55:34 GMT -->
<head>
   @include('layouts.head')
</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">PROJEK USK</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            @include('layouts.sideBarNavigation')
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->

        <!--start header -->
        <header>
           @include('layouts.header')
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr/>
            <p class="mb-0">Gaussian Texture</p>
            <hr>
            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>
            <hr>
            <p class="mb-0">Gradient Background</p>
            <hr>
            <ul class="switcher">
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
              </ul>
        </div>
    </div>
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{!! asset('assets/')!!}/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{!! asset('assets/')!!}/js/jquery.min.js"></script>
    <script src="{!! asset('assets/')!!}/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{!! asset('assets/')!!}/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{!! asset('assets/')!!}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- // <script src="{!! asset('assets/')!!}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> -->
    <!-- // <script src="{!! asset('assets/')!!}/plugins/datatable/js/jquery.dataTables.min.js"></script> -->
    <!-- // <script src="{!! asset('assets/')!!}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#Transaction-History').DataTable({
                lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']]
            });
          } );
    </script>
    <script src="{!! asset('assets/')!!}/js/dashboard-eCommerce.js"></script>
    <!--app JS-->
    <script src="{!! asset('assets/')!!}/js/app.js"></script>
    <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script>
</body>


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/dashboard-eCommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 08:56:08 GMT -->
</html>
