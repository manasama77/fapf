<?php
session_start();
require('constants.php');

$_SESSION['token'] = md5(uniqid(mt_rand(), true));
?>
<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://career.fap-agri.com/public/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login_assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="login_assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login_assets/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="login_assets/css/style.css">

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
                            <img src="images/fap-agri-career-navbar.png" alt="FAP-Agri career logo">
                            <h3 class="mt-2">Login Pelamar</h3>
                            <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                        </div>

                        <!-- Alert -->
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $_SESSION['msg'];

                                unset($_SESSION['error']);
                                unset($_SESSION['msg']);
                                ?>
                            </div>
                        <?php } ?>

                        <form action="auth.php" method="post">
                            <input type="hidden" id="token" name="token" value="<?= $_SESSION['token'] ?? ''; ?>" />
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" maxlength="30" required />

                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Login Code</label>
                                <input type="password" class="form-control" id="password" name="password" maxlength="100" required>
                            </div>

                            <!-- <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div> -->
                            <button type="submit" class="btn btn-block btn-warning">
                                <i class="fa-solid fa-right-to-bracket fa-fw"></i> Log In
                            </button>
                            <a href="<?= APP_URL; ?>" class="btn-block" style="text-decoration: none;">
                                <button type="button" class="btn btn-block btn-secondary text-white">
                                    <i class="fa-solid fa-home fa-fw"></i> Kembali ke beranda
                                </button>
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <script src="login_assets/js/jquery-3.3.1.min.js"></script>
    <script src="login_assets/js/popper.min.js"></script>
    <script src="login_assets/js/bootstrap.min.js"></script>
    <script src="login_assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>