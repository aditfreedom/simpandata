<div class="row">
	<div class="col-md-6">
		<h3>Data Semua Kegiatan Peningkatan Kapasitas Guru</h3>
		<h3>Sekolah Sukma Bangsa <?php echo ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=tambah_kegiatan" class="btn btn-primary">Tambah Data Kegiatan</a>
			
		</div>
	</div>


</div>
<hr>
 <?php  
// include_once "../config/class.php";

// $semua_jenjang = $jenjang->tampil_jenjang();


$semua_kegiatan = $kegiatan->tampil_kegiatan_admin();
 
// $semua_mapel2 = $mapel2->tampil_mapel2();
// $semua_mapel3 = $mapel3->tampil_mapel3();
// $semua_mapel4 = $mapel4->tampil_mapel4();

	/*echo "<pre>";
	print_r($semua_kegiatan);
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
	<title>Data Kegiatan </title>
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
					<th>Jenjang</th>
					
					<th>Semester</th>	
					<th>Penanggung Jawab</th>	
					<th>Topik</th>
					<th>Bentuk Kegiatan</th>
					<th>Waktu Pelaksanaan</th>
					<th>Biaya (Rp)</th>
					<th class="hidden-print">Laporan</th>
					<!-- <th class="hidden-print">Proposal</th> -->
					<!-- <th class="hidden-print">Opsi</th> -->
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_kegiatan as $key => $value): ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value['nama_jenjang']; ?></td>
					<td><?php echo $value['nama_semester']; ?> 
					<td><?php echo $value['nama']; ?></td>
					<td><?php echo $value['topik'] ;?>  </td>
					<td><?php echo $value['bentuk'] ;?>  </td>
					<td><?php echo tanggal_indo($value['waktu_1']) ?> s/d <?php echo tanggal_indo($value['waktu_2']) ?></td>
					<td><?php echo $value['biaya'] ?></td>
					<td class="hidden-print"><?php echo $value['laporan'] ?> <br> <br>
			
				<a href="index.php?halaman=upload_laporan_kegiatan&id_kegiatan=<?php echo $value['id_kegiatan']; ?>" class="" >Upload File</a> <br>
				
				<a href="../laporan/kegiatan/<?php echo $value['laporan'] ?>" class="" >Download File</a>	 <br>	

				<a href="index.php?halaman=edit_kegiatan&id_kegiatan=<?php echo $value['id_kegiatan']; ?>" class="" >Ubah Data</a> <br> 
				<a href="index.php?halaman=hapus_kegiatan&id_kegiatan=<?php echo $value['id_kegiatan']; ?>" class="" onclick="return confirm('hapus data topik kegiatan <?php echo $value["topik"]; ?>') " >Hapus Data</a> <br>


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