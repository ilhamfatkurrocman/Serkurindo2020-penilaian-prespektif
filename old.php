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
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['minggu']) && $_GET['minggu'] == 'm1') {
                                                $a = $_GET['minggu'];
                                                @$tampil1 = "SELECT x.ID_TOKO, x.NAMA_TOKO, x.ALAMAT_TOKO, COUNT(x.ID_TOKO) as jmlKaryawan, x.JUMLAH_PENDAPATAN, x.STOK, x.JUMLAH_KELUHAN, x.JUMLAH_TERLAYANI, x.JUMLAH_KEHILANGAN, SUM(x.JUMLAH_PENJUALAN) AS jmlPenjualan
                                                        FROM
                                                            (SELECT c.ID_TOKO, c.NAMA_TOKO, c.ALAMAT_TOKO, k.ID_KARYAWAN, p.JUMLAH_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI, hl.JUMLAH_KEHILANGAN, jtok.JUMLAH_PENJUALAN, jtok.PERIODE_PENJUALAN
                                                            FROM DAFTAR_TOKO c JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
                                                                JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
                                                                JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO 
                                                                JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
                                                                JOIN KEHILANGAN hl ON c.ID_TOKO = hl.ID_TOKO
                                                                JOIN PENJUALAN_TOKO jtok ON c.ID_TOKO = jtok.ID_TOKO
                                                            WHERE p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-1%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-1%' AND 
                                                            kl.PERIODE_KELUHAN LIKE '%Minggu Ke-1%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-1%' AND jtok.PERIODE_PENJUALAN LIKE '%Minggu Ke-1%'
                                                            GROUP BY c.ID_TOKO, k.ID_KARYAWAN
                                                            ) x
                                                        GROUP BY x.ID_TOKO";
                                            } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm2') {
                                                $b = $_GET['minggu'];
                                                @$tampil1 = "SELECT x.ID_TOKO, x.NAMA_TOKO, x.ALAMAT_TOKO, COUNT(x.ID_TOKO) as jmlKaryawan, x.JUMLAH_PENDAPATAN, x.STOK, x.JUMLAH_KELUHAN, x.JUMLAH_TERLAYANI, x.JUMLAH_KEHILANGAN
                                                        FROM
                                                            (SELECT c.ID_TOKO, c.NAMA_TOKO, c.ALAMAT_TOKO, k.ID_KARYAWAN, p.JUMLAH_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI, hl.JUMLAH_KEHILANGAN
                                                            FROM DAFTAR_TOKO c JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
                                                                JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
                                                                JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO 
                                                                JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
                                                                JOIN KEHILANGAN hl ON c.ID_TOKO = hl.ID_TOKO
                                                            WHERE p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-2%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-2%' AND 
                                                            kl.PERIODE_KELUHAN LIKE '%Minggu Ke-2%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-2%'
                                                            GROUP BY c.ID_TOKO, k.ID_KARYAWAN
                                                            ) x
                                                        GROUP BY x.ID_TOKO";
                                            } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm3') {
                                                $c = $_GET['minggu'];
                                                @$tampil1 = "SELECT x.ID_TOKO, x.NAMA_TOKO, x.ALAMAT_TOKO, COUNT(x.ID_TOKO) as jmlKaryawan, x.JUMLAH_PENDAPATAN, x.STOK, x.JUMLAH_KELUHAN, x.JUMLAH_TERLAYANI, x.JUMLAH_KEHILANGAN
                                                        FROM
                                                            (SELECT c.ID_TOKO, c.NAMA_TOKO, c.ALAMAT_TOKO, k.ID_KARYAWAN, p.JUMLAH_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI, hl.JUMLAH_KEHILANGAN
                                                            FROM DAFTAR_TOKO c JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
                                                                JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
                                                                JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO 
                                                                JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
                                                                JOIN KEHILANGAN hl ON c.ID_TOKO = hl.ID_TOKO
                                                            WHERE p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-3%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-3%' AND 
                                                            kl.PERIODE_KELUHAN LIKE '%Minggu Ke-3%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-3%'
                                                            GROUP BY c.ID_TOKO, k.ID_KARYAWAN
                                                            ) x
                                                        GROUP BY x.ID_TOKO";
                                            } elseif (isset($_GET['minggu']) && $_GET['minggu'] == 'm4') {
                                                $d = $_GET['minggu'];
                                                @$tampil1 = "SELECT x.ID_TOKO, x.NAMA_TOKO, x.ALAMAT_TOKO, COUNT(x.ID_TOKO) as jmlKaryawan, x.JUMLAH_PENDAPATAN, x.STOK, x.JUMLAH_KELUHAN, x.JUMLAH_TERLAYANI, x.JUMLAH_KEHILANGAN
                                                        FROM
                                                            (SELECT c.ID_TOKO, c.NAMA_TOKO, c.ALAMAT_TOKO, k.ID_KARYAWAN, p.JUMLAH_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI, hl.JUMLAH_KEHILANGAN
                                                            FROM DAFTAR_TOKO c JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
                                                                JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
                                                                JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO 
                                                                JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
                                                                JOIN KEHILANGAN hl ON c.ID_TOKO = hl.ID_TOKO
                                                            WHERE p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-4%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-4%' AND 
                                                            kl.PERIODE_KELUHAN LIKE '%Minggu Ke-4%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-4%'
                                                            GROUP BY c.ID_TOKO, k.ID_KARYAWAN
                                                            ) x
                                                        GROUP BY x.ID_TOKO";
                                            }


                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {

                                                $prku = $data['ID_TOKO'];
                                                $nmToko = $data['NAMA_TOKO'];
                                                $alToko = $data['ALAMAT_TOKO'];

                                                // === Keluhan Pelanggan ===
                                                $jmlKeluh = $data['JUMLAH_KELUHAN'];
                                                $jmlTerlay = $data['JUMLAH_TERLAYANI'];
                                                $mKEL = $jmlTerlay / $jmlKeluh * 100;
                                                $KEL = round($mKEL);

                                                // === Kehilangan Produk ===
                                                $jmlHil = $data['JUMLAH_KEHILANGAN'];
                                                $jmlSto = $data['STOK'];
                                                $mPH = $jmlHil / $jmlSto * 100;
                                                $PH = round($mPH);

                                                // === Produktivitas Karyawan ===
                                                $jmlKar = $data['jmlKaryawan'];
                                                $jmlPen = $data['JUMLAH_PENDAPATAN'];
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
                                                        <center><?php echo @$data['ID_TOKO']; ?></center>
                                                    </td>

                                                    <td>
                                                        <?php echo @$data['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['ALAMAT_TOKO']; ?>
                                                    </td>
                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#vieww<?php echo $data['ID_TOKO']; ?>">
                                                                <i class="fa fa-cog"></i> Lihat Penilaian
                                                            </button>
                                                        </center>

                                                        <!-- Modal -->
                                                        <!-- Modal content-->
                                                        <div class="modal fade" id="vieww<?php echo $data['ID_TOKO']; ?>" role="dialog">
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
                                                                                        <input type="hidden" value="<?php echo $data['ID_TOKO']; ?>" name="ID_TOKO">
                                                                                        <input type="hidden" value="<?php echo $m ?>" name="MINGGU">
                                                                                        <input type="text" class="form-control form-control-center" placeholder="0" name="PERTUMBUHAN" value="<?php // echo $KEL; 
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