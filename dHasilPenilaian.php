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

                        <div class="card text-white card-success">
                            <div class="card-header">
                                <strong>PRESPEKTIF FINANSIAL</strong>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Kriteria 1 : Pertumbuhan Penjualan</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table0" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 1</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 2</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 3</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 4</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $pres01 = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, a.ALAMAT_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2) AS prBulan, SUBSTRING(b.PERIODE_PERHITUNGAN, 12, 5) AS prTahun,
                                                                (SELECT NILAI_K1
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%') as n1,
                                                                (SELECT NILAI_K1
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%') as n2,
                                                                (SELECT NILAI_K1
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%') as n3,
                                                                (SELECT NILAI_K1
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%') as n4
                                                            FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
                                                            GROUP BY a.ID_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2)";
                                            $hasilPres01 = mysqli_query($con, $pres01);
                                            $no01 = 1;
                                            while ($data01 = mysqli_fetch_array($hasilPres01)) {

                                                if ($data01['prBulan'] == 01) {
                                                    $bul = 'Januari';
                                                } elseif ($data01['prBulan'] == 02) {
                                                    $bul = 'Februari';
                                                } elseif ($data01['prBulan'] == 03) {
                                                    $bul = 'Maret';
                                                } elseif ($data01['prBulan'] == 04) {
                                                    $bul = 'April';
                                                } elseif ($data01['prBulan'] == 05) {
                                                    $bul = 'Mei';
                                                } elseif ($data01['prBulan'] == 06) {
                                                    $bul = 'Juni';
                                                } elseif ($data01['prBulan'] == 07) {
                                                    $bul = 'Juli';
                                                } elseif ($data01['prBulan'] == '08') {
                                                    $bul = 'Agustus';
                                                } elseif ($data01['prBulan'] == '09') {
                                                    $bul = 'September';
                                                } elseif ($data01['prBulan'] == 10) {
                                                    $bul = 'Oktober';
                                                } elseif ($data01['prBulan'] == 11) {
                                                    $bul = 'November';
                                                } elseif ($data01['prBulan'] == 12) {
                                                    $bul = 'Desember';
                                                }

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo $no01; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo $data01['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data01['n1']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data01['n2']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data01['n3']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data01['n4']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data01['prTahun']; ?></center>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no01++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card text-white card-warning">
                            <div class="card-header">
                                <strong>PRESPEKTIF PELANGGAN</strong>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Kriteria 2 : Pangsa Pasar</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table1" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 1</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 2</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 3</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 4</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pres02 = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, a.ALAMAT_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2) AS prBulan, SUBSTRING(b.PERIODE_PERHITUNGAN, 12, 5) AS prTahun,
                                                            (SELECT NILAI_K2
                                                                FROM NILAI_PERHITUNGAN
                                                                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%') as n1,
                                                            (SELECT NILAI_K2
                                                                FROM NILAI_PERHITUNGAN
                                                                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%') as n2,
                                                            (SELECT NILAI_K2
                                                                FROM NILAI_PERHITUNGAN
                                                                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%') as n3,
                                                            (SELECT NILAI_K2
                                                                FROM NILAI_PERHITUNGAN
                                                                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%') as n4
                                                        FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
                                                        GROUP BY a.ID_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2)";
                                            $hasilPres02 = mysqli_query($con, $pres02);
                                            $no02 = 1;
                                            while ($data02 = mysqli_fetch_array($hasilPres02)) {

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo $no02; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo $data02['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data02['n1']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data02['n2']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data02['n3']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data02['n4']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data02['prTahun']; ?></center>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no02++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header">
                                <h5>Kriteria 3 : Pemenuhan Keluhan Pelanggan</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table2" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 1</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 2</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 3</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 4</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pres03 = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, a.ALAMAT_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2) AS prBulan, SUBSTRING(b.PERIODE_PERHITUNGAN, 12, 5) AS prTahun,
                                                                (SELECT NILAI_K3
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%') as n1,
                                                                (SELECT NILAI_K3
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%') as n2,
                                                                (SELECT NILAI_K3
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%') as n3,
                                                                (SELECT NILAI_K3
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%') as n4
                                                            FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
                                                            GROUP BY a.ID_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2)";
                                            $hasilPres03 = mysqli_query($con, $pres03);
                                            $no03 = 1;
                                            while ($data03 = mysqli_fetch_array($hasilPres03)) {

                                                if ($data03['prBulan'] == 01) {
                                                    $bul = 'Januari';
                                                } elseif ($data03['prBulan'] == 02) {
                                                    $bul = 'Februari';
                                                } elseif ($data03['prBulan'] == 03) {
                                                    $bul = 'Maret';
                                                } elseif ($data03['prBulan'] == 04) {
                                                    $bul = 'April';
                                                } elseif ($data03['prBulan'] == 05) {
                                                    $bul = 'Mei';
                                                } elseif ($data03['prBulan'] == 06) {
                                                    $bul = 'Juni';
                                                } elseif ($data03['prBulan'] == 07) {
                                                    $bul = 'Juli';
                                                } elseif ($data03['prBulan'] == '08') {
                                                    $bul = 'Agustus';
                                                } elseif ($data03['prBulan'] == '09') {
                                                    $bul = 'September';
                                                } elseif ($data03['prBulan'] == 10) {
                                                    $bul = 'Oktober';
                                                } elseif ($data03['prBulan'] == 11) {
                                                    $bul = 'November';
                                                } elseif ($data03['prBulan'] == 12) {
                                                    $bul = 'Desember';
                                                }

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo $no03; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo $data03['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data03['n1']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data03['n2']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data03['n3']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data03['n4']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data03['prTahun']; ?></center>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no03++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card text-white card-primary">
                            <div class="card-header">
                                <strong>PRESPEKTIF PROSES BISNIS INTERNAL</strong>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Kriteria 4 : Presentase Jenis Produk Yang Terjual</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table3" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 1</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 2</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 3</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 4</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pres04 = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, a.ALAMAT_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2) AS prBulan, SUBSTRING(b.PERIODE_PERHITUNGAN, 12, 5) AS prTahun,
                                                                (SELECT NILAI_K4
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%') as n1,
                                                                (SELECT NILAI_K4
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%') as n2,
                                                                (SELECT NILAI_K4
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%') as n3,
                                                                (SELECT NILAI_K4
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%') as n4
                                                            FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
                                                            GROUP BY a.ID_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2)";
                                            $hasilPres04 = mysqli_query($con, $pres04);
                                            $no04 = 1;
                                            while ($data04 = mysqli_fetch_array($hasilPres04)) {

                                                if ($data04['prBulan'] == 01) {
                                                    $bul = 'Januari';
                                                } elseif ($data04['prBulan'] == 02) {
                                                    $bul = 'Februari';
                                                } elseif ($data04['prBulan'] == 03) {
                                                    $bul = 'Maret';
                                                } elseif ($data04['prBulan'] == 04) {
                                                    $bul = 'April';
                                                } elseif ($data04['prBulan'] == 05) {
                                                    $bul = 'Mei';
                                                } elseif ($data04['prBulan'] == 06) {
                                                    $bul = 'Juni';
                                                } elseif ($data04['prBulan'] == 07) {
                                                    $bul = 'Juli';
                                                } elseif ($data04['prBulan'] == '08') {
                                                    $bul = 'Agustus';
                                                } elseif ($data04['prBulan'] == '09') {
                                                    $bul = 'September';
                                                } elseif ($data04['prBulan'] == 10) {
                                                    $bul = 'Oktober';
                                                } elseif ($data04['prBulan'] == 11) {
                                                    $bul = 'November';
                                                } elseif ($data04['prBulan'] == 12) {
                                                    $bul = 'Desember';
                                                }

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo $no04; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo $data04['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data04['n1']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data04['n2']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data04['n3']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data04['n4']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data04['prTahun']; ?></center>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no04++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header">
                                <h5>Kriteria 5 : Presentase Produk Hilang</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table4" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 1</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 2</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 3</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 4</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pres05 = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, a.ALAMAT_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2) AS prBulan, SUBSTRING(b.PERIODE_PERHITUNGAN, 12, 5) AS prTahun,
                                                                (SELECT NILAI_K5
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%') as n1,
                                                                (SELECT NILAI_K5
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%') as n2,
                                                                (SELECT NILAI_K5
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%') as n3,
                                                                (SELECT NILAI_K5
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%') as n4
                                                            FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
                                                            GROUP BY a.ID_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2)";
                                            $hasilPres05 = mysqli_query($con, $pres05);
                                            $no05 = 1;
                                            while ($data05 = mysqli_fetch_array($hasilPres05)) {

                                                if ($data05['prBulan'] == 01) {
                                                    $bul = 'Januari';
                                                } elseif ($data05['prBulan'] == 02) {
                                                    $bul = 'Februari';
                                                } elseif ($data05['prBulan'] == 03) {
                                                    $bul = 'Maret';
                                                } elseif ($data05['prBulan'] == 04) {
                                                    $bul = 'April';
                                                } elseif ($data05['prBulan'] == 05) {
                                                    $bul = 'Mei';
                                                } elseif ($data05['prBulan'] == 06) {
                                                    $bul = 'Juni';
                                                } elseif ($data05['prBulan'] == 07) {
                                                    $bul = 'Juli';
                                                } elseif ($data05['prBulan'] == '08') {
                                                    $bul = 'Agustus';
                                                } elseif ($data05['prBulan'] == '09') {
                                                    $bul = 'September';
                                                } elseif ($data05['prBulan'] == 10) {
                                                    $bul = 'Oktober';
                                                } elseif ($data05['prBulan'] == 11) {
                                                    $bul = 'November';
                                                } elseif ($data05['prBulan'] == 12) {
                                                    $bul = 'Desember';
                                                }

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo $no05; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo $data05['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data05['n1']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data05['n2']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data05['n3']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data05['n4']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data05['prTahun']; ?></center>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no05++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card text-white card-danger">
                            <div class="card-header">
                                <strong>PRESPEKTIF BELAJAR DAN PERTUMBUHAN</strong>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Kriteria 6 : Produktivitas Karyawan</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table5" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 1</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 2</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 3</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 4</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pres06 = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, a.ALAMAT_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2) AS prBulan, SUBSTRING(b.PERIODE_PERHITUNGAN, 12, 5) AS prTahun,
                                                                (SELECT NILAI_K6
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%') as n1,
                                                                (SELECT NILAI_K6
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%') as n2,
                                                                (SELECT NILAI_K6
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%') as n3,
                                                                (SELECT NILAI_K6
                                                                    FROM NILAI_PERHITUNGAN
                                                                    WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%') as n4
                                                            FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
                                                            GROUP BY a.ID_TOKO, SUBSTRING(b.PERIODE_PERHITUNGAN, -2)";
                                            $hasilPres06 = mysqli_query($con, $pres06);
                                            $no06 = 1;
                                            while ($data06 = mysqli_fetch_array($hasilPres06)) {

                                                if ($data06['prBulan'] == 01) {
                                                    $bul = 'Januari';
                                                } elseif ($data06['prBulan'] == 02) {
                                                    $bul = 'Februari';
                                                } elseif ($data06['prBulan'] == 03) {
                                                    $bul = 'Maret';
                                                } elseif ($data06['prBulan'] == 04) {
                                                    $bul = 'April';
                                                } elseif ($data06['prBulan'] == 05) {
                                                    $bul = 'Mei';
                                                } elseif ($data06['prBulan'] == 06) {
                                                    $bul = 'Juni';
                                                } elseif ($data06['prBulan'] == 07) {
                                                    $bul = 'Juli';
                                                } elseif ($data06['prBulan'] == '08') {
                                                    $bul = 'Agustus';
                                                } elseif ($data06['prBulan'] == '09') {
                                                    $bul = 'September';
                                                } elseif ($data06['prBulan'] == 10) {
                                                    $bul = 'Oktober';
                                                } elseif ($data06['prBulan'] == 11) {
                                                    $bul = 'November';
                                                } elseif ($data06['prBulan'] == 12) {
                                                    $bul = 'Desember';
                                                }

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo $no06; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo $data06['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data06['n1']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data06['n2']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data06['n3']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data06['n4']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data06['prTahun']; ?></center>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no06++;
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