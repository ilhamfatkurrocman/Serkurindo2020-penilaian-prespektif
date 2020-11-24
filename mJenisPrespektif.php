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
                                <h5>Formulir Data Jenis Prespektif</h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php


                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_PRESPEKTIF'])) {
                                    $jpPres = $_GET['ID_PRESPEKTIF'];

                                    $sql = "SELECT ID_PRESPEKTIF, NAMA_PRESPEKTIF FROM PRESPEKTIF where ID_PRESPEKTIF = '$jpPres'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $jpPres = $row['ID_PRESPEKTIF'];
                                    $nmJpPres = $row['NAMA_PRESPEKTIF'];
                                } else {

                                    $sql_id = "select max(ID_PRESPEKTIF) AS JPPRES FROM PRESPEKTIF WHERE ID_PRESPEKTIF like '%JP%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['JPPRES'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $jpPres = "JP" . sprintf("%03s", $id_urut);
                                    } else {
                                        $jpPres = "JP001";
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

                                <form action=pJenisPrespektif.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">ID Presperktif</label>
                                            <input type=text id="ID_PRESPEKTIF" name="ID_PRESPEKTIF" placeholder="" value="<?php echo @$jpPres; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Prespektif</label>
                                            <input type=text id="NAMA_PRESPEKTIF" name="NAMA_PRESPEKTIF" placeholder="Masukkan Nama Prespektif" value="<?php echo @$nmJpPres; ?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_PRESPEKTIF'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data Prespektif
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data Prespektif
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
                                <h5>Daftar Jenis Prespektif</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID Prespektif</center>
                                                </th>
                                                <th>
                                                    <center>Nama Prespektif</center>
                                                </th>
                                                <th>
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT * FROM PRESPEKTIF";
                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo @$data['ID_PRESPEKTIF']; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['NAMA_PRESPEKTIF']; ?>
                                                    </td>
                                                  

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mJenisPrespektif.php?ID_PRESPEKTIF=<?php echo $data['ID_PRESPEKTIF']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_PRESPEKTIF']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>
                                                        </center>
                                                            <!-- Modal -->
                                                            <!-- Modal content-->
                                                            <div class="modal fade" id="Delete<?php echo $data['ID_PRESPEKTIF']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <h4 class="modal-title">Hapus Data <?php echo $data['ID_PRESPEKTIF']; ?></h4>
                                                                        </div>
                                                                        <form method="post" action="pJenisPrespektif.php">

                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin akan menghapus data jenis prespektif <br><?php echo $data['NAMA_PRESPEKTIF']; ?> ?</p>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" value="<?php echo $data['ID_PRESPEKTIF']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
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