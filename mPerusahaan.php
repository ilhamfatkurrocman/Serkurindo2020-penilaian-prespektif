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
                                <h5>Formulir Data Pangsa Pasar Perusahaan </h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                            </div>
                            <div class="card-block">
                                <?php
                                // ngecek apakah memanggil post atau get
                                if (isset($_GET['ID_PERUSAHAAN'])) {
                                    $perusahaanku = $_GET['ID_PERUSAHAAN'];

                                    $sql = "SELECT ID_PERUSAHAAN, NAMA_PERUSAHAAN, ALAMAT_PERUSAHAAN
                                            FROM PERUSAHAAN where ID_PERUSAHAAN = '$perusahaanku'";
                                    $qwri = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($qwri);

                                    $perusahaanku = $row['ID_PERUSAHAAN'];
                                    $nmPerusahaan = $row['NAMA_PERUSAHAAN'];
                                    $alPerusahaan = $row['ALAMAT_PERUSAHAAN'];
                                } else {

                                    $sql_id = "select max(ID_PERUSAHAAN) AS PERUSAHAANKU FROM PERUSAHAAN WHERE ID_PERUSAHAAN like '%CO%'";
                                    $hasil_id = mysqli_query($con, $sql_id);
                                    if (mysqli_num_rows($hasil_id) > 0) {
                                        $row = mysqli_fetch_array($hasil_id);
                                        $idmax = $row['PERUSAHAANKU'];
                                        $id_urut = (int) substr($idmax, 3, 2);
                                        $id_urut++;
                                        // sprintf = menambahkan (+)
                                        $perusahaanku = "CO" . sprintf("%03s", $id_urut);
                                    } else {
                                        $perusahaanku = "CO001";
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

                                <form action=pPerusahaan.php method=post class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="form-control-label">ID Perusahaan</label>
                                            <input type=text id="ID_PERUSAHAAN" name="ID_PERUSAHAAN" placeholder="" value="<?php echo @$perusahaanku; ?>" class="form-control form-control-center" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Nama Perusahaan</label>
                                            <input type=text id="NAMA_PERUSAHAAN" name="NAMA_PERUSAHAAN" placeholder="Masukkan Nama Perusahaan" value="<?php echo @$nmPerusahaan; ?>" class="form-control" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">Alamat Perusahaan</label>
                                            <input type=text id="ALAMAT_PERUSAHAAN" name="ALAMAT_PERUSAHAAN" placeholder="Masukkan Alamat Perusahaan" value="<?php echo @$alPerusahaan; ?>" class="form-control" required="">
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <?php
                                        if (isset($_GET['ID_PERUSAHAAN'])) {
                                            ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
                                                <i class="fa fa-dot-circle-o"></i> Perbaruhi Data Perusahaan
                                            </button>
                                        <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm" name="insert" value="insert">
                                                <i class="fa fa-dot-circle-o"></i> Simpan Data Perusahaan
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
                                <h5>Daftar Jumlah Pangsa Pasar Perusahaan</h5>
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
                                                    <center>Nama Perusahaan</center>
                                                </th>
                                                <th>
                                                    <center>Alamat Perusahaan</center>
                                                </th>

                                                <th>
                                                    <center>Action</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT ID_PERUSAHAAN, NAMA_PERUSAHAAN, ALAMAT_PERUSAHAAN FROM PERUSAHAAN";
                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo @$data['ID_PERUSAHAAN']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['NAMA_PERUSAHAAN']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['ALAMAT_PERUSAHAAN']; ?></center>
                                                    </td>

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="mPerusahaan.php?ID_PERUSAHAAN=<?php echo $data['ID_PERUSAHAAN']; ?>">
                                                                <!-- <input type="button" value="Edit" class="btn btn-warning"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i> Ubah
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#PangsaPasar<?php echo $data['ID_PERUSAHAAN']; ?>">
                                                                <i class="fa fa-cog"></i> Pangsa Pasar
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_PERUSAHAAN']; ?>">
                                                                <i class="fa fa-trash-o"></i> Hapus
                                                            </button>
                                                        </center>

                                                        <!-- Modal -->
                                                        <!-- Modal content-->
                                                        <div class="modal fade" id="Delete<?php echo $data['ID_PERUSAHAAN']; ?>" role="dialog">
                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                        <h4 class="modal-title">Hapus Data <?php echo $data['ID_PERUSAHAAN']; ?></h4>
                                                                    </div>
                                                                    <form method="post" action="pPerusahaan.php">

                                                                        <div class="modal-body">
                                                                            <p>Apakah anda yakin akan menghapus data perusahhan <br><?php echo $data['NAMA_PERUSAHAAN']; ?> ?</p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" value="<?php echo $data['ID_PERUSAHAAN']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
                                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- /Modal content -->

                                                        <!-- Modal -->
                                                        <!-- Modal content-->
                                                        <div class="modal fade" id="PangsaPasar<?php echo $data['ID_PERUSAHAAN']; ?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                        <h4 class="modal-title">Masukkan Pangsa Pasar <?php echo $data['ID_PERUSAHAAN']; ?></h4>
                                                                    </div>
                                                                    <form method="post" action="pPerusahaan.php">
                                                                        <div class="modal-body">
                                                                            <h4><?php echo $data['NAMA_PERUSAHAAN']; ?></h4>

                                                                            <div class="form-group row">
                                                                                <input type="hidden" value="<?php echo $data['ID_PERUSAHAAN']; ?>" name="ID_PERUSAHAAN">
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

                                                                                    <label class="form-control-label">Tanggal (Bulan dan Tahun)</label>
                                                                                    <input type=month id="TAHUN" name="TAHUN" placeholder="" value="<?php //echo @$nama_barang; 
                                                                                                                                                        ?>" class="form-control" required="">
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6"><label class="form-control-label">Periode Minggu Ke-1</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control form-control-center" placeholder="0" name="M1" value="<?php  //echo $m; 
                                                                                                                                                                                            ?>" require>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6"><label class="form-control-label">Periode Minggu Ke-3</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control form-control-center" placeholder="0" name="M3" value="<?php //echo $hasilPenjualan;
                                                                                                                                                                                            ?>" require>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6"><label class="form-control-label">Periode Minggu Ke-2</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control form-control-center" placeholder="0" name="M2" value="<?php // echo $KEL; 
                                                                                                                                                                                            ?>" require>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6"><label class="form-control-label">Periode Minggu Ke-4</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control form-control-center" placeholder="0" name="M4" value="<?php //echo $PH; 
                                                                                                                                                                                            ?>" require>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success btn-sm" name="simpanPangsa">
                                                                                <i class="fa fa-cog"></i> Simpan Pangsa Pasar
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

                        <div class="card">
                            <div class="card-header">
                                <h5>Pangsa Pasar</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table2" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>Nama Perusahaan</center>
                                                </th>
                                                <th>
                                                    <center>Nama Barang</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 1</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 2</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 3</center>
                                                </th>
                                                <th>
                                                    <center>Minggu 4</center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tNilai6 = "SELECT b.NAMA_PERUSAHAAN, NAMA_BARANG, a.M1, a.M2, a.M3, a.M4, SUBSTRING(a.PERIODE_PASAR, -2) AS prBulan, 
                                                        SUBSTRING(a.PERIODE_PASAR, 1, 4) AS prTahun
                                                        FROM PANGSA_PASAR a JOIN PERUSAHAAN b ON a.ID_PERUSAHAAN = b.ID_PERUSAHAAN
                                                        JOIN BARANG c ON a.ID_BARANG = c.ID_BARANG";
                                            $hasil6 = mysqli_query($con, $tNilai6);
                                            $no = 1;
                                            while ($data6 = mysqli_fetch_array($hasil6)) {

                                                if ($data6['prBulan'] == 01) {
                                                    $bul = 'Januari' ;
                                                } elseif ($data6['prBulan'] == 02) {
                                                    $bul = 'Februari ';
                                                } elseif ($data6['prBulan'] == 03) {
                                                    $bul = 'Maret' ;
                                                } elseif ($data6['prBulan'] == 04) {
                                                    $bul = 'April ';
                                                } elseif ($data6['prBulan'] == 05) {
                                                    $bul = 'Mei ';
                                                } elseif ($data6['prBulan'] == 06) {
                                                    $bul = 'Juni ';
                                                } elseif ($data6[ 'prBulan'] == 07) {
                                                    $bul = 'Juli';
                                                } elseif ($data6['prBulan'] == '08') {
                                                    $bul = 'Agustus ';
                                                } elseif ($data6['prBulan'] == '09') {
                                                    $bul = 'September ';
                                                } elseif ($data6['prBulan'] == 10) {
                                                    $bul = 'Oktober ';
                                                } elseif ($data6['prBulan'] == 11) {
                                                    $bul = 'November ';
                                                } elseif ($data6['prBulan'] == 12) {
                                                    $bul = 'Desember ';
                                                }

                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo $no; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data6['NAMA_PERUSAHAAN']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data6['NAMA_BARANG']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data6['M1']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data6['M2']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data6['M3']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data6['M4']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $bul, $data6['prTahun']; ?></center>
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