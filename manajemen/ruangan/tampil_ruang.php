<div class="row">
	<div class="col-md-6">
		<h3>Data Pemakaian Ruangan</h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	

</div>
<hr>
 <?php  
// include_once "../config/class.php";

// $semua_jenjang = $jenjang->tampil_jenjang();


$semua_peminjaman = $peminjaman->tampil_peminjaman_pjruangan();
$data_guru = $guru->tampil_guru_pjruangan();
	$data_jenjang = $jenjang->tampil_jenjang_pjruangan();
	$data_ruang = $ruang->tampil_ruang();
	$data_status = $status->tampil_status();
	$data_status_final = $status_final->tampil_status_final();

 
// $semua_mapel2 = $mapel2->tampil_mapel2();
// $semua_mapel3 = $mapel3->tampil_mapel3();
// $semua_mapel4 = $mapel4->tampil_mapel4();

	/*echo "<pre>";
	print_r($semua_guest);
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
	<title>Data Guest Teacher SMA</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	
<!-- <form action="upload_laporan_guest.php" method="POST" enctype="multipart/form-data">	 -->

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-stripped" id="data-table">
			
			<thead>
				<tr>
					<th>No</th>
					<!-- <th>Jenjang</th> -->
					<th>Nama Pengguna</th>
					<th>Level</th>	
					<th>Nama Ruang</th>	
					<th>Tanggal Pemakaian</th>
					<th>Jam Pemakaian</th>
					<th>Keperluan</th>
					<th>Status Pengajuan</th>					
					<th>Status Persetujuan</th>
					<th>Keterangan</th>
					
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_peminjaman as $key => $value): ?>
					<?php
			if($value['nama_status_final']=="Disetujui"){
				$class="btn-success";
			}elseif($value['nama_status_final']=="Dibatalkan"){
				$class="btn-danger";
			}
			else{
				$class="";
			}
			?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_guru'] ;?>  </td>
			<td><?php echo $value['nama_jenjang']; ?></td> 
			<td><?php echo $value['nama_ruang']; ?></td> 
			<td><?php echo tanggal_indo($value['waktu_1']) ?> </td>
			<td> <?php echo ($value['jam']) ?></td>
			<td><?php echo $value['keperluan']; ?></td> 
			<td><?php echo $value['nama_status']; ?></td> 
			<td><a class="btn <?=$class?>"><?php echo $value['nama_status_final']; ?></a></td> 
			<td><?php echo $value['keterangan']; ?></td> 
			
		
			
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