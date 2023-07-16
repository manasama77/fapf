<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('login_assets/fonts/icomoon/style.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('login_assets/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login_assets/css/style.css') }}">

    <title>Login Pelamar &mdash; FAP AGRI Career</title>
</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('login_assets/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <img src="{{ asset('images/fap-agri-career-navbar.png') }}" alt="FAP-Agri career logo">
                            <h3 class="mt-2">Login Pelamar</h3>
                        </div>

                        <!-- Alert -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-dark">
                                            <b>{{ $error }}</b>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login.auth') }}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="30"
                                    autocomplete="email" required />

                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Login Code</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    maxlength="8" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-warning">
                                <i class="fa-solid fa-right-to-bracket fa-fw"></i> Log In
                            </button>
                            <a href="/" class="btn btn-block btn-secondary text-white pt-3 text-decoration-none">
                                <i class="fa-solid fa-home fa-fw"></i> Kembali ke beranda
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <script src="{{ asset('login_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('login_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_assets/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
