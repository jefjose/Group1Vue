<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>Peachy's Collection</title>
    @yield('styles')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        type="text/css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<style>
    @media (max-width: 1250px) {
        .sup {
            font-size: 12px;
            /* Adjust the font size as needed */
        }

        .nav-link {
            font-size: 11px !important;
        }

        .size {
            font-size: 11px !important;
        }

        .car {
            margin-top: 110px;
        }

        .navbar {
            background-color: #800000;
        }
    }

    @media (max-width:332px) {
        h1 {
            font-size: 40px;
        }

        .sup {
            font-size: 9px;
        }
    }

    @media (max-width:366px) {
        .sup {
            font-size: 10px;
        }

        .imagesize {
            width: 63px;
            height: 63px;
        }

        .iconsize {
            font-size: 0.75rem;
        }
    }

    main {
        flex: 1;
    }

    body {
        margin: 0;
        padding: 0;

        background-image: url("{{ asset('images/bgt.png') }}");
        background-size: cover;
        background-attachment: fixed;
        /* Keeps the background fixed */
        background-repeat: no-repeat;
        /* Prevents background from repeating */

    }

    .shadows {}

    input,
    select {

        color: black !important;
        border-color: black !important;

    }

    .alert-container {
        position: fixed;
        top: 150px !important;
        right: 20px;
        z-index: 1000;
        width: 400px;
        height: auto;
    }

    .alert {
        border: 1px solid #ccc;
        padding: 8px;
        font-size: 14px;
    }

    @media screen and (max-width: 767px) {
        .alert-container {
            top: 130px !important;
            right: 10px;
            width: 80%;
            max-width: 200px;
        }

        .alert {

            font-size: 12px;
            padding: 6px;
            max-height: none;
        }
    }

    .alert p,
    .alert ul {
        margin: 0;
        margin-top: 5px;
        margin-bottom: 5px;
        font-size: 15px;
        line-height: 1.5;
    }

    .close-btn {
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 20px;
        /* Adjust the font size as needed */
        cursor: pointer;
    }

    .bg-primary {
        background-color: #000000 !important;
    }
</style>

<body class="content">
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark bg-primary fixed-top" id="myNavbar">
            <div class="container">
                <a class="navbar-brand sup" style="display: flex; align-items: center;" href="{{ url('/') }}">
                    <i><img class="imagesize mr-2" src="{{ asset('storage/images/logo.png') }}" width="45" height="45"
                            alt="Logo"></i>
                    <b>PEACHY'S COLLECTION</b>
                </a>
                <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbar17">
                    <span class="navbar-toggler-icon iconsize"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar17">
                    <ul class="navbar-nav mr-auto">
                        @auth
                            @if (auth()->user()->is_admin == 1)
                            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">
        <b class="text-uppercase">HOME</b>
    </a></li>
    <li class="nav-item"><a href="{{ url('/inventory/product') }}" class="nav-link"><b class="text-uppercase">INVENTORY</b></a></li>
                                <li class="nav-item"><a href="{{ url('/orders') }}" class="nav-link"><b class="text-uppercase">ORDERS</b></a></li>
                            @else
                                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">
                                        <b class="text-uppercase">HOME</b>
                                    </a></li>
                                <li class="nav-item"><a href="{{ url('/product') }}" class="nav-link"><b
                                            class="text-uppercase">PRODUCTS</b></a></li>
                                <li class="nav-item"><a href="{{ url('/myorders') }}" class="nav-link"><b
                                            class="text-uppercase">MY ORDERS</b></a></li>
                            @endif
                        @else
                            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">
                                    <b class="text-uppercase">HOME</b>
                                </a></li>
                            <li class="nav-item"><a href="{{ route('product') }}" class="nav-link">
                                    <b class="text-uppercase">PRODUCTS</b>
                                </a></li>
                        @endauth
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            @auth
                                @if (auth()->user()->is_admin == 1)
                                    <a class="navbar-brand" style="color: white;">
                                        <i class="fas fa-crown"></i> <!-- Font Awesome crown icon -->
                                        <b class="pl-2">{{ auth()->user()->name }}</b>
                                    </a>

                                @else
                                    <a class="navbar-brand" style="color: white;">
                                        <i class="fas fa-user"></i>
                                        <b class="pl-2">{{ auth()->user()->name }}</b>
                                    </a>
                                @endif
                                <a class="navbar-brand" href="{{ route('logout') }}"><b class="pl-2">Logout</b></a>
                            @else
                                <a class="navbar-brand" href="{{ route('login') }}"><b class="size pl-2">Login</b></a>
                            @endauth
                        </div>
                    </div>
                    @guest
                        <div class="row">
                            <div class="col-md-12">
                                <a class="navbar-brand" href="{{ url('/register') }}"></i><b
                                        class="size pl-2">Register</b></a>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>        
    </header>

    <main>
        <div id='app'>
            @yield('content')
        </div>
    </main>



    <footer class="footer bg-dark text-light">
        <div class="container mt-2">
            <div class="row">

                <div class="col-lg-3 col-md-6 p-3 text-center">
                    <br>
                    <h5><b>DELIVERY HOURS</b></h5>
                    <p class="mb-0">
                        <br>
                        Monday to Friday <br>
                        8:00 AM - 5:00 NN<br><br>
                    </p>
                </div>

                <div class="col-md-6 text-center my-3">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="img-fluid mt-3 mb-3"
                        style="width: 100px; height: 100px; margin-bottom: 10px; margin-top: 10px;">
                    <p class="mt-3">PEACHY'S COLLECTIONS</p>
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <a href="https://www.facebook.com/profile.php?id=100085082030532" target="_blank">
                            <i class="d-block fa fa-facebook-official fa-lg mr-2 my-2 text-light"></i>
                        </a>
                        <a href="https://shopee.ph/patriciamaealvarez" target="_blank">
                            <i class="fas fa-shopping-bag my-2 mr-2 text-light"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 | All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
            $('[data-toggle="tooltip"]').tooltip();
            $('#datepicker-example').datepicker({
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    @yield('scripts')
</body>

</html>