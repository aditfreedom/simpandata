<?php 
$id_semester = $_GET['id_semester'];

$data_datapustaka = $datapustaka->tampil_datapustaka_periode_smp($id_semester);







?>

<div class="row">
	<div class="col-md-6">
		<h3>Data Kegiatan Perpustakaan SMP </h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=cek_tampil_pustaka_smp" class="btn btn-primary">Pilih Semester</a>
			
		</div>
	</div>


</div>
<hr>


<!DOCTYPE html>
<html>
<head>
	<title>Data Kegiatan Perpustakaan SMP</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	
<!-- <form action="upload_laporan_guest.php" method="POST" enctype="multipart/form-data">	 -->

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-bordered" id="data-table">
			
			<thead>
				<tr>
					<th>No</th>
					<!-- <th>Jenjang</th> -->
					<th>Nama Kegiatan</th>
					<th>Level</th>	
					<th>Semester</th>	
					<th>Tanggal Kegiatan</th>
					<th>Tujuan</th>
					<th>Sasaran</th>
					<th>Biaya</th>					
					
					<th class="hidden-print">Opsi</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_datapustaka as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
					<td><?php echo $value['kegiatan']; ?></td>
					<td><?php echo $value['nama_jenjang']; ?> 
					<td><?php echo $value['nama_semester']; ?></td>
					<td><?php echo tanggal_indo($value['waktu_1']) ?> s/d <?php echo tanggal_indo($value['waktu_2']) ?></td>
					<td><?php echo $value['tujuan'] ;?>  </td>
					<td><?php echo $value['sasaran'] ;?>  </td>
					<td><?php echo $value['biaya'] ?></td>

			<td class="hidden-print"><?php echo $value['laporan'] ?> <br> <br>
			
				<a href="../laporan/pustaka/<?php echo $value['laporan'] ?>" class="" >Download Laporan</a> <br>

			
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