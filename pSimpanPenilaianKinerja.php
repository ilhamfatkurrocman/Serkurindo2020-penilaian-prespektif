
<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {

    // print_r($_POST);

    $sql_id = "select max(ID_PENILAIAN_KRITERIA) AS PENILAIANKRI FROM PENILAIAN_KRITERIA WHERE ID_PENILAIAN_KRITERIA like '%KK%'";
    $hasil_id = mysqli_query($con, $sql_id);
    if (mysqli_num_rows($hasil_id) > 0) {
        $row = mysqli_fetch_array($hasil_id);
        $idmax = $row['PENILAIANKRI'];
        $id_urut = (int) substr($idmax, 3, 2);
        $id_urut++;
        // sprintf = menambahkan (+)
        $penilai_id = "KK" . sprintf("%03s", $id_urut);
    } else {
        $penilai_id = "KK001";
    }

    $default_date   = date_default_timezone_set('Asia/Jakarta');
    $dateGoo        = date('Y-m');

    $bobot          = $_POST['BOBOT'];
    $target         = $_POST['TARGET'];
    $rata           = $_POST['RATA'];
    $skor           = $_POST['SKOR'];
    $totNilai       = $_POST['TOTAL_NILAI'];

    $tBobot = array_sum($bobot);
    $tSkor = array_sum($skor);

    $get_id_toko = $_POST['ID_TOKO'];

    $sql = "INSERT INTO PENILAIAN_KRITERIA (ID_PENILAIAN_KRITERIA, ID_TOKO, 
            BOBOT1, BOBOT2, BOBOT3, BOBOT4, BOBOT5, BOBOT6, TOTAL_BOBOT,
            TARGET1, TARGET2, TARGET3, TARGET4, TARGET5, TARGET6, 
            RATA1, RATA2, RATA3, RATA4, RATA5, RATA6,
            SKOR1, SKOR2, SKOR3, SKOR4, SKOR5, SKOR6, TOTAL_SKOR, PERIODE_PENILAIAN)
            VALUES ('$penilai_id','$get_id_toko','$bobot[0]','$bobot[1]','$bobot[2]','$bobot[3]','$bobot[4]','$bobot[5]','$tBobot','$target[0]','$target[1]','$target[2]','$target[3]','$target[4]','$target[5]','$rata[0]','$rata[1]','$rata[2]','$rata[3]','$rata[4]','$rata[5]','$skor[0]','$skor[1]','$skor[2]','$skor[3]','$skor[4]','$skor[5]','$tSkor','$dateGoo')";

    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=index.php?success\">");
    }
} 
?>
