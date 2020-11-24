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
                                <h5>Formulir Data Toko </h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php


                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_TOKO'])) {
                                    $tokoku = $_GET['ID_TOKO'];

                                    $sql = "SELECT ID_TOKO, NAMA_TOKO, ALAMAT_TOKO, NAMA_SUPERVISIOR FROM DAFTAR_TOKO where ID_TOKO = '$tokoku'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $tokoku = $row['ID_TOKO'];
                                    $nama_toko = $row['NAMA_TOKO'];
                                    $alamat_toko = $row['ALAMAT_TOKO'];
                                    $nama_supervisor = $row['NAMA_SUPERVISIOR'];
                                } else {

                                    $sql_id = "select max(ID_TOKO) AS TOKOKU FROM DAFTAR_TOKO WHERE ID_TOKO like '%TK%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['TOKOKU'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $tokoku = "TK" . sprintf("%03s", $id_urut);
                                    } else {
                                        $tokoku = "TK001";
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

                                <form action=pDataToko.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">ID Toko</label>
                                            <input type=text id="ID_TOKO" name="ID_TOKO" placeholder="" value="<?php echo @$tokoku; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Alamat Toko</label>
                                            <input type=text id="ALAMAT_TOKO" name="ALAMAT_TOKO" placeholder="Masukkan Alamat Toko" value="<?php echo @$alamat_toko; ?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Toko</label>
                                            <input type=text id="NAMA_TOKO" name="NAMA_TOKO" placeholder="Masukkan Nama Toko" value="<?php echo @$nama_toko; ?>" class="form-control" require="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Supervisior</label>
                                            <input type=text id="NAMA_SUPERVISIOR" name="NAMA_SUPERVISIOR" placeholder="Masukkan Nama Supervisor" value="<?php echo @$nama_supervisor; ?>" class="form-control" require="">
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_TOKO'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data Toko
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data Toko
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
                                <h5>Daftar Toko</h5>
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
                                                    <center>Alamat Toko</center>
                                                </th>
                                                <th>
                                                    <center>Nama Supervisior</center>
                                                </th>
                                                <th>
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT ID_TOKO, NAMA_TOKO, ALAMAT_TOKO, NAMA_SUPERVISIOR FROM DAFTAR_TOKO";
                                            $hasil = mysqli_query($con, $tampil1);
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <center><?php echo @$data['ID_TOKO']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['NAMA_TOKO']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['ALAMAT_TOKO']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['NAMA_SUPERVISIOR']; ?></center>
                                                    </td>


                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mDataToko.php?ID_TOKO=<?php echo $data['ID_TOKO']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_TOKO']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>

                                                            <!-- Modal -->
                                                            <!-- Modal content-->
                                                            <div class="modal fade" id="Delete<?php echo $data['ID_TOKO']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <h4 class="modal-title">Hapus Data <?php echo $data['ID_TOKO']; ?></h4>
                                                                        </div>
                                                                        <form method="post" action="pDataToko.php">

                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin akan menghapus data toko <?php echo $data['NAMA_TOKO']; ?> ?</p>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" value="<?php echo $data['ID_TOKO']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- /Modal content -->
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php
                                                //   $no++;
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