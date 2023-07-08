<?php
session_start();

require_once('koneksi.php');
require_once('constants.php');
require_once('class/C_list_job.php');

if (!$_GET['id']) {
    session_destroy();
    header("location:job-list.php");
}

$id = $_GET['id'];

$c_list_jobs = new CListJob($conn);
$job         = $c_list_jobs->show($id);

$posisi      = $job['kode_jabatan'];
$nama_posisi = $job['nama_jabatan'];

$old['fname'] = "";
$old['lname'] = "";
$old['jk'] = "";
$old['national'] = "";
$old['tempat_lahir'] = "";
$old['tgl_lahir'] = "";
$old['alamat'] = "";
$old['email'] = "";
$old['hp'] = "";
$old['pendidikan'] = "";
$old['jurusan'] = "";
$old['ipk'] = "";
$old['max_ipk'] = "";
$old['status_universitas'] = "";
$old['lokasi_univ'] = "";
$old['jurusan_sawit'] = "";
$old['pengalaman'] = "";
$old['pengalaman_kebun'] = "";
$old['lokasi_kalimantan'] = "";

if (isset($_SESSION['old'])) {
    foreach ($_SESSION['old'] as $key => $val) {
        $old[$key] = $val ?? "";
    }
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>

    <title>Career at FAP AGRI - FAP AGRI Career</title>
    <meta name="description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia">
    <meta itemprop="name" content="Career at FAP AGRI - FAP AGRI Career">
    <meta itemprop="description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia.">
    <meta name="twitter:title" content="Career at FAP AGRI - FAP AGRI Career">
    <meta name="twitter:description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia.">
    <meta property="og:title" content="Career at FAP AGRI - FAP AGRI Career">
    <meta property="og:description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <style>
        .text-danger {
            color: red;
        }

        @font-face {
            font-family: gojekicon;
            src: url(fonts/qfcnRo0rar5S.eot);
            src: url(fonts/SCE9CjYnMYfg.woff2) format("woff2"), url(fonts/qfcnRo0rar5S.eot#iefix) format("embedded-opentype"), url(fonts/jROGyYYgRhXA.ttf) format("truetype"), url(fonts/14JJsDtvMKWO.woff) format("woff"), url(fonts/1ib8DMby29F6.svg#gojekicon) format("svg");
            font-display: swap;
            font-weight: 400;
            font-style: normal
        }

        i {
            font-family: gojekicon !important;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .gi-website:before {
            content: "";
            color: #4a4a4a
        }

        .gi-xs {
            font-size: .5rem
        }

        .gi-sm {
            font-size: .75rem
        }

        .gi-md {
            font-size: 1rem
        }

        .gi-lg {
            font-size: 1.5rem
        }

        .gi-xl {
            font-size: 2rem
        }

        .gi-icon-solid-gobills:before {
            content: ""
        }

        .gi-icon-solid-gobiz:before {
            content: ""
        }

        .gi-icon-solid-gocar:before {
            content: ""
        }

        .gi-icon-solid-godeals:before {
            content: ""
        }

        .gi-icon-solid-gofood:before {
            content: ""
        }

        .gi-icon-solid-golaundry:before {
            content: ""
        }

        .gi-icon-solid-gopay:before {
            content: ""
        }

        .gi-icon-solid-goplay:before {
            content: ""
        }

        .gi-icon-solid-gopoint:before {
            content: ""
        }

        .gi-icon-solid-goride:before {
            content: ""
        }

        .gi-icon-solid-gosend:before {
            content: ""
        }

        .gi-icon-solid-gotix:before {
            content: ""
        }

        .gi-icon-gobills:before {
            content: ""
        }

        .gi-icon-gobiz:before {
            content: ""
        }

        .gi-icon-gocar:before {
            content: ""
        }

        .gi-icon-godeals:before {
            content: ""
        }

        .gi-icon-gofood:before {
            content: ""
        }

        .gi-icon-gojek:before {
            content: ""
        }

        .gi-icon-golaundry:before {
            content: ""
        }

        .gi-icon-gopay:before {
            content: ""
        }

        .gi-icon-goplay:before {
            content: ""
        }

        .gi-icon-gopoints:before {
            content: ""
        }

        .gi-icon-goride:before {
            content: ""
        }

        .gi-icon-gosend:before {
            content: ""
        }

        .gi-icon-gotix:before {
            content: ""
        }

        .gi-account:before {
            content: ""
        }

        .gi-code:before {
            content: ""
        }

        .gi-dashboard:before {
            content: ""
        }

        .gi-form:before {
            content: ""
        }

        .gi-hi:before {
            content: ""
        }

        .gi-logout:before {
            content: ""
        }

        .gi-user:before {
            content: ""
        }

        .gi-arrow-upload:before {
            content: ""
        }

        .gi-pdf:before {
            content: ""
        }

        .gi-calendar:before {
            content: ""
        }

        .gi-triangle-down:before {
            content: ""
        }

        .gi-upload:before {
            content: ""
        }

        .gi-tick:before {
            content: ""
        }

        .gi-error:before {
            content: ""
        }

        .gi-search:before {
            content: ""
        }

        .gi-arrow-up:before {
            content: ""
        }

        .gi-arrowbar-down:before {
            content: ""
        }

        .gi-arrowbar-left:before {
            content: ""
        }

        .gi-arrowbar-right:before {
            content: ""
        }

        .gi-arrowbar-up:before {
            content: ""
        }

        .gi-caret-down:before {
            content: ""
        }

        .gi-caret-left:before {
            content: ""
        }

        .gi-caret-right:before {
            content: ""
        }

        .gi-caret-up:before {
            content: ""
        }

        .gi-menu:before {
            content: ""
        }

        .gi-retry:before {
            content: ""
        }

        .gi-close:before {
            content: ""
        }

        .gi-location:before {
            content: ""
        }

        .gi-arrow:before {
            content: ""
        }

        .gi-facebook:before {
            content: ""
        }

        .gi-instagram:before {
            content: ""
        }

        .gi-line:before {
            content: ""
        }

        .gi-linkedin:before {
            content: ""
        }

        .gi-twitter:before {
            content: ""
        }

        .gi-web:before {
            content: ""
        }

        .gi-youtube:before {
            content: ""
        }

        .gi-arrow-left:before {
            content: ""
        }

        .gi-arrow-right:before {
            content: ""
        }

        .gi-globe:before {
            content: ""
        }

        .gi-arrow-down:before {
            content: ""
        }

        @font-face {
            font-family: MaisonNeue-Book;
            src: url(fonts/Gp3Gu8wkLEoN.woff2) format("woff2"), url(fonts/xThyTxm7sWw7.woff) format("woff"), url(bZz5ktl0LO5F.otf) format("opentype");
            font-weight: 400;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: MaisonNeue-Book;
            src: url(fonts/Uc2VRdBZy1LT.woff2) format("woff2"), url(fonts/ucIrMWzejGLx.woff) format("woff"), url(s1aEIKeVKAju.otf) format("opentype");
            font-weight: 700;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: MaisonNeue-Book;
            src: url(fonts/0H0Hf1QJQ1jY.woff2) format("woff2"), url(fonts/QD4B26PtZ1ey.woff) format("woff"), url(kYrlzGPMgJFj.otf) format("opentype");
            font-weight: 400;
            font-style: italic;
            font-display: swap
        }

        @font-face {
            font-family: MaisonNeue-Demi;
            src: url(fonts/tVyS8nB6UCxh.woff2) format("woff2"), url(fonts/bot9UupgwCcq.woff) format("woff"), url(pYofit6XH429.otf) format("opentype");
            font-weight: 400;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: MaisonNeueExtended-Bold;
            src: url(fonts/LYGCnF2fWDyl.woff2) format("woff2"), url(fonts/YhLJbKx1ap7t.woff) format("woff"), url(L4smXnZH5dIX.otf) format("opentype");
            font-weight: 400;
            font-style: normal;
            font-display: swap
        }

        /*# sourceMappingURL=maps/fonts.css.map */
    </style>
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select,
        textarea,
        label,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Montserrat, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1 {
            position: absolute;
            margin: 0;
            font-size: 40px;
            color: #fff;
            z-index: 2;
            line-height: 83px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 20px;
        }

        form {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 8px #F48315;
        }

        .banner {
            position: relative;
            height: 350px;
            background-image: url("images/1jKsECHMBc2y.jpg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .banner::after {
            content: "";
            background-color: rgba(0, 0, 0, 0.2);
            position: absolute;
            width: 100%;
            height: 100%;
        }

        input,
        select,
        textarea {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
        }

        input[type="date"] {
            padding: 4px 5px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .item:hover p,
        .item:hover i,
        .question:hover p,
        .question label:hover,
        input:hover::placeholder {
            color: #F48315;
        }

        .item input:hover,
        .item select:hover,
        .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 3px 0 #F48315;
            color: #F48315;
        }

        .item {
            position: relative;
            margin: 10px 0;
        }

        .item span {
            color: red;
        }

        .week {
            display: flex;
            justify-content: space-between;
        }

        .colums {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .colums div {
            width: 48%;
        }

        .colums2 {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .colums2 div {
            width: 22%;
        }

        .colums3 {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .colums3 div {
            width: 13%;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        .item i,
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: relative;
            font-size: 20px;
            color: #a3c2c2;
        }

        .item i {
            right: 1%;
            top: 30px;
            z-index: 1;
        }

        input[type=radio],
        input[type=checkbox] {
            display: none;
        }

        label.radio {
            position: relative;
            display: flex;
            margin: 5px 20px 15px 0;
            cursor: pointer;
        }

        .question span {
            margin-left: 30px;
        }

        .question-answer label {
            display: block;
        }

        label.radio:before {
            content: "";
            position: absolute;
            left: 0;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        input[type=radio]:checked+label:before,
        label.radio:hover:before {
            border: 2px solid #F48315;
        }

        label.radio:after {
            content: "";
            position: absolute;
            top: 6px;
            left: 5px;
            width: 8px;
            height: 4px;
            border: 3px solid #F48315;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        input[type=radio]:checked+label:after {
            opacity: 1;
        }

        .flex {
            display: flex;
            justify-content: space-around;
        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #F48315;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background: #a3c2c2;
        }

        @media (min-width: 568px) {

            .name-item,
            .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .name-item input,
            .name-item div {
                width: calc(50% - 20px);
            }

            .name-item div input {
                width: 97%;
            }

            .name-item div label {
                display: block;
                padding-bottom: 5px;
            }
        }

        .text-posisi {
            font-size: 26px;
        }
    </style>

    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="https://career.fap-agri.com/public/favicon.ico" type="image/x-icon">


</head>

<body>
    <header class="c-header c-header--gocareer c-header--gocareer__white">
        <div class="container">
            <?php
            require('components/navbar.php');
            ?>
        </div>
        <div class="c-header--gocareer__hamburger c-header--gocareer__hamburger--white u-hide--desktop js-side-menu" data-target="js-content-side-munu"></div>
        <div class="c-header--gocareer__side-menu c-header--gocareer__side-menu--white u-hide--desktop" id="js-content-side-munu">
            <?php
            require('components/navbar_mobile.php');
            ?>
        </div>
    </header>


    <section class="c-section ">
        <div class="row js-slider-banner" data-slider-dot="true">

        </div>
    </section>




    <section class="form">
        <div class="testbox">
            <form method="POST" action="form.php?id=<?= $id; ?>" enctype="multipart/form-data">
                <div class="banner">
                    <h1>
                        EMPLOYMENT APPLICATION FORM<br />
                        <span class="text-posisi"><?= $posisi; ?> - <?= $nama_posisi; ?></span>
                    </h1>
                </div>
                </br>
                <span class="text-danger">
                    <?php
                    if (isset($_SESSION['err'])) {
                        echo $_SESSION['err'];
                        unset($_SESSION['err']);
                    }
                    ?>
                </span>
                <br />
                <h4>I. Biographical </h4>

                <div class="colums">
                    <div class="item">
                        <label for="fname"> First Name<span>*</span></label>
                        <input id="fname" type="varchar" name="fname" value="<?= $old['fname']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_fname'])) {
                                echo $_SESSION['err_fname'];
                                unset($_SESSION['err_fname']);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="item">
                        <label for="lname"> Last Name<span>*</span></label>
                        <input id="lname" type="varchar" name="lname" value="<?= $old['lname']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_lname'])) {
                                echo $_SESSION['err_lname'];
                                unset($_SESSION['err_lname']);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="item">
                        <label for="jk">Sex<span>*</span></label>
                        <select name="jk" required>
                            <option value=""></option>
                            <option <?php echo ($old['jk'] == 'Male') ?  "selected" : null; ?> value="Male">Male</option>
                            <option <?php echo ($old['jk'] == 'Female') ?  "selected" : null; ?> value="Female">Female</option>
                        </select>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_jk'])) {
                                echo $_SESSION['err_jk'];
                                unset($_SESSION['err_jk']);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="item">
                        <label for="national">Nationality<span>*</span></label>
                        <select name="national" required>
                            <option value=""></option>
                            <option <?= $old['national'] == "WNI" ? "selected" : ""; ?> value="WNI">Warga Negara Indonesia</option>
                            <option <?= $old['national'] == "WNA" ? "selected" : ""; ?> value="WNA">Warga Negara Asing</option>
                        </select>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_national'])) {
                                echo $_SESSION['err_national'];
                                unset($_SESSION['err_national']);
                            }
                            ?>
                        </span>
                    </div>


                    <div class="item">
                        <label for="tempat_lahir"> Place Of Birth<span>*</span></label>
                        <input id="tempat_lahir" type="varchar" name="tempat_lahir" value="<?= $old['tempat_lahir']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_tempat_lahir'])) {
                                echo $_SESSION['err_tempat_lahir'];
                                unset($_SESSION['err_tempat_lahir']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="item">
                        <label for="tgl_lahir">Date Of Birth<span>*</span></label>
                        <input id="tgl_lahir" type="date" name="tgl_lahir" value="<?= $old['tgl_lahir']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_tgl_lahir'])) {
                                echo $_SESSION['err_tgl_lahir'];
                                unset($_SESSION['err_tgl_lahir']);
                            }
                            ?>
                        </span>
                    </div>

                </div>

                <div class="colums">
                    <div class="item">
                        <label for="alamat">Current Address<span>*</span></label>
                        <input id="alamat" type="varchar" name="alamat" value="<?= $old['alamat']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_alamat'])) {
                                echo $_SESSION['err_alamat'];
                                unset($_SESSION['err_alamat']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="item">
                        <label for="email">Email <span>*</span></label>
                        <input id="email" type="email" name="email" value="<?= $old['email']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_email'])) {
                                echo $_SESSION['err_email'];
                                unset($_SESSION['err_email']);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="item">
                        <label for="hp">Mobile Number<span>*</span></label>
                        <input id="hp" type="number" name="hp" value="<?= $old['hp']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_hp'])) {
                                echo $_SESSION['err_hp'];
                                unset($_SESSION['err_hp']);
                            }
                            ?>
                        </span>
                    </div>
                </div>



                <h4>II. Education Background</h4>

                <div class="colums2">

                    <div class="item">
                        <label for="pendidikan">Highest Education Degree<span>*</span></label>
                        <select name="pendidikan" required>
                            <option value=""></option>
                            <option <?= $old['pendidikan'] == "SMA/SMK/Sederajat" ? "selected" : ""; ?> value="SMA/SMK/Sederajat">SMA/SMK/Sederajat</option>
                            <option <?= $old['pendidikan'] == "D1" ? "selected" : ""; ?> value="D1">D1</option>
                            <option <?= $old['pendidikan'] == "DIII" ? "selected" : ""; ?> value="DIII">DIII</option>
                            <option <?= $old['pendidikan'] == "S1/DIV" ? "selected" : ""; ?> value="S1/DIV">S1/DIV</option>
                            <option <?= $old['pendidikan'] == "S2" ? "selected" : ""; ?> value="S2">S2</option>
                            <option <?= $old['pendidikan'] == "S3" ? "selected" : ""; ?> value="S3">S3</option>
                        </select>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_pendidikan'])) {
                                echo $_SESSION['err_pendidikan'];
                                unset($_SESSION['err_pendidikan']);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="item">
                        <label for="jurusan">Major<span>*</span></label>
                        <input id="jurusan" type="varchar" name="jurusan" value="<?= $old['jurusan']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_jurusan'])) {
                                echo $_SESSION['err_jurusan'];
                                unset($_SESSION['err_jurusan']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="item">
                        <label for="ipk">GPA/IPK<span>*</span></label>
                        <input id="ipk" type="number" name="ipk" value="<?= $old['ipk']; ?>" min="1" max="4" step="0.1" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_jurusan'])) {
                                echo $_SESSION['err_jurusan'];
                                unset($_SESSION['err_jurusan']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="item">
                        <label for="max_ipk">Max GPA/IPK<span>*</span></label>
                        <input id="max_ipk" type="number" name="max_ipk" value="<?= $old['max_ipk']; ?>" min="1" max="4" step="0.1" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_max_ipk'])) {
                                echo $_SESSION['err_max_ipk'];
                                unset($_SESSION['err_max_ipk']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="colums2">
                    <div class="item">
                        <label for="status_universitas">Status Universitas<span>*</span></label>
                        <select name="status_universitas" required>
                            <option value=""></option>
                            <option <?= $old['status_universitas'] == "1" ? "selected" : ""; ?> value="1">Negeri</option>
                            <option <?= $old['status_universitas'] == "2" ? "selected" : ""; ?> value="2">Swasta</option>
                        </select>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_status_universitas'])) {
                                echo $_SESSION['err_status_universitas'];
                                unset($_SESSION['err_status_universitas']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="item">
                        <label for="lokasi_univ">Lokasi Universitas<span>*</span></label>
                        <select name="lokasi_univ" required>
                            <option value=""></option>
                            <option <?= $old['lokasi_univ'] == "1" ? "selected" : ""; ?> value="1">Indonesia</option>
                            <option <?= $old['lokasi_univ'] == "2" ? "selected" : ""; ?> value="2">Luar Negeri</option>
                        </select>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_lokasi_univ'])) {
                                echo $_SESSION['err_lokasi_univ'];
                                unset($_SESSION['err_lokasi_univ']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="item">
                        <label for="jurusan_sawit">Jurusan berkaitan dengan Sawit?<span>*</span></label>
                        <select name="jurusan_sawit" required>
                            <option value=""></option>
                            <option <?= $old['jurusan_sawit'] == "Y" ? "selected" : ""; ?> value="Y">Yes</option>
                            <option <?= $old['jurusan_sawit'] == "N" ? "selected" : ""; ?> value="N">No</option>
                        </select>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_jurusan_sawit'])) {
                                echo $_SESSION['err_jurusan_sawit'];
                                unset($_SESSION['err_jurusan_sawit']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                </br>


                <h4><b> III. Job Experiences </b></h4>

                <div class="colums2">
                    <div class="item">
                        <label for="pengalaman">Tahun Pengalaman Kerja<span>*</span></label>
                        <input id="pengalaman" type="number" name="pengalaman" value="<?= $old['pengalaman']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_pengalaman'])) {
                                echo $_SESSION['err_pengalaman'];
                                unset($_SESSION['err_pengalaman']);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="item">
                        <label for="pengalaman_kebun">Tahun Pengalaman Kerja di Perkebunan<span>*</span></label>
                        <input id="pengalaman_kebun" type="number" name="pengalaman_kebun" value="<?= $old['pengalaman_kebun']; ?>" required />
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_pengalaman_kebun'])) {
                                echo $_SESSION['err_pengalaman_kebun'];
                                unset($_SESSION['err_pengalaman_kebun']);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="item">
                        <label for="lokasi_kalimantan">Bersedia ditempatkan di Kalimantan<span>*</span></label>
                        <select name="lokasi_kalimantan" required>
                            <option value=""></option>
                            <option <?= $old['lokasi_kalimantan'] == "Yes" ? "selected" : ""; ?> value="Yes">Yes</option>
                            <option <?= $old['lokasi_kalimantan'] == "No" ? "selected" : ""; ?> value="No">No</option>
                        </select>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_lokasi_kalimantan'])) {
                                echo $_SESSION['err_lokasi_kalimantan'];
                                unset($_SESSION['err_lokasi_kalimantan']);
                            }
                            ?>
                        </span>
                    </div>
                </div>


                <div class="colums">
                    <div class="item">
                        <label for="file_cv"> Upload Your CV </label> </br>
                        <p style="font-style: italic; color: red;">*Maximum upload 3MB (pdf)</p>
                        <input type="file" id="file" name="file" accept="application/pdf" required>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_file'])) {
                                echo $_SESSION['err_file'];
                                unset($_SESSION['err_file']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="item">
                        <label for="file_cv"> Upload Your Application Letter </label> </br>
                        <p style="font-style: italic; color: red;">Maximum upload 3MB (docx,pptx,pdf)</p>
                        <input type="file" id="file_surat" name="file_surat" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation" required>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['err_file_surat'])) {
                                echo $_SESSION['err_file_surat'];
                                unset($_SESSION['err_file_surat']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <h2 class="mt-5">Applicants Agreements</h2>
                <input type="checkbox" name="checkbox1">
                <label>
                    <li>I certify that information contained in this application is true and complete
                    </li>
                    <li>I understand that false information may be grounds for not hiring me and for immediate
                    </li>
                    <li>terimnation of employment at any point in the future if I am hired
                    </li>
                    <li>I authorize the veifircation of all of information listed above
                    </li>

                </label>
                <div class="btn-block">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>

    </div>

    <?php include('components/footer.php'); ?>



    <script>
        var dataLocations = {
            "other": {
                "child": {
                    "-": {
                        "name": "-",
                        "slug": "-"
                    },
                    "aceh": {
                        "name": "Aceh",
                        "slug": "aceh"
                    },
                    "banjarbaru": {
                        "name": "Banjarbaru",
                        "slug": "banjarbaru"
                    },
                    "batusangkar": {
                        "name": "Batusangkar",
                        "slug": "batusangkar"
                    },
                    "bengalurugurugram": {
                        "name": "Bengaluru/Gurugram",
                        "slug": "bengalurugurugram"
                    },
                    "bengalurujakarta": {
                        "name": "Bengaluru/Jakarta",
                        "slug": "bengalurujakarta"
                    },
                    "cikarang": {
                        "name": "Cikarang",
                        "slug": "cikarang"
                    },
                    "cirebon": {
                        "name": "Cirebon",
                        "slug": "cirebon"
                    },
                    "ejbn": {
                        "name": "EJBN",
                        "slug": "ejbn"
                    },
                    "garut": {
                        "name": "Garut",
                        "slug": "garut"
                    },
                    "hanoi": {
                        "name": "Hanoi",
                        "slug": "hanoi"
                    },
                    "jakartasingaporebengaluru": {
                        "name": "Jakarta/Singapore/Bengaluru",
                        "slug": "jakartasingaporebengaluru"
                    },
                    "jogja": {
                        "name": "Jogja",
                        "slug": "jogja"
                    },
                    "karawang": {
                        "name": "Karawang",
                        "slug": "karawang"
                    },
                    "ntb": {
                        "name": "NTB",
                        "slug": "ntb"
                    },
                    "palangkaray": {
                        "name": "Palangkaray",
                        "slug": "palangkaray"
                    },
                    "pati": {
                        "name": "Pati",
                        "slug": "pati"
                    },
                    "pune": {
                        "name": "Pune",
                        "slug": "pune"
                    },
                    "purwokerto": {
                        "name": "Purwokerto",
                        "slug": "purwokerto"
                    },
                    "sidoarjo": {
                        "name": "Sidoarjo",
                        "slug": "sidoarjo"
                    },
                    "tegal": {
                        "name": "Tegal",
                        "slug": "tegal"
                    }
                },
                "name": "Other",
                "slug": "other"
            },
            "indonesia": {
                "child": {
                    "ambon": {
                        "name": "Ambon",
                        "slug": "ambon"
                    },
                    "bali": {
                        "name": "Bali",
                        "slug": "bali"
                    },
                    "balikpapan": {
                        "name": "Balikpapan",
                        "slug": "balikpapan"
                    },
                    "banda-aceh": {
                        "name": "Banda Aceh",
                        "slug": "banda-aceh"
                    },
                    "bandar-lampung": {
                        "name": "Bandar Lampung",
                        "slug": "bandar-lampung"
                    },
                    "bandung": {
                        "name": "Bandung",
                        "slug": "bandung"
                    },
                    "banjarmasin": {
                        "name": "Banjarmasin",
                        "slug": "banjarmasin"
                    },
                    "banyuwangi": {
                        "name": "Banyuwangi",
                        "slug": "banyuwangi"
                    },
                    "batam": {
                        "name": "Batam",
                        "slug": "batam"
                    },
                    "bekasi": {
                        "name": "Bekasi",
                        "slug": "bekasi"
                    },
                    "bekasi-city": {
                        "name": "Bekasi City",
                        "slug": "bekasi-city"
                    },
                    "bogor": {
                        "name": "Bogor",
                        "slug": "bogor"
                    },
                    "bogor-city": {
                        "name": "Bogor City",
                        "slug": "bogor-city"
                    },
                    "bojonegoro": {
                        "name": "Bojonegoro",
                        "slug": "bojonegoro"
                    },
                    "bukittinggi": {
                        "name": "Bukittinggi",
                        "slug": "bukittinggi"
                    },
                    "central-java": {
                        "name": "Central Java",
                        "slug": "central-java"
                    },
                    "ciamis": {
                        "name": "Ciamis",
                        "slug": "ciamis"
                    },
                    "cilacap": {
                        "name": "Cilacap",
                        "slug": "cilacap"
                    },
                    "cilegon": {
                        "name": "Cilegon",
                        "slug": "cilegon"
                    },
                    "cirebon": {
                        "name": "Cirebon",
                        "slug": "cirebon"
                    },
                    "denpasar": {
                        "name": "Denpasar",
                        "slug": "denpasar"
                    },
                    "depok": {
                        "name": "Depok",
                        "slug": "depok"
                    },
                    "depok-city": {
                        "name": "Depok City",
                        "slug": "depok-city"
                    },
                    "east-indonesia": {
                        "name": "East Indonesia",
                        "slug": "east-indonesia"
                    },
                    "east-java-and-bali": {
                        "name": "East Java and Bali",
                        "slug": "east-java-and-bali"
                    },
                    "garut": {
                        "name": "Garut",
                        "slug": "garut"
                    },
                    "gorontalo": {
                        "name": "Gorontalo",
                        "slug": "gorontalo"
                    },
                    "indramayu": {
                        "name": "Indramayu",
                        "slug": "indramayu"
                    },
                    "jakarta": {
                        "name": "Jakarta",
                        "slug": "jakarta"
                    },
                    "jambi": {
                        "name": "Jambi",
                        "slug": "jambi"
                    },
                    "jayapura": {
                        "name": "Jayapura",
                        "slug": "jayapura"
                    },
                    "jember": {
                        "name": "Jember",
                        "slug": "jember"
                    },
                    "kalimantan": {
                        "name": "Kalimantan",
                        "slug": "kalimantan"
                    },
                    "karawang": {
                        "name": "Karawang",
                        "slug": "karawang"
                    },
                    "kebumen": {
                        "name": "Kebumen",
                        "slug": "kebumen"
                    },
                    "kediri": {
                        "name": "Kediri",
                        "slug": "kediri"
                    },
                    "kendari": {
                        "name": "Kendari",
                        "slug": "kendari"
                    },
                    "kota-bandung": {
                        "name": "Kota Bandung",
                        "slug": "kota-bandung"
                    },
                    "kota-malang": {
                        "name": "Kota Malang",
                        "slug": "kota-malang"
                    },
                    "kota-surabaya": {
                        "name": "Kota Surabaya",
                        "slug": "kota-surabaya"
                    },
                    "kudus": {
                        "name": "Kudus",
                        "slug": "kudus"
                    },
                    "kupang": {
                        "name": "Kupang",
                        "slug": "kupang"
                    },
                    "lampung": {
                        "name": "Lampung",
                        "slug": "lampung"
                    },
                    "madiun": {
                        "name": "Madiun",
                        "slug": "madiun"
                    },
                    "majalengka": {
                        "name": "Majalengka",
                        "slug": "majalengka"
                    },
                    "makassar": {
                        "name": "Makassar",
                        "slug": "makassar"
                    },
                    "malang": {
                        "name": "Malang",
                        "slug": "malang"
                    },
                    "manado": {
                        "name": "Manado",
                        "slug": "manado"
                    },
                    "mataram": {
                        "name": "Mataram",
                        "slug": "mataram"
                    },
                    "medan": {
                        "name": "Medan",
                        "slug": "medan"
                    },
                    "medan-city": {
                        "name": "Medan City",
                        "slug": "medan-city"
                    },
                    "merauke": {
                        "name": "Merauke",
                        "slug": "merauke"
                    },
                    "north-sumatra": {
                        "name": "North Sumatra",
                        "slug": "north-sumatra"
                    },
                    "padang": {
                        "name": "Padang",
                        "slug": "padang"
                    },
                    "padang-panjang": {
                        "name": "Padang Panjang",
                        "slug": "padang-panjang"
                    },
                    "padang-sidempuan": {
                        "name": "Padang Sidempuan",
                        "slug": "padang-sidempuan"
                    },
                    "palembang": {
                        "name": "Palembang",
                        "slug": "palembang"
                    },
                    "palopo": {
                        "name": "Palopo",
                        "slug": "palopo"
                    },
                    "palu": {
                        "name": "Palu",
                        "slug": "palu"
                    },
                    "pamekasan": {
                        "name": "Pamekasan",
                        "slug": "pamekasan"
                    },
                    "pangandaran": {
                        "name": "Pangandaran",
                        "slug": "pangandaran"
                    },
                    "pangandaran-regency": {
                        "name": "Pangandaran Regency",
                        "slug": "pangandaran-regency"
                    },
                    "pangkal-pinang": {
                        "name": "Pangkal Pinang",
                        "slug": "pangkal-pinang"
                    },
                    "pekalongan": {
                        "name": "Pekalongan",
                        "slug": "pekalongan"
                    },
                    "pekanbaru": {
                        "name": "Pekanbaru",
                        "slug": "pekanbaru"
                    },
                    "pematangsiantar": {
                        "name": "Pematangsiantar",
                        "slug": "pematangsiantar"
                    },
                    "pematang-siantar": {
                        "name": "Pematang Siantar",
                        "slug": "pematang-siantar"
                    },
                    "pontianak": {
                        "name": "Pontianak",
                        "slug": "pontianak"
                    },
                    "pringsewu": {
                        "name": "Pringsewu",
                        "slug": "pringsewu"
                    },
                    "sabang": {
                        "name": "Sabang",
                        "slug": "sabang"
                    },
                    "salatiga": {
                        "name": "Salatiga",
                        "slug": "salatiga"
                    },
                    "samarinda": {
                        "name": "Samarinda",
                        "slug": "samarinda"
                    },
                    "semarang": {
                        "name": "Semarang",
                        "slug": "semarang"
                    },
                    "serang": {
                        "name": "Serang",
                        "slug": "serang"
                    },
                    "solo": {
                        "name": "Solo",
                        "slug": "solo"
                    },
                    "solok": {
                        "name": "Solok",
                        "slug": "solok"
                    },
                    "sorong": {
                        "name": "Sorong",
                        "slug": "sorong"
                    },
                    "south-sumatra": {
                        "name": "South Sumatra",
                        "slug": "south-sumatra"
                    },
                    "subang": {
                        "name": "Subang",
                        "slug": "subang"
                    },
                    "sukabumi": {
                        "name": "Sukabumi",
                        "slug": "sukabumi"
                    },
                    "sukoharjo": {
                        "name": "Sukoharjo",
                        "slug": "sukoharjo"
                    },
                    "sumatra": {
                        "name": "Sumatra",
                        "slug": "sumatra"
                    },
                    "sumedang": {
                        "name": "Sumedang",
                        "slug": "sumedang"
                    },
                    "surabaya": {
                        "name": "Surabaya",
                        "slug": "surabaya"
                    },
                    "tangerang": {
                        "name": "Tangerang",
                        "slug": "tangerang"
                    },
                    "tanjung-pinang": {
                        "name": "Tanjung Pinang",
                        "slug": "tanjung-pinang"
                    },
                    "tarakan": {
                        "name": "Tarakan",
                        "slug": "tarakan"
                    },
                    "tasikmalaya": {
                        "name": "Tasikmalaya",
                        "slug": "tasikmalaya"
                    },
                    "tasikmalaya-city": {
                        "name": "Tasikmalaya City",
                        "slug": "tasikmalaya-city"
                    },
                    "tegal": {
                        "name": "Tegal",
                        "slug": "tegal"
                    },
                    "ternate": {
                        "name": "Ternate",
                        "slug": "ternate"
                    },
                    "yogyakarta": {
                        "name": "Yogyakarta",
                        "slug": "yogyakarta"
                    }
                },
                "name": "Indonesia",
                "slug": "indonesia"
            },
            "thailand": {
                "child": {
                    "bangkok": {
                        "name": "Bangkok",
                        "slug": "bangkok"
                    }
                },
                "name": "Thailand",
                "slug": "thailand"
            },
            "india": {
                "child": {
                    "bengaluru": {
                        "name": "Bengaluru",
                        "slug": "bengaluru"
                    },
                    "gurugram": {
                        "name": "Gurugram",
                        "slug": "gurugram"
                    }
                },
                "name": "India",
                "slug": "india"
            },
            "vietnam": {
                "child": {
                    "ho-chi-minh-city": {
                        "name": "Ho Chi Minh City",
                        "slug": "ho-chi-minh-city"
                    },
                    "vietnam": {
                        "name": "Vietnam",
                        "slug": "vietnam"
                    }
                },
                "name": "Vietnam",
                "slug": "vietnam"
            },
            "philippines": {
                "child": {
                    "makati": {
                        "name": "Makati",
                        "slug": "makati"
                    },
                    "manila": {
                        "name": "Manila",
                        "slug": "manila"
                    }
                },
                "name": "Philippines",
                "slug": "philippines"
            },
            "singapore": {
                "child": {
                    "singapore": {
                        "name": "Singapore",
                        "slug": "singapore"
                    }
                },
                "name": "Singapore",
                "slug": "singapore"
            }
        };
        var titleAllCities = "Semua Kota";
    </script>

    <script>
        function cekemail(email) {
            if (email.indexOf("@") != -1 && email.indexOf(".") != -1) {
                alert("Format email Anda Benar");
            } else {
                alert("Format email Anda salah!!");
            }
        }
    </script>


    <script src="js/DyUVfnQzjmf5.js"></script>
    <script src="js/EfyJtMJ15CLx.js"></script>
    <script src="js/hwtS4kIXeeP4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>