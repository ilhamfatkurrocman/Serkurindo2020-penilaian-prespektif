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
                                <h5>Formulir Data Stok Barang </h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php


                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_STOK'])) {
                                    $stokku = $_GET['ID_STOK'];

    // $sql = "SELECT a.ID_STOK AS idStok, a.STOK AS stStok, b.ID_BARANG AS idBarang, c.ID_TOKO AS idToko 
    //         FROM STOK_BARANG a JOIN BARANG b ON a.ID_STOK = b.ID_STOK
    //         JOIN DAFTAR_TOKO c ON a.ID_STOK = c.ID_TOKO
    //         WHERE a.ID_STOK = '$stokku'";
                                    $sql = "SELECT a.ID_STOK AS ID_STOK, a.STOK AS stStok, b.ID_BARANG AS ID_BARANG, c.ID_TOKO AS ID_TOKO
                                            FROM STOK_BARANG a JOIN BARANG b ON a.ID_BARANG = b.ID_BARANG
                                            JOIN DAFTAR_TOKO c ON a.ID_TOKO = c.ID_TOKO
                                            WHERE a.ID_STOK = '$stokku'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $stokku = $row['ID_STOK'];
                                    $stok = $row['stStok'];
                                    $idBarang = $row['ID_BARANG'];
                                    $idToko = $row['ID_TOKO'];
                                } else {

                                    $sql_id = "select max(ID_STOK) AS STOKKU FROM STOK_BARANG WHERE ID_STOK like '%ST%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['STOKKU'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $stokku = "ST" . sprintf("%03s", $id_urut);
                                    } else {
                                        $stokku = "ST001";
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

                                <form action=pDataStokBarang.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">ID Stok</label>
                                            <input type=text id="ID_STOK" name="ID_STOK" placeholder="" value="<?php echo @$stokku; ?>" class="form-control form-control-center" readonly required="">
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
                                            <label class="form-control-label">Stok Barang</label>
                                            <input type=number id="STOK" name="STOK" placeholder="Masukkan Stok Barang" value="<?php echo @$stok; ?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Periode</label>
                                            <select name="PERIODE" class="form-control">
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
                                        if (isset($_GET['ID_STOK'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data Stok Barang
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data Stok Barang
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
                                <h5>Daftar Stok Barang</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID Toko</center>
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
                                                    <center>Stok</center>
                                                </th>
                                                <th>
                                                    <center>Harga (Rp)</center>
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
                                            @$tampil1 = "SELECT a.ID_TOKO AS idToko, c.ID_STOK AS ID_STOK, a.NAMA_TOKO AS nmToko, a.ALAMAT_TOKO AS alToko, 
                                                        b.NAMA_BARANG AS nmBarang, c.STOK AS stStok, b.HARGA AS haHarga,
                                                        SUBSTRING(c.PERIODE_STOK, -2) AS prBulan, SUBSTRING(c.PERIODE_STOK, 1, 11) AS prMinggu, SUBSTRING(c.PERIODE_STOK, 12, 5) AS prTahun
                                                        FROM DAFTAR_TOKO a JOIN STOK_BARANG c ON a.ID_TOKO = c.ID_TOKO
                                                        JOIN BARANG b ON c.ID_BARANG = b.ID_BARANG";
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
                                                        <center><?php echo @$data['ID_STOK']; ?></center>
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
                                                        <center><?php echo @$data['stStok']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['haHarga']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['prMinggu']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, @$data['prTahun']; ?></center>
                                                    </td>

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mDataStokBarang.php?ID_STOK=<?php echo $data['ID_STOK']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_STOK']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>
                                                        </center>
                                                            <!-- Modal -->
                                                            <!-- Modal content-->
                                                            <div class="modal fade" id="Delete<?php echo $data['ID_STOK']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <h4 class="modal-title">Hapus Data <?php echo $data['ID_STOK']; ?></h4>
                                                                        </div>
                                                                        <form method="post" action="pDataStokBarang.php">

                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin akan menghapus data stok barang <?php echo $data['nmBarang']; ?><br>Pada toko <?php echo $data['nmToko']; ?> ?</p>
                                                                                <p></p>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" value="<?php echo $data['ID_STOK']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
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