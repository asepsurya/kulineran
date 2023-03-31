<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/fav.png') }}">
    <title>eFoody | Food & Delivery</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick-theme.min.css') }}" />
    
    {{-- midtrans --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-YQi0trqdcN4uV-M3"></script>
    <!-- Feather Icon-->
    <link href="{{ asset('vendor/icons/feather.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="{{ asset('vendor/sidebar/demo.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Include base CSS (optional) -->

    
    <style>
        .form-rounded {
            border-radius: 1rem;
        }

        /*the container must be positioned relative:*/
        .autocomplete {

            position: relative;
            display: inline-block;
        }
        .autocomplete-items {

            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {

            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
    </style>
</head>

<body class="fixed-bottom-bar">
    @include('front_page.partial.header')
    <div class="osahan-home-page">
        <div class="bg-primary p-3 d-none">
            <div class="text-white">
                <div class="title d-flex align-items-center">
                    <a class="toggle" href="#">
                        <span></span>
                    </a>
                    <a href="/" class="brand-wrap mb-0">
                        <img alt="#" class="img-fluid" src="{{ asset('img/logo2-white.png') }}">
                    </a>
                    <a class="text-white font-weight-bold ml-auto" data-toggle="modal" data-target="#exampleModal"
                        href="#">Filter</a>
                </div>
            </div>
            <div class=" col-12 py-5">
                <form action="/search" method="get">
                    <div class="autocomplete" style="width:100%;">
                        <div class="input-group rounded shadow-sm ">
                            <div class="input-group-prepend">
                                <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
                            </div>
                            <input type="text" class="shadow-none border-0 form-control typeahead" placeholder="Mau Cari Apa Bro..." id="search"  name="search" value="{{ old('search') }}">
                            <button type="submit" hidden></button>
                        </div>                          
                    </div>
                  </form>
            </div>
        </div>
            @yield('container')     
    </div>

    @include('front_page.partial.footer')
    {{-- @include('front_page.partial.menus') --}}
    @include('BackEnd.partial.alert')
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="{{ asset('vendor/sidebar/hc-offcanvas-nav.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="{{ asset('js/osahan.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

</body>

</html>