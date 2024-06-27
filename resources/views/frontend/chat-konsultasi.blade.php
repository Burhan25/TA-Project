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
    <link rel="stylesheet" href="{{ asset('frontend/css/chat-konsultasi.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/image-uploader.min.css') }}">
    <!--Material Design Iconic Font-->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
        <div class="d-flex flex-wrap p-5 justify-center">
            <div class="card w-1/2 h-fit" style="max-width: 100%;">
                <div class="chat">
                    <h3 class="mb-3 text-lg font-bold">{{ $chat->title }}</h3>
                    <div class="chat-message clearfix">
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0">
                            @foreach ($chat->messages as $message)
                                @if ($message->user->role == auth()->user()->role)
                                    <li class="clearfix">
                                        <div class="message-data text-right float-right">
                                            <span
                                                class="message-data-time d-flex items-center gap-3 justify-end">{{ $message->created_at }},
                                                {{ $message->user->name }} <img
                                                    src= "https://placehold.co/50x50?text=U" alt=""></span>
                                        </div>
                                        <div class="message other-message float-right ">{{ $message->message }}</div>
                                        <div class="d-flex justify-between flex-wrap w-full my-3">
                                            @foreach ($message->images as $image)
                                                <div class="w-1/2">
                                                    <img style="width: 100%"
                                                        src="{{ route('image.show', ['imageName' => $image->name]) }}"
                                                        alt="img">
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                @else
                                    <li class="clearfix">
                                        <div class="message-data">
                                            <span
                                                class="message-data-time float-left d-flex items-center gap-3 justify-start">{{ $message->created_at }},
                                                {{ $message->user->name }} <img
                                                    src= "https://placehold.co/50x50?text=U" alt=""></span>
                                        </div>
                                        <div class="message my-message text-left">{{ $message->message }}</div>
                                        <div class="d-flex justify-between flex-wrap w-full my-3">
                                            @foreach ($message->images as $image)
                                                <div class="w-1/2">
                                                    <img style="width: 100%"
                                                        src="{{ route('image.show', ['imageName' => $image->name]) }}"
                                                        alt="img">
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @if (auth()->user()->role == 'dokter' || auth()->user()->id == $chat->user->id)
                        <form action="{{ route('konsultasi.message.post', $chat->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="chat-message d-flex">
                                <textarea name="message" id="message" rows="2" placeholder="Masukan Pesan Anda" class="form-control"
                                    required></textarea>
                                <button type="submit"
                                    class="ms-5 text-white bg-green-700 hover:bg-green-800  focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700"><i
                                        class="fa fa-paper-plane"></i></button>
                            </div>
                            <div class="input-field">
                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            {{-- <div class="d-flex justify-start flex-wrap w-2/6">
                <p>i</p>
            </div> --}}

        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend/js/image-uploader.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.input-images-1').imageUploader({
                    label: 'Image attachment',
                });
                $('.iui-cloud-upload').addClass('fa').addClass('fa-upload').removeClass('iui-cloud-upload');
                $('input[name="images[]"]').on('change', function() {
                    $('.iui-close').addClass('fa').addClass('fa-close').removeClass('iui-close');
                })
                $("html, body").animate({
                    scrollTop: $(document).height() - $(window).height() - 50
                });
                $(".chat-history").animate({
                    scrollTop: $(".chat-history")[0].scrollHeight - $(".chat-history").height()
                });

                $('.page-item.active .page-link').css('background-color','#009669')
                $('.page-item.active .page-link').css('border-color','#009669')
                $('.page-link').css('color','#009669')
                $('.page-item.active .page-link').css('color','#FFFFFF')
            });

            function logout() {
                const form = document.getElementById("logout");
                form.submit();
            }
        </script>
    </body>

</html>
