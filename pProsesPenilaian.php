<?php
include "Koneksi.php";

if (isset($_POST['simpanYa'])) {
    // var_dump($_POST);

    $idTokoo     = $_POST['ID_TOKO'];
    $pPertubuhan = $_POST['PERTUMBUHAN'];
    $rTerjual    = $_POST['RRTERJUAL'];
    $pAngsa      = $_POST['PANGSA'];
    $kEhilanagan = $_POST['KEHILANGAN'];
    $kEluhan     = $_POST['KELUHAN'];
    $kAryawan    = $_POST['KARYAWAN'];
    $mMinggu     = $_POST['MINGGU'];

    $default     = date_default_timezone_set('Asia/Jakarta');
    $dateGo      = date('Y-m');

    $sql_id = "select max(ID_PENILAIAN) AS PNKU FROM NILAI_PERHITUNGAN WHERE ID_PENILAIAN like '%RR%'";
    $hasil_id = mysqli_query($con, $sql_id);
    if (mysqli_num_rows($hasil_id) > 0) {
        $row = mysqli_fetch_array($hasil_id);
        $idmax = $row['PNKU'];
        $id_urut = (int) substr($idmax, 3, 2);
        $id_urut++;
        // sprintf = menambahkan (+)
        $penku = "RR" . sprintf("%03s", $id_urut);
    } else {
        $penku = "RR001";
    }


    $sql = "INSERT INTO NILAI_PERHITUNGAN (ID_PENILAIAN, ID_TOKO, NILAI_K1, NILAI_K2, NILAI_K3, NILAI_K4, NILAI_K5, NILAI_K6, PERIODE_PERHITUNGAN) 
            VALUES ('$penku','$idTokoo','$pPertubuhan','$rTerjual','$pAngsa','$kEhilanagan','$kEluhan','$kAryawan','$mMinggu $dateGo')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPenilaianPrespektif.php?success\">");
    } else {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mPenilaianPrespektif.php?failed\">");
    }
}
