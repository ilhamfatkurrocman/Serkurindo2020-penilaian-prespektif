<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $idpendapatan = $_POST['ID_PENDAPATAN'];
    $jumlah_pendapatan = $_POST['JUMLAH_PENDAPATAN'];
    $periode_minggu = $_POST['PERIODE_PENDAPATAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_toko = $_POST['ID_TOKO'];


    $sql = "INSERT INTO PENDAPATAN_TOKO (ID_PENDAPATAN, ID_TOKO, JUMLAH_PENDAPATAN, PERIODE_PENDAPATAN) 
            VALUES ('$idpendapatan','$get_id_toko','$jumlah_pendapatan','$periode_minggu $periode_tahun')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPendapatan.php?success\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPendapatan.php?failed\">");
    }
}

if (isset($_POST['Update'])) {
    $idpendapatan = $_POST['ID_PENDAPATAN'];
    $jumlah_pendapatan = $_POST['JUMLAH_PENDAPATAN'];
    $periode_minggu = $_POST['PERIODE_PENDAPATAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "UPDATE PENDAPATAN_TOKO SET ID_TOKO ='$get_id_toko', JUMLAH_PENDAPATAN ='$jumlah_pendapatan', PERIODE_PENDAPATAN ='$periode_minggu $periode_tahun' 
            WHERE ID_PENDAPATAN = '$idpendapatan'";
            
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPendapatan.php?update\">");
    }
} else if (isset($_POST['Delete'])) {
    $idpendapatan = $_POST['Delete'];

    $sql = "DELETE FROM PENDAPATAN_TOKO WHERE ID_PENDAPATAN = '$idpendapatan'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataPendapatan.php?hapus\">");
    }
}
