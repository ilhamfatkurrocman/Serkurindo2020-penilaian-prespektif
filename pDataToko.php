<?php
include "Koneksi.php";

if(isset($_POST['insert'])){
  $id_toko = $_POST['ID_TOKO'];
  $nama_toko = $_POST['NAMA_TOKO'];
  $alamat_toko = $_POST['ALAMAT_TOKO'];
  $nama_supervisor = $_POST['NAMA_SUPERVISIOR'];

  $sql = "INSERT INTO DAFTAR_TOKO (ID_TOKO, NAMA_TOKO, ALAMAT_TOKO, NAMA_SUPERVISIOR) 
          VALUES ('$id_toko','$nama_toko','$alamat_toko','$nama_supervisor')";
  if(empty($id_toko && $nama_toko && $alamat_toko && $nama_supervisor)){
    echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataToko.php?failed\">");
  }else{
    mysqli_query($con, $sql);
    echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataToko.php?success\">");
  }
}
if (isset($_POST['Update'])) {
  $id_toko = $_POST['ID_TOKO'];
  $nama_toko = $_POST['NAMA_TOKO'];
  $alamat_toko = $_POST['ALAMAT_TOKO'];
  $nama_supervisor = $_POST['NAMA_SUPERVISIOR'];

  $sql = "UPDATE DAFTAR_TOKO SET NAMA_TOKO ='$nama_toko', ALAMAT_TOKO = '$alamat_toko', NAMA_SUPERVISIOR = '$nama_supervisor' 
          WHERE  ID_TOKO = '$id_toko'";
  $qwr = mysqli_query($con, $sql);
  if ($qwr) {
    echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataToko.php?update\">");
  }
}else if (isset($_POST['Delete'])) {
  $id_toko = $_POST['Delete'];
  $sql = "DELETE FROM DAFTAR_TOKO WHERE ID_TOKO = '$id_toko'";
  $qwr = mysqli_query($con, $sql);
  if ($qwr) {
    echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataToko.php?hapus\">");
  }
}
