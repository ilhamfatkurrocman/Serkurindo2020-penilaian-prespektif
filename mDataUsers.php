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
                                <h5>Formulir Akses Users </h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php

                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_LOGIN'])) {
                                    $loginku = $_GET['ID_LOGIN'];

                                    $sql = "SELECT ID_LOGIN, USER, PASSWORD, STATUS FROM USER where ID_LOGIN = '$loginku'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $loginku = $row['ID_LOGIN'];
                                    $us = $row['USER'];
                                    $ps = $row['PASSWORD'];
                                    $st = $row['STATUS'];
                                } else {

                                    $sql_id = "select max(ID_LOGIN) AS USERRKUUU FROM USER WHERE ID_LOGIN like '%US%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['USERRKUUU'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $loginku = "US" . sprintf("%03s", $id_urut);
                                    } else {
                                        $loginku = "US001";
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

                                <form action=pDataUsers.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">ID</label>
                                            <input type=text id="ID_LOGIN" name="ID_LOGIN" placeholder="" value="<?php echo @$loginku; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">USERNAME</label>
                                            <input type=text id="USER" name="USER" placeholder="Masukkan Nama Pengguna" value="<?php echo @$us; ?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Akses Pengguna</label>
                                            <select name="STATUS" class="form-control" >
                                                <option value="" disabled selected>Pilih Akses</option>
                                                <option value="1">Admin Operasional</option>
                                                <option value="2">Supervisior</option>
                                                <option value="3">Area Sales Manager</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">PASSWORD</label>
                                            <input type=text id="PASSWORD" name="PASSWORD" placeholder="Masukkan Password Pengguna" value="<?php echo @$ps; ?>" class="form-control form-control-center" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        
                                    </div>


                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_LOGIN'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data User
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data User
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
                                <h5>Daftar Akses Users</h5>
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
                                                    <center>Username</center>
                                                </th>
                                                <th>
                                                    <center>Password</center>
                                                </th>
                                                <th>
                                                    <center>Akses</center>
                                                </th>
                                                <th>
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT ID_LOGIN, USER, PASSWORD, STATUS FROM USER";
                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {

                                                if ($data['STATUS'] == 1) {
                                                    $s = 'Admin Operasional';
                                                } elseif ($data['STATUS'] == 2) {
                                                    $s = 'Supervisior';
                                                } elseif ($data['STATUS'] == 3) {
                                                    $s = 'Area Sales Manager';
                                                } 

                                                ?>
                                                <tr>
                                                    
                                                    <td>
                                                        <center><?php echo @$data['ID_LOGIN']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['USER']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['PASSWORD']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $s ?></center>
                                                    </td>

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mDataUsers.php?ID_LOGIN=<?php echo $data['ID_LOGIN']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_LOGIN']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>
                                                        </center>
                                                            <!-- Modal -->
                                                            <!-- Modal content-->
                                                            <div class="modal fade" id="Delete<?php echo $data['ID_LOGIN']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <h4 class="modal-title">Hapus Data <?php echo $data['ID_LOGIN']; ?></h4>
                                                                        </div>
                                                                        <form method="post" action="pDataUsers.php">

                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin akan menghapus akses user id <?php echo $data['ID_LOGIN']; ?> ?</p>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" value="<?php echo $data['ID_LOGIN']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
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