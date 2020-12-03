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
                                <h5>Laporan Pangsa Pasar </h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php

                                // ngecek apakah memanggil post atau get

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

                                <form action="cetak_laporan.php" method="GET" class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label class="form-control-label">Kode Penilaian Kriteria</label>
                                            <select name="ID_PENILAIAN_KRITERIA" id="select" class="form-control" required>
                                                <option value="" <?php if (!isset($_GET['ID_PENILAIAN_KRITERIA'])) {
                                                                        echo "selected";
                                                                        // code...
                                                                    } ?>>Pilih Kode</option>
                                                <?php $str = mysqli_query($con, "SELECT * FROM PENILAIAN_KRITERIA");
                                                while ($data = mysqli_fetch_array($str)) { ?>
                                                    <option value="<?php echo @$data[0]; ?>" <?php if (@$row['ID_PENILAIAN_KRITERIA'] == @$data[0]) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo @$data[0]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label">Periode</label>
                                            <select name="PERIODE_PENILAIAN" id="select" class="form-control" required>
                                                <option value="" <?php if (!isset($_GET['PERIODE_PENILAIAN'])) {
                                                                        echo "selected";
                                                                        // code...
                                                                    } ?>>Pilih Bulan</option>
                                                <?php $str = mysqli_query($con, "SELECT * FROM PENILAIAN_KRITERIA");
                                                while ($data = mysqli_fetch_array($str)) { ?>
                                                    <option value="<?php echo @$data[0]; ?>" <?php if (@$row['PERIODE_PENILAIAN'] == @$data[0]) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo @$data[28]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label">Toko</label>
                                            <select name="ID_TOKO" id="select" class="form-control" required>
                                                <option value="" <?php if (!isset($_GET['ID_TOKO'])) {
                                                                        echo "selected";
                                                                        // code...
                                                                    } ?>>Pilih Toko</option>
                                                <?php $str = mysqli_query($con, "SELECT b.NAMA_TOKO, a.* FROM PENILAIAN_KRITERIA a JOIN DAFTAR_TOKO b ON a.ID_TOKO = b.ID_TOKO");
                                                while ($data = mysqli_fetch_array($str)) { ?>
                                                    <option value="<?php echo @$data[2]; ?>" <?php if (@$row['ID_TOKO'] == @$data[2]) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo @$data[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_PENILAIAN_KRITERIA'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data User
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Lihat Data Laporan
                                            </button>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </form>

                              
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