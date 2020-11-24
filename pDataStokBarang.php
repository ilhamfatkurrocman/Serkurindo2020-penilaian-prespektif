<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $stokku = $_POST['ID_STOK'];
    $stok = $_POST['STOK'];
    $periode_minggu = $_POST['PERIODE'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_barang = $_POST['ID_BARANG'];
    $get_id_toko= $_POST['ID_TOKO'];


    $sql = "INSERT INTO STOK_BARANG (ID_STOK, ID_TOKO, ID_BARANG, STOK, PERIODE_STOK) 
            VALUES ('$stokku','$get_id_toko','$get_id_barang','$stok','$periode_minggu $periode_tahun')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataStokBarang.php?success\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataStokBarang.php?failed\">");
    }
}

if (isset($_POST['Update'])) {
    $stokku = $_POST['ID_STOK'];
    $stok = $_POST['STOK'];
    $periode_minggu = $_POST['PERIODE'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_barang = $_POST['ID_BARANG'];
    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "UPDATE STOK_BARANG SET ID_TOKO = '$get_id_toko', ID_BARANG = '$get_id_barang', STOK ='$stok', PERIODE_STOK = '$periode_minggu $periode_tahun' WHERE ID_STOK = '$stokku'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataStokBarang.php?update\">");
    }


} else if (isset($_POST['Delete'])) {
    $stokku = $_POST['Delete'];

    $sql = "DELETE FROM STOK_BARANG WHERE ID_STOK = '$stokku'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataStokBarang.php?hapus\">");
    }
}
