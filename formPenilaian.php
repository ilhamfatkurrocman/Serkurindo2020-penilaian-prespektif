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
                                <h5>Formulir Penilaian </h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php


                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_PRESPEKTIF'])) {
                                    echo    $prku = $_GET['ID_PRESPEKTIF'];
                                    echo     $periodeNil = $_GET['PERIODE_PENILAIAN'];

                                    // $sql = "SELECT a.ID_PRESPEKTIF, a.NAMA_PRESPEKTIF, b.ID_KRITERIA, b.NAMA_KRITERIA, c.NAMA_TOKO, c.ALAMAT_TOKO, COUNT(k.ID_KARYAWAN) AS jmlKaryawan, p.JUMLAH_PENDAPATAN,
                                    //         p.PERIODE_PENDAPATAN
                                    //         FROM PRESPEKTIF a JOIN KRITERIA b ON a.ID_PRESPEKTIF = b.ID_PRESPEKTIF
                                    //         JOIN DAFTAR_TOKO c ON b.ID_TOKO = c.ID_TOKO
                                    //         JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
                                    //        	JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
                                    //         WHERE a.ID_PRESPEKTIF = 'JP001' AND p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-1%'
                                    //         GROUP BY c.ID_TOKO
                                    //        ";
                                    //   WHERE a.ID_PRESPEKTIF = '$prku' AND p.PERIODE_PENDAPATAN LIKE '%$periodeNil%' AND sb.PERIODE_STOK LIKE '%$periodeNil%' AND kl.PERIODE_KELUHAN LIKE '%$periodeNil%'

                                    $sql = "SELECT a.ID_PRESPEKTIF, a.NAMA_PRESPEKTIF, b.ID_KRITERIA, b.NAMA_KRITERIA, c.NAMA_TOKO, c.ALAMAT_TOKO,
                                                COUNT(k.ID_KARYAWAN) AS jmlKaryawan, p.JUMLAH_PENDAPATAN, p.PERIODE_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI
                                            FROM PRESPEKTIF a JOIN KRITERIA b ON a.ID_PRESPEKTIF = b.ID_PRESPEKTIF
                                                JOIN DAFTAR_TOKO c ON b.ID_TOKO = c.ID_TOKO
                                                JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
                                                JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
                                                JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO
                                                JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
                                            WHERE a.ID_PRESPEKTIF = 'JP001' AND p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-2%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-2%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-2%'
                                            GROUP BY c.ID_TOKO";

                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $prku = $row['ID_PRESPEKTIF'];
                                    $nmToko = $row['NAMA_TOKO'];
                                    $alToko = $row['ALAMAT_TOKO'];



                                    $jmlKeluh = $row['JUMLAH_KELUHAN'];
                                    $jmlTerlay = $row['JUMLAH_TERLAYANI'];
                                    $KEL = $jmlTerlay / $jmlKeluh * 100;
                                    // ==================
                                    $jmlHil = $row['JUMLAH_KEHILANGAN'];
                                    $jmlSto = $row['STOK'];
                                    $PH = $jmlHil / $jmlSto * 100;
                                    // ==================
                                    $jmlKar = $row['jmlKaryawan'];
                                    $jmlPen = $row['JUMLAH_PENDAPATAN'];
                                    $K = $jmlPen / $jmlKar;
                                    $KP = $K / $jmlPen * 100;
                                } else {

                                    $sql_id = "select max(ID_BARANG) AS BARANGKU FROM BARANG WHERE ID_BARANG like '%BR%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['BARANGKU'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $barangku = "BR" . sprintf("%03s", $id_urut);
                                    } else {
                                        $barangku = "BR001";
                                    }
                                }
                                // PNGV00001
                                ?>
                                <?php if (isset($_GET["success"])) { ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Proses Simpan Data <strong>Berhasil</strong>!
                                    </div>

                                <?php } ?>
                                <?php if (isset($_GET["update"])) { ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Proses Ubah Data <strong>Berhasil</strong>!
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET["failed"])) { ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Proses Simpan Data <strong>Gagal</strong>!
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET["hapus"])) { ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Proses Hapus Data <strong>Berhasil</strong>!
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET["hapusfailed"])) { ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Proses Hapus Data <strong>Gagal</strong>!
                                    </div>
                                <?php } ?>

                                <form action=formPenilaian.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">ID Prespektif</label>
                                            <input type=text id="ID_PRESPEKTIF" name="ID_PRESPEKTIF" placeholder="" value="<?php echo @$prku; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Toko</label>
                                            <input type=text id="NAMA_TOKO" name="NAMA_TOKO" placeholder="" value="<?php echo @$nmToko; ?>" class="form-control" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Alamat Toko</label>
                                            <input type=text id="ALAMAT_TOKO" name="ALAMAT_TOKO" placeholder="" value="<?php echo @$alToko; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Periode Penilaian</label>
                                            <select name="PERIODE_PENILAIAN" class="form-control">
                                                <option value="" disabled selected>Pilih Periode</option>
                                                <option value="Minggu Ke-1">Minggu Ke-1</option>
                                                <option value="Minggu Ke-2">Minggu Ke-2</option>
                                                <option value="Minggu Ke-3">Minggu Ke-3</option>
                                                <option value="Minggu Ke-4">Minggu Ke-4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-6">

                                            <label class="form-control-label">Tanggal (Bulan dan Tahun)</label>
                                            <input type=month id="TAHUN" name="TAHUN" placeholder="" value="<?php //echo @$nama_barang; 
                                                                                                            ?>" class="form-control" required="">
                                        </div>
                                    </div>




                                    <div class="card-footer">
                                        <?php
                                     //   if (isset($_GET['ID_PRESPEKTIF'])) {
                                           
                                            ?>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_PRESPEKTIF']; ?>">
                                                <i class="fa fa-cog"></i> Mulai Penilaian Toko 
                                            </button>
                                        <?php
                                      //  } else {
                                            ?>
                                            <!-- <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Buat Penilaian Toko
                                            </button> -->
                                            <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Delete<?php //echo $data['ID_PRESPEKTIF'];
                                                                                                                                                    ?>">
                                                <i class="fa fa-cog"></i> Mulai Penilaian
                                            </button> -->
                                        <?php
                                      //  }
                                        ?>
                                    </div>
                                </form>

                                <!-- Modal -->
                                <!-- Modal content-->
                                <div class="modal fade" id="Delete<?php echo $data['ID_PRESPEKTIF']; ?>" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                    <?php
                                   

                                    ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                <center>
                                                    <h3 class="modal-title">Hasil Penilaian Pada Toko <?php echo $data['ID_PRESPEKTIF']; ?></h3>
                                                </center>
                                            </div>


                                            <form method="post" action="pJenisPrespektif.php">

                                                <div class="modal-body">
                                                    <h4>
                                                        <p class="fa fa-cog"> Penilaian Pertumbuhan Penjualan :</p><?php // echo $periodeNil;
                                                                                                                    ?>
                                                    </h4>
                                                    <h4>
                                                        <p class="fa fa-cog"> Penilaian Rata - Rata Pangsa Pasar :</p><?php // echo $jmlPen; 
                                                                                                                        ?>
                                                    </h4>
                                                    <h4>
                                                        <p class="fa fa-cog"> Penilaian Keluhan Pelanggan :</p><?php echo $KEL; ?>%
                                                    </h4>
                                                    <h4>
                                                        <p class="fa fa-cog"> Penilaian Rata - Rata Produk Terjual :</p><?php // echo $K; 
                                                                                                                        ?>
                                                    </h4>
                                                    <h4>
                                                        <p class="fa fa-cog"> Penilaian Kehilanagn Produk :</p><?php echo $PH; ?>%
                                                    </h4>
                                                    <h4>
                                                        <p class="fa fa-cog"> Penilaian Produktifitas Karyawan :</p><?php echo $KP; ?>%
                                                    </h4>

                                                    <?php // echo $data['ID_PENDAPATAN'];
                                                    ?><br>
                                                    <?php //echo $data['NAMA_PRESPEKTIF']; 
                                                    ?><br>
                                                    <?php //echo $data['ID_KRITERIA']; 
                                                    ?><br>
                                                    <?php //echo $data['NAMA_KRITERIA']; 
                                                    ?><br>
                                                    <?php //echo $data['NAMA_TOKO']; 
                                                    ?><br>
                                                    </p>
                                                </div>


                                                <div class="modal-footer">
                                                    <!-- <button type="submit" value="<?php // echo $data['ID_PRESPEKTIF']; 
                                                                                        ?>" name="Delete" class="btn btn-success btn-sm">Ya</button> -->
                                                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Lihat Detail</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                                <!-- /Modal content -->
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