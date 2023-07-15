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
    "SELECT * FROM t_pelamar WHERE t_pelamar.email = '%s' AND t_pelamar.login_code = '%s' LIMIT 1",
    $email,
    $password
);

try {
    $query = $pdo->query($sql);
    $nr    = $query->rowCount();

    if ($nr === 0) {
        $msg = "Kamu belum terdaftar sebagai pelamar FAP AGRI Career";
        throw new ErrorException($msg, 500);
    }

    $row = $query->fetchObject();

    if ((int) $row->status != 3) {
        if ((int) $row->status == 0) {
            $msg = "Lamaran ditolak";
        } elseif ((int) $row->status == 1) {
            $msg = "Lamaran sedang dalam proses pengecekan";
        } elseif ((int) $row->status == 2) {
            $msg = "Lamaran sedang dalam proses pengecekan";
        } elseif (in_array((int) $row->status, [4, 5, 6, 7])) {
            $msg = "Lamaran sudah diterima, kamu tidak perlu melengkapi data kembali";
        } else {
            $msg = "Warning unknown status $row->status, please contact admin";
        }
        throw new ErrorException($msg, 500);
    }

    unset($_SESSION['token']);

    $_SESSION['t_pelamar_id'] = $row->id;
    $_SESSION['email']        = $row->email;
    $_SESSION['nama_lengkap'] = $row->nama_lengkap;
    session_write_close();
    header('location:pelamar/dashboard.php');
} catch (Exception $e) {
    $_SESSION['error'] = true;
    $_SESSION['code']  = $e->getCode();
    $_SESSION['msg']   = $e->getMessage();
    session_write_close();
    header('location:login.php');
}
