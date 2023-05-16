<?php
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_SESSION['error'] = true;
    $_SESSION['msg']   = "[405] Method not Allowed";
    return header('location:login.php');
}

// catch variable 
$token    = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
$email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST['password'], FILTER_VALIDATE_INT);

if (!$token || $token !== $_SESSION['token']) {
    $_SESSION['error'] = true;
    $_SESSION['msg']   = "[405] Method not Allowed";
    return header('location:login.php');
}

$sql = sprintf(
    "SELECT * FROM t_pelamar WHERE t_pelamar.email = '%s' LIMIT 1",
    $email,
);

try {
    $query = $pdo->query($sql);
    $nr    = $query->rowCount();

    if ($nr === 0) {
        $msg = "Kamu belum terdaftar sebagai pelamar FAP AGRI Career";
        throw new ErrorException($msg, 500);
    }

    $row = $query->fetchObject();

    if ($row->status != 1) {
        $msg = "Warning status $row->status";
        throw new ErrorException($msg, 500);
    }

    if ($row->activation_code != $password) {
        $msg = "Email atau Activation Code salah, silahkan coba kembali.";
        throw new ErrorException($msg, 500);
    }

    unset($_SESSION['token']);

    $_SESSION['t_pelamar_id'] = $row->id;
    $_SESSION['email']        = $row->email;
    $_SESSION['nama_lengkap'] = $row->nama_lengkap;

    return header('location:pelamar/dashboard.php');
} catch (Exception $e) {
    $_SESSION['error'] = true;
    $_SESSION['code']  = $e->getCode();
    $_SESSION['msg']   = $e->getMessage();
    return header('location:login.php');
}
