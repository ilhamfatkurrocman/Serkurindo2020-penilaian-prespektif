<!DOCTYPE html>
<html>

<head>
    <title>Dokumen Hasil Penilaian</title>
</head>

<body>

    <center>

        <h1>LAPORAN HASIL PENILAIAN</h1>
        <h4></h4>

    </center>

    <?php
    include "Koneksi.php";
    ?>

    <table id="export_data_loh" class="" width="100%" border="1px">
        <thead>
            <tr>

                <th>
                    <center>Jenis Prespektif</center>
                </th>
                <th>
                    <center>Kriteria</center>
                </th>
                <th>
                    <center>Bobot (%)</center>
                </th>
                <th>
                    <center>Target (Opsional)</center>
                </th>
                <th>
                    <center>Minggu Ke-1</center>
                </th>
                <th>
                    <center>Minggu Ke-2</center>
                </th>
                <th>
                    <center>Minggu Ke-3</center>
                </th>
                <th>
                    <center>Minggu Ke-4</center>
                </th>
                <th>
                    <center>Nilai Rata - Rata</center>
                </th>
                <th>
                    <center>Skor</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php

            $td_get = $_GET['ID_TOKO'];

            // var_dump($td_get);

            $hehe = 1;
            $haQuery = array();

            $queryy = "SELECT y.ID_KRITERIA, z.ID_PRESPEKTIF, z.NAMA_PRESPEKTIF, y.ID_TOKO, y.NAMA_KRITERIA
															FROM KRITERIA y JOIN PRESPEKTIF z ON z.ID_PRESPEKTIF = y.ID_PRESPEKTIF
															WHERE y.ID_TOKO = '$td_get'";

            $hasilLap = mysqli_query($con, $queryy);
            $jum = mysqli_num_rows($hasilLap);

            $queryyy = "SELECT ID_KRITERIA
															FROM KRITERIA
															WHERE ID_TOKO = '$td_get'";

            $hasilLap2 = mysqli_query($con, $queryyy);
            $jum2 = mysqli_fetch_array($hasilLap2);

            while ($dataLap = mysqli_fetch_array($hasilLap)) {
                $ID_KRI = $dataLap['ID_KRITERIA'];
                $q = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, d.ID_PRESPEKTIF, d.NAMA_PRESPEKTIF, c.ID_KRITERIA as idKri, c.NAMA_KRITERIA,
															(SELECT l.NILAI_K$hehe
																FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																WHERE p.ID_TOKO = '$td_get' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%' AND p.ID_KRITERIA = '$jum2[0]')as krM1N$hehe,
															(SELECT l.NILAI_K$hehe
																FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																WHERE p.ID_TOKO = '$td_get' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%' AND p.ID_KRITERIA = '$jum2[0]')as krM2N$hehe,
															(SELECT l.NILAI_K$hehe
																FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																WHERE p.ID_TOKO = '$td_get' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%' AND p.ID_KRITERIA = '$jum2[0]')as krM3N$hehe,
															(SELECT l.NILAI_K$hehe
																FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																WHERE p.ID_TOKO = '$td_get' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%' AND p.ID_KRITERIA = '$jum2[0]')as krM4N$hehe,
                                                            (SELECT BOBOT$hehe
                                                                FROM PENILAIAN_KRITERIA WHERE ID_TOKO = '$td_get') as bobot,
                                                            (SELECT TARGET$hehe
                                                                FROM PENILAIAN_KRITERIA WHERE ID_TOKO = '$td_get') as target,
                                                            (SELECT SKOR$hehe
                                                                FROM PENILAIAN_KRITERIA WHERE ID_TOKO = '$td_get') as skor,
                                                            (SELECT RATA$hehe
                                                                FROM PENILAIAN_KRITERIA WHERE ID_TOKO = '$td_get') as tRataRata
														FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
															JOIN KRITERIA c ON a.ID_TOKO = c.ID_TOKO
															JOIN PRESPEKTIF d ON c.ID_PRESPEKTIF = d.ID_PRESPEKTIF
														WHERE a.ID_TOKO = '$td_get' AND c.ID_KRITERIA = '$jum2[0]'
														GROUP BY c.ID_KRITERIA";

                if ($hehe != $jum) {
                    $haQuery[] = $q . " UNION ";
                } else {
                    $haQuery[] = $q;
                }

                $hehe++;
                $jum2 = mysqli_fetch_array($hasilLap2);
            }

            $qu = "";

            for ($i = 0; $i <= count($haQuery)-1; $i++) {
                $qu .= $haQuery[$i];
            }

            // var_dump($qu);

            $totalRata = 0;

            $hasilnya_ya = mysqli_query($con, $qu);
            while ($fArray_hasil = mysqli_fetch_array($hasilnya_ya)) {

                $ra = $fArray_hasil['krM1N1'] + $fArray_hasil['krM2N1'] + $fArray_hasil['krM3N1'] + $fArray_hasil['krM4N1'];
                $raBagi = $ra / 4;

                $totalRata += $fArray_hasil['tRataRata'];

                ?>

                <tr>
                    <input type=hidden id="ID_TOKO" name="ID_TOKO" placeholder="0" value="<?php echo $td_get; ?>" class="form-control form-control-center">
                    <td>
                        <?php echo $fArray_hasil['NAMA_PRESPEKTIF']; ?>
                    </td>
                    <td>
                        <?php echo $fArray_hasil['NAMA_KRITERIA']; ?>
                    </td>
                    <td>

                        <center><?php echo $fArray_hasil['bobot']; ?></center>

                    </td>
                    <td>
                        <center><?php echo $fArray_hasil['target']; ?></center>
                    </td>
                    <td>
                        <center><?php echo $fArray_hasil['krM1N1']; ?></center>
                        <input type=hidden id="krM1N1" name="krM1N1[]" placeholder="0" value="<?php echo $fArray_hasil['krM1N1']; ?>" class="" require>
                    </td>
                    <td>
                        <center><?php echo $fArray_hasil['krM2N1']; ?></center>
                        <input type=hidden id="krM2N1" name="krM2N1[]" placeholder="0" value="<?php echo $fArray_hasil['krM2N1']; ?>" class="" require>
                    </td>
                    <td>
                        <center><?php echo $fArray_hasil['krM3N1']; ?></center>
                        <input type=hidden id="krM3N1" name="krM3N1[]" placeholder="0" value="<?php echo $fArray_hasil['krM3N1']; ?>" class="" require>
                    </td>
                    <td>
                        <center><?php echo $fArray_hasil['krM4N1']; ?></center>
                        <input type=hidden id="krM4N1" name="krM4N1[]" placeholder="0" value="<?php echo $fArray_hasil['krM4N1']; ?>" class="" require>
                    </td>
                    <td>
                        <center><?php echo $raBagi; ?></center>
                        <input type=hidden id="RATA" name="RATA[]" placeholder="0" value="<?php echo $raBagi; ?>" class="" require>
                    </td>
                    <td>
                        <center><?php echo $fArray_hasil['skor']; ?></center>
                    </td>

                </tr>


            <?php

            }
            ?>

            <tr>
                <td colspan="2">
                    <center>TOTAL PENILAIAN KINERJA</center>
                </td>
                <td></td>
                <td colspan="6">
                    <center><?php echo $totalRata ?></center>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <script>
        // window.print();
    </script>

</body>

</html>