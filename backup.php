<?php
include "Header.php";
error_reporting(0);
?>
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Daftar Toko Yang Dapat Melakukan Penilaian</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Alamat</center>
                                                </th>
                                                <th>
                                                    <center>Status</center>
                                                </th>
                                                <th>
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['minggu']) && $_GET['minggu'] == 'm1') {
                                                $a = $_GET['minggu'];
                                                @$tampil1 = "SELECT ID_TOKO as took, NAMA_TOKO, ALAMAT_TOKO,
                                                                (SELECT count(*)
                                                                    FROM KARYAWAN
                                                                    WHERE ID_TOKO = took) as jmlKar,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KELUHAN), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%') as qKel,
                                                                        (SELECT IFNULL(SUM(JUMLAH_TERLAYANI), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%') as qLayani,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KEHILANGAN), 0)
                                                                            FROM KEHILANGAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-1%') as qHilang,
                                                                        (SELECT IFNULL(SUM(STOK), 0)
                                                                            FROM STOK_BARANG
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_STOK, 1, 11) LIKE '%Minggu Ke-1%') as qStok,  
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qPenjualanm1,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-2%') as qPenjualanm2,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-3%') as qPenjualanm3,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-4%') as qPenjualanm4,
                                                                        (SELECT COUNT(ID_BARANG)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qJmlBarang,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENDAPATAN), 0)
                                                                            FROM PENDAPATAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENDAPATAN, 1, 11) LIKE '%Minggu Ke-1%') as qPendapatan
                                                            FROM DAFTAR_TOKO";
                                            } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm2') {
                                                $b = $_GET['minggu'];
                                                @$tampil1 = "SELECT ID_TOKO as took, NAMA_TOKO, ALAMAT_TOKO,
                                                                (SELECT count(*)
                                                                    FROM KARYAWAN
                                                                    WHERE ID_TOKO = took) as jmlKar,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KELUHAN), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-2%') as qKel,
                                                                        (SELECT IFNULL(SUM(JUMLAH_TERLAYANI), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-2%') as qLayani,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KEHILANGAN), 0)
                                                                            FROM KEHILANGAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-2%') as qHilang,
                                                                        (SELECT IFNULL(SUM(STOK), 0)
                                                                            FROM STOK_BARANG
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_STOK, 1, 11) LIKE '%Minggu Ke-2%') as qStok,  
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qPenjualanm1,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-2%') as qPenjualanm2,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-3%') as qPenjualanm3,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-4%') as qPenjualanm4,
                                                                        (SELECT COUNT(ID_BARANG)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-2%') as qJmlBarang,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENDAPATAN), 0)
                                                                            FROM PENDAPATAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENDAPATAN, 1, 11) LIKE '%Minggu Ke-2%') as qPendapatan
                                                            FROM DAFTAR_TOKO";
                                            } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm3') {
                                                $c = $_GET['minggu'];
                                                @$tampil1 = "SELECT ID_TOKO as took, NAMA_TOKO, ALAMAT_TOKO,
                                                                (SELECT count(*)
                                                                    FROM KARYAWAN
                                                                    WHERE ID_TOKO = took) as jmlKar,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KELUHAN), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-3%') as qKel,
                                                                        (SELECT IFNULL(SUM(JUMLAH_TERLAYANI), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-3%') as qLayani,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KEHILANGAN), 0)
                                                                            FROM KEHILANGAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-3%') as qHilang,
                                                                        (SELECT IFNULL(SUM(STOK), 0)
                                                                            FROM STOK_BARANG
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_STOK, 1, 11) LIKE '%Minggu Ke-3%') as qStok,  
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qPenjualanm1,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-2%') as qPenjualanm2,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-3%') as qPenjualanm3,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-4%') as qPenjualanm4,
                                                                        (SELECT COUNT(ID_BARANG)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-3%') as qJmlBarang,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENDAPATAN), 0)
                                                                            FROM PENDAPATAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENDAPATAN, 1, 11) LIKE '%Minggu Ke-3%') as qPendapatan
                                                            FROM DAFTAR_TOKO";
                                            } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm4') {
                                                $d = $_GET['minggu'];
                                                @$tampil1 = "SELECT ID_TOKO as took, NAMA_TOKO, ALAMAT_TOKO,
                                                                (SELECT count(*)
                                                                    FROM KARYAWAN
                                                                    WHERE ID_TOKO = took) as jmlKar,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KELUHAN), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-4%') as qKel,
                                                                        (SELECT IFNULL(SUM(JUMLAH_TERLAYANI), 0)
                                                                            FROM KELUAHAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-4%') as qLayani,
                                                                        (SELECT IFNULL(SUM(JUMLAH_KEHILANGAN), 0)
                                                                            FROM KEHILANGAN
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-4%') as qHilang,
                                                                        (SELECT IFNULL(SUM(STOK), 0)
                                                                            FROM STOK_BARANG
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_STOK, 1, 11) LIKE '%Minggu Ke-4%') as qStok,  
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qPenjualanm1,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-2%') as qPenjualanm2,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-3%') as qPenjualanm3,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-4%') as qPenjualanm4,
                                                                        (SELECT COUNT(ID_BARANG)
                                                                            FROM PENJUALAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-4%') as qJmlBarang,
                                                                        (SELECT IFNULL(SUM(JUMLAH_PENDAPATAN), 0)
                                                                            FROM PENDAPATAN_TOKO
                                                                            WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENDAPATAN, 1, 11) LIKE '%Minggu Ke-4%') as qPendapatan
                                                            FROM DAFTAR_TOKO";
                                            }


                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {

                                                if ($data['qKel'] != 0 and $data['qLayani'] != 0) {
                                                    $label = "Siap Dinilai";

                                                    if ($_GET['minggu'] == 'm1') {
                                                        $m = "Minggu Ke-1";
                                                    } elseif ($_GET['minggu'] == 'm2') {
                                                        $m = "Minggu Ke-2";
                                                    } elseif ($_GET['minggu'] == 'm3') {
                                                        $m = "Minggu Ke-3";
                                                    } elseif ($_GET['minggu'] == 'm4') {
                                                        $m = "Minggu Ke-4";
                                                    }


                                                    if (isset($_GET['minggu']) && $_GET['minggu'] == 'm1') {
                                                        $ifr01 = $_GET['minggu'];

                                                        // === Pangsa Pasar ===
                                                        $get_id_toko_penjualan = $data['took'];
                                                        $mingguan = $m;
                                                        $varHasil = 0;

                                                        $get_penjualan_per_item = "SELECT a.*, b.ID_PASAR, b.M1, b.M2, b.M3, b.M4
                                                                                FROM penjualan_toko a JOIN PANGSA_PASAR b ON a.ID_BARANG = b.ID_BARANG
                                                                                WHERE a.ID_TOKO = '$get_id_toko_penjualan' AND a.PERIODE_PENJUALAN LIKE '%Minggu Ke-1%'";
                                                    } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm2') {
                                                        $ifr02 = $_GET['minggu'];

                                                        // === Pangsa Pasar ===
                                                        $get_id_toko_penjualan = $data['took'];
                                                        $mingguan = $m;
                                                        $varHasi2 = 0;

                                                        $get_penjualan_per_item = "SELECT a.*, b.ID_PASAR, b.M1, b.M2, b.M3, b.M4
                                                                                FROM penjualan_toko a JOIN PANGSA_PASAR b ON a.ID_BARANG = b.ID_BARANG
                                                                                WHERE a.ID_TOKO = '$get_id_toko_penjualan' AND a.PERIODE_PENJUALAN LIKE '%Minggu Ke-2%'";
                                                    } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm3') {
                                                        $ifr03 = $_GET['minggu'];

                                                        // === Pangsa Pasar ===
                                                        $get_id_toko_penjualan = $data['took'];
                                                        $mingguan = $m;
                                                        $varHasi3 = 0;

                                                        $get_penjualan_per_item = "SELECT a.*, b.ID_PASAR, b.M1, b.M2, b.M3, b.M4
                                                                                    FROM penjualan_toko a JOIN PANGSA_PASAR b ON a.ID_BARANG = b.ID_BARANG
                                                                                    WHERE a.ID_TOKO = '$get_id_toko_penjualan' AND a.PERIODE_PENJUALAN LIKE '%Minggu Ke-3%'";
                                                    } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm4') {
                                                        $ifr04 = $_GET['minggu'];

                                                        // === Pangsa Pasar ===
                                                        $get_id_toko_penjualan = $data['took'];
                                                        $mingguan = $m;
                                                        $varHasi4 = 0;

                                                        $get_penjualan_per_item = "SELECT a.*, b.ID_PASAR, b.M1, b.M2, b.M3, b.M4
                                                                                FROM penjualan_toko a JOIN PANGSA_PASAR b ON a.ID_BARANG = b.ID_BARANG
                                                                                WHERE a.ID_TOKO = '$get_id_toko_penjualan' AND a.PERIODE_PENJUALAN LIKE '%Minggu Ke-4%'";
                                                    }

                                                    $goGet = mysqli_query($con, $get_penjualan_per_item);
                                                    while ($dataPangsa = mysqli_fetch_array($goGet)) {


                                                        if (isset($_GET['minggu']) && $_GET['minggu'] == 'm1') {
                                                            $Goifr01 = $_GET['minggu'];
                                                            $get_jmlBaranag = "SELECT ptooko.ID_TOKO, count(ptooko.ID_BARANG) AS jmlTokBarang, ptooko.PERIODE_PENJUALAN
                                                                                FROM BARANG barr JOIN PENJUALAN_TOKO ptooko ON barr.ID_BARANG = ptooko.ID_BARANG
                                                                                WHERE ptooko.PERIODE_PENJUALAN LIKE '%Minggu Ke-1%' AND ptooko.ID_TOKO = '$get_id_toko_penjualan'
                                                                                GROUP BY ptooko.ID_TOKO, ptooko.PERIODE_PENJUALAN";
                                                        } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm2') {
                                                            $Goifr02 = $_GET['minggu'];
                                                            $get_jmlBaranag = "SELECT ptooko.ID_TOKO, count(ptooko.ID_BARANG) AS jmlTokBarang, ptooko.PERIODE_PENJUALAN
                                                                                FROM BARANG barr JOIN PENJUALAN_TOKO ptooko ON barr.ID_BARANG = ptooko.ID_BARANG
                                                                                WHERE ptooko.PERIODE_PENJUALAN LIKE '%Minggu Ke-2%' AND ptooko.ID_TOKO = '$get_id_toko_penjualan'
                                                                                GROUP BY ptooko.ID_TOKO, ptooko.PERIODE_PENJUALAN";
                                                        } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm3') {
                                                            $Goifr03 = $_GET['minggu'];
                                                            $get_jmlBaranag = "SELECT ptooko.ID_TOKO, count(ptooko.ID_BARANG) AS jmlTokBarang, ptooko.PERIODE_PENJUALAN
                                                                                FROM BARANG barr JOIN PENJUALAN_TOKO ptooko ON barr.ID_BARANG = ptooko.ID_BARANG
                                                                                WHERE ptooko.PERIODE_PENJUALAN LIKE '%Minggu Ke-3%' AND ptooko.ID_TOKO = '$get_id_toko_penjualan'
                                                                                GROUP BY ptooko.ID_TOKO, ptooko.PERIODE_PENJUALAN";
                                                        } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm4') {
                                                            $Goifr04 = $_GET['minggu'];
                                                            $get_jmlBaranag = "SELECT ptooko.ID_TOKO, count(ptooko.ID_BARANG) AS jmlTokBarang, ptooko.PERIODE_PENJUALAN
                                                                                FROM BARANG barr JOIN PENJUALAN_TOKO ptooko ON barr.ID_BARANG = ptooko.ID_BARANG
                                                                                WHERE ptooko.PERIODE_PENJUALAN LIKE '%Minggu Ke-4%' AND ptooko.ID_TOKO = '$get_id_toko_penjualan'
                                                                                GROUP BY ptooko.ID_TOKO, ptooko.PERIODE_PENJUALAN";
                                                        }

                                                        $goGetjmlBarang = mysqli_query($con, $get_jmlBaranag);
                                                        $djmlBar = mysqli_fetch_array($goGetjmlBarang);

                                                        // $iTok = $djmlBar['ID_TOKO']. ' ==  ';
                                                        $jBar = $djmlBar['jmlTokBarang'];
                                                        // $asahsja = $djmlBar['PERIODE_PENJUALAN'];


                                                        $dataPangsa['ID_BARANG'];
                                                        $pangPenjualan = $dataPangsa['JUMLAH_PENJUALAN'];

                                                        $pertama = $dataPangsa['M1'];
                                                        $hPangsaPasarM1 = $pangPenjualan / $pertama;

                                                        $kedua = $dataPangsa['M2'];
                                                        $hPangsaPasarM2 = $pangPenjualan / $kedua;

                                                        $tiga = $dataPangsa['M3'];
                                                        $hPangsaPasarM3 = $pangPenjualan / $tiga;

                                                        $empat = $dataPangsa['M4'];
                                                        $hPangsaPasarM4 = $pangPenjualan / $empat;

                                                        $varHasil += $hPangsaPasarM1;
                                                        $varHasi2 += $hPangsaPasarM2;
                                                        $varHasi3 += $hPangsaPasarM3;
                                                        $varHasi4 += $hPangsaPasarM4;
                                                    }

                                                    $jmlBarangPdToko = $jBar;

                                                    // === Total Hasil ===
                                                    if ($ifr01 == 'm1') {
                                                        $GoHasilM1 = sprintf("%.2f", $varHasil);
                                                        $bagiProd = $GoHasilM1 / $jmlBarangPdToko;
                                                        $pers = $bagiProd * 100;
                                                        $getGoHasilYa = round($pers);
                                                    } elseif ($ifr02 == 'm2') {
                                                        $GoHasilM2 = sprintf("%.2f", $varHasi2);
                                                        $bagiProd = $GoHasilM2 / $jmlBarangPdToko;
                                                        $pers = $bagiProd * 100;
                                                        $getGoHasilYa = round($pers);
                                                    } elseif ($ifr03 == 'm3') {
                                                        $GoHasilM3 = sprintf("%.2f", $varHasi3);
                                                        $bagiProd = $GoHasilM3 / $jmlBarangPdToko;
                                                        $pers = $bagiProd * 100;
                                                        $getGoHasilYa = round($pers);
                                                    } elseif ($ifr04 == 'm4') {
                                                        $GoHasilM4 = sprintf("%.2f", $varHasi4);
                                                        $bagiProd = $GoHasilM4 / $jmlBarangPdToko;
                                                        $pers = $bagiProd * 100;
                                                        $getGoHasilYa = round($pers);
                                                    }

                                                    // === Variabel Biasa ===
                                                    $prku = $data['took'];
                                                    $nmToko = $data['NAMA_TOKO'];
                                                    $alToko = $data['ALAMAT_TOKO'];

                                                    // === Penjualan ===
                                                    $jmlPenjualanBarang1 = $data['qPenjualanm1'];
                                                    $jmlPenjualanBarang2 = $data['qPenjualanm2'];
                                                    $jmlPenjualanBarang3 = $data['qPenjualanm3'];
                                                    $jmlPenjualanBarang4 = $data['qPenjualanm4'];


                                                    if ($_GET['minggu'] == 'm1') {
                                                        $hasilPenjualan = 0;
                                                    } elseif ($_GET['minggu'] == 'm2') {
                                                        $hPenjualan = ($jmlPenjualanBarang2 - $jmlPenjualanBarang1) / $jmlPenjualanBarang1 * 100;
                                                        $hasilPenjualan = round($hPenjualan);
                                                    } elseif ($_GET['minggu'] == 'm3') {
                                                        $hPenjualan = ($jmlPenjualanBarang3 - $jmlPenjualanBarang2) / $jmlPenjualanBarang2 * 100;
                                                        $hasilPenjualan = round($hPenjualan);
                                                    } elseif ($_GET['minggu'] == 'm4') {
                                                        $hPenjualan = ($jmlPenjualanBarang4 - $jmlPenjualanBarang3) / $jmlPenjualanBarang3 * 100;
                                                        $hasilPenjualan = round($hPenjualan);
                                                    }


                                                    // === Keluhan Pelanggan ===
                                                    $jmlKeluh = $data['qKel'];
                                                    $jmlTerlay = $data['qLayani'];
                                                    $mKEL = $jmlTerlay / $jmlKeluh * 100;
                                                    $KEL = round($mKEL);

                                                    // === Kehilangan Produk ===
                                                    $jmlHil = $data['qHilang'];
                                                    $jmlSto = $data['qStok'];
                                                    $mPH = $jmlHil / $jmlSto * 100;
                                                    $PH = round($mPH);

                                                    // === Produktivitas Karyawan ===
                                                    $jmlKar = $data['jmlKar'];
                                                    $jmlPen = $data['qPendapatan'];
                                                    $K = $jmlPen / $jmlKar;
                                                    $mKP = $K / $jmlPen * 100;
                                                    $KP = round($mKP);



                                                    ?>
                                                    <tr>

                                                        <td>
                                                            <center><?php echo @$data['took']; ?></center>
                                                        </td>

                                                        <td>
                                                            <?php echo @$data['NAMA_TOKO']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$data['ALAMAT_TOKO']; ?>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <h4><label class="label label-success"><?php echo $label; ?></label></h4>
                                                            </center>
                                                        </td>

                                                        <td style="padding-top:10px; padding-bottom:10px;">
                                                            <center>
                                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#vieww<?php echo $data['took']; ?>">
                                                                    <i class="fa fa-cog"></i> Lihat Penilaian
                                                                </button>
                                                            </center>

                                                            <!-- Modal -->
                                                            <!-- Modal content-->
                                                            <div class="modal fade" id="vieww<?php echo $data['took']; ?>" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <center>
                                                                                <h3 class="modal-title">Hasil Penilaian</h3>
                                                                            </center>
                                                                        </div>

                                                                        <form method="post" action="pProsesPenilaian.php">
                                                                            <div class="modal-body">
                                                                                <h4>Penilaian Pada Toko <?php echo $data['NAMA_TOKO']; ?></h4>
                                                                                <h4>Periode <?php echo $m ?></h4><br>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6"><label class="form-control-label">Penilaian Pertumbuhan Penjualan</label>
                                                                                        <div class="input-group">
                                                                                            <input type="hidden" value="<?php echo $data['took']; ?>" name="ID_TOKO">
                                                                                            <input type="hidden" value="<?php echo $m ?>" name="MINGGU">
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="PERTUMBUHAN" value="<?php echo $hasilPenjualan;
                                                                                                                                                                                                            ?>" readonly>
                                                                                            <span class="input-group-append" id="basic-addon2">
                                                                                                <label class="input-group-text">%</label>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6"><label class="form-control-label">Penilaian Rata - Rata Produk Terjual</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="RRTERJUAL" value="<?php  //echo $getGoHasilYa; 
                                                                                                                                                                                                        ?>" readonly>
                                                                                            <span class="input-group-append" id="basic-addon2">
                                                                                                <label class="input-group-text">%</label>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6"><label class="form-control-label">Penilaian Rata - Rata Pangsa Pasar</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="PANGSA" value="<?php echo $getGoHasilYa;
                                                                                                                                                                                                        ?>" readonly>
                                                                                            <span class="input-group-append" id="basic-addon2">
                                                                                                <label class="input-group-text">%</label>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6"><label class="form-control-label">Penilaian Kehilanagn Produk</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="KEHILANGAN" value="<?php echo $PH; ?>" readonly>
                                                                                            <span class="input-group-append" id="basic-addon2">
                                                                                                <label class="input-group-text">%</label>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6"><label class="form-control-label">Penilaian Keluhan Pelanggan</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="KELUHAN" value="<?php echo $KEL; ?>" readonly>
                                                                                            <span class="input-group-append" id="basic-addon2">
                                                                                                <label class="input-group-text">%</label>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6"><label class="form-control-label">Penilaian Produktifitas Karyawan</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="KARYAWAN" value="<?php echo $KP; ?>" readonly>
                                                                                            <span class="input-group-append" id="basic-addon2">
                                                                                                <label class="input-group-text">%</label>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-success btn-sm" name="simpanYa">
                                                                                    <i class="fa fa-cog"></i> Simpan Penilaian
                                                                                </button>
                                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /Modal content -->
                                                        </td>
                                                    </tr>
                                            <?php
                                                    // $no++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="styleSelector">
    </div>
</div>

<?php
include "Footer.php";
?>