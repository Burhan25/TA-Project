<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dispangtan Kabupaten Sragen </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/logo_srg.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/icofont.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontendcss/owl-carousel.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/datepicker.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/card-konsultasi.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/card-paramedik.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>
    <!-- Header Area -->
    <header class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <!-- Start Logo -->
                            <div class="logo">
                                <a href="/home"><img src="{{ asset('frontend/img/logo.jpg') }}" alt="#"></a>
                            </div>
                            <!-- End Logo -->

                            <!-- Mobile Nav -->
                            <div class="mobile-nav"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <!-- Main Menu -->
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="/home">Home</a>
                                        </li>
                                        <li><a href="/client-panduan">Panduan</a>
                                        </li>
                                        <li><a href="/client-paramedik">Paramedik Veteriner</a>
                                        </li>
                                        <li><a href="/blog">Blog</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="get-quote">
                                @auth
                                    <form action="{{ route('logout') }}" method="POST" id="logout">
                                        @csrf
                                    </form>
                                    <a class="btn cursor-pointer text-white" onclick="logout()">LOGOUT</a>
                                @endauth
                                @guest
                                    <a href="/konsultasi" class="btn cursor-pointer text-white">Konsultasi</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!-- End Header Area -->

    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2>Layanan Konsultasi Kesehatan Hewan</h2>
                        <ul class="bread-list">
                            <li><a href="/home">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Konsultasi </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->


    <body>
        <div class="dropdown mt-3 " style="justify-content: left; display: flex; ">
            <button
                class="text-black border-green-700 bg-white hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700"
                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Layanan Konsultasi <span class="ms-3"><i class="fa fa-chevron-down text-gray-500"></i></span>
            </button>
            <!-- Button trigger modal -->
            @if (auth()->user()->role == 'user')
                <button type="button"
                    class="ms-5 text-white bg-green-700 hover:bg-green-800  focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Mulai Konsultasi
                </button>
            @endif

            <ul class="dropdown-menu w-auto" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item cursor-pointer" onclick="RefreshPage('Dinas')">Layanan Konsultasi
                        Pelayanan Dinas</a></li>
                <li><a class="dropdown-item cursor-pointer" onclick="RefreshPage('Kucing')">Layanan Konsultasi Hewan
                        Kucing</a></li>
                <li><a class="dropdown-item cursor-pointer" onclick="RefreshPage('Sapi')">Layanan Konsultasi Hewan
                        Sapi</a></li>
                <li><a class="dropdown-item cursor-pointer" onclick="RefreshPage('Kambing')">Layanan Konsultasi Hewan
                        Kambing</a></li>
            </ul>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <form action="{{ route('konsultasi.create') }}" method="POST">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konsultasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label text-black font-bold">Topik
                                        Konsultasi</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Masukkan topik konsultasi" required>
                                </div>
                                <div class="mb-3">
                                    <p>
                                        <label for="category" class="form-label text-black font-bold">Layanan
                                            Konsultasi</label>
                                    </p>
                                    <select id="category" name="category"
                                        class="form-select form-select-sm block w-full" required>
                                        <option value="Dinas">Layanan Konsultasi Pelayanan Dinas</option>
                                        <option value="Kucing">Layanan Konsultasi Hewan Kucing</option>
                                        <option value="Sapi">Layanan Konsultasi Hewan Sapi</option>
                                        <option value="Kambing">Layanan Konsultasi Hewan Kambing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                    class="text-white bg-green-700 hover:bg-green-800  focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700">Mulai</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-around flex-wrap gap-7 p-5">
            @foreach ($chats as $chat)
                <div
                    class="max-w-sm h-fit p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="d-flex justify-end mb-3">
                        @if ($chat->replied)
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Sudah
                                dijawab</span>
                        @else
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Belum
                                dijawab</span>
                        @endif
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">
                        {{ $chat->title }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2">
                        {{ $chat->messages->first()->message ?? 'Belum memulai konsultasi' }}</p>
                    <p class="mb-3">Oleh {{ $chat->user->name }} pada {{ $chat->created_at }}</p>
                    <a href="{{ route('konsultasi.view', $chat->id) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Tampilkan
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-center pb-5">
            {{ $chats->appends($_GET)->links() }}
        </div>
        <!-- Bootstrap JS and dependencies (Popper.js) -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script>

            $(document).ready(function(){
                $('.page-item.active .page-link').css('background-color','#009669')
                $('.page-item.active .page-link').css('border-color','#009669')
                $('.page-link').css('color','#009669')
                $('.page-item.active .page-link').css('color','#FFFFFF')
            });
            function RefreshPage(queryString) {
                var newUrl = window.location.origin + window.location.pathname + "?category=" + queryString;
                window.location.href = newUrl;
                return false;
            }

            function logout() {
                const form = document.getElementById("logout");
                form.submit();
            }
        </script>
    </body>

</html>
