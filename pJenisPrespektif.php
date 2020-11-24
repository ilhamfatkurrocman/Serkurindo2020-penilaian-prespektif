<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $idJpPres = $_POST['ID_PRESPEKTIF'];
    $nmJpPres = $_POST['NAMA_PRESPEKTIF'];

    $sql = "INSERT INTO PRESPEKTIF (ID_PRESPEKTIF, NAMA_PRESPEKTIF) 
          VALUES ('$idJpPres','$nmJpPres')";
    if (empty($idJpPres && $nmJpPres)) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mJenisPrespektif.php?failed\">");
    } else {
        mysqli_query($con, $sql);
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mJenisPrespektif.php?success\">");
    }
}
if (isset($_POST['Update'])) {
    $idJpPres = $_POST['ID_PRESPEKTIF'];
    $nmJpPres = $_POST['NAMA_PRESPEKTIF'];

    $sql = "UPDATE PRESPEKTIF SET NAMA_PRESPEKTIF ='$nmJpPres'
            WHERE ID_PRESPEKTIF = '$idJpPres'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mJenisPrespektif.php?update\">");
    }
} else if (isset($_POST['Delete'])) {
    $idJpPres = $_POST['Delete'];
    $sql = "DELETE FROM PRESPEKTIF WHERE ID_PRESPEKTIF = '$idJpPres'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mJenisPrespektif.php?hapus\">");
    }
}
