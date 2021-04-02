<?php 
$id_semester = $_GET['id_semester'];

//$data_periode = $project->ambil_periode_project_admin($id_semester);
$semua_guest = $guest->tampil_guest_periode_sma($id_semester);





?>

<div class="row">
	<div class="col-md-6">
		<h3>Data Guest Teacher SMA </h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=cek_tampil_periode_guest_sma" class="btn btn-primary">Pilih Semester</a>
			
		</div>
	</div>


</div>
<hr>


<!DOCTYPE html>
<html>
<head>
	<title>Data Guest Teacher SMA</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	
<!-- <form action="upload_laporan_guest.php" method="POST" enctype="multipart/form-data">	 -->

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-hover table-striped" id="data-table">
			
			<thead>
				<tr>
					<th>No</th>
					<th>Semester</th>
					
					<th>Kelas & Mata Pelajaran</th>	
					<th>Materi Pelajaran</th>	
					<th>Koordinator Pelaksana</th>
					<th>Nama Guest Teacher</th>
					<th>Tujuan dan Manfaat</th>
					<th>Waktu Pelaksanaan</th>
					<th>Biaya (Rp)</th>
					<th class="hidden-print">Laporan</th>
					<!-- <th class="hidden-print">Proposal</th> -->
					<!-- <th class="hidden-print">Opsi</th> -->
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_guest as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td> <?php echo $value['nama_semester']; ?></td>
			<td><?php echo $value['nama_kelas']; ?> <br> <?php echo $value['nama_kelas2'] ?> <br> <?php echo $value['nama_kelas3'] ?> <br> <?php echo $value['nama_kelas4'] ?> <br> <?php echo $value['nama_mapel1']; ?></td>
			<td><?php echo $value['tema_guest']; ?></td>
			<td><?php echo $value['nama_guru'] ;?>  </td>
			<td><?php echo $value['nama_guest'] ;?>  </td>
			<td><?php echo $value['hasil_guest'] ?></td>
			<td><?php echo tanggal_indo($value['waktu_1']) ?> s/d <?php echo tanggal_indo($value['waktu_2']) ?></td>
			<td><?php echo $value['biaya_guest'] ?></td>
			<td class="hidden-print"><?php echo $value['laporan'] ?> <br> <br>
				<!-- <a href="index.php?halaman=upload_laporan_guest&id_guest=<?php // echo $value['id_guest']; ?>" class="" >Upload Laporan</a> <br> -->
				<a href="../laporan/guest_teacher/<?php echo $value['laporan'] ?>" class="" >Download Laporan</a>	
				<br>	

			</td>
			<!-- <td class="hidden-print"><?php //echo $value['proposal'] ?> <br>
				<a href="index.php?halaman=upload_proposal_guest&id_guest=<?php //echo $value['id_guest']; ?>" class="" >Upload</a> <br>	


				
				<a href="../laporan/proposal/<?php //echo $value['proposal'] ?>" class="" >Download</a>	
			</td>
 -->
			

			
			<!-- <td>
				<input type="file" name="upload_file"> <br>
				<input type="submit" name="upload" value="Upload">

			</td> -->
			
		</tr>
		<?php endforeach ?>
					
			</tbody>
		</table>

		<div class="text-right">
</div>
</div>
		
	
<!-- </form> -->
	
</body>
</html>