<?php 
$id_tp = $_GET['id_tp'];
//$data_periode = $lomba->ambil_periode_lomba($id_tp);
$data_lomba = $lomba->tampil_periode_lomba_sd($id_tp);






?>

<div class="row">
	<div class="col-md-6">
		<h3>Data Hasil Lomba Siswa SD </h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=cek_tampil_periode_lomba_sd" class="btn btn-primary">Pilih Tahun Pelajaran</a>
			
		</div>
	</div>


</div>
<hr>


<!DOCTYPE html>
<html>
<head>
	<title>Data Guest Teacher SD</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	
<!-- <form action="upload_laporan_guest.php" method="POST" enctype="multipart/form-data">	 -->

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-bordered" id="data-table" >
	<thead>
		<tr>
			<th>No</th>			
			<th>Tahun Pelajaran</th>	
			<th>Nama Siswa</th>	
			<th>Jenis Kelamin</th>				
			<th>Jenjang</th>
			<th>Nama Lomba</th>
			<th>Lokasi</th>	
			<th>Tahun</th>
			<th>Penyelenggara</th>	
			<th>Hasil</th>
			<th class="hidden-print">Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_lomba as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_tp']; ?></td>
			<td><?php echo $value['nama_siswa']; ?></td>
			<td><?php echo $value['nama_jk']; ?></td>
			<td><?php echo $value['nama_jenjang']; ?></td>
			<td><?php echo $value['nama_lomba']; ?></td>
			<td><?php echo $value['lokasi_lomba']; ?></td>
			<td><?php echo $value['tahun_lomba']; ?></td>
			<td><?php echo $value['penyelenggara_lomba']; ?></td>
			<td><?php echo $value['hasil_lomba']; ?></td>
						
			<td class="hidden-print"> 
				<a href="index.php?halaman=edit_lomba&id_lomba=<?php echo $value['id_lomba']; ?>" class="" >Ubah Data</a> <br> <br>
				<a href="index.php?halaman=hapus_lomba&id_lomba=<?php echo $value['id_lomba']; ?>" class="" onclick="return confirm('hapus data lomba <?php echo $value["nama_siswa"]; ?>') " >Hapus Data</a> 
				
						
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div class="text-right">
</div>
</div>
