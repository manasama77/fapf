<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

require("koneksi.php");
require_once('constants.php');
require_once('class/C_list_job.php');
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    if (!$_GET['id']) {
        session_destroy();
        throw new Exception("Job ID Required", 401);
    }

    $id = $_GET['id'];

    $c_list_jobs = new CListJob($conn);
    $job         = $c_list_jobs->show($id);

    $posisi       = $job['kode_jabatan'];
    $nama_jabatan = $job['nama_jabatan'];
    $penempatan   = $job['lokasi'];

    //validasi
    $error = 0;
    if (empty($_POST['fname'])) {
        throw new Exception("First Name Required", 400);
    } elseif (empty($_POST['lname'])) {
        throw new Exception("Last Name Required", 400);
    } elseif (empty($_POST['jk'])) {
        throw new Exception("Jenis Kelamin Required", 400);
    } elseif (empty($_POST['national'])) {
        throw new Exception("Nationality Required", 400);
    } elseif (empty($_POST['tempat_lahir'])) {
        throw new Exception("Place Of Birth Required", 400);
    } elseif (empty($_POST['tgl_lahir'])) {
        throw new Exception("Date Of Birth Required", 400);
    } elseif (empty($_POST['alamat'])) {
        throw new Exception("Current Address Required", 400);
    } elseif (empty($_POST['email'])) {
        throw new Exception("Email Required", 400);
    } elseif (empty($_POST['hp'])) {
        throw new Exception("Mobile Number Required", 400);
    } elseif (empty($_POST['pendidikan'])) {
        throw new Exception("Highest Education Degree Required", 400);
    } elseif (empty($_POST['jurusan'])) {
        throw new Exception("Major Required", 400);
    } elseif (empty($_POST['ipk'])) {
        throw new Exception("GPA/IPK Required", 400);
    } elseif (empty($_POST['max_ipk'])) {
        throw new Exception("Max GPA/IPK Required", 400);
    } elseif (empty($_POST['status_universitas'])) {
        throw new Exception("Status Universitas Required", 400);
    } elseif (empty($_POST['lokasi_univ'])) {
        throw new Exception("Lokasi Universitas Required", 400);
    } elseif (empty($_POST['jurusan_sawit'])) {
        throw new Exception("Jurusan berkaitan dengan Sawit Required", 400);
    } elseif (empty($_POST['pengalaman'])) {
        throw new Exception("Tahun Pengalaman Kerja Required", 400);
    } elseif (empty($_POST['pengalaman_kebun'])) {
        throw new Exception("Tahun Pengalaman Kerja di Perkebunan Required", 400);
    } elseif (empty($_POST['lokasi_kalimantan'])) {
        throw new Exception("Bersedia ditempatkan di Kalimantan Required", 400);
    }

    if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
        throw new Exception("File CV Required", 400);
    } elseif (isset($_FILES['file'])) {
        if ($_FILES['file']['size'] > 3145728) {
            throw new Exception("File CV Size more then 3 MB Required", 400);
        }
    }

    if (!file_exists($_FILES['file_surat']['tmp_name']) || !is_uploaded_file($_FILES['file_surat']['tmp_name'])) {
        throw new Exception("File Application Letter Required", 400);
    } elseif (isset($_FILES['file_surat'])) {
        if ($_FILES['file_surat']['size'] > 3145728) {
            throw new Exception("File Application Letter Size more then 3 MB Required", 400);
        }
    }

    if (isset($_POST['submit'])) {
        $target_dir  = 'upload/pelamar/' . $_POST['fname'] . '-' . $_POST['lname'] . '-' . $_POST['tgl_lahir'] . '/';

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0775, true);
        }

        $cv_filename = basename(time() . '-CV-' . $_POST['fname'] . ' ' . $_POST['lname'] . '.' . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        $cv_file = $target_dir . $cv_filename;

        $surat_lamaran_filename        = basename(time() . '-SURAT LAMARAN-' . $_POST['fname'] . ' ' . $_POST['lname'] . '.' . pathinfo($_FILES["file_surat"]["name"], PATHINFO_EXTENSION));
        $surat_lamaran_file = $target_dir . $surat_lamaran_filename;

        if (file_exists($cv_file)) {
            throw new Exception("File CV already exist, please rename the file or try another file...", 400);
        } elseif (!move_uploaded_file($_FILES["file"]["tmp_name"], $cv_file)) {
            throw new Exception("Upload CV Failed, please try reupload again...", 400);
        }

        if (file_exists($surat_lamaran_file)) {
            throw new Exception("File Application Letter already exist, please rename the file or try another file...", 400);
        } elseif (!move_uploaded_file($_FILES["file_surat"]["tmp_name"], $surat_lamaran_file)) {
            throw new Exception("Upload Application Letter Failed, please try reupload again...", 400);
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
        $file_cv            = $cv_file;
        $file_surat         = $surat_lamaran_file;

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
            path_sertifikat_pelatihan,
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

        // DEBUG ONLY
        // echo $sql;
        // exit;

        $query = $conn->query($sql);

        if (!$query) {
            throw new Exception("Proses Submit gagal, terputus dengan server...", 400);
        }

        $conn->close();
        session_destroy();

        // SEND EMAIL
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host        = 'mail.fap-agri.com';
        $mail->SMTPAuth    = true;
        $mail->Username    = 'noreply@fap-agri.com';
        $mail->Password    = 'FAP2023vip';
        $mail->SMTPSecure  = null;
        $mail->Port        = 587;
        $mail->SMTPAutoTLS = true;

        //Recipients
        $mail->setFrom('noreply@fap-agri.com');
        $mail->addAddress($email);

        //Content
        $body = "Dear $nama_lengkap,<br /><br />";
        $body .= "Terima Kasih Anda Sudah Mengajukan Lamaran Pekerjaan Kepada Perusahaan Fap-Agri dengan Posisi $nama_jabatan<br />";
        $body .= "Lamaran Anda Segera Kami Proses dan Akan Memberitahukan Tahapan Selanjutnya.<br />";
        $body .= "Demikian dan Terima kasih.<br /><br />";
        $body .= "Regards,<br />";
        $body .= "Recruitment FAP AGRI<br/>";
        $body .= "<a href='https://fap-agri.com' target='_blank'>https://fap-agri.com</a>";

        $alt_body = "Dear $nama_lengkap,\r\n";
        $alt_body .= "Terima Kasih Anda Sudah Mengajukan Lamaran Pekerjaan Kepada Perusahaan Fap-Agri dengan Posisi $nama_jabatan\r\n";
        $alt_body .= "Lamaran Akan Kami Segera Kami Proses dan akan segera kami beritahukan berikutnya.\r\n";
        $alt_body .= "Demikian dan Terima kasih.\r\n\r\n";
        $alt_body .= "Regards,\r\n";
        $alt_body .= "Recruitment FAP AGRI\r\n";
        $alt_body .= "https://fap-agri.com\r\n";

        $mail->isHTML(true);
        $mail->Subject = "Fap-Agri Apply Job $nama_jabatan - Apply Job Success";
        $mail->Body    = $body;
        $mail->AltBody = $alt_body;

        $mail->send();

        return header('Location:' . APP_URL . '/job-apply-finish.php');
    } else {
        session_destroy();
        throw new Exception("Job ID Required", 401);
    }
} catch (Exception $e) {
    var_dump($e->getMessage());

    $_SESSION['err'] = $e->getMessage();
    if ($e->getCode() == 400) {
        $_SESSION['old'] = $_POST;
        return header('Location:' . APP_URL . '/job-apply.php?id=' . $id);
    } else {
        return header('Location:' . APP_URL . '/job-list.php');
    }
}
