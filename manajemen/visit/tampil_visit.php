<div class="row">
	<div class="col-md-6">
		<h3>Data School Visit</h3>
		<h3>Sekolah Sukma Bangsa <?php echo ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=tambah_visit" class="btn btn-primary">Tambah Data School Visit</a>
			
		</div>
	</div>


</div>
 <?php  
// include_once "../config/class.php";

// $semua_jenjang = $jenjang->tampil_jenjang();


$semua_visit = $visit->tampil_visit_admin();
$semua_mapel = $mapel->tampil_mapel();
 
// $semua_mapel2 = $mapel2->tampil_mapel2();
// $semua_mapel3 = $mapel3->tampil_mapel3();
// $semua_mapel4 = $mapel4->tampil_mapel4();

	/*echo "<pre>";
	print_r($semua_visit);
	echo "</pre>";
*/
	// // // echo "<pre>";
	// // // print_r($semua_jenjang);
	// // // echo "</pre>";

	// echo "<pre>";
	// print_r($semua_mapel);
	// echo "</pre>";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Data School Visit</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	
<!-- <form action="upload_laporan_visit.php" method="POST" enctype="multipart/form-data">	 -->

<div class="row">
	
		<table class="table table-stripped" id="data-table">
			
			<thead>
				<tr>
					<th>No</th>
					<th>Jenjang & Semester</th>
					<th>Kelas & Mata Pelajaran</th>
					<th>Koordinator Pelaksana</th>
					<th>Materi School Visit</th>
					<th>Tujuan dan Manfaat School Visit</th>
					<th>Lokasi School Visit</th>
					
					<th>Waktu Pelaksanaan</th>				
					<th>Biaya (Rp)</th>
					<th class="hidden-print">Laporan</th>
					<!-- <th class="hidden-print">Proposal</th> -->
					<!-- <th class="hidden-print">Opsi</th> -->
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_visit as $key => $value): ?>
				
					<?php
				$laporan = $value['laporan'];
				if($laporan == ""){
					$laporan="Belum Upload Laporan";
				}

				?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_jenjang']; ?> <br> <?php echo $value['nama_semester']; ?></td>
			<td><?php echo $value['nama_kelas']; ?> <br> <?php echo $value['nama_kelas2'] ?> <br> <?php echo $value['nama_kelas3'] ?> <br> <?php echo $value['nama_kelas4'] ?> <br> <?php echo $value['nama_mapel1'] ;?> <br> <?php echo $value['nama_mapel2'] ;?> <br> <?php echo $value['nama_mapel3'] ;?> <br> <?php echo $value['nama_mapel4'] ;?> </td>
			<td><?php echo $value['nama_guru']; ?></td>
			<td><?php echo $value['tema_visit']; ?></td>
			<td><?php echo $value['hasil_visit']; ?></td>
			<td><?php echo $value['lokasi_visit'] ?></td>
			
			<td><?php echo tanggal_indo($value['waktu_1']) ?> s/d <?php echo tanggal_indo($value['waktu_2']) ?></td>
			<td><?php echo $value['biaya_visit'] ?></td>
			<td class="hidden-print"><b><?php echo $laporan ?></b><br> <br>
			<!--	<a href="index.php?halaman=upload_laporan_visit&id_visit=<?php // echo $value['id_visit']; ?>" class="" >Upload Laporan</a> <br>	-->

				<a href="../laporan/school_visit/<?php echo $laporan ?>" class="btn btn-success" >Download Laporan</a>	
			</td>

			<!-- <td class="hidden-print"><?php //echo $value['proposal'] ?> <br>
				<a href="index.php?halaman=upload_proposal_visit&id_visit=<?php //echo $value['id_visit']; ?>" class="" >Upload</a> <br>	

				<a href="../laporan/proposal/<?php //echo $value['proposal'] ?>" class="" >Download</a>	
			</td> -->
			

			<!-- <td>
				<input type="file" name="upload_file"> <br>
				<input type="submit" name="upload" value="Upload">

			</td> -->
			
		</tr>
		<?php endforeach ?>
					
			</tbody>
		</table>
			<div class="text-right">
<a href="" onclick="print()" class="btn btn-success hidden-print"><i class="fa fa-print"></i> Cetak</a>
</div>
		
	
<!-- </form> -->
	
</body>
</html>