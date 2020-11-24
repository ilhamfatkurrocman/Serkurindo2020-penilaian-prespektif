<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $id_keluhanku = $_POST['ID_KELUHAN'];
    $jml_keluhan = $_POST['JUMLAH_KELUHAN'];
    $jml_keluhan_layani = $_POST['JUMLAH_TERLAYANI'];
    $periode_minggu = $_POST['PERIODE_KELUHAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "INSERT INTO KELUAHAN (ID_KELUHAN, ID_TOKO, JUMLAH_KELUHAN, JUMLAH_TERLAYANI, PERIODE_KELUHAN) 
          VALUES ('$id_keluhanku','$get_id_toko','$jml_keluhan','$jml_keluhan_layani','$periode_minggu $periode_tahun')";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKeluhan.php?success\">");
    }
}
if (isset($_POST['Update'])) {
    $id_keluhanku = $_POST['ID_KELUHAN'];
    $jml_keluhan = $_POST['JUMLAH_KELUHAN'];
    $jml_keluhan_layani = $_POST['JUMLAH_TERLAYANI'];
    $periode_minggu = $_POST['PERIODE_KELUHAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "UPDATE KELUAHAN SET ID_TOKO ='$get_id_toko', JUMLAH_KELUHAN = '$jml_keluhan', JUMLAH_TERLAYANI = '$jml_keluhan_layani', 
            PERIODE_KELUHAN = '$periode_minggu $periode_tahun'
            WHERE ID_KELUHAN = '$id_keluhanku'";
            
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKeluhan.php?update\">");
    }
} else if (isset($_POST['Delete'])) {
    $id_keluhanku = $_POST['Delete'];

    $sql = "DELETE FROM KELUAHAN WHERE ID_KELUHAN = '$id_keluhanku'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKeluhan.php?hapus\">");
    }
}
