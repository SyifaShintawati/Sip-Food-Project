<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="icon" href="{{ asset('gambar/download.png') }}">

    <!-- Title Page-->
    <title>SIP FOOD ADMIN</title>

    <!-- Fontfaces CSS-->
    <link href="admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- admin/Vendor CSS-->
    <link href="admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="admin/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="admin/css/theme.css" rel="stylesheet" media="all">
    <style type="text/css">
        a{
            color: white;
        }
        a:hover{
            color: white;
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar">
            <div class="logo">
                <a href="#">
                    <img src="gambar/aw.png"/>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="gambar/D.png" alt="John Doe" />
                    </div>
                    <h4 class="name">D'EZZ RESTO</h4>
                    <a href="#">powered by SIPFOOD</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{url ('/home')}}">
                                <i class="fas fa-tachometer-alt"></i>Home
                            </a>
                        </li>
                        <li>
                            <a href="{{url ('/customer')}}">
                                <i class="fas fa-plus-square"></i>Cutomers</a>
                        </li>
                        <li>
                            <a href="{{url ('/supplier')}}">
                                <i class="fas fa-plus-square"></i>Supplier
                            </a>
                        </li>
                        <li>
                            <a href="{{url ('/makanan')}}">
                                <i class="fas fa-plus-square"></i>Produk Makanan
                            </a>
                        </li>
                        <li>
                            <a href="{{url ('/minuman')}}">
                                <i class="fas fa-plus-square"></i>Produk Minuman
                            </a>
                        </li>
                        <li>
                            <a href="{{url ('/transaksi')}}">
                                <i class="fas fa-plus-square"></i>Transaksi Pesanan
                            </a>
                        </li>
                        <li class="active has-sub">
                                <a class="js-arrow" href="{{url ('/managamen')}}">
                                    <i class="fas fa-plus-square"></i>Management Data</a>
                            </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="gambar/aww.png"/>
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item has-noti js-item-menu">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="zmdi zmdi-account"></i>Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="gambar/aww.png" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="gambar/D.png"/>
                        </div>
                        <h4 class="name">D'EZZ RESTO</h4>
                        <a href="#">powered by SIPFOOD</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="{{url ('/customer')}}">
                                    <i class="fas fa-plus-square"></i>Cutomers</a>
                            </li>
                            <li>
                                <a href="{{url ('/supplier')}}">
                                    <i class="fas fa-plus-square"></i>Supplier</a>
                            </li>
                            <li>
                                <a href="{{url ('/makanan')}}">
                                    <i class="fas fa-plus-square"></i>Produk Makanan</a>
                            </li>
                            <li>
                                <a href="{{url ('/Produk Minuman')}}">
                                    <i class="fas fa-plus-square"></i>Minuman</a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{url ('/transaksi')}}">
                                    <i class="fas fa-plus-square"></i>Transaksi Pesanan</a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{url ('/managamen')}}">
                                    <i class="fas fa-plus-square"></i>Management Data</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="zmdi zmdi-account"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">SipFood</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Home</li>
                                        </ul>
                                    </div>
                                    <button class="au-btn au-btn-icon au-btn--green"><a href="{{url ('/makanan') }}"><i class="zmdi zmdi-plus"></i>Go to Makanan</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

             <!-- <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </section>
            <!-- END PAGE CONTAINER -->
        </div>

    </div>

    <!-- Jquery JS -->
    <script src="admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- admin/Vendor JS   -->    
    <script src="admin/vendor/slick/slick.min.js">
    </script>
    <script src="admin/vendor/wow/wow.min.js"></script>
    <script src="admin/vendor/animsition/animsition.min.js"></script>
    <script src="admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="admin/vendor/select2/select2.min.js">
    </script>
    <script src="admin/vendor/vector-map/jquery.vmap.js"></script>
    <script src="admin/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="admin/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="admin/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="admin/js/main.js"></script>

</body>

</html>
<!-- end document-->