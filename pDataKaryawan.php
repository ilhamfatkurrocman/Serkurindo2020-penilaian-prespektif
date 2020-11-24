<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $id_karyawan = $_POST['ID_KARYAWAN'];
    $nama_karyawan = $_POST['NAMA_KARYAWAN'];

    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "INSERT INTO KARYAWAN (ID_KARYAWAN, ID_TOKO, NAMA_KARYAWAN) 
          VALUES ('$id_karyawan','$get_id_toko','$nama_karyawan')";
    if (empty($id_karyawan && $get_id_toko && $nama_karyawan)) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKaryawan.php?failed\">");
    } else {
        mysqli_query($con, $sql);
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKaryawan.php?success\">");
    }
}
if (isset($_POST['Update'])) {
    $id_karyawan = $_POST['ID_KARYAWAN'];
    $nama_karyawan = $_POST['NAMA_KARYAWAN'];

    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "UPDATE KARYAWAN SET NAMA_KARYAWAN ='$nama_karyawan', ID_TOKO = '$get_id_toko'
          WHERE ID_KARYAWAN = '$id_karyawan'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKaryawan.php?update\">");
    }
} else if (isset($_POST['Delete'])) {
    $id_karyawan = $_POST['Delete'];
    $sql = "DELETE FROM KARYAWAN WHERE ID_KARYAWAN = '$id_karyawan'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKaryawan.php?hapus\">");
    }
}
