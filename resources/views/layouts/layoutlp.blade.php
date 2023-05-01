<!DOCTYPE html>
<html lang="en">

<head>
    <title>Griyafoto Semarang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="apple-touch-icon" href="{{asset('shop/assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="{{asset('shop/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('shop/assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('shop/assets/css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    {{-- <link rel="stylesheet" href="{{asset('shop/assets/css/fontawesome.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://kit.fontawesome.com/ef9f7b3838.js" crossorigin="anonymous"></script>
    @yield('style')
<!--

TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->

    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Griyafoto
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('shop')}}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Gallery</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('usertransaction')}}">Transaction</a>
                        </li>
                        @can('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        @endcan
                        @can('seller')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        @endcan
                        @endauth
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    @auth
                    <div class="dropstart">
                        <a class="nav-icon position-relative text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                            {{-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span> --}}
                        </a>
                        <ul class="dropdown-menu">
                          {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                          <li class="mx-3"><h6>Hi {{Auth::user()->name}}</h6></li>
                          <hr>
                          <li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link ">Logout</button>
                            </form>
                          </li>
                          {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                        </ul>
                    </div>
                    @else
                    <a class="nav-icon position-relative text-decoration-none" href="{{route('login')}}">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        {{-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span> --}}
                    </a>
                    @endauth

                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    @yield('content')


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Griyafoto</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 Consectetur at ligula 10660
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>



                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </ul>
                </div>
            </div>
        </div>



    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{asset('shop/assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/templatemo.js')}}"></script>
    <script src="{{asset('shop/assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @yield('script')

    @if (Session::has('fail'))
        <script>
            Toastify({
            text: "<?php echo Session::get('fail') ?>",
            duration: 3000,
            style: {
                background: "red",
            }
        }).showToast();
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            Toastify({
            text: "<?php echo Session::get('success') ?>",
            duration: 3000,
            style: {
                background: "green",
            }
        }).showToast();
        </script>
    @endif
    <!-- End Script -->
</body>

</html>
