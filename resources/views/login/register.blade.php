<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/img//register-img/logo_srg.png') }}">
    <title>
        Dispangtan Kabupaten Sragen
    </title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('backend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('backend/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
        .input-group-text {
            border: none;
            background: transparent;
            cursor: pointer;
        }
    </style>
</head>

<body class="">
    <main class="main-content mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('{{ asset('backend/assets/img/register-img/banner.jpg') }}">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Selamat Datang</h1>
                            <p class="text-lead text-white">Dinas Ketahanan Pangan, Pertanian dan Perikanan Kabupaten
                                Sragen</p>
                            @if ($errors->any())
                                <div class="alert-notification">
                                    <div
                                        class="alert alert-danger  d-flex align-items-center gap-3 d-inline text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 256 256">
                                            <path fill="currentColor"
                                                d="M142 176a6 6 0 0 1-6 6a14 14 0 0 1-14-14v-40a2 2 0 0 0-2-2a6 6 0 0 1 0-12a14 14 0 0 1 14 14v40a2 2 0 0 0 2 2a6 6 0 0 1 6 6Zm-18-82a10 10 0 1 0-10-10a10 10 0 0 0 10 10Zm106 34A102 102 0 1 1 128 26a102.12 102.12 0 0 1 102 102Zm-12 0a90 90 0 1 0-90 90a90.1 90.1 0 0 0 90-90Z" />
                                        </svg>

                                        <ul class="my-0 " style="list-style-type: none;">
                                            @foreach ($errors->all() as $error)
                                                <li style="text-align: start">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Register</h5>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input required type="text" class="form-control" placeholder="Name"
                                            aria-label="Name" aria-describedby="email-addon" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <input required type="email" class="form-control" placeholder="Email"
                                            aria-label="Email" aria-describedby="email-addon" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input required type="password" id="password" class="form-control"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon" name="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="password-addon">
                                                    <i class="fas fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input required type="password" id="confirmPassword" class="form-control"
                                                placeholder="Confirm Password" aria-label="Confirm Password"
                                                aria-describedby="confirm-addon" name="password_confirmation">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="confirm-addon">
                                                    <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Saya menyetujui <a href="javascript:;"
                                                class="text-dark font-weight-bolder">Syarat dan Ketentuan</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-dark w-100 my-4 mb-2">Daftar</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Sudah Mempunyai Akun? <a href="/login"
                                            class="text-dark font-weight-bolder">Login</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('togglePassword').addEventListener('click', function(e) {
                // Toggle the type attribute
                const password = document.getElementById('password');
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });

            document.getElementById('toggleConfirmPassword').addEventListener('click', function(e) {
                // Toggle the type attribute
                const confirmPassword = document.getElementById('confirmPassword');
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);

                // Toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });
        });

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

</html>
