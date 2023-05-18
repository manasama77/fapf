<?php
require("koneksi.php");
require_once('constants.php');
require_once('class/C_list_job.php');

if (!$_GET['id']) {
    session_destroy();
    header("Location:" . APP_URL . "/job-list.php");
}

$id = $_GET['id'];

$c_list_jobs = new CListJob($conn);
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
    return header('Location:' . APP_URL . '/job-apply.php?id=' . $id);
}

if (isset($_POST['submit'])) {
    $target_dir  = 'upload/pelamar/' . date('Y-m-d') . '-' . $_POST['fname'] . ' ' . $_POST['lname'] . "/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $cv_filename = basename(time() . '-CV-' . $_POST['fname'] . ' ' . $_POST['lname'] . '.' . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    $cv_file = $target_dir . $cv_filename;

    $surat_lamaran_filename        = basename(time() . '-SURAT LAMARAN-' . $_POST['fname'] . ' ' . $_POST['lname'] . '.' . pathinfo($_FILES["file_surat"]["name"], PATHINFO_EXTENSION));
    $surat_lamaran_file = $target_dir . $surat_lamaran_filename;

    if (file_exists($cv_file)) {
        $msg                  = "File CV already exist, please rename the file or try another file...";
        $_SESSION['err_file'] = $msg;
        $_SESSION['old']      = $_POST;
        return header('Location:' . APP_URL . '/job-apply.php' . $id);
    } elseif (!move_uploaded_file($_FILES["file"]["tmp_name"], $cv_file)) {
        $msg                  = "Upload CV Failed, please try reupload again...";
        $_SESSION['err_file'] = $msg;
        $_SESSION['old']      = $_POST;
        return header('Location:' . APP_URL . '/job-apply.php' . $id);
    }

    if (file_exists($surat_lamaran_file)) {
        $msg                        = "File Application Letter already exist, please rename the file or try another file...";
        $_SESSION['err_file_surat'] = $msg;
        $_SESSION['old']            = $_POST;
        return header('Location:' . APP_URL . '/job-apply.php' . $id);
    } elseif (!move_uploaded_file($_FILES["file_surat"]["tmp_name"], $surat_lamaran_file)) {
        $msg                        = "Upload Application Letter Failed, please try reupload again...";
        $_SESSION['err_file_surat'] = $msg;
        $_SESSION['old']            = $_POST;
        return header('Location:' . APP_URL . '/job-apply.php' . $id);
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
    $status             = 1;
    $lokasi_univ        = $_POST['lokasi_univ'];
    $pengalaman         = $_POST['pengalaman'];
    $pengalaman_kebun   = $_POST['pengalaman_kebun'];
    $lokasi_kalimantan  = $_POST['lokasi_kalimantan'];
    $file_cv            = $cv_filename;
    $file_surat         = $surat_lamaran_filename;

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
        activation_code,
        login_code,
        t_job_vacant_id,
        path_foto,
        path_ktp,
        path_akta_kelahiran,
        path_ijasah,
        path_transkrip_nilai,
        path_setifikat_pelatihan,
        path_surat_pengalaman_kerja,
        path_slip_gaji,
        path_npwp,
        path_bpjs_tk,
        path_bpjs_kesehatan,
        path_buku_tabungan,
        path_buku_nikah,
        path_sertifikat_vaksin,
        path_skck
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
        null,
        null,
        $id,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null
    )";

    $query = $conn->query($sql);

    if (!$query) {
        $msg             = "Terjadi kesalahan dengan server silahkan coba kembali...";
        $_SESSION['err'] = $msg;
        $_SESSION['old'] = $_POST;
        return header('Location:' . APP_URL . '/job-apply.php?id=' . $id);
    }

    $conn->close();
    session_destroy();
    return header('Location:' . APP_URL . '/job-apply-finish.php');

    // echo $sql;
    // exit;
}
