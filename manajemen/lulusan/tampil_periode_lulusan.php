<?php 
$id_tp = $_GET['id_tp'];
//$data_periode = $lulusan->ambil_periode_lulusan($id_tp);
$data_lulusan = $lulusan->tampil_periode_lulusan($id_tp);






?>

<div class="row">
	<div class="col-md-6">
		<h3>Data lulusan Siswa SMA </h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=cek_tampil_periode_lulusan" class="btn btn-primary">Pilih Tahun Pelajaran</a>
			
		</div>
	</div>


</div>



<!DOCTYPE html>
<html>
<head>
	<title>Data lulusan Siswa SMA</title>
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
			<th>Jurusan</th>
			<th>Universitas</th>	
			<th>Status</th>	
			<th>Jalur Masuk</th>	
			<th>Program Studi</th>
			<th>Keterangan</th>
			<th class="hidden-print">Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_lulusan as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_tp']; ?></td>
			<td><?php echo $value['nama_siswa']; ?></td>
			<td><?php echo $value['nama_jk']; ?></td>
			<td><?php echo $value['nama_jurusan']; ?></td>
			<td><?php echo $value['nama_kampus']; ?></td>
			<td><?php echo $value['nama_statuspt']; ?></td>
			<td><?php echo $value['jalur_kampus']; ?></td>
			<td><?php echo $value['jurusan_kampus']; ?></td>
			<td><?php echo $value['ket_lulus']; ?></td>
			
			
			
			<td class="hidden-print"> 
				<a href="index.php?halaman=edit_lulusan&id_lulusan=<?php echo $value['id_lulusan']; ?>" class="" >Ubah Data</a> <br> <br>
				<a href="index.php?halaman=hapus_lulusan&id_lulusan=<?php echo $value['id_lulusan']; ?>" class="" onclick="return confirm('hapus data lulusan <?php echo $value["nama_siswa"]; ?>') " >Hapus Data</a> 
				
						
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div class="text-right">
<a href="" onclick="print()" class="btn btn-success hidden-print"><i class="fa fa-print"></i> Cetak</a>
</div>
</div>
