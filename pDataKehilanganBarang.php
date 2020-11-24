<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $idkehilangan = $_POST['ID_KEHILANGAN'];
    $jumlah_kehilangan = $_POST['JUMLAH_KEHILANGAN'];
    $periode_minggu = $_POST['PERIODE_KEHILANGAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_toko = $_POST['ID_TOKO'];

   $sql = "INSERT INTO KEHILANGAN (ID_KEHILANGAN, ID_TOKO, JUMLAH_KEHILANGAN, PERIODE_KEHILANGAN)
            VALUES ('$idkehilangan','$get_id_toko','$jumlah_kehilangan','$periode_minggu $periode_tahun')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKehilanganBarang.php?success\">");
    }
}

if (isset($_POST['Update'])) {
    $idkehilangan = $_POST['ID_KEHILANGAN'];
    $jumlah_kehilangan = $_POST['JUMLAH_KEHILANGAN'];
    $periode_minggu = $_POST['PERIODE_KEHILANGAN'];
    $periode_tahun = $_POST['TAHUN'];

    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "UPDATE KEHILANGAN SET ID_TOKO ='$get_id_toko', JUMLAH_KEHILANGAN = '$jumlah_kehilangan', PERIODE_KEHILANGAN = '$periode_minggu $periode_tahun' 
            WHERE ID_KEHILANGAN = '$idkehilangan'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKehilanganBarang.php?update\">");
    }

} else if (isset($_POST['Delete'])) {
    $idkehilangan = $_POST['Delete'];
    $sql = "DELETE FROM KEHILANGAN WHERE ID_KEHILANGAN = '$idkehilangan'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataKehilanganBarang.php?hapus\">");
    }
}
