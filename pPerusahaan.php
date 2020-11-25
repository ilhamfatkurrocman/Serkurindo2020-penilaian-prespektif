<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $perusahaanku = $_POST['ID_PERUSAHAAN'];
    $nmPerusahaan = $_POST['NAMA_PERUSAHAAN'];
    $alPerusahaan = $_POST['ALAMAT_PERUSAHAAN'];

    $sql = "INSERT INTO PERUSAHAAN (ID_PERUSAHAAN, NAMA_PERUSAHAAN, ALAMAT_PERUSAHAAN) 
            VALUES ('$perusahaanku','$nmPerusahaan','$alPerusahaan')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPerusahaan.php?success\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPerusahaan.php?failed\">");
    }
}

if (isset($_POST['Update'])) {
    $perusahaanku = $_POST['ID_PERUSAHAAN'];
    $nmPerusahaan = $_POST['NAMA_PERUSAHAAN'];
    $alPerusahaan = $_POST['ALAMAT_PERUSAHAAN'];

    $sql = "UPDATE PERUSAHAAN SET NAMA_PERUSAHAAN ='$nmPerusahaan', ALAMAT_PERUSAHAAN = '$alPerusahaan'
            WHERE ID_PERUSAHAAN = '$perusahaanku'";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPerusahaan.php?update\">");
    }

} else if (isset($_POST['Delete'])) {
    $idpendapatan = $_POST['Delete'];

    $sql = "DELETE FROM PERUSAHAAN WHERE ID_PERUSAHAAN = '$perusahaanku'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPerusahaan.php?hapus\">");
    }

} else if (isset($_POST['simpanPangsa'])) {
    $perusahaanku = $_POST['ID_PERUSAHAAN'];
    $nm_barang = $_POST['ID_BARANG'];
    $mi1 = $_POST['M1'];
    $mi2 = $_POST['M2'];
    $mi3 = $_POST['M3'];
    $mi4 = $_POST['M4'];
    $PERIODE = $_POST['TAHUN'];
    // var_dump($_POST);


     $sql = "INSERT INTO PANGSA_PASAR (ID_PASAR, ID_PERUSAHAAN, ID_BARANG, M1, M2, M3, M4, PERIODE_PASAR) 
             VALUES ('','$perusahaanku','$nm_barang','$mi1','$mi2','$mi3','$mi4','$PERIODE')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPerusahaan.php?success\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPerusahaan.php?failed\">");
    }
}
