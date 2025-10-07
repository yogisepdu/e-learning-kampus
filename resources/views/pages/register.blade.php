<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Sign up | Mantis Bootstrap 5 Admin Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ini merupakan e-learning kampus.">
    <meta name="keywords" content=" Bootstrap, Admin, e-learning, kampus, garuda cyber indonesia, garuda institute">
    <meta name="author" content="Garuda Cyber Indonesia">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address*</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Ulangi Password" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">Pilih Role Akun</label>
                                <div class="col-lg-6 col-md-11 col-sm-12">
                                    <select class="form-control" name="role" id="role">
                                        <option selected disabled>Select Option</option>
                                        <option value="student">Mahasiswa</option>
                                        <option value="lecturer">Dosen</option>
                                    </select>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#"
                                    class="text-primary"> Terms of Service </a> and <a href="#"
                                    class="text-primary">
                                    Privacy Policy</a></p>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="auth-footer row">
                    <!-- <div class=""> -->
                    <div class="col my-1">
                        <p class="m-0">Copyright © <a href="#">Garuda Cyber Indonesia</a></p>
                    </div>
                    <div class="col-auto my-1">
                        <ul class="list-inline footer-link mb-0">
                            <li class="list-inline-item"><a href="#">Home</a></li>
                            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

    <script>
        layout_change('light');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change("preset-1");
    </script>

    <script>
        font_change("Public-Sans");
    </script>

</body>
<!-- [Body] end -->

</html>
