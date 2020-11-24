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
                                <h5>Formulir Data Penjualan Toko</h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php


                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_PENJUALAN'])) {
                                    $penjualanku = $_GET['ID_PENJUALAN'];

                                    $sql = "SELECT a.ID_PENJUALAN, a.ID_BARANG, a.JUMLAH_PENJUALAN, a.PERIODE_PENJUALAN, a.ID_TOKO AS ID_TOKO
                                            FROM PENJUALAN_TOKO a JOIN DAFTAR_TOKO b ON a.ID_TOKO = b.ID_TOKO
                                            WHERE a.ID_PENJUALAN = '$penjualanku'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $penjualanku = $row['ID_PENJUALAN'];
                                    $id_penjualan = $row['ID_BARANG'];
                                    $id_toko = $row['ID_TOKO'];
                                    $jumlah_penjualan = $row['JUMLAH_PENJUALAN'];
                                    $periode_penjualan = $row['PERIODE_PENJUALAN'];
                                } else {

                                    $sql_id = "select max(ID_PENJUALAN) AS PENJUALAN FROM PENJUALAN_TOKO WHERE ID_PENJUALAN like '%PN%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['PENJUALAN'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $penjualanku = "PN" . sprintf("%03s", $id_urut);
                                    } else {
                                        $penjualanku = "PN001";
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

                                <form action=pDataPenjualanToko.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">ID Penjualan</label>
                                            <input type=text id="ID_PENJUALAN" name="ID_PENJUALAN" placeholder="" value="<?php echo @$penjualanku; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Toko</label>
                                            <select name="ID_TOKO" id="select" class="form-control">
                                                <option value="0" <?php if (!isset($_GET['ID_TOKO'])) {
                                                                        echo "selected";
                                                                        // code...
                                                                    } ?>>Pilih Toko</option>
                                                <?php $str = mysqli_query($con, "SELECT * FROM DAFTAR_TOKO");
                                                while ($data = mysqli_fetch_array($str)) { ?>
                                                    <option value="<?php echo @$data[0]; ?>" <?php if (@$row['ID_TOKO'] == @$data[0]) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo @$data[1]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Barang</label>
                                            <select name="ID_BARANG" id="select" class="form-control">
                                                <option value="0" <?php if (!isset($_GET['ID_BARANG'])) {
                                                                        echo "selected";
                                                                        // code...
                                                                    } ?>>Pilih Barang</option>
                                                <?php $str = mysqli_query($con, "SELECT * FROM BARANG");
                                                while ($data = mysqli_fetch_array($str)) { ?>
                                                    <option value="<?php echo @$data[0]; ?>" <?php if (@$row['ID_BARANG'] == @$data[0]) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo @$data[1]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Jumlah Penjualan</label>
                                            <input type=number id="JUMLAH_PENJUALAN" name="JUMLAH_PENJUALAN" placeholder="Masukkan Jumlah Penjualan" value="<?php echo @$jumlah_penjualan; ?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Periode Penjualan</label>
                                            <select name="PERIODE_PENJUALAN" class="form-control">
                                                <option value="" disabled selected>Pilih Periode</option>
                                                <option value="Minggu Ke-1">Minggu Ke-1</option>
                                                <option value="Minggu Ke-2">Minggu Ke-2</option>
                                                <option value="Minggu Ke-3">Minggu Ke-3</option>
                                                <option value="Minggu Ke-4">Minggu Ke-4</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">

                                            <label class="form-control-label">Tanggal (Bulan dan Tahun)</label>
                                            <input type=month id="TAHUN" name="TAHUN" placeholder="" value="<?php //echo @$nama_barang; 
                                                                                                            ?>" class="form-control" required="">
                                        </div>
                                    </div>


                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_PENJUALAN'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data Penjualan Toko
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data Penjualan Toko
                                            </button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Daftar Penjualan Toko</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID Penjualan</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Alamat Toko</center>
                                                </th>
                                                <th>
                                                    <center>Nama Barang</center>
                                                </th>
                                                <th>
                                                    <center>Jumlah Penjualan</center>
                                                </th>
                                                <th>
                                                    <center>Keterangan</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                                <th>
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT a.ID_PENJUALAN AS ID_PENJUALAN, b.NAMA_TOKO AS nmToko, b.ALAMAT_TOKO AS alToko, c.NAMA_BARANG AS nmBarang, 
                                                        a.JUMLAH_PENJUALAN AS jmlPenjualan, SUBSTRING(a.PERIODE_PENJUALAN, -2) AS prBulan, 
                                                        SUBSTRING(a.PERIODE_PENJUALAN, 1, 11) AS prMinggu, SUBSTRING(a.PERIODE_PENJUALAN, 12, 5) AS prTahun
                                                        FROM PENJUALAN_TOKO a JOIN DAFTAR_TOKO b ON a.ID_TOKO = b.ID_TOKO
                                                        JOIN BARANG c ON a.ID_BARANG = c.ID_BARANG";
                                            $hasil = mysqli_query($con, $tampil1);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {

                                                if ($data['prBulan'] == 01) {
                                                    $bul = 'Januari';
                                                } elseif ($data['prBulan'] == 02) {
                                                    $bul = 'Februari';
                                                } elseif ($data['prBulan'] == 03) {
                                                    $bul = 'Maret';
                                                } elseif ($data['prBulan'] == 04) {
                                                    $bul = 'April';
                                                } elseif ($data['prBulan'] == 05) {
                                                    $bul = 'Mei';
                                                } elseif ($data['prBulan'] == 06) {
                                                    $bul = 'Juni';
                                                } elseif ($data['prBulan'] == 07) {
                                                    $bul = 'Juli';
                                                } elseif ($data['prBulan'] == '08') {
                                                    $bul = 'Agustus';
                                                } elseif ($data['prBulan'] == '09') {
                                                    $bul = 'September';
                                                } elseif ($data['prBulan'] == 10) {
                                                    $bul = 'Oktober';
                                                } elseif ($data['prBulan'] == 11) {
                                                    $bul = 'November';
                                                } elseif ($data['prBulan'] == 12) {
                                                    $bul = 'Desember';
                                                }

                                                ?>
                                                <tr>
                                                    <td>
                                                        <center><?php echo @$data['ID_PENJUALAN']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['nmToko']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['alToko']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['nmBarang']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['jmlPenjualan']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['prMinggu']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data['prTahun']; ?></center>
                                                    </td>

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mDataPenjualanToko.php?ID_PENJUALAN=<?php echo $data['ID_PENJUALAN']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_PENJUALAN']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>
                                                        </center>

                                                            <!-- Modal -->
                                                            <!-- Modal content-->
                                                            <div class="modal fade" id="Delete<?php echo $data['ID_PENJUALAN']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <h4 class="modal-title">Hapus Data <?php echo $data['ID_PENJUALAN']; ?></h4>
                                                                        </div>
                                                                        <form method="post" action="pDataPenjualanToko.php">

                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin akan menghapus data penjualan <?php echo $data['nmBarang']; ?><br>Pada toko <?php echo $data['nmToko']; ?> ?</p>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" value="<?php echo $data['ID_PENJUALAN']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- /Modal content -->
                                                      
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
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