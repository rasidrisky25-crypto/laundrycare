
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'LaundryCare')</title>

    <link rel="stylesheet" href="{{ asset('backend/dist/css/style.min.css') }}">

    <style>
        /* Tombol menu HP */
        .mobile-menu-button {
            display: none;
            border: none;
            background: transparent;
            color: white;
            font-size: 25px;
            cursor: pointer;
            padding: 5px 12px;
        }

        /* Lapisan gelap di belakang sidebar */
        .mobile-sidebar-overlay {
            display: none;
        }

        /* Pengaturan tampilan HP */
        @media (max-width: 767px) {

            .topbar .navbar-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                padding-right: 10px;
            }

            .mobile-menu-button {
                display: block;
            }

            /* Sidebar tertutup secara default */
            .left-sidebar {
                position: fixed !important;
                top: 60px !important;
                left: 0 !important;
                bottom: 0 !important;
                width: 260px !important;
                z-index: 1100 !important;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            /* Sidebar ketika dibuka */
            .left-sidebar.mobile-open {
                transform: translateX(0);
            }

            /* Konten memenuhi layar */
            .page-wrapper {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .container-fluid {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            /* Overlay */
            .mobile-sidebar-overlay {
                position: fixed;
                display: block;
                top: 60px;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.45);
                z-index: 1090;
                opacity: 0;
                visibility: hidden;
                transition: 0.3s ease;
            }

            .mobile-sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="skin-default fixed-layout">

    <div id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin5"
        data-sidebartype="full"
        data-sidebar-position="fixed"
        data-header-position="fixed"
        data-boxed-layout="full">

        <!-- Topbar -->
        <header class="topbar" data-navbarbg="skin5">

            <nav class="navbar top-navbar navbar-expand-md navbar-dark">

                <div class="navbar-header" data-logobg="skin5">

                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        <span class="logo-text">
                            <strong>LaundryCare</strong>
                        </span>
                    </a>

                    <!-- Tombol Menu HP -->
                    <button type="button"
                            class="mobile-menu-button"
                            id="mobileMenuButton"
                            aria-label="Buka atau tutup menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item">
                            <span class="nav-link text-white">
                                Sistem Informasi LaundryCare
                            </span>
                        </li>
                    </ul>

                    <ul class="navbar-nav float-right">
                        <li class="nav-item">
                            <span class="nav-link text-white">
                                Admin LaundryCare
                            </span>
                        </li>
                    </ul>

                </div>

            </nav>

        </header>
        <!-- End Topbar -->


        <!-- Sidebar -->
        <aside class="left-sidebar" data-sidebarbg="skin5">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">

                    <ul id="sidebarnav" class="p-t-30">

                        <!-- Dashboard -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ url('/dashboard') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <!-- Pelanggan -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('pelanggan.index') }}">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Data Pelanggan</span>
                            </a>
                        </li>

                        <!-- Layanan -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('layanan.index') }}">
                                <i class="mdi mdi-washing-machine"></i>
                                <span class="hide-menu">Data Layanan</span>
                            </a>
                        </li>

                        <!-- Pesanan -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('pesanan.index') }}">
                                <i class="mdi mdi-clipboard-text"></i>
                                <span class="hide-menu">Data Pesanan</span>
                            </a>
                        </li>

                        <!-- Detail Pesanan -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('detail-pesanan.index') }}">
                                <i class="mdi mdi-file-document"></i>
                                <span class="hide-menu">Detail Pesanan</span>
                            </a>
                        </li>

                        <!-- Pembayaran -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('pembayaran.index') }}">
                                <i class="mdi mdi-cash-multiple"></i>
                                <span class="hide-menu">Pembayaran</span>
                            </a>
                        </li>

                    </ul>

                </nav>

            </div>

        </aside>
        <!-- End Sidebar -->


        <!-- Overlay HP -->
        <div class="mobile-sidebar-overlay"
             id="mobileSidebarOverlay"></div>


        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Breadcrumb -->
            <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-12 d-flex no-block align-items-center">

                        <h4 class="page-title">
                            @yield('page-title', 'Dashboard')
                        </h4>

                    </div>

                </div>

            </div>
            <!-- End Breadcrumb -->


            <!-- Container Fluid -->
            <div class="container-fluid">

                @yield('content')

            </div>
            <!-- End Container Fluid -->


            <!-- Footer -->
            <footer class="footer text-center">
                © {{ date('Y') }} LaundryCare. All Rights Reserved.
            </footer>
            <!-- End Footer -->

        </div>
        <!-- End Page Wrapper -->

    </div>


    <!-- JavaScript -->
    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('backend/dist/js/custom.js') }}"></script>

    <!-- Fungsi Buka Tutup Sidebar HP -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const menuButton = document.getElementById('mobileMenuButton');
            const sidebar = document.querySelector('.left-sidebar');
            const overlay = document.getElementById('mobileSidebarOverlay');

            function toggleSidebar() {
                sidebar.classList.toggle('mobile-open');
                overlay.classList.toggle('active');
            }

            function closeSidebar() {
                sidebar.classList.remove('mobile-open');
                overlay.classList.remove('active');
            }

            menuButton.addEventListener('click', toggleSidebar);

            overlay.addEventListener('click', closeSidebar);

            sidebar.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 767) {
                        closeSidebar();
                    }
                });
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth > 767) {
                    closeSidebar();
                }
            });

        });
    </script>

    @stack('scripts')

</body>
</html>
