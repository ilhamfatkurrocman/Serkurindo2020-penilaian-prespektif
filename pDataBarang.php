<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $id_barangku = $_POST['ID_BARANG'];
    $nama_barang = $_POST['NAMA_BARANG'];
    $harga = $_POST['HARGA'];

    $sql = "INSERT INTO BARANG (ID_BARANG, NAMA_BARANG, HARGA) 
          VALUES ('$id_barangku','$nama_barang','$harga')";
    if (empty($id_barangku && $nama_barang && $harga)) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataBarang.php?failed\">");
    } else {
        mysqli_query($con, $sql);
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataBarang.php?success\">");
    }
}
if (isset($_POST['Update'])) {
    $id_barangku = $_POST['ID_BARANG'];
    $nama_barang = $_POST['NAMA_BARANG'];
    $harga = $_POST['HARGA'];

    $sql = "UPDATE BARANG SET NAMA_BARANG ='$nama_barang' , HARGA = '$harga'
          WHERE ID_BARANG = '$id_barangku'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataBarang.php?update\">");
    }
} else if (isset($_POST['Delete'])) {
    $id_barangku = $_POST['Delete'];
    $sql = "DELETE FROM BARANG WHERE ID_BARANG = '$id_barangku'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataBarang.php?hapus\">");
    }
}
