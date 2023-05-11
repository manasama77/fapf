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
$password = filter_input(INPUT_POST, $_POST['password'], FILTER_SANITIZE_STRING);

if (!$token || $token !== $_SESSION['token']) {
    $_SESSION['error'] = true;
    $_SESSION['msg']   = "[405] Method not Allowed";
    return header('location:login.php');
}

$sql = sprintf(
    "SELECT * FROM t_account_pelamar WHERE t_account_pelamar.email = '%s' AND t_account_pelamar.deleted_at IS NULL LIMIT 1",
    $email,
);

try {
    $query = $pdo->query($sql);
    $nr    = $query->rowCount();

    if ($nr === 0) {
        $_SESSION['error'] = true;
        $_SESSION['msg']   = "Kamu belum terdaftar sebagai peserta FAP AGRI Career";
        return header('location:login.php');
    }

    $row = $query->fetchObject();

    // compare password
    if (!password_verify($password, $row->password)) {
        $_SESSION['error'] = true;
        $_SESSION['msg']   = "Email atau Password Salah, silahkan coba kembali.";
        return header('location:login.php');
    }

    unset($_SESSION['token']);
    $_SESSION['email']        = $row->email;
    $_SESSION['nama_lengkap'] = $row->nama_lengkap;

    echo '<pre>' . print_r($_SESSION, 1) . '</pre>';

    echo "berhasil login";
    exit;
} catch (PDOException $e) {
    $_SESSION['error'] = true;
    $_SESSION['msg']   = $e->getMessage();
    return header('location:login.php');
}
