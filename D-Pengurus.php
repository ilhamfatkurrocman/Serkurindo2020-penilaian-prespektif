<?php
include "Header.php";
?>
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Pengurus</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block" id="tabel1">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID</center>
                                                </th>
                                                <th>
                                                    <center>FOTO</center>
                                                </th>
                                                <th>
                                                    <center>NAMA LENGKAP</center>
                                                </th>
                                                <th>
                                                    <center>ALAMAT</center>
                                                </th>
                                                <th>
                                                    <center>TELP</center>
                                                </th>
                                                <th>
                                                    <center>EMAIL</center>
                                                </th>
                                                <th>
                                                    <center>STATUS</center>
                                                </th>
                                                <th>
                                                    <center>DIVISI</center>
                                                </th>
                                                <th>
                                                    <center>CONTROL</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT A.P_ID_PENGURUS, A.P_FOTO_PROFIL, A.P_NAMA_PENGURUS, A.P_ALAMAT_PENGURUS, A.P_NO_TELP, 
                                                        A.P_EMAIL_PENGURUS, A.P_STATUS, B.NAMA_JABATAN FROM PENGURUS A JOIN JABATAN B ON A.ID_JABATAN = B.ID_JABATAN";
                                            $hasil = mysqli_query($con, $tampil1);
                                            @$no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <center><?php echo @$data['P_ID_PENGURUS']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><img src="<?php echo ($data['P_FOTO_PROFIL']) ?>" width="80px" height="80px"></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['P_NAMA_PENGURUS']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['P_ALAMAT_PENGURUS']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['P_NO_TELP']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['P_EMAIL_PENGURUS']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php if ($data['P_STATUS'] == 'A') { ?>
                                                                <h4><label class="label label-success">AKTIF</label></h4>
                                                            <?php } ?>
                                                            <?php if ($data['P_STATUS'] == 'T') { ?>
                                                                <h4><label class="label label-danger">TIDAK AKTIF</label></h4>
                                                            <?php } ?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo @$data['NAMA_JABATAN']; ?></center>
                                                    </td>

                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <button type="button" class="btn waves-light btn-danger btn-sm tooltipNew" data-toggle="modal" data-target="#Detail<?php echo $data['P_ID_PENGURUS']; ?>">
                                                                <i class="icofont icofont-eye-alt"></i> <span class="tooltiptextNew">Tooltipsdsadasd text</span>
                                                            </button>
                                                            <div class="tooltipNew">Hover over me
                                                                <span class="tooltiptextNew">Tooltipsdsadasd text</span>
                                                            </div>



                                                            <a href="M-Kota.php?ID_KOTA=<?php echo $data['ID_KOTA']; ?>">
                                                                <!-- <input type="button" value="Ubah" class="btn btn-warning btn-sm"> -->
                                                                <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            </a>
                                                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $data['ID_KOTA']; ?>">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                            <div class="tool-box">
                                                                <div data-toolbar="user-options" class="btn-toolbar btn-danger btn-toolbar-danger" id="bounce-toolbar" data-toolbar-event="click"><i class="fa fa-cog"></i></div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <!-- Modal -->
                                                            <!-- Modal content-->
                                                            <div class="modal fade" id="Delete<?php echo $data['ID_KOTA']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <h4 class="modal-title">Hapus Data <?php echo $data['ID_KOTA']; ?></h4>
                                                                        </div>
                                                                        <form method="post" action="P-Kota.php">

                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin akan menghapus data <?php echo $data['NM_KOTA']; ?></p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" value="<?php echo $data['ID_KOTA']; ?>" name="Delete" class="btn btn-success btn-sm">Ya</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- /Modal content -->

                                                            <!-- Modal Detail-->
                                                            <div class="modal fade" id="Detail<?php echo $data['P_ID_PENGURUS']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <right><button type="button" class="close" data-dismiss="modal">&times;</button></right>
                                                                            <h4 class="modal-title">Hapus Data <?php echo $data['P_ID_PENGURUS']; ?></h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Apakah anda yakin akan menghapus data <?php echo $data['P_NAMA_PENGURUS']; ?></p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- /Modal Detail-->

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