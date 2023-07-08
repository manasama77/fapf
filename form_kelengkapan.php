<?php
require('koneksi.php');
require_once('constants.php');
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
if (!$token) {
    logout();
}

if (!file_exists($_FILES['path_foto']['tmp_name']) || !is_uploaded_file($_FILES['path_foto']['tmp_name'])) {
    $msg                       = "File Foto Required";
    $_SESSION['err_path_foto'] = $msg;
    $error                     = 1;
}
if ($_FILES['path_foto']['size'] != 0 && $_FILES['path_foto']['size'] > 3145728) {
    $msg                       = "File Foto Size more then 3 MB Required";
    $_SESSION['err_path_foto'] = $msg;
    $error                     = 0;
}

if (!file_exists($_FILES['path_ktp']['tmp_name']) || !is_uploaded_file($_FILES['path_ktp']['tmp_name'])) {
    $msg                      = "File KTP Required";
    $_SESSION['err_path_ktp'] = $msg;
    $error                    = 1;
}
if ($_FILES['path_ktp']['size'] != 0 && $_FILES['path_ktp']['size'] > 3145728) {
    $msg                      = "File KTP Size more then 3 MB Required";
    $_SESSION['err_path_ktp'] = $msg;
    $error                    = 1;
}

if (!file_exists($_FILES['path_kk']['tmp_name']) || !is_uploaded_file($_FILES['path_kk']['tmp_name'])) {
    $msg                     = "File Kartu Keluarga Required";
    $_SESSION['err_path_kk'] = $msg;
    $error                   = 1;
}
if ($_FILES['path_kk']['size'] != 0 && $_FILES['path_kk']['size'] > 3145728) {
    $msg                     = "File Kartu Keluarga Size more then 3 MB Required";
    $_SESSION['err_path_kk'] = $msg;
    $error                   = 1;
}

if ($_FILES['path_akta_kelahiran']['size'] != 0 && $_FILES['path_akta_kelahiran']['size'] > 3145728) {
    $msg                                 = "File Akta Kelahiran Size more then 3 MB Required";
    $_SESSION['err_path_akta_kelahiran'] = $msg;
    $error                               = 1;
}

if (!file_exists($_FILES['path_ijasah']['tmp_name']) || !is_uploaded_file($_FILES['path_ijasah']['tmp_name'])) {
    $msg                         = "File Ijasah Required";
    $_SESSION['err_path_ijasah'] = $msg;
    $error                       = 1;
}
if ($_FILES['path_ijasah']['size'] != 0 && $_FILES['path_ijasah']['size'] > 3145728) {
    $msg                         = "File Ijasah Size more then 3 MB Required";
    $_SESSION['err_path_ijasah'] = $msg;
    $error                       = 1;
}

if (!file_exists($_FILES['path_transkrip_nilai']['tmp_name']) || !is_uploaded_file($_FILES['path_transkrip_nilai']['tmp_name'])) {
    $msg                                  = "File Transkrip Nilai Required";
    $_SESSION['err_path_transkrip_nilai'] = $msg;
    $error                                = 1;
}
if ($_FILES['path_transkrip_nilai']['size'] != 0 && $_FILES['path_transkrip_nilai']['size'] > 3145728) {
    $msg                                  = "File Transkrip Nilai Size more then 3 MB Required";
    $_SESSION['err_path_transkrip_nilai'] = $msg;
    $error                                = 1;
}

if ($_FILES['path_sertifikat_pelatihan']['size'] != 0 && $_FILES['path_sertifikat_pelatihan']['size'] > 3145728) {
    $msg                                      = "File Sertifikat Pelatihan Size more then 3 MB Required";
    $_SESSION['err_path_sertifikat_pelatihan'] = $msg;
    $error                                    = 1;
}

if ($_FILES['path_surat_pengalaman_kerja']['size'] != 0 && $_FILES['path_surat_pengalaman_kerja']['size'] > 3145728) {
    $msg                                         = "File Surat Pengalaman Kerja Size more then 3 MB Required";
    $_SESSION['err_path_surat_pengalaman_kerja'] = $msg;
    $error                                       = 1;
}

if ($_FILES['path_slip_gaji']['size'] != 0 && $_FILES['path_slip_gaji']['size'] > 3145728) {
    $msg                            = "File Slip Gaji Size more then 3 MB Required";
    $_SESSION['err_path_slip_gaji'] = $msg;
    $error                          = 1;
}

if ($_FILES['path_npwp']['size'] != 0 && $_FILES['path_npwp']['size'] > 3145728) {
    $msg                       = "File NPWP Size more then 3 MB Required";
    $_SESSION['err_path_npwp'] = $msg;
    $error                     = 1;
}

if ($_FILES['path_bpjs_tk']['size'] != 0 && $_FILES['path_bpjs_tk']['size'] > 3145728) {
    $msg                          = "File BPJS TK Size more then 3 MB Required";
    $_SESSION['err_path_bpjs_tk'] = $msg;
    $error                        = 1;
}

if ($_FILES['path_bpjs_kesehatan']['size'] != 0 && $_FILES['path_bpjs_kesehatan']['size'] > 3145728) {
    $msg                                 = "File BPJS Kesehatan Size more then 3 MB Required";
    $_SESSION['err_path_bpjs_kesehatan'] = $msg;
    $error                               = 1;
}

if (!file_exists($_FILES['path_buku_tabungan']['tmp_name']) || !is_uploaded_file($_FILES['path_buku_tabungan']['tmp_name'])) {
    $msg                                = "File Buku Tabungan Required";
    $_SESSION['err_path_buku_tabungan'] = $msg;
    $error                              = 1;
}
if ($_FILES['path_buku_tabungan']['size'] != 0 && $_FILES['path_buku_tabungan']['size'] > 3145728) {
    $msg                                = "File Buku Tabungan Size more then 3 MB Required";
    $_SESSION['err_path_buku_tabungan'] = $msg;
    $error                              = 1;
}

if ($_FILES['path_buku_nikah']['size'] != 0 && $_FILES['path_buku_nikah']['size'] > 3145728) {
    $msg                             = "File Buku Nikah Size more then 3 MB Required";
    $_SESSION['err_path_buku_nikah'] = $msg;
    $error                           = 1;
}

if ($_FILES['path_sertifikat_vaksin']['size'] != 0 && $_FILES['path_sertifikat_vaksin']['size'] > 3145728) {
    $msg                                = "File Sertifikat Vaksin Size more then 3 MB Required";
    $_SESSION['err_path_sertifikat_vaksin'] = $msg;
    $error                              = 1;
}

if (!file_exists($_FILES['path_skck']['tmp_name']) || !is_uploaded_file($_FILES['path_skck']['tmp_name'])) {
    $msg                       = "File SKCK Required";
    $_SESSION['err_path_skck'] = $msg;
    $error                     = 1;
}
if ($_FILES['path_skck']['size'] != 0 && $_FILES['path_skck']['size'] > 3145728) {
    $msg                       = "File SKCK Size more then 3 MB Required";
    $_SESSION['err_path_skck'] = $msg;
    $error                     = 1;
}

if ($error == 1) {
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}



$target_dir = 'upload/pelamar/' . $_SESSION['nama_lengkap'] . "/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0775, true);
}

// not required
$path_akta_kelahiran_file         = null;
$path_sertifikat_pelatihan_file   = null;
$path_surat_pengalaman_kerja_file = null;
$path_slip_gaji_file              = null;
$path_npwp_file                   = null;
$path_bpjs_tk_file                = null;
$path_bpjs_kesehatan_file         = null;
$path_buku_nikah_file             = null;
$path_sertifikat_vaksin_file      = null;

$path_foto_filename = basename(rand() . '-FOTO-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_foto"]["name"], PATHINFO_EXTENSION));
$path_foto_file     = $target_dir . $path_foto_filename;

$path_ktp_filename = basename(rand() . '-KTP-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_ktp"]["name"], PATHINFO_EXTENSION));
$path_ktp_file     = $target_dir . $path_ktp_filename;

$path_kk_filename = basename(rand() . '-KK-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_kk"]["name"], PATHINFO_EXTENSION));
$path_kk_file     = $target_dir . $path_kk_filename;

if ($_FILES['path_akta_kelahiran']['size'] != 0) {
    $path_akta_kelahiran_filename = basename(rand() . '-AKTA KELAHIRAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_akta_kelahiran"]["name"], PATHINFO_EXTENSION));
    $path_akta_kelahiran_file = $target_dir . $path_akta_kelahiran_filename;
}

$path_ijasah_filename = basename(rand() . '-IJASAH-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_ijasah"]["name"], PATHINFO_EXTENSION));
$path_ijasah_file = $target_dir . $path_ijasah_filename;

$path_transkrip_nilai_filename = basename(rand() . '-TRANSKRIP NILAI-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_transkrip_nilai"]["name"], PATHINFO_EXTENSION));
$path_transkrip_nilai_file = $target_dir . $path_transkrip_nilai_filename;

if ($_FILES['path_sertifikat_pelatihan']['size'] != 0) {
    $path_sertifikat_pelatihan_filename = basename(rand() . '-SERTIFIKAT PELATIHAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_sertifikat_pelatihan"]["name"], PATHINFO_EXTENSION));
    $path_sertifikat_pelatihan_file = $target_dir . $path_sertifikat_pelatihan_filename;
}

if ($_FILES['path_surat_pengalaman_kerja']['size'] != 0) {
    $path_surat_pengalaman_kerja_filename = basename(rand() . '-SURAT PENGALAMAN KERJA-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_surat_pengalaman_kerja"]["name"], PATHINFO_EXTENSION));
    $path_surat_pengalaman_kerja_file = $target_dir . $path_surat_pengalaman_kerja_filename;
}

if ($_FILES['path_slip_gaji']['size'] != 0) {
    $path_slip_gaji_filename = basename(rand() . '-SLIP GAJI-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_slip_gaji"]["name"], PATHINFO_EXTENSION));
    $path_slip_gaji_file = $target_dir . $path_slip_gaji_filename;
}

if ($_FILES['path_npwp']['size'] != 0) {
    $path_npwp_filename = basename(rand() . '-NPWP-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_npwp"]["name"], PATHINFO_EXTENSION));
    $path_npwp_file = $target_dir . $path_npwp_filename;
}

if ($_FILES['path_bpjs_tk']['size'] != 0) {
    $path_bpjs_tk_filename = basename(rand() . '-BPJS TK-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_bpjs_tk"]["name"], PATHINFO_EXTENSION));
    $path_bpjs_tk_file = $target_dir . $path_bpjs_tk_filename;
}

if ($_FILES['path_bpjs_kesehatan']['size'] != 0) {
    $path_bpjs_kesehatan_filename = basename(rand() . '-BPJS KESEHATAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_bpjs_kesehatan"]["name"], PATHINFO_EXTENSION));
    $path_bpjs_kesehatan_file = $target_dir . $path_bpjs_kesehatan_filename;
}

$path_buku_tabungan_filename = basename(rand() . '-BUKU TABUNGAN-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_buku_tabungan"]["name"], PATHINFO_EXTENSION));
$path_buku_tabungan_file = $target_dir . $path_buku_tabungan_filename;

if ($_FILES['path_buku_nikah']['size'] != 0) {
    $path_buku_nikah_filename = basename(rand() . '-BUKU NIKAH-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_buku_nikah"]["name"], PATHINFO_EXTENSION));
    $path_buku_nikah_file = $target_dir . $path_buku_nikah_filename;
}

if ($_FILES['path_sertifikat_vaksin']['size'] != 0) {
    $path_sertifikat_vaksin_filename = basename(rand() . '-BUKU NIKAH-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_sertifikat_vaksin"]["name"], PATHINFO_EXTENSION));
    $path_sertifikat_vaksin_file = $target_dir . $path_sertifikat_vaksin_filename;
}

$path_skck_filename = basename(rand() . '-SKCK-' . $_SESSION['nama_lengkap'] . '.' . pathinfo($_FILES["path_skck"]["name"], PATHINFO_EXTENSION));
$path_skck_file = $target_dir . $path_skck_filename;







if (!move_uploaded_file($_FILES["path_foto"]["tmp_name"], $path_foto_file)) {
    $msg                       = "Upload Foto Failed, please try reupload again...";
    $_SESSION['err_path_foto'] = $msg;
    $_SESSION['wrong']         = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (!move_uploaded_file($_FILES["path_ktp"]["tmp_name"], $path_ktp_file)) {
    $msg                      = "Upload KTP Failed, please try reupload again...";
    $_SESSION['err_path_ktp'] = $msg;
    $_SESSION['wrong']        = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (!move_uploaded_file($_FILES["path_kk"]["tmp_name"], $path_kk_file)) {
    $msg                     = "Upload Kartu Keluarga Failed, please try reupload again...";
    $_SESSION['err_path_kk'] = $msg;
    $_SESSION['wrong']       = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if ($_FILES['path_akta_kelahiran']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_akta_kelahiran"]["tmp_name"], $path_akta_kelahiran_file)) {
        $msg                                 = "Upload Akta Kelahiran Failed, please try reupload again...";
        $_SESSION['err_path_akta_kelahiran'] = $msg;
        $_SESSION['wrong']                   = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if (!move_uploaded_file($_FILES["path_ijasah"]["tmp_name"], $path_ijasah_file)) {
    $msg                       = "Upload Ijasah Failed, please try reupload again...";
    $_SESSION['err_path_ijasah'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if (!move_uploaded_file($_FILES["path_transkrip_nilai"]["tmp_name"], $path_transkrip_nilai_file)) {
    $msg                       = "Upload Transkrip Nilai Failed, please try reupload again...";
    $_SESSION['err_path_transkrip_nilai'] = $msg;
    $_SESSION['wrong'] = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if ($_FILES['path_sertifikat_pelatihan']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_sertifikat_pelatihan"]["tmp_name"], $path_sertifikat_pelatihan_file)) {
        $msg                                      = "Upload Sertifikat Pelatihan Failed, please try reupload again...";
        $_SESSION['err_path_sertifikat_pelatihan'] = $msg;
        $_SESSION['wrong']                        = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if ($_FILES['path_sertifikat_pelatihan']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_surat_pengalaman_kerja"]["tmp_name"], $path_surat_pengalaman_kerja_file)) {
        $msg                       = "Upload Surat Pengalaman Kerja Failed, please try reupload again...";
        $_SESSION['err_path_surat_pengalaman_kerja'] = $msg;
        $_SESSION['wrong'] = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if ($_FILES['path_slip_gaji']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_slip_gaji"]["tmp_name"], $path_slip_gaji_file)) {
        $msg                       = "Upload Slip Gaji Failed, please try reupload again...";
        $_SESSION['err_path_slip_gaji'] = $msg;
        $_SESSION['wrong'] = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if ($_FILES['path_npwp']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_npwp"]["tmp_name"], $path_npwp_file)) {
        $msg                       = "Upload NPWP Failed, please try reupload again...";
        $_SESSION['err_path_npwp'] = $msg;
        $_SESSION['wrong'] = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if ($_FILES['path_bpjs_tk']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_bpjs_tk"]["tmp_name"], $path_bpjs_tk_file)) {
        $msg                       = "Upload BPJS TK Failed, please try reupload again...";
        $_SESSION['err_path_bpjs_tk'] = $msg;
        $_SESSION['wrong'] = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if ($_FILES['path_bpjs_kesehatan']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_bpjs_kesehatan"]["tmp_name"], $path_bpjs_kesehatan_file)) {
        $msg                       = "Upload BPJS Kesehatan Failed, please try reupload again...";
        $_SESSION['err_path_bpjs_kesehatan'] = $msg;
        $_SESSION['wrong'] = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if (!move_uploaded_file($_FILES["path_buku_tabungan"]["tmp_name"], $path_buku_tabungan_file)) {
    $msg                                = "Upload Buku Tabungan Failed, please try reupload again...";
    $_SESSION['err_path_buku_tabungan'] = $msg;
    $_SESSION['wrong']                  = 1;
    return header('Location:' . APP_URL . '/pelamar/dashboard.php');
}

if ($_FILES['path_buku_nikah']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_buku_nikah"]["tmp_name"], $path_buku_nikah_file)) {
        $msg                       = "Upload Buku Nikah Failed, please try reupload again...";
        $_SESSION['err_path_buku_nikah'] = $msg;
        $_SESSION['wrong'] = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if ($_FILES['path_sertifikat_vaksin']['size'] != 0) {
    if (!move_uploaded_file($_FILES["path_sertifikat_vaksin"]["tmp_name"], $path_sertifikat_vaksin_file)) {
        $msg                       = "Upload Sertifikat Vaksin Failed, please try reupload again...";
        $_SESSION['err_path_sertifikat_vaksin'] = $msg;
        $_SESSION['wrong'] = 1;
        return header('Location:' . APP_URL . '/pelamar/dashboard.php');
    }
}

if (!move_uploaded_file($_FILES["path_skck"]["tmp_name"], $path_skck_file)) {
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
        path_kk = '%s',
        path_akta_kelahiran = '%s',
        path_ijasah = '%s',

        path_transkrip_nilai = '%s',
        path_sertifikat_pelatihan = '%s',
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
    WHERE email = '%s' 
    AND id = %s
    ",
    $path_foto_file,
    $path_ktp_file,
    $path_kk_file,
    $path_akta_kelahiran_file,
    $path_ijasah_file,
    $path_transkrip_nilai_file,
    $path_sertifikat_pelatihan_file,
    $path_surat_pengalaman_kerja_file,
    $path_slip_gaji_file,
    $path_npwp_file,
    $path_bpjs_tk_file,
    $path_bpjs_kesehatan_file,
    $path_buku_tabungan_file,
    $path_buku_nikah_file,
    $path_sertifikat_vaksin_file,
    $path_skck_file,
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
