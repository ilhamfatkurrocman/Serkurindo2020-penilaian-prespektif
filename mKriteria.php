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
                                <h5>Formulir Data Kriteria</h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php


                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_KRITERIA'])) {
                                    $idKri = $_GET['ID_KRITERIA'];

                                    $sql = "SELECT ID_KRITERIA, ID_PRESPEKTIF, ID_TOKO, NAMA_KRITERIA FROM KRITERIA where ID_KRITERIA = '$idKri'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $idKri = $row['ID_KRITERIA'];
                                    $idJpPres = $row['ID_PRESPEKTIF'];
                                    $idToko = $row['ID_TOKO'];
                                    $nmKri = $row['NAMA_KRITERIA'];
                                } else {

                                    $sql_id = "select max(ID_KRITERIA) AS KRI FROM KRITERIA WHERE ID_KRITERIA like '%KP%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['KRI'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $idKri = "KP" . sprintf("%03s", $id_urut);
                                    } else {
                                        $idKri = "KP001";
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

                                <form action=pKriteria.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">ID Kriteria</label>
                                            <input type=text id="ID_KRITERIA" name="ID_KRITERIA" placeholder="" value="<?php echo @$idKri; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Prespektif</label>
                                            <select name="ID_PRESPEKTIF" id="select" class="form-control">
                                                <option value="0" disabled selected <?php if (!isset($_GET['ID_PRESPEKTIF'])) {
                                                                                        echo "selected";
                                                                                        // code...
                                                                                    } ?>>Pilih Prespektif</option>
                                                <?php $str = mysqli_query($con, "SELECT * FROM PRESPEKTIF");
                                                while ($data = mysqli_fetch_array($str)) { ?>
                                                    <option value="<?php echo @$data[0]; ?>" <?php if (@$row['ID_PRESPEKTIF'] == @$data[0]) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo @$data[1]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Kriteria</label>
                                            <input type=text id="NAMA_KRITERIA" name="NAMA_KRITERIA" placeholder="" value="<?php echo @$nmKri; ?>" class="form-control" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Toko</label>
                                            <select name="ID_TOKO" id="select" class="form-control">
                                                <option value="0" disabled selected <?php if (!isset($_GET['ID_TOKO'])) {
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
                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_KRITERIA'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data Kriteria
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data Kriteria
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
                                <h5>Daftar Kriteria</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID Kriteria</center>
                                                </th>
                                                <th>
                                                    <center>Nama Prespektif</center>
                                                </th>
                                                <th>
                                                    <center>Nama Kriteria</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
                                                </th>
                                                <th>
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT a.ID_KRITERIA AS ID_KRITERIA, b.NAMA_PRESPEKTIF AS nmJpPres,
                                            a.NAMA_KRITERIA AS nmKri, c.NAMA_TOKO AS nmTok FROM KRITERIA a JOIN PRESPEKTIF b
                                            ON a.ID_PRESPEKTIF = b.ID_PRESPEKTIF JOIN DAFTAR_TOKO c ON a.ID_TOKO = c.ID_TOKO";
                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo @$data['ID_KRITERIA']; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['nmJpPres']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['nmKri']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['nmTok']; ?>
                                                    </td>

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mKriteria.php?ID_KRITERIA=<?php echo $data['ID_KRITERIA']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_KRITERIA']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>
                                                        </center>
                                                        <!-- Modal -->
                                                        <!-- Modal content-->
                                                        <div class="modal fade" id="Delete<?php echo $data['ID_KRITERIA']; ?>" role="dialog">
                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                        <h4 class="modal-title">Hapus Data <?php echo $data['ID_KRITERIA']; ?></h4>
                                                                    </div>
                                                                    <form method="post" action="pKriteria.php">

                                                                        <div class="modal-body">
                                                                            <p>Apakah anda yakin akan menghapus data kriteria penilaian <br><?php echo $data['nmKri']; ?> ?</p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" value="<?php echo $data['ID_KRITERIA']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
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