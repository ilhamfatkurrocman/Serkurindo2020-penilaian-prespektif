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
                                <h5>Formulir Data Barang </h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php


                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_KARYAWAN'])) {
                                    $karyawanku = $_GET['ID_KARYAWAN'];

                                    $sql = "SELECT ID_KARYAWAN, ID_TOKO, NAMA_KARYAWAN FROM KARYAWAN where ID_KARYAWAN = '$karyawanku'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $karyawanku = $row['ID_KARYAWAN'];
                                    $get_id_toko = $row['ID_TOKO'];
                                    $nama_karyawan = $row['NAMA_KARYAWAN'];
                                } else {

                                    $sql_id = "select max(ID_KARYAWAN) AS KARYAWANKU FROM KARYAWAN WHERE ID_KARYAWAN like '%KR%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['KARYAWANKU'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $karyawanku = "KR" . sprintf("%03s", $id_urut);
                                    } else {
                                        $karyawanku = "KR001";
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

                                <form action=pDataKaryawan.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="form-control-label">ID Karyawan</label>
                                            <input type=text id="ID_KARYAWAN" name="ID_KARYAWAN" placeholder="" value="<?php echo @$karyawanku; ?>" class="form-control form-control-center" readonly required="">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Karyawan</label>
                                            <input type=text id="NAMA_KARYAWAN" name="NAMA_KARYAWAN" placeholder="Masukkan Nama Lengkap" value="<?php echo @$nama_karyawan; ?>" class="form-control" required="">
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
                                                                                                    } ?>> <?php echo @$data[1]; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_KARYAWAN'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data Barang
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data Barang
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
                                <h5>Daftar Barang</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID Karyawan</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Alamat Toko</center>
                                                </th>
                                                <th>
                                                    <center>Nama Karyawan</center>
                                                </th>
                                                <th>
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT a.ID_KARYAWAN AS ID_KARYAWAN, b.NAMA_TOKO AS nmToko, b.ALAMAT_TOKO AS alToko, 
                                                        a.NAMA_KARYAWAN AS nmKar
                                                        FROM KARYAWAN a JOIN DAFTAR_TOKO b ON a.ID_TOKO = b.ID_TOKO";
                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo @$data['ID_KARYAWAN']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['nmToko']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['alToko']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['nmKar']; ?></center>
                                                    </td>

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mDataKaryawan.php?ID_KARYAWAN=<?php echo $data['ID_KARYAWAN']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_KARYAWAN']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>
                                                        </center>
                                                        <!-- Modal -->
                                                        <!-- Modal content-->
                                                        <div class="modal fade" id="Delete<?php echo $data['ID_KARYAWAN']; ?>" role="dialog">
                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                        <h4 class="modal-title">Hapus Data <?php echo $data['ID_KARYAWAN']; ?></h4>
                                                                    </div>
                                                                    <form method="post" action="pDataKaryawan.php">

                                                                        <div class="modal-body">
                                                                            <p>Apakah anda yakin akan menghapus data karyawan <?php echo $data['nmKar']; ?> ?</p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" value="<?php echo $data['ID_KARYAWAN']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
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