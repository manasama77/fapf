<?php

require_once('constants.php');
require_once('class/c_list_job.php');
$lokasi = ($_GET['lokasi']) ?? null;
$c_list_jobs = new CListJob($lokasi);

$list_jobs = $c_list_jobs->get();
?>

<!DOCTYPE html>
<html class="no-js">

<head>

    <title>Job List - Career at FAP AGRI - FAP AGRI Career</title>

    <?php
    include "components/meta.php";
    include "components/favicon.php";
    ?>

    <link rel="stylesheet" href="css/2023-05-01 - template.css">
    <link rel="stylesheet" href="css/main.css">



</head>

<body>
    <?php
    include "components/header.php";
    include "pages/job-list/";
    ?>


    <section class="c-section c-section--small--mb u-position u-position--sticky-top u-position--sticky-top--sec-top ">
        <form action="/job/search/" method="GET" id="js-form-search">
            <div class="c-card--full-width">
                <div class="container">
                    <div class="row c-search justify-content-md-center">

                        <div class="col-12 col-md-5 align-self-center u-hide--mobile" id="js-filter-desktop">
                            <div class="d-flex">



                            </div>
                        </div>


                        <div class="col-12 col-md-7 align-self-center d-flex">
                            <div class="c-search__group  ml-0 ml-md-2 mr-2 mr-md-0 ">
                                <input type="text" name="q" class="field-search" placeholder="Search Position..." value>
                                <input type="hidden" name="country" id="val-country" value>
                                <input type="hidden" name="city" id="val-city" value>
                                <button class="btn-search" type="submit">
                                    <i class="icon-search"></i>
                                    <span class="u-hide--mobile">Cari
                                    </span>
                                </button>
                            </div>

                            <span class="icon-filter align-self-center js-switch-filter u-hide--desktop" data-target="switch-filter"></span>

                        </div>

                    </div>
                </div>
            </div>
        </form>


    </section>


    <div class="u-hide--desktop" id="js-filter-mobile">
        <div class="c-menu-downtop" id="switch-filter-mobile">
            <div class="c-menu-downtop__content">
                <div class="c-menu-downtop__content__header u-text-align__center">
                    <span class="u-icon--swipe"></span>
                </div>
                <div class="c-menu-downtop__content__body c-menu-downtop__content__body--with-footer">



                    <div class="c-list-downtop">
                        <p class="c-list-downtop__header">Kota</p>
                        <ul class="c-list-downtop__group" id="list-item-city-mobile">
                            <li class="list-item js-item-country" id="list-item-country-all" data-target="country" data-value="all" data-title="Semua Kota">
                                <a href="javascript:;">Semua Kota</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-menu-downtop__content__footer">
                    <div class="row">
                        <div class="col">
                            <button class="btn-default btn-gocareer btn-default--theme-gocareer js-close-menu" type="button" data-target="switch-filter-mobile">Cancel</button>
                        </div>

                        <div class="col pl-1">
                            <button class="btn-default btn-gocareer btn-default--theme-gocareer js-ok-filter" type="button" data-target="switch-filter">OK</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <section class="c-section px-2">
        <div class="container">
            <div class="row">



                <div class="col-12 pl-0 pl-md-2">


                    <div class="row align-items-center c-toolbar c-toolbar--menu c-toolbar--theme-gocareer mb-3 u-hide--desktop js-menu-downtop" data-target="city">
                        <div class="col-3">
                            <p><i class="c-toolbar__icon icon-location"></i></p>
                        </div>
                        <div class="col-6">
                            <p class="">
                                Pilih Kota
                            </p>
                        </div>
                        <div class="col-3">
                            <p><i class="c-toolbar__icon icon-caret-down"></i></p>
                        </div>
                    </div>

                    <div class="row mb-0 mb-md-4">
                        <div class="col-12 col-md-5 align-self-center offset-md-3">
                            <h2 class="mb-2 mb-md-0 u-title--jobs">
                                Job list
                            </h2>
                        </div>
                    </div>

                    <hr class="c-hr mt-2 mb-2 mt-md-3 mb-md-3 offset-md-3">

                    <div class="row">

                        <div class="col-12 col-md-3 u-hide--mobile pr-0 pr-md-2">
                            <div class="u-position u-position--sticky-top u-position--sticky-top--ter-top">






                                <div class="c-filter--card">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="c-filter--card__selectbox">
                                                <span class="u-font-weight__bold c-filter--card__selectbox__label">Kota</span>
                                                <div class="c-dropdown">
                                                    <p class="u-fg--gocareer c-filter--card__selectbox__info js-dropdown js-menu-downtop" data-target="city">
                                                        Pilih Kota
                                                    </p>
                                                    <?php
                                                    $unique_lokasis = $c_list_jobs->get_unique_lokasi();
                                                    ?>
                                                    <div class="c-dropdown__list">
                                                        <ul class="u-hide--mobile">
                                                            <li class="list-item">
                                                                <a href="<?= APP_URL; ?>/job-list.php?lokasi=">
                                                                    Semua Lokasi
                                                                </a>
                                                            </li>
                                                            <?php
                                                            foreach ($unique_lokasis as $unique_lokasi) {
                                                            ?>
                                                                <li class="list-item">
                                                                    <a href="<?= APP_URL; ?>/job-list.php?lokasi=<?= $unique_lokasi['lokasi']; ?>">
                                                                        <?= $unique_lokasi['lokasi']; ?>
                                                                    </a>
                                                                </li>
                                                            <?php
                                                            }
                                                            ?>

                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-md-9 c-job-list">

                            <?php
                            $list_jobs = $c_list_jobs->get();
                            if (!$list_jobs) {
                            ?>
                                <div class="row">
                                    <h1>Job List Empty. Come back again later</h1>
                                </div>
                            <?php } else { ?>
                                <?php
                                $no = 1;
                                foreach ($list_jobs as $list_job) {
                                ?>
                                    <div class="row">
                                        <div class="col-12 c-job-list__item">
                                            <div class="c-card">
                                                <div class="c-card__body p-2">
                                                    <div class="row">
                                                        <div class="col-1 u-text-align__center--desktop">
                                                            <p class="u-font-weight__bold u-fg--goride">
                                                                <?= $no++; ?>
                                                            </p>
                                                        </div>

                                                        <div class="col-11">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6 ">
                                                                    <p class="u-font-weight__bold mb-1 mb-md-0">
                                                                        <a href="<?= APP_URL; ?>/form-pelamar.php">
                                                                            <?= $list_job['jabatan']; ?> - <?= $list_job['skill']; ?>
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-md-6 align-self-center">
                                                                    <div class="row">
                                                                        <div class="col-6 col-md-6 u-text-align__center--desktop">
                                                                            <p class="u-font-10--mb u-font-weight__bold u-fg--goride">Kota</p>
                                                                            <p><?= $list_job['lokasi']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="row justify-content-center mb-1 mb-md-0">
                        <div class="c-pagination">

                            <div class="col-auto">

                                <a>
                                    <button class="prev-end disable"></button>
                                </a>



                                <a class="u-hide--mobile">
                                    <button class="prev disable"></button>
                                </a>

                            </div>

                            <div class="col">


                                <a>
                                    <button class="active">1</button>
                                </a>



                                <a href="#"><button>2</button></a>



                                <a href="#"><button>3</button></a>


                            </div>

                            <div class="col-auto">

                                <a href="#" class="u-hide--mobile">
                                    <button class="next"></button>
                                </a>



                                <a href="#">
                                    <button class="next-end"></button>
                                </a>


                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <form action="#" method="GET" id="js-form-filter">
                <input type="hidden" name="country" id="val-country" value="">
                <input type="hidden" name="city" id="val-city" value="">

            </form>
        </div>
    </section>





    <footer class="container-fluid c-footer c-footer--gocareer" id="go-footer">
        <div class="container u-font-14">
            <div class="row u-text-align__center--mobile">
                <div class="col-12 col-lg-3">
                    <a href="/">
                        <div class="icon">
                            <img src="images/logo-fap-agri-white.png" alt="Fap-agri career logo">
                        </div>
                    </a>
                </div>

                <div class="col-12 col-lg">
                    <div class="row">
                        <a href="https://career.fap-agri.com/frontpage/job-list.php" class="col-12">Job List</a>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="row">
                        <a href="https://fap-agri.com/berita/" class="col-12">Berita</a>
                    </div>
                </div>

                <div class="col-12 col-lg">
                    <div class="row">
                        <a href="https://www.fap-agri.com" class="col-12" target="_blank">Website Corporate</a>
                    </div>
                </div>

            </div>
            <hr size="0.3" class="extra">
            <div class="row u-text-align__center--mobile">
                <div class="col-12 col-lg-4 order-3 order-lg-0">
                    <div class="row mb-2 mb-md-0">

                        <div class="col-12">
                            Gedung Gold Coast, Tower Liberty Lt. 16 A- H </br>
                            Jl. Pantai Indah Kapuk, RT.6, RW.2, Kamal Muara, </br>
                            Penjaringan, Jakarta Utara 14470
                            </br>
                            </br>
                            <a href="mailto:corp.secretary@fap-agri.com">corp.secretary@fap-agri.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg pb-4 pb-lg-0">
                    <div class="row social-media justify-content-center justify-content-lg-start mt-0">
                        <div class="col-12 pb-1 pb-lg-0 mb-2">Download Our App:</div>
                        <div class="row">
                            <a href="" class="col col-md-5 pr-1">
                                <img class="col-12 lazy" data-src="https://lelogama.go-jek.com/component/nav/picture/google-play-badge3x-p.png" alt="Play Store Download Link">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg pb-4 pb-lg-0">


                    <div class="col-12 c-social c-social--white">

                        <p class="c-social__copy col-12 mb-2">Connect with us</p>

                        <div class="row c-social__items">


                            <a href="https://www.facebook.com/fapagri.official/" target="_blank" class="c-social__icon-wrapper">
                                <i class="c-social__icon gi gi-facebook"></i>
                            </a>

                            <a href="https://www.linkedin.com/company/fap-agri/" target="_blank" class="c-social__icon-wrapper">
                                <i class="c-social__icon gi gi-linkedin"></i>
                            </a>


                            <a href="https://www.instagram.com/fapagri.official/" target="_blank" class="c-social__icon-wrapper">
                                <i class="c-social__icon gi gi-instagram"></i>
                            </a>

                            <a href="https://twitter.com/FAPA_Official" target="_blank" class="c-social__icon-wrapper">
                                <i class="c-social__icon gi gi-twitter"></i>
                            </a>


                            <a href="https://www.youtube.com/@fapagri197" target="_blank" class="c-social__icon-wrapper">
                                <i class="c-social__icon gi gi-youtube"></i>
                            </a>


                        </div>
                    </div>

                </div>
            </div>
        </div>
        </br>
        </br>
        </br>
        </br>
        <div class="col-12 col lg">
            <center>
                <p> © 2023 - Powered by FAP-Agri Career. All right reserved. developed by <a href="https://trijayasolution.co.id">Trijaya Solution</a> </p>
            </center>
        </div>
    </footer>



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


    <script src="js/DyUVfnQzjmf5.js"></script>
    <script src="js/EfyJtMJ15CLx.js"></script>
    <script src="js/hwtS4kIXeeP4.js"></script>

</body>

</html>