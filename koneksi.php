<?php
session_start();
$hostName     = "localhost";
$userName     = "u1673034_hrm";
$password     = "hrm@212#";
$databaseName = "u1673034_hrm";
$conn         = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Koneksi ke database gagal : " . $conn->connect_error);
}

$pdo = new PDO("mysql:host=$hostName;dbname=$databaseName", $userName, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function validasiAuth($pdo)
{
  if (!isset($_SESSION['t_pelamar_id']) && !isset($_SESSION['email'])) {
    logout();
  }

  $sql = sprintf(
    "SELECT * FROM t_pelamar WHERE t_pelamar.id = '%s' and t_pelamar.email = '%s' LIMIT 1",
    $_SESSION['t_pelamar_id'],
    $_SESSION['email']
  );

  $query = $pdo->query($sql);
  $nr    = $query->rowCount();

  if ((int) $nr == 0) {
    $msg = "Kamu belum terdaftar sebagai pelamar FAP AGRI Career";
    logout($msg);
  }

  $row = $query->fetchObject();

  if ($row->status != 3) {
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
    logout($msg);
  }

  return true;
}

function logout($msg = "Sesi Berakhir, silahkan login kembali...")
{
  unset(
    $_SESSION['t_pelamar_id'],
    $_SESSION['email'],
    $_SESSION['nama_lengkap'],
  );

  $_SESSION['error'] = true;
  $_SESSION['code']  = 500;
  $_SESSION['msg']   = $msg;
  return header('location:../login.php');
}
