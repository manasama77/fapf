<?php
session_start();
session_destroy();

require_once('constants.php');
require_once('class/c_list_job.php');

$id = ($_GET['id']) ?? null;

if ($id == "") {
    return header("location:" . APP_URL . "/job-list.php");
}

$c_list_jobs = new CListJob();

$job = $c_list_jobs->show($id);

// echo '<pre>' . print_r($list_jobs, 1) . '</pre>';
// exit;

?>

<!DOCTYPE html>
<html class="no-js">

<head>

    <title>Job Detail - Career at FAP AGRI - FAP AGRI Career</title>
    <meta name="description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia">
    <meta itemprop="name" content="Career at FAP AGRI - FAP AGRI Career">
    <meta itemprop="description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia.">
    <meta name="twitter:title" content="Career at FAP AGRI - FAP AGRI Career">
    <meta name="twitter:description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia.">
    <meta property="og:title" content="Career at FAP AGRI - FAP AGRI Career">
    <meta property="og:description" content="Give impact while doing what you&#39;re capable of. View open job at FAP AGRI in Indonesia.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

    <style>
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





    <section class="c-section c-banner-slider--hero mb-0">
        <div class="row js-slider-banner" data-slider-dot="true">

            <div class="col c-banner-slider--hero__wrapper">
                <picture>
                    <source src="images/1jKsECHMBc2y.jpg" srcset="images/ro0ID5rO7wU8.jpg 400w, images/mE8VG8U5bRuY.jpg 800w, images/1jKsECHMBc2y.jpg 3000w" media="(min-width: 769px)" alt="FAP-AGRI-CAREER">
                    <img data-src="images/hero-banner012x_3.jpg" data-srcset="images/hero-banner012x_3.jpg 400w, images/hero-banner012x_3.jpg 800w, images/hero-banner012x_3.jpg 3000w" class="lazy" alt="FAP-AGRI-CAREER">
                </picture>
                <div class="container">
                    <div class="row c-banner-slider--hero__content">
                        <div class="col-12 col-md-5">
                            <h1 class="mb-2">Kesempatan Berkarir Bersama FAP Agri</h1>
                            <p>FAP Agri memiliki komitmen untuk menghasilkan produk berkualitas, ramah lingkungan dengan berpegang teguh pada tata kelola yang baik untuk mencapai kinerja unggul, mewujudkan kesejahteraan karyawan, serta menjadikan masyarakat mitra setara yang saling menguntungkan.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <div class="col-sm-8 pr-3">
                <h3 class="mt-2">
                    <?= $job['kode_jabatan']; ?> - <?= $job['nama_jabatan']; ?>
                </h3>
                <hr />

                <h4 class="mt-2">Job Description</h4>
                <p>
                    <?= $job['informasi_pekerjaan']; ?>
                </p>

                <h4 class="mt-2">Key Responsibilities</h4>
                <p>
                    <?= $job['tugas']; ?>
                </p>

                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <a href="<?= APP_URL; ?>/job-apply.php?id=<?= $job['id']; ?>">
                        <button class="btn-gocareer btn-default btn-default--theme-gocareer">
                            Apply for Job
                        </button>
                    </a>
                    <a href="<?= APP_URL; ?>/job-list.php" class="my-2">
                        <button class="btn-gocareer btn-default btn-outline--theme-gocareer">
                            Back to List
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="c-card">
                    <div class="c-card__body p-2">
                        <h3 class="mb-2">Job Overview</h3>
                        <p class="mb-2">Posted date:<br /><?= $job['tgl_posted']; ?></p>
                        <p class="mb-2">Expiration date:<br /><?= $job['tgl_dibutuhkan']; ?></p>
                        <p class="mb-2">Departemen:<br /><?= $job['nama_departemen']; ?></p>
                        <p class="mb-2">Location:<br /><?= $job['lokasi']; ?></p>
                        <p class="mb-2">Employee Status:<br /><?= $job['status_karyawan']; ?></p>
                        <p class="mb-2">Experience:<br /><?= $job['pengalaman']; ?> years</p>
                        <p class="mb-2">Age Requirement:<br /><?= $job['usia_min']; ?> ~ <?= $job['usia_max']; ?> years</p>
                        <p class="mb-2">Gender:<br /><?= $job['jk']; ?></p>
                        <p class="mb-2">Education:<br /><?= $job['pendidikan']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php include('components/footer.php'); ?>


    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> -->



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>