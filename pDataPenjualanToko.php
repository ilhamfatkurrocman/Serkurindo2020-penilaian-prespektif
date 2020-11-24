<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $idpenjualan = $_POST['ID_PENJUALAN'];
    $jumlah_penjualan = $_POST['JUMLAH_PENJUALAN'];
    $periode_minggu = $_POST['PERIODE_PENJUALAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_barang = $_POST['ID_BARANG'];
    $get_id_toko = $_POST['ID_TOKO'];


    $sql = "INSERT INTO PENJUALAN_TOKO (ID_PENJUALAN, ID_TOKO, ID_BARANG, JUMLAH_PENJUALAN, PERIODE_PENJUALAN) 
            VALUES ('$idpenjualan','$get_id_toko','$get_id_barang','$jumlah_penjualan','$periode_minggu $periode_tahun')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPenjualanToko.php?success\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPenjualanToko.php?failed\">");
    }
}

if (isset($_POST['Update'])) {
    $idpenjualan = $_POST['ID_PENJUALAN'];
    $jumlah_penjualan = $_POST['JUMLAH_PENJUALAN'];
    $periode_minggu = $_POST['PERIODE_PENJUALAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_barang = $_POST['ID_BARANG'];
    $get_id_toko = $_POST['ID_TOKO'];


    $sql = "UPDATE PENJUALAN_TOKO SET ID_TOKO = '$get_id_toko', ID_BARANG = '$get_id_barang', JUMLAH_PENJUALAN ='$jumlah_penjualan', PERIODE_PENJUALAN = '$periode_minggu $periode_tahun' 
            WHERE ID_PENJUALAN = '$idpenjualan'";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPenjualanToko.php?update\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPenjualanToko.php?failed\">");
    }

} else if (isset($_POST['Delete'])) {
    $idpenjualan = $_POST['Delete'];
    $sql = "DELETE FROM PENJUALAN_TOKO WHERE ID_PENJUALAN = '$idpenjualan'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPenjualanToko.php?hapus\">");
    }
}
