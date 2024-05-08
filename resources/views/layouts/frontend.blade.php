<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>BEAUTY PRODUCTS</title>

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
</style>

<body class="content">
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark bg-primary" id="myNavbar">
            <div class="container">
                <a class="navbar-brand sup" style="display: flex; align-items: center;" href="{{ url('/') }}">
                    <i><img class="imagesize mr-2" src="{{ asset('images/logo.png') }}" width="70" height="70"
                            alt="Logo"></i>
                    <b>BEAUTY PRODUCTS</b>
                </a>
                <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbar17">
                    <span class="navbar-toggler-icon iconsize"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar17">
                    <ul class="navbar-nav mr-auto">
                        @auth
                            @if (auth()->user()->is_admin == 1)
                                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><b class="text-uppercase">PRODUCTS</b></a></li>
                                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><b class="text-uppercase">ORDERS</b></a></li>
                            @else
                                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><b class="text-uppercase">PRODUCTS</b></a></li>
                                <cart/>
                            @endif
                        @else
                            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><b class="text-uppercase">PRODUCTS</b></a></li>
                        @endauth
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            @auth
                                <a class="navbar-brand" href="{{ route('logout') }}"><i class="fa d-inline fa-lg fa-user-circle-o"></i><b class="pl-2">Logout</b></a>
                            @else
                                <a class="navbar-brand" href="{{ route('login') }}"><i class="fa d-inline fa-lg fa-user-circle-o"></i><b class="size pl-2">Login</b></a>
                            @endauth
                        </div>
                    </div>
                    @guest
                    <div class="row">
                        <div class="col-md-12">
                            <a class="navbar-brand" href="{{ url('/register') }}"><i class="fa d-inline fa-lg fa-user-circle-o"></i><b class="size pl-2">Register</b></a>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>        
        <!-- Check if there is a success message in the session -->
        @if (session('success'))
            <div class="alert-container">
                <div class="alert alert-success" id="success-alert">
                    <span class="close-btn" onclick="closeAlert('success-alert')">&times;</span>
                    @if (is_array(session('success')))
                        <ul>
                            @foreach (session('success') as $message)
                                <li><b>{{ $message }}</b></li>
                            @endforeach
                        </ul>
                    @else
                        <p><b>{{ session('success') }}</b></p>
                    @endif
                </div>
            </div>
        @endif

        <!-- Check if there is an error message in the session -->
        @if (session('error'))
            <div class="alert-container">
                <div class="alert alert-danger" id="error-alert">
                    <span class="close-btn" onclick="closeAlert('error-alert')">&times;</span>
                    @if (is_array(session('error')))
                        <ul>
                            @foreach (session('error') as $message)
                                <li><b>{{ $message }}</b></li>
                            @endforeach
                        </ul>
                    @else
                        <p><b>{{ session('error') }}</b></p>
                    @endif
                </div>
            </div>
        @endif



        <!-- Your existing form and JavaScript code -->
        <script>
            function closeAlert(alertId) {
                $('#' + alertId).remove();
            }

            // Automatically hide success message after 5 seconds
            setTimeout(function() {
                closeAlert('success-alert');
            }, 5000);

            // Automatically hide error message after 5 seconds
            setTimeout(function() {
                closeAlert('error-alert');
            }, 5000);
        </script>
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
                    <h5><b>PARISH OFFICE HOURS</b></h5>
                    <p class="mb-0">
                        Monday to Sunday <br><br>
                        9:00 AM - 12:00 NN<br><br>
                        1:30 PM - 5:30 PM<br>
                    </p>
                </div>

                <div class="col-md-6 text-center my-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mt-3 mb-3"
                        style="width: 100px; height: 100px; margin-bottom: 10px; margin-top: 10px;">
                    <p class="mt-3">ARCHDIOCESAN SHRINE AND PARISH OF ESPIRITU SANTO</p>
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <a href="https://www.facebook.com/ASESmultimedia" target="_blank">
                            <i class="d-block fa fa-facebook-official fa-lg mr-2 my-2 text-light"></i>
                        </a>
                        <a href="about/contacts">
                            <i class="d-block fa fa-envelope text-light fa-lg mx-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 p-3 text-center">
                    <h5><b>CONTACT US</b></h5>
                    <p class="mb-0"> PLDT: 8711-13-32 <br><br> Globe: 87943-10-13
                        <br><br> Smart: 0961-762-1626 <br><br> DITO: 0993-803-7760
                    </p>
                </div>

            </div>
            <hr class="mt-4 mb-3">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2023 ASPES | All rights reserved.</p>
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
         $(document).ready(function() {
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
