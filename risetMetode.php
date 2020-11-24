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

                              

                                <h5>Riset</h5>
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
                                                    <center></center>
                                                </th>
                                                <th>
                                                    <center>Periode</center>
                                                </th>
                                                <th>
                                                    <center>Status</center>
                                                </th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$tampil1 = "SELECT a.ID_PRESPEKTIF, a.NAMA_PRESPEKTIF, b.ID_KRITERIA, b.NAMA_KRITERIA, c.NAMA_TOKO, c.ALAMAT_TOKO
                                                        FROM PRESPEKTIF a JOIN KRITERIA b ON a.ID_PRESPEKTIF = b.ID_PRESPEKTIF
                                                        JOIN DAFTAR_TOKO c ON b.ID_TOKO = c.ID_TOKO
                                                        GROUP BY b.ID_TOKO";
                                            $hasil = mysqli_query($con, $tampil1);
                                            // $no = 1;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                ?>
                                                <tr>

                                                    <td>
                                                        <center><?php echo @$data['ID_PRESPEKTIF']; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['NAMA_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['ALAMAT_TOKO']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['NAMA_KRITERIA']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo @$data['NAMA_PRESPEKTIF']; ?>
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