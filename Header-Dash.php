<?php
session_start();
include "Koneksi.php";

if (!isset($_SESSION['STATUS'])) {
    // header("location:index.php");

    //if (!isset($_SESSION['USER'])) {
    ?>
    <script language="JavaScript">
        alert('Anda Belum Login!');
        document.location = 'Login.php';
    </script>
<?php
}

?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Sekurindo 2020</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <!-- <link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon"> -->
    <link rel="icon" href="https://admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admindek/files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="admindek/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="admindek/files/assets/icon/feather/css/feather.css">

    <link rel="stylesheet" type="text/css" href="admindek/files/assets/css/font-awesome-n.min.css">

    <link rel="stylesheet" href="admindek/files/bower_components/chartist/css/chartist.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="admindek/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="admindek/files/assets/css/widget.css">

    <!--ChartJS-->
    <link rel="stylesheet" type="text/css" href="admindek/Chartjs/Chart.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="admindek/Chartjs/dist/Chart.min.js"> </script>
    <!--ChartJS-->

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }

        /* TOOLTIP */
        .tooltipNew {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltipNew .tooltiptextNew {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;
        }

        .tooltipNew:hover .tooltiptextNew {
            visibility: visible;
        }
    </style>
</head>

<body>
    <div class="loader-bg">
        <div class="loader-bar"></div>

    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="#">
                            <!-- <img class="img-fluid" src="admindek/files/assets/images/logo_sekurindo.png" alt="Theme-Logo" /> -->
                            <h5>Sekurindo 2020</h5>
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <!-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li> -->
                            <li>
                                <a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" class="waves-effect waves-light" data-cf-modified-70fee25a3c7cd0403f7a727e-="">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="admindek/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>Hai,
                                            <?php if ($_SESSION['STATUS'] == 1) {
                                                $s = 'Admin Operasional';
                                            } elseif ($_SESSION['STATUS'] == 2) {
                                                $s = 'Supervisior';
                                            } elseif ($_SESSION['STATUS'] == 3) {
                                                $s = 'Area Sales Manager';
                                            }
                                            echo $s;
                                            ?>
                                        </span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <!-- <li>
                                <a href="#!">
                                <i class="feather icon-settings"></i> Settings
                                </a>
                            </li> -->
                                        <!-- <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profil
                                            </a>
                                        </li> -->
                                        <!-- <li>
                                <a href="email-inbox.html">
                                <i class="feather icon-mail"></i> My Messages
                                </a>
                            </li> -->
                                        <!-- <li>
                                <a href="auth-lock-screen.html">
                                <i class="feather icon-lock"></i> Lock Screen
                                </a>
                            </li> -->
                                        <li>
                                            <a href="Logout.php">
                                                <i class="feather icon-log-out"></i> Keluar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">Navigation</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <?php
                                    if ($_SESSION['STATUS'] == 1 || $_SESSION['STATUS'] == 2 || $_SESSION['STATUS'] == 3) { ?>
                                        <li class="pcoded active">
                                            <a href="index" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                <span class="pcoded-mtext">Dashboard</span>
                                            </a>
                                        </li>

                                    <?php } ?>
                                    <?php if ($_SESSION['STATUS'] == 1 || $_SESSION['STATUS'] == 2) { ?>
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                                <span class="pcoded-mtext">Master Data</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <?php if ($_SESSION['STATUS'] == 1) { ?>
                                                    <li class="">
                                                        <a href="mDataUsers.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Data User</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="mPerusahaan.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Data Perusahaan</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="mDataToko.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Data Toko</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="mDataBarang.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Data Barang</span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <li class="">
                                                    <a href="mDataStokBarang.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Data Stok Barang</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="mDataPenjualanToko.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Data Penjualan Toko</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="mDataKehilanganBarang.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Data Kehilangan Barang</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="mDataKaryawan.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Data Karyawan</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="mDataKeluhan.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Data Keluhan Pelanggan</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="mDataPendapatan.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Data Pendapatan</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($_SESSION['STATUS'] == 1) { ?>
                                        <ul class="pcoded-item pcoded-left-item">
                                            <li class="pcoded-hasmenu">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                                                    <span class="pcoded-mtext">Penilaian Prespektif</span>
                                                </a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="mJenisPrespektif.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Data Jenis Prespektif</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="mKriteria.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Data Kriteria</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="mPenilaianPrespektif.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Buat Penilaian</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="dHasilPenilaian.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Hasil Penilaian</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <li class="">
                                            <a href="mPenilaianKinerja.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-inbox"></i></span>
                                                <span class="pcoded-mtext">Penilaian Kinerja</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="rRekapHasilSkor.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                                                <span class="pcoded-mtext">Rekap Penilaian</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($_SESSION['STATUS'] == 1 || $_SESSION['STATUS'] == 3) { ?>
                                        <ul class="pcoded-item pcoded-left-item">
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                                                    <span class="pcoded-mtext">Laporan</span>
                                                </a>
                                                <!-- <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="index.html" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Data Toko</span>
                                                        </a>
                                                    </li>
                                                </ul> -->
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </nav>