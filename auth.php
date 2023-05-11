<?php
require('koneksi.php');

// catch variable 
$email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

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

    echo "berhasil login";
    exit;
} catch (PDOException $e) {
    $_SESSION['error'] = true;
    $_SESSION['msg']   = $e->getMessage();
    return header('location:login.php');
}
