<?php

    // koneksi ke database
    include '/frontpage/koneksi.php';


    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $national = $_POST['national'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $universitas = $_POST['universitas'];
        $jurusan = $_POST['jurusan'];
        $ipk = $_POST['ipk'];
        $max_ipk = $_POST['max_ipk'];
        $status_universitas = $_POST['status_universitas'];
        $lokasi_univ = $_POST['lokasi_univ'];
        $jurusan_sawit = $_POST['jurusan_sawit'];
        $pengalaman = $_POST['pengalaman'];
        $pengalaman_kebun = $_POST['pengalaman_kebun'];
        $lokasi_kalimantan = $_POST['lokasi_kalimantan'];
        $file_cv = $_POST['file_cv'];
       
    }

    // menginput data ke database
    mysqli_query($koneksi,"insert tes_pelamar values('','$fname', '$lname', '$national', '$tempat_lahir', '$tgl_lahir', '$alamat', '$email', '$hp', '$universitas', '$jurusan', '$ipk', '$max_ipk', '$status_universitas', '$lokasi_univ', '$jurusan_sawit', '$pengalaman', '$pengalaman_kebun', '$lokasi_kalimantan', 
    '$file_cv')");


    // mengalihkan halaman kembali ke index.php
     header("location:/frontpage/form-pelamar-test.php");

?>