<?php
require('../koneksi.php');
require_once('../constants.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_SESSION['error'] = true;
    $_SESSION['msg']   = "[405] Method not Allowed";
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

validasiAuth($pdo);
unset($_SESSION['wrong']);

// define variable
$msg   = null;
$error = 0;


function unsetData($item, $key)
{
    if (strpos($key, 'err') !== false) {
        unset($_SESSION[$key]);
    }
}
array_walk_recursive($_SESSION, 'unsetData');

// catch and validate variable 
$token    = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
if (!file_exists($_FILES['path_foto']['tmp_name']) || !is_uploaded_file($_FILES['path_foto']['tmp_name'])) {
    $msg                       = "File Foto Required";
    $_SESSION['err_path_foto'] = $msg;
    $error                     = 1;
}
if (isset($_FILES['path_foto']) && $_FILES['path_foto']['size'] > 3145728) {
    $msg                       = "File Foto Size more then 3 MB Required";
    $_SESSION['err_path_foto'] = $msg;
    $error                     = 0;
}

if (!file_exists($_FILES['path_ktp']['tmp_name']) || !is_uploaded_file($_FILES['path_ktp']['tmp_name'])) {
    $msg                      = "File KTP Required";
    $_SESSION['err_path_ktp'] = $msg;
    $error                    = 1;
}
if (isset($_FILES['path_ktp']) && $_FILES['path_ktp']['size'] > 3145728) {
    $msg                      = "File KTP Size more then 3 MB Required";
    $_SESSION['err_path_ktp'] = $msg;
    $error                    = 1;
}

if (!file_exists($_FILES['path_akta_kelahiran']['tmp_name']) || !is_uploaded_file($_FILES['path_akta_kelahiran']['tmp_name'])) {
    $msg                                 = "File Akta Kelahiran Required";
    $_SESSION['err_path_akta_kelahiran'] = $msg;
    $error                               = 1;
}
if (isset($_FILES['path_akta_kelahiran']) && $_FILES['path_akta_kelahiran']['size'] > 3145728) {
    $msg                                 = "File Akta Kelahiran Size more then 3 MB Required";
    $_SESSION['err_path_akta_kelahiran'] = $msg;
    $error                               = 1;
}

if (!file_exists($_FILES['path_ijasah']['tmp_name']) || !is_uploaded_file($_FILES['path_ijasah']['tmp_name'])) {
    $msg                         = "File Ijasah Required";
    $_SESSION['err_path_ijasah'] = $msg;
    $error                       = 1;
}
if (isset($_FILES['path_ijasah']) && $_FILES['path_ijasah']['size'] > 3145728) {
    $msg                         = "File Ijasah Size more then 3 MB Required";
    $_SESSION['err_path_ijasah'] = $msg;
    $error                       = 1;
}

if (!file_exists($_FILES['path_transkrip_nilai']['tmp_name']) || !is_uploaded_file($_FILES['path_transkrip_nilai']['tmp_name'])) {
    $msg                                  = "File Transkrip Nilai Required";
    $_SESSION['err_path_transkrip_nilai'] = $msg;
    $error                                = 1;
}
if (isset($_FILES['path_transkrip_nilai']) && $_FILES['path_transkrip_nilai']['size'] > 3145728) {
    $msg                                  = "File Transkrip Nilai Size more then 3 MB Required";
    $_SESSION['err_path_transkrip_nilai'] = $msg;
    $error                                = 1;
}

if (!file_exists($_FILES['path_setifikat_pelatihan']['tmp_name']) || !is_uploaded_file($_FILES['path_setifikat_pelatihan']['tmp_name'])) {
    $msg                                      = "File Sertifikat Pelatihan Required";
    $_SESSION['err_path_setifikat_pelatihan'] = $msg;
    $error                                    = 1;
}
if (isset($_FILES['path_setifikat_pelatihan']) && $_FILES['path_setifikat_pelatihan']['size'] > 3145728) {
    $msg                                      = "File Sertifikat Pelatihan Size more then 3 MB Required";
    $_SESSION['err_path_setifikat_pelatihan'] = $msg;
    $error                                    = 1;
}

if (!file_exists($_FILES['path_surat_pengalaman_kerja']['tmp_name']) || !is_uploaded_file($_FILES['path_surat_pengalaman_kerja']['tmp_name'])) {
    $msg                                         = "File Pengalaman Kerja Required";
    $_SESSION['err_path_surat_pengalaman_kerja'] = $msg;
    $error                                       = 1;
}
if (isset($_FILES['path_surat_pengalaman_kerja']) && $_FILES['path_surat_pengalaman_kerja']['size'] > 3145728) {
    $msg                                         = "File Surat Pengalaman Kerja Size more then 3 MB Required";
    $_SESSION['err_path_surat_pengalaman_kerja'] = $msg;
    $error                                       = 1;
}

if (!file_exists($_FILES['path_slip_gaji']['tmp_name']) || !is_uploaded_file($_FILES['path_slip_gaji']['tmp_name'])) {
    $msg                            = "File Slip Gaji Required";
    $_SESSION['err_path_slip_gaji'] = $msg;
    $error                          = 1;
}
if (isset($_FILES['path_slip_gaji']) && $_FILES['path_slip_gaji']['size'] > 3145728) {
    $msg                            = "File Slip Gaji Size more then 3 MB Required";
    $_SESSION['err_path_slip_gaji'] = $msg;
    $error                          = 1;
}

if (!file_exists($_FILES['path_npwp']['tmp_name']) || !is_uploaded_file($_FILES['path_npwp']['tmp_name'])) {
    $msg                       = "File NPWP Required";
    $_SESSION['err_path_npwp'] = $msg;
    $error                     = 1;
}
if (isset($_FILES['path_npwp']) && $_FILES['path_npwp']['size'] > 3145728) {
    $msg                       = "File NPWP Size more then 3 MB Required";
    $_SESSION['err_path_npwp'] = $msg;
    $error                     = 1;
}

if (!file_exists($_FILES['path_bpjs_tk']['tmp_name']) || !is_uploaded_file($_FILES['path_bpjs_tk']['tmp_name'])) {
    $msg                          = "File BPJS TK Required";
    $_SESSION['err_path_bpjs_tk'] = $msg;
    $error                        = 1;
}
if (isset($_FILES['path_bpjs_tk']) && $_FILES['path_bpjs_tk']['size'] > 3145728) {
    $msg                          = "File BPJS TK Size more then 3 MB Required";
    $_SESSION['err_path_bpjs_tk'] = $msg;
    $error                        = 1;
}

if (!file_exists($_FILES['path_bpjs_kesehatan']['tmp_name']) || !is_uploaded_file($_FILES['path_bpjs_kesehatan']['tmp_name'])) {
    $msg                                 = "File BPJS Kesehatan Required";
    $_SESSION['err_path_bpjs_kesehatan'] = $msg;
    $error                               = 1;
}
if (isset($_FILES['path_bpjs_kesehatan']) && $_FILES['path_bpjs_kesehatan']['size'] > 3145728) {
    $msg                                 = "File BPJS Kesehatan Size more then 3 MB Required";
    $_SESSION['err_path_bpjs_kesehatan'] = $msg;
    $error                               = 1;
}

if (!file_exists($_FILES['path_buku_tabungan']['tmp_name']) || !is_uploaded_file($_FILES['path_buku_tabungan']['tmp_name'])) {
    $msg                                = "File Buku Tabungan Required";
    $_SESSION['err_path_buku_tabungan'] = $msg;
    $error                              = 1;
}
if (isset($_FILES['path_buku_tabungan']) && $_FILES['path_buku_tabungan']['size'] > 3145728) {
    $msg                                = "File Buku Tabungan Size more then 3 MB Required";
    $_SESSION['err_path_buku_tabungan'] = $msg;
    $error                              = 1;
}

if (!file_exists($_FILES['path_buku_nikah']['tmp_name']) || !is_uploaded_file($_FILES['path_buku_nikah']['tmp_name'])) {
    $msg                             = "File Buku Nikah Required";
    $_SESSION['err_path_buku_nikah'] = $msg;
    $error                           = 1;
}
if (isset($_FILES['path_buku_nikah']) && $_FILES['path_buku_nikah']['size'] > 3145728) {
    $msg                             = "File Buku Nikah Size more then 3 MB Required";
    $_SESSION['err_path_buku_nikah'] = $msg;
    $error                           = 1;
}

if (!file_exists($_FILES['path_sertifikat_vaksin']['tmp_name']) || !is_uploaded_file($_FILES['path_sertifikat_vaksin']['tmp_name'])) {
    $msg                                    = "File Sertifikat Vaksin Required";
    $_SESSION['err_path_sertifikat_vaksin'] = $msg;
    $error                                  = 1;
}
if (isset($_FILES['path_sertifikat_vaksin']) && $_FILES['path_sertifikat_vaksin']['size'] > 3145728) {
    $msg                                    = "File Sertifikat Vaksin Size more then 3 MB Required";
    $_SESSION['err_path_sertifikat_vaksin'] = $msg;
    $error                                  = 1;
}

if (!file_exists($_FILES['path_skck']['tmp_name']) || !is_uploaded_file($_FILES['path_skck']['tmp_name'])) {
    $msg                       = "File SKCK Required";
    $_SESSION['err_path_skck'] = $msg;
    $error                     = 1;
}
if (isset($_FILES['path_skck']) && $_FILES['path_skck']['size'] > 3145728) {
    $msg                       = "File SKCK Size more then 3 MB Required";
    $_SESSION['err_path_skck'] = $msg;
    $error                     = 1;
}

if ($error == 1) {
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}


$target_dir  = '../upload/pelamar/' . $_SESSION['nama_lengkap'] . "/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$path_foto_filename = $target_dir . basename(rand() . '-FOTO-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_foto"]["name"], PATHINFO_EXTENSION));
$path_foto_file = $target_dir . $path_foto_filename;

$path_ktp_filename = $target_dir . basename(rand() . '-KTP-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_ktp"]["name"], PATHINFO_EXTENSION));
$path_ktp_file = $target_dir . $path_ktp_filename;

$path_akta_kelahiran_filename = $target_dir . basename(rand() . '-AKTA KELAHIRAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_akta_kelahiran"]["name"], PATHINFO_EXTENSION));
$path_akta_kelahiran_file = $target_dir . $path_akta_kelahiran_filename;

$path_ijasah_filename = $target_dir . basename(rand() . '-IJASAH-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_ijasah"]["name"], PATHINFO_EXTENSION));
$path_ijasah_file = $target_dir . $path_ijasah_filename;

$path_transkrip_nilai_filename = $target_dir . basename(rand() . '-TRANSKRIP NILAI-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_transkrip_nilai"]["name"], PATHINFO_EXTENSION));
$path_transkrip_nilai_file = $target_dir . $path_transkrip_nilai_filename;

$path_setifikat_pelatihan_filename = $target_dir . basename(rand() . '-SERTIFIKAT PELATIHAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_setifikat_pelatihan"]["name"], PATHINFO_EXTENSION));
$path_setifikat_pelatihan_file = $target_dir . $path_setifikat_pelatihan_filename;

$path_surat_pengalaman_kerja_filename = $target_dir . basename(rand() . '-SURAT PENGALAMAN KERJA-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_surat_pengalaman_kerja"]["name"], PATHINFO_EXTENSION));
$path_surat_pengalaman_kerja_file = $target_dir . $path_surat_pengalaman_kerja_filename;

$path_slip_gaji_filename = $target_dir . basename(rand() . '-SLIP GAJI-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_slip_gaji"]["name"], PATHINFO_EXTENSION));
$path_slip_gaji_file = $target_dir . $path_slip_gaji_filename;

$path_npwp_filename = $target_dir . basename(rand() . '-NPWP-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_npwp"]["name"], PATHINFO_EXTENSION));
$path_npwp_file = $target_dir . $path_npwp_filename;

$path_bpjs_tk_filename = $target_dir . basename(rand() . '-BPJS TK-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_bpjs_tk"]["name"], PATHINFO_EXTENSION));
$path_bpjs_tk_file = $target_dir . $path_bpjs_tk_filename;

$path_bpjs_kesehatan_filename = $target_dir . basename(rand() . '-BPJS KESEHATAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_bpjs_kesehatan"]["name"], PATHINFO_EXTENSION));
$path_bpjs_kesehatan_file = $target_dir . $path_bpjs_kesehatan_filename;

$path_buku_tabungan_filename = $target_dir . basename(rand() . '-BUKU TABUNGAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_buku_tabungan"]["name"], PATHINFO_EXTENSION));
$path_buku_tabungan_file = $target_dir . $path_buku_tabungan_filename;

$path_buku_nikah_filename = $target_dir . basename(rand() . '-BUKU NIKAH-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_buku_nikah"]["name"], PATHINFO_EXTENSION));
$path_buku_nikah_file = $target_dir . $path_buku_nikah_filename;

$path_sertifikat_vaksin_filename = $target_dir . basename(rand() . '-SERTIFIKAT VAKSIN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_sertifikat_vaksin"]["name"], PATHINFO_EXTENSION));
$path_sertifikat_vaksin_file = $target_dir . $path_sertifikat_vaksin_filename;

$path_skck_filename = $target_dir . basename(rand() . '-SKCK-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_skck"]["name"], PATHINFO_EXTENSION));
$path_skck_file = $target_dir . $path_skck_filename;

if (file_exists($path_foto_file)) {
    $msg                       = "File Foto already exist, please rename the file or try another file...";
    $_SESSION['err_path_foto'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_foto"]["tmp_name"], $path_foto_file)) {
    $msg                       = "Upload Foto Failed, please try reupload again...";
    $_SESSION['err_path_foto'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_ktp_file)) {
    $msg                       = "File KTP already exist, please rename the file or try another file...";
    $_SESSION['err_path_ktp'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_ktp"]["tmp_name"], $path_ktp_file)) {
    $msg                       = "Upload KTP Failed, please try reupload again...";
    $_SESSION['err_path_ktp'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_akta_kelahiran_file)) {
    $msg                       = "File Akta Kelahiran already exist, please rename the file or try another file...";
    $_SESSION['err_path_akta_kelahiran'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_akta_kelahiran"]["tmp_name"], $path_akta_kelahiran_file)) {
    $msg                       = "Upload Akta Kelahiran Failed, please try reupload again...";
    $_SESSION['err_path_akta_kelahiran'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_ijasah_file)) {
    $msg                       = "File Ijasah already exist, please rename the file or try another file...";
    $_SESSION['err_path_ijasah'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_ijasah"]["tmp_name"], $path_ijasah_file)) {
    $msg                       = "Upload Ijasah Failed, please try reupload again...";
    $_SESSION['err_path_ijasah'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}


if (file_exists($path_transkrip_nilai_file)) {
    $msg                       = "File Transkrip Nilai already exist, please rename the file or try another file...";
    $_SESSION['err_path_transkrip_nilai'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_transkrip_nilai"]["tmp_name"], $path_transkrip_nilai_file)) {
    $msg                       = "Upload Transkrip Nilai Failed, please try reupload again...";
    $_SESSION['err_path_transkrip_nilai'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_setifikat_pelatihan_file)) {
    $msg                       = "File Sertifikat Pelatihan already exist, please rename the file or try another file...";
    $_SESSION['err_path_setifikat_pelatihan'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_setifikat_pelatihan"]["tmp_name"], $path_setifikat_pelatihan_file)) {
    $msg                       = "Upload Sertifikat Pelatihan Failed, please try reupload again...";
    $_SESSION['err_path_setifikat_pelatihan'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_surat_pengalaman_kerja_file)) {
    $msg                       = "File Surat Pengalaman Kerja already exist, please rename the file or try another file...";
    $_SESSION['err_path_surat_pengalaman_kerja'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_surat_pengalaman_kerja"]["tmp_name"], $path_surat_pengalaman_kerja_file)) {
    $msg                       = "Upload Surat Pengalaman Kerja Failed, please try reupload again...";
    $_SESSION['err_path_surat_pengalaman_kerja'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_slip_gaji_file)) {
    $msg                       = "File Slip Gaji already exist, please rename the file or try another file...";
    $_SESSION['err_path_slip_gaji'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_slip_gaji"]["tmp_name"], $path_slip_gaji_file)) {
    $msg                       = "Upload Slip Gaji Failed, please try reupload again...";
    $_SESSION['err_path_slip_gaji'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_npwp_file)) {
    $msg                       = "File NPWP already exist, please rename the file or try another file...";
    $_SESSION['err_path_npwp'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_npwp"]["tmp_name"], $path_npwp_file)) {
    $msg                       = "Upload NPWP Failed, please try reupload again...";
    $_SESSION['err_path_npwp'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_bpjs_tk_file)) {
    $msg                       = "File BPJS TK already exist, please rename the file or try another file...";
    $_SESSION['err_path_bpjs_tk'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_bpjs_tk"]["tmp_name"], $path_bpjs_tk_file)) {
    $msg                       = "Upload BPJS TK Failed, please try reupload again...";
    $_SESSION['err_path_bpjs_tk'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_bpjs_kesehatan_file)) {
    $msg                       = "File BPJS Kesehatan already exist, please rename the file or try another file...";
    $_SESSION['err_path_bpjs_kesehatan'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_bpjs_kesehatan"]["tmp_name"], $path_bpjs_kesehatan_file)) {
    $msg                       = "Upload BPJS Kesehatan Failed, please try reupload again...";
    $_SESSION['err_path_bpjs_kesehatan'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_buku_tabungan_file)) {
    $msg                       = "File Buku Tabungan already exist, please rename the file or try another file...";
    $_SESSION['err_path_buku_tabungan'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_buku_tabungan"]["tmp_name"], $path_buku_tabungan_file)) {
    $msg                       = "Upload Buku Tabungan Failed, please try reupload again...";
    $_SESSION['err_path_buku_tabungan'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_buku_nikah_file)) {
    $msg                       = "File Buku Nikah already exist, please rename the file or try another file...";
    $_SESSION['err_path_buku_nikah'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_buku_nikah"]["tmp_name"], $path_buku_nikah_file)) {
    $msg                       = "Upload Buku Nikah Failed, please try reupload again...";
    $_SESSION['err_path_buku_nikah'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_sertifikat_vaksin_file)) {
    $msg                       = "File Sertifikat Vaksi already exist, please rename the file or try another file...";
    $_SESSION['err_path_sertifikat_vaksin'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_sertifikat_vaksin"]["tmp_name"], $path_sertifikat_vaksin_file)) {
    $msg                       = "Upload Sertifikat Vaksi Failed, please try reupload again...";
    $_SESSION['err_path_sertifikat_vaksin'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (file_exists($path_skck_file)) {
    $msg                       = "File SKCK already exist, please rename the file or try another file...";
    $_SESSION['err_path_skck'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} elseif (!move_uploaded_file($_FILES["path_skck"]["tmp_name"], $path_skck_file)) {
    $msg                       = "Upload SKCK Failed, please try reupload again...";
    $_SESSION['err_path_skck'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

$sql = sprintf(
    "UPDATE t_pelamar
SET
    path_foto = '%s',
    path_ktp = '%s',
    path_akta_kelahiran = '%s',
    path_ijasah = '%s',
    path_transkrip_nilai = '%s',
    path_setifikat_pelatihan = '%s',
    path_surat_pengalaman_kerja = '%s',
    path_slip_gaji = '%s',
    path_npwp = '%s',
    path_bpjs_tk = '%s',
    path_bpjs_kesehatan = '%s',
    path_buku_tabungan = '%s',
    path_buku_nikah = '%s',
    path_sertifikat_vaksin = '%s',
    path_skck = '%s',
    tgl_update = '%s'
WHERE email = '%s' AND id = %s
",
    $path_foto_filename,
    $path_ktp_filename,
    $path_akta_kelahiran_filename,
    $path_ijasah_filename,
    $path_transkrip_nilai_filename,
    $path_setifikat_pelatihan_filename,
    $path_surat_pengalaman_kerja_filename,
    $path_slip_gaji_filename,
    $path_npwp_filename,
    $path_bpjs_tk_filename,
    $path_bpjs_kesehatan_filename,
    $path_buku_tabungan_filename,
    $path_buku_nikah_filename,
    $path_sertifikat_vaksin_filename,
    $path_skck_filename,
    date('Y-m-d H:i:s'),
    $_SESSION['email'],
    $_SESSION['t_pelamar_id'],
);

try {
    if (!$pdo->query($sql)) {
        throw new Exception("Tidak terhubung dengan server, silahkan coba kembali");
    }

    unset($_SESSION['wrong']);
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
} catch (Exception $e) {
    $_SESSION['wrong']      = 1;
    $_SESSION['err_upload'] = $e->getMessage();
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}
