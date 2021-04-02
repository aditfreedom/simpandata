<?php 
$id_semester = $_GET['id_semester'];

//$data_periode = $project->ambil_periode_project_admin($id_semester);
$semua_visit_home = $visit_home->tampil_visit_home_periode_sma($id_semester);





?>

<div class="row">
	<div class="col-md-6">
		<h3>Data Home Visit SMA </h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=cek_tampil_periode_visit_home_sma" class="btn btn-primary">Pilih Semester</a>
			
		</div>
	</div>


</div>
<hr>


<!DOCTYPE html>
<html>
<head>
	<title>Data Home Visit SMA</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	
<!-- <form action="upload_laporan_visit.php" method="POST" enctype="multipart/form-data">	 -->

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-bordered" id="data-table">
			
			<table class="table table-bordered" id="data-table">
			
			<thead>
				<tr>
					<th>No</th>
					<th>Semester</th>
					<th>Koordinator Pelaksana</th>
					<th>Tanggal kunjungan</th>
					<th>Nama Siswa & Kelas</th>
					<th>Nama Ayah & Ibu</th>
					<th>Tujuan Kunjungan</th>
					<th>Hasil Wawancara & Observasi</th>
					<th>Tindak Lanjut Kunjungan</th>	
				<!--	<th class="hidden-print">Opsi</th> -->
					
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_visit_home as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td> <?php echo $value['nama_semester']; ?></td>
			<td><?php echo $value['nama_guru']; ?>  </td>
			<td><?php echo tanggal_indo($value['waktu_1']) ?></td>
			<td><?php echo $value['id_siswa']; ?> ( <br>
				<?php echo $value['id_kelas']; ?> )
			</td>
			
			<td><?php echo $value['ortu']; ?>
			</td>			
			<td><?php echo $value['tujuan_visit_home']; ?></td>
			<td><?php echo $value['hasil_visit_home']; ?></td>
			<td><?php echo $value['lanjutan_visit_home']; ?></td>			
			
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