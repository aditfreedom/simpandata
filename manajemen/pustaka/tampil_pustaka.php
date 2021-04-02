<div class="row">
	<div class="col-md-6">
		<h3>Data Semua Kegiatan Perpustakaan</h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	

</div>
<hr>
 <?php  


$semua_datapustaka = $datapustaka-> tampil_datapustaka_admin();

	$data_jenjang = $jenjang->tampil_jenjang_admin();
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Semua Kegiatan Perpustakaan</title>
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
				<?php foreach ($semua_datapustaka as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['kegiatan'] ;?>  </td>
			<td><?php echo $value['nama_jenjang']; ?></td> 
			<td><?php echo $value['nama_semester']; ?></td> 
			<td><?php echo tanggal_indo($value['waktu_1']) ?> s/d <?php echo tanggal_indo($value['waktu_2']) ?></td>
			<td><?php echo $value['tujuan']; ?></td> 
			<td><?php echo $value['sasaran']; ?></td> 
			<td><?php echo $value['biaya']; ?></td> 
			
			<td class="hidden-print"><?php echo $value['laporan'] ?>  <br> <br> <!-- <?php //echo $value['proposal'] ?>  <br> -->


				<a href="index.php?halaman=upload_laporan_pustaka&id_datapustaka=<?php echo $value['id_datapustaka']; ?>" class="" >Upload Laporan</a> 	<br>

				<!-- <a href="index.php?halaman=upload_proposal_class_project&id_project=<?php //echo $value['id_project']; ?>" class="" >Upload Proposal</a> 	<br> -->

				<a href="../laporan/pustaka/<?php echo $value['laporan'] ?>" class="" >Download Laporan</a> <br>
				<a href="index.php?halaman=edit_pustaka&id_datapustaka=<?php echo $value['id_datapustaka']; ?>" class="" >Ubah Data</a>  <br> 
				<a href="index.php?halaman=hapus_pustaka&id_datapustaka=<?php echo $value['id_datapustaka']; ?>" class="" onclick="return confirm('hapus data pustaka <?php echo $value["kegiatan"]; ?>') " >Hapus Data</a>  <br>
				
			</td>
			
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