<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $idKri = $_POST['ID_KRITERIA'];
    $nmKri = $_POST['NAMA_KRITERIA'];
    $idJpPres = $_POST['ID_PRESPEKTIF'];
    $idToko = $_POST['ID_TOKO'];

    $sql = "INSERT INTO KRITERIA (ID_KRITERIA, ID_PRESPEKTIF, ID_TOKO, NAMA_KRITERIA) 
          VALUES ('$idKri','$idJpPres','$idToko','$nmKri')";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mKriteria.php?success\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mKriteria.php?failed\">");
    }
}
if (isset($_POST['Update'])) {
    $idKri = $_POST['ID_KRITERIA'];
    $nmKri = $_POST['NAMA_KRITERIA'];
    $idJpPres = $_POST['ID_PRESPEKTIF'];
    $idToko = $_POST['ID_TOKO'];

    $sql = "UPDATE KRITERIA SET ID_PRESPEKTIF ='$idJpPres', ID_TOKO ='$idToko', NAMA_KRITERIA ='$nmKri'
            WHERE ID_KRITERIA = '$idKri'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mKriteria.php?update\">");
    }

} else if (isset($_POST['Delete'])) {
    $idKri = $_POST['Delete'];
    $sql = "DELETE FROM KRITERIA WHERE ID_KRITERIA = '$idKri'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mKriteria.php?hapus\">");
    }
}
