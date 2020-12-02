<?php
include "Header.php";
error_reporting(0);
?>
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="row">
					<div class="col-sm-12">

						<div class="card">
							<div class="card-header">
								<h5>Setting Defaults</h5>
								<span>When working with DataTables over multiple pages it is often useful to set the initialization defaults to common values (for example you might want to set dom to a common value so all tables get the same layout). This can be done using the $.fn.dataTable.defaults object. This object will take all of the same parameters as the DataTables initialization object, but in this case you are setting the default for all future initializations of DataTables.</span>
							</div>
							<div class="card-block">
								<div class="table-responsive dt-responsive">
									<table id="simpletable" class="table table-striped table-bordered nowrap">
										<thead>
											<tr>

												<th>Jenis Prespektif</th>
												<th>Kriteria</th>
												<th>Bobot (%)</th>
												<th>Target</th>
												<th>Minggu Ke-1</th>
												<th>Minggu Ke-2</th>
												<th>Minggu Ke-3</th>
												<th>Minggu Ke-4</th>
												<th>Nilai Rata - Rata</th>
												<th>Skor</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$hehe = 1;
											$haQuery = array();

											$queryy = "SELECT y.ID_KRITERIA, z.ID_PRESPEKTIF, z.NAMA_PRESPEKTIF, y.ID_TOKO, y.NAMA_KRITERIA
														FROM KRITERIA y JOIN PRESPEKTIF z ON z.ID_PRESPEKTIF = y.ID_PRESPEKTIF
														WHERE y.ID_TOKO = 'TK001'";
											$hasilLap = mysqli_query($con, $queryy);
											$jum = mysqli_num_rows($hasilLap);

											while ($dataLap = mysqli_fetch_array($hasilLap)) {

												$ID_KRI = $dataLap['ID_KRITERIA'];
												$q = "SELECT a.ID_TOKO as took, a.NAMA_TOKO, d.ID_PRESPEKTIF, d.NAMA_PRESPEKTIF, c.ID_KRITERIA as idKri, c.NAMA_KRITERIA,
																		(SELECT l.NILAI_K$hehe
																			FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																			WHERE p.ID_TOKO = 'TK001' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-1%' AND p.ID_KRITERIA = 'KP00$hehe')as krM1N$hehe,
																		(SELECT l.NILAI_K$hehe
																			FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																			WHERE p.ID_TOKO = 'TK001' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-2%' AND p.ID_KRITERIA = 'KP00$hehe')as krM2N$hehe,
																		(SELECT l.NILAI_K$hehe
																			FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																			WHERE p.ID_TOKO = 'TK001' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-3%' AND p.ID_KRITERIA = 'KP00$hehe')as krM3N$hehe,
																		(SELECT l.NILAI_K$hehe
																			FROM NILAI_PERHITUNGAN l JOIN KRITERIA p ON l.ID_TOKO = p.ID_TOKO
																			WHERE p.ID_TOKO = 'TK001' AND SUBSTRING(l.PERIODE_PERHITUNGAN, 1, 11) LIKE '%Minggu Ke-4%' AND p.ID_KRITERIA = 'KP00$hehe')as krM4N$hehe
																	FROM DAFTAR_TOKO a JOIN NILAI_PERHITUNGAN b ON a.ID_TOKO = b.ID_TOKO
																		JOIN KRITERIA c ON a.ID_TOKO = c.ID_TOKO
																		JOIN PRESPEKTIF d ON c.ID_PRESPEKTIF = d.ID_PRESPEKTIF
																	WHERE a.ID_TOKO = 'TK001' AND c.ID_KRITERIA = 'KP00$hehe'
																	GROUP BY c.ID_KRITERIA";

												if ($hehe != $jum) {
													$haQuery[] = $q . " UNION ";
												} else {
													$haQuery[] = $q;
												}

												$hehe++;
											}

											$qu = "";

											for ($i = 0; $i <= count($haQuery); $i++) {
												$qu .= $haQuery[$i];
											}

											// var_dump($qu);

											$hasilnya_ya = mysqli_query($con, $qu);

											while ($fArray_hasil = mysqli_fetch_array($hasilnya_ya)) {



												?>

												<tr>
													<td>
														<center><?php echo $fArray_hasil['NAMA_PRESPEKTIF']; ?></center>
													</td>
													<td>
														<center><?php echo $fArray_hasil['NAMA_KRITERIA']; ?></center>
													</td>
													<td>
														<center><?php //echo $ID_KRI; 
																	?></center>
													</td>
													<td>
														<center><?php //echo $ID_KRI; 
																	?></center>
													</td>
													<td>
														<center><?php //echo $ID_KRI; 
																	?></center>
													</td>
													<td>
														<center><?php echo $fArray_hasil['krM1N1']; ?></center>
													</td>
													<td>
														<center><?php echo $fArray_hasil['krM2N1']; ?></center>
													</td>
													<td>
														<center><?php echo $fArray_hasil['krM3N1']; ?></center>
													</td>
													<td>
														<center><?php echo $fArray_hasil['krM4N1']; ?></center>
													</td>
													<td>
														<center><?php echo $k; ?></center>
													</td>



												</tr>
											<?php

											}
											?>

										</tbody>
									
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="styleSelector">
	</div>
</div>

<?php
include "Footer.php";
?>