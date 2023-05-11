<?php
session_start();
require("koneksi.php");
require_once('constants.php');
require_once('class/c_list_job.php');

if (!$_GET['id']) {
    session_destroy();
    header("location:job-list.php");
}

$id = $_GET['id'];

$c_list_jobs = new CListJob();
$job         = $c_list_jobs->show($id);

$posisi     = $job['kode_jabatan'];
$penempatan = $job['lokasi'];

//validasi
$error = 0;
if (empty($_POST['fname'])) {
    $msg                   = "First Name Required";
    $_SESSION['err_fname'] = $msg;
    $error                 = 1;
} elseif (empty($_POST['lname'])) {
    $msg                   = "Last Name Required";
    $_SESSION['err_fname'] = $msg;
    $error                 = 1;
} elseif (empty($_POST['jk'])) {
    $msg                   = "Jenis Kelamin Required";
    $_SESSION['err_fname'] = $msg;
    $error                 = 1;
} elseif (empty($_POST['national'])) {
    $msg                      = "Nationality Required";
    $_SESSION['err_national'] = $msg;
    $error                    = 1;
} elseif (empty($_POST['tempat_lahir'])) {
    $msg                          = "Place Of Birth Required";
    $_SESSION['err_tempat_lahir'] = $msg;
    $error                        = 1;
} elseif (empty($_POST['tgl_lahir'])) {
    $msg                       = "Date Of Birth Required";
    $_SESSION['err_tgl_lahir'] = $msg;
    $error                     = 1;
} elseif (empty($_POST['alamat'])) {
    $msg                       = "Current Address Required";
    $_SESSION['err_alamat'] = $msg;
    $error                     = 1;
} elseif (empty($_POST['email'])) {
    $msg                       = "Email Required";
    $_SESSION['err_email'] = $msg;
    $error                     = 1;
} elseif (empty($_POST['hp'])) {
    $msg                       = "Mobile Number Required";
    $_SESSION['err_hp'] = $msg;
    $error                     = 1;
} elseif (empty($_POST['pendidikan'])) {
    $msg                        = "Highest Education Degree Required";
    $_SESSION['err_pendidikan'] = $msg;
    $error                      = 1;
} elseif (empty($_POST['jurusan'])) {
    $msg                     = "Major Required";
    $_SESSION['err_jurusan'] = $msg;
    $error                   = 1;
} elseif (empty($_POST['ipk'])) {
    $msg                 = "GPA/IPK Required";
    $_SESSION['err_ipk'] = $msg;
    $error               = 1;
} elseif (empty($_POST['max_ipk'])) {
    $msg                     = "Max GPA/IPK Required";
    $_SESSION['err_max_ipk'] = $msg;
    $error                   = 1;
} elseif (empty($_POST['status_universitas'])) {
    $msg                                = "Status Universitas Required";
    $_SESSION['err_status_universitas'] = $msg;
    $error                              = 1;
} elseif (empty($_POST['lokasi_univ'])) {
    $msg                         = "Lokasi Universitas Required";
    $_SESSION['err_lokasi_univ'] = $msg;
    $error                       = 1;
} elseif (empty($_POST['jurusan_sawit'])) {
    $msg                           = "Jurusan berkaitan dengan Sawit Required";
    $_SESSION['err_jurusan_sawit'] = $msg;
    $error                         = 1;
} elseif (empty($_POST['pengalaman'])) {
    $msg                        = "Tahun Pengalaman Kerja Required";
    $_SESSION['err_pengalaman'] = $msg;
    $error                      = 1;
} elseif (empty($_POST['pengalaman_kebun'])) {
    $msg                              = "Tahun Pengalaman Kerja di Perkebunan Required";
    $_SESSION['err_pengalaman_kebun'] = $msg;
    $error                            = 1;
} elseif (empty($_POST['lokasi_kalimantan'])) {
    $msg                               = "Bersedia ditempatkan di Kalimantan Required";
    $_SESSION['err_lokasi_kalimantan'] = $msg;
    $error                             = 1;
}

if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
    $msg                  = "File CV Required";
    $_SESSION['err_file'] = $msg;
    $error                = 1;
} elseif (isset($_FILES['file'])) {
    if ($_FILES['file']['size'] > 3145728) {
        $msg                  = "File CV Size more then 3 MB Required";
        $_SESSION['err_file'] = $msg;
        $error                = 1;
    }
}

if (!file_exists($_FILES['file_surat']['tmp_name']) || !is_uploaded_file($_FILES['file_surat']['tmp_name'])) {
    $msg                        = "File Application Letter Required";
    $_SESSION['err_file_surat'] = $msg;
    $error                      = 1;
} elseif (isset($_FILES['file_surat'])) {
    if ($_FILES['file_surat']['size'] > 3145728) {
        $msg                        = "File Application Letter Size more then 3 MB Required";
        $_SESSION['err_file_surat'] = $msg;
        $error                      = 1;
    }
}

if ($error == 1) {
    $_SESSION['old'] = $_POST;
    return header('location: job-apply.php?id=' . $id);
}

if (isset($_POST['submit'])) {

    $target_dir  = "upload/file_cv/";
    $cv_filename = basename(time() . $_FILES["file"]["name"]);
    $target_file = $target_dir . $cv_filename;

    $target_dir_surat  = "upload/file_surat/";
    $file_surat        = basename(time() . $_FILES["file_surat"]["name"]);
    $target_file_surat = $target_dir_surat . $file_surat;

    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $msg                  = "Upload CV Failed, please try reupload again...";
        $_SESSION['err_file'] = $msg;
        $_SESSION['old']      = $_POST;
        return header('location: job-apply.php' . $id);
    } elseif (!move_uploaded_file($_FILES["file_surat"]["tmp_name"], $target_file_surat)) {
        $msg                        = "Upload Application Letter Failed, please try reupload again...";
        $_SESSION['err_file_surat'] = $msg;
        $_SESSION['old']            = $_POST;
        return header('location: job-apply.php' . $id);
    } elseif (file_exists($target_file)) {
        $msg                  = "File CV already exist, please rename the file or try another file...";
        $_SESSION['err_file'] = $msg;
        $_SESSION['old']      = $_POST;
        return header('location: job-apply.php' . $id);
    } elseif (file_exists($target_file_surat)) {
        $msg                        = "File Application Letter already exist, please rename the file or try another file...";
        $_SESSION['err_file_surat'] = $msg;
        $_SESSION['old']            = $_POST;
        return header('location: job-apply.php' . $id);
    }

    $tgl_input          = date("Y-m-d H:i:s");
    $fname              = $_POST['fname'];
    $lname              = $_POST['lname'];
    $nama_lengkap       = $_POST['fname'] . ' ' . $_POST['lname'];
    $jk                 = $_POST['jk'];
    $national           = $_POST['national'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $tgl_lahir          = $_POST['tgl_lahir'];
    $alamat             = $_POST['alamat'];
    $email_address      = $_POST['email'];
    $email              = $_POST['email'];
    $hp                 = $_POST['hp'];
    $pendidikan         = $_POST['pendidikan'];
    $jurusan            = $_POST['jurusan'];
    $jurusan_sawit      = $_POST['jurusan_sawit'];
    $ipk                = $_POST['ipk'];
    $max_ipk            = $_POST['max_ipk'];
    $status_universitas = $_POST['status_universitas'];
    $status             = 0;
    $lokasi_univ        = $_POST['lokasi_univ'];
    $pengalaman         = $_POST['pengalaman'];
    $pengalaman_kebun   = $_POST['pengalaman_kebun'];
    $lokasi_kalimantan  = $_POST['lokasi_kalimantan'];
    $file_cv            = $_FILES["file"]["name"];
    $file_surat         = $_FILES["file_surat"]["name"];

    $sql = "
    INSERT INTO t_pelamar 
    (
        tgl_input,
        email_address,
        email,
        nama_lengkap,
        fname,
        lname,
        jk,
        national,
        hp,
        tempat_lahir,
        tgl_lahir,
        alamat,
        provinsi,
        kota,
        pendidikan,
        universitas,
        status_universitas,
        lokasi_univ,
        jurusan,
        jurusan_sawit,
        ipk,
        max_ipk,
        posisi,
        status_pernikahan,
        nama_ayah,
        pekerjaan_ayah,
        nama_ibu,
        pekerjaan_ibu,
        penempatan,
        motivasi,
        tujuan,
        kelebihan,
        kekurangan,
        file_cv,
        file_surat,
        fileupload,
        fileupload2,
        izin_orang_tua,
        pendaftaran,
        setuju_orang_tua,
        tgl_update,
        updated_by,
        status,
        keterangan0,
        keterangan1,
        keterangan2,
        keterangan3,
        keterangan4,
        keterangan5,
        keterangan6,
        keterangan7,
        pengalaman,
        pengalaman_kebun,
        lokasi_kalimantan,
        tgl_interview,
        activation_code
    ) VALUES (
        '$tgl_input',
        '$email_address',
        '$email',
        '$nama_lengkap',
        '$fname',
        '$lname',
        '$jk',
        '$national',
        '$hp',
        '$tempat_lahir',
        '$tgl_lahir',
        '$alamat',
        null,
        null,
        '$pendidikan',
        '',
        '$status_universitas',
        '$lokasi_univ',
        '$jurusan',
        '$jurusan_sawit',
        '$ipk',
        '$max_ipk',
        '$posisi',
        null,
        null,
        null,
        null,
        null,
        '$penempatan',
        null,
        null,
        null,
        null,
        '$file_cv',
        '$file_surat',
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        '$status',
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        '$pengalaman',
        '$pengalaman_kebun',
        '$lokasi_kalimantan',
        null,
        null
    )";

    $query = $conn->query($sql);

    if (!$query) {
        $msg             = "Terjadi kesalahan dengan server silahkan coba kembali...";
        $_SESSION['err'] = $msg;
        $_SESSION['old'] = $_POST;
        return header('location: job-apply.php' . $id);
    }

    $conn->close();
    session_destroy();
    return header('location:job-apply-finish.php');

    // echo $sql;
    // exit;
}
