<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Retrateria - Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        <link href="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <script src="/assets/libs/jquery/jquery.min.js"></script>
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/#" class="logo logo-light">
                                <span class="logo-sm w-100">
                                    <img src="/assets/images/retrateria-blanco-102.png">
                                </span>
                                <span class="logo-lg w-100">
                                    <img src="/assets/images/retrateria-blanco-102.png">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>



                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="/assets/images/avatar.jpg">
                                <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="/admin/{{ Auth::user()->id }}/edit"><i class="ri-user-line align-middle mr-1"></i> Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Salir</a>

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="/" class="waves-effect">
                                    <i class="ri-home-3-line"></i>
                                    <span>Panel</span>
                                </a>
                            </li>

                            <li>
                                <a href="/admin" class=" waves-effect">
                                    <i class="ri-user-2-line"></i>
                                    <span>Administradores</span>
                                </a>
                            </li>
                            <li>
                                <a href="/clientes" class=" waves-effect">
                                    <i class="ri-shield-user-line"></i>
                                    <span>Clientes</span>
                                </a>
                            </li>

                            <li>
                                <a href="/productos" class=" waves-effect">
                                    <i class="dripicons-camera"></i>
                                    <span>Productos</span>
                                </a>
                            </li>

                            <li>
                                <a href="/ordenes" class=" waves-effect">
                                    <i class="dripicons-photo-group"></i>
                                    <span>Ordenes</span>
                                </a>
                            </li>

                            <li>
                                <a href="/cupones" class=" waves-effect">
                                    <i class="dripicons-ticket"></i>
                                    <span>Cupones</span>
                                </a>
                            </li>




                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('main')

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Retrateria.
                            </div>
                            <div class="col-sm-6">
                               &nbsp;
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>

        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="/assets/js/pages/datatables.init.js"></script>
        <script src="/assets/js/app.js"></script>
        @yield('js')

    </body>
</html>
