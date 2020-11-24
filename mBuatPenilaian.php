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

                                                // untuk if penjualan dan pendapatan (BELUM FIX)

                                                if ($data['qKel'] != 0 and $data['qLayani'] != 0) {
                                                    $label = "Siap Dinilai";

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

                                                    if ($_GET['minggu'] == 'm1') {
                                                        $m = "Minggu Ke-1";
                                                    } elseif ($_GET['minggu'] == 'm2') {
                                                        $m = "Minggu Ke-2";
                                                    } elseif ($_GET['minggu'] == 'm3') {
                                                        $m = "Minggu Ke-3";
                                                    } elseif ($_GET['minggu'] == 'm4') {
                                                        $m = "Minggu Ke-4";
                                                    }

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
                                                                                    <div class="col-sm-6"><label class="form-control-label">Penilaian Pertumbukan Penjualan</label>
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
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="RRTERJUAL" value="<?php  //echo $m; 
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
                                                                                            <input type="text" class="form-control form-control-center" placeholder="0" name="PANGSA" value="<?php // echo $KEL; 
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