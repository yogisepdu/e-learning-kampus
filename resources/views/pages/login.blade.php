<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | E-Learning Kampus</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ini merupakan e-learning kampus.">
    <meta name="keywords" content=" Bootstrap, Admin, e-learning, kampus, garuda cyber indonesia, garuda institute">
    <meta name="author" content="Garuda Cyber Indonesia">

    <!-- [Favicon] icon -->
    <link rel="icon" href={{ asset('assets/images/favicon.svg') }} type="image/x-icon">
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
                        <div class="d-flex justify-content-between align-items-end mb-4">
                            <h3 class="mb-0"><b>Login</b></h3>
                            <a href="{{ route('signup') }}" class="link-primary">Don't have an account?</a>
                        </div>

                        <form id="loginForm">
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address"
                                    required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>

                            <div class="d-flex mt-1 justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" name="remember"
                                        id="customCheckc1">
                                    <label class="form-check-label text-muted" for="customCheckc1">Keep me signed
                                        in</label>
                                </div>
                                <a href="#" class="text-secondary f-w-400">Forgot Password?</a>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="auth-footer row">
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

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = {
                email: this.email.value,
                password: this.password.value
            };

            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            let data = await response.json();

            if (response.ok) {
                // Simpan token di localStorage
                localStorage.setItem('auth_token', data.access_token);
                localStorage.setItem('user_role', data.user.role);

                // Redirect ke dashboard
                console.log('Login successful. Redirecting to dashboard...');
                window.location.href = '/home';
            } else {
                // Tampilkan error
                alert(data.message || 'Login failed. Please try again.');
            }
        });
    </script>

</body>
<!-- [Body] end -->

</html>
