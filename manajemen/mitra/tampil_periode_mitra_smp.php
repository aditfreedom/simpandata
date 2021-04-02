<div class="row">
	<div class="col-md-6">
		<h3>Data Kerjasama dan Kemitraan SMP</h3>
		<h3>Sekolah Sukma Bangsa <?php echo ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=tambah_mitra" class="btn btn-primary">Tambah Data Kerjasama dan Kemitraan</a>
			
		</div>
	</div>


</div>
<hr>
 <?php  


$semua_mitra = $mitra->tampil_mitra_smp();
 


?>


<!DOCTYPE html>
<html>
<head>
	<title>Data mitra </title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-bordered" id="data-table">
			
			<thead>
				<tr>
					<th>No</th>
					<th>Level</th>	
					<th>Bidang Kegiatan</th>				
					<th>Nama Mitra</th>	
					<th>Bentuk Kegiatan</th>	
					
					<th>Waktu Pelaksanaan</th>
					
					<th class="hidden-print">Laporan</th>
					
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_mitra as $key => $value): ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value['nama_jenjang']; ?></td>
					<td><?php echo $value['bidang']; ?></td>
					<td><?php echo $value['nama_mitra']; ?> 
					<td><?php echo $value['bentuk']; ?></td>
									
					<td><?php echo tanggal_indo($value['waktu_1']) ?> s/d <?php echo tanggal_indo($value['waktu_2']) ?></td>		
					<td class="hidden-print"><?php echo $value['laporan'] ?> <br> <br>
			
				<a href="../laporan/mitra/<?php echo $value['laporan'] ?>" class="" >Download Laporan</a>	


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