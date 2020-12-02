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
                                <h5>Penilaian Kinerja</h5>
                                <span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="order-table0" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>ID</center>
                                                </th>
                                                <th>
                                                    <center>Nama Toko</center>
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

                                            $queryShow = "SELECT a.ID_TOKO, b.NAMA_TOKO, a.PERIODE_PERHITUNGAN
                                                        FROM NILAI_PERHITUNGAN a JOIN DAFTAR_TOKO b ON a.ID_TOKO = b.ID_TOKO
                                                        GROUP BY a.ID_TOKO";

                                            $hasilShow = mysqli_query($con, $queryShow);
                                            // $noShow = 1;
                                            while ($data = mysqli_fetch_array($hasilShow)) {


                                                ?>
                                                <tr>

                                                    <!-- <td>
                                                        <center><?php //echo $noShow; 
                                                                    ?></center>
                                                    </td> -->
                                                    <td>
                                                        <center><?php echo $data['ID_TOKO']; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['PERIODE_PERHITUNGAN']; ?></center>
                                                    </td>
                                                    <td style="padding-top:10px; padding-bottom:10px;">
                                                        <center>

                                                            <a href="lapPenilaian.php?gogogo=<?php echo $data['ID_TOKO']; ?>">

                                                                <button type="submit" class="btn btn-primary btn-sm" name="aksi">
                                                                    <i class="fa fa-cog"></i> Lakukan Penilaian Kinerja
                                                                </button>
                                                            </a>

                                                        </center>
                                                    </td>

                                                </tr>
                                            <?php
                                                //$noShow++;
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