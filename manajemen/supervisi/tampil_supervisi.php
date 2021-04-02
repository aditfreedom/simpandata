<div class="row">
	<div class="col-md-6">
		<h3>Data Supervisi</h3>
		<h3>Sekolah Sukma Bangsa <?php echo ($db_lokasi)?></h3>
	</div>
	<!-- <div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=tambah_visit_home" class="btn btn-primary">Tambah Data Home Visit</a>
			
		</div>
	</div> -->


</div>
<hr>
 <?php  
// include_once "../config/class.php";

// $semua_jenjang = $jenjang->tampil_jenjang();


$semua_visit_home = $visit_home->tampil_supervisi();

 

?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Supervisi</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	
<!-- <form action="upload_laporan_visit.php" method="POST" enctype="multipart/form-data">	 -->

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-stripped" id="data-table" style="width:100%;">
			
			
			<thead>
				<tr>
					<th>No</th>
					<th>Jenjang</th>
					<th>Semester</th>
					<th>Mata Pelajaran</th>
					<th>Evaluator</th>
					<th>Guru Yang Disupervisi</th>
					<th>Tanggal</th>
					<th>Nilai Akhir</th>
					<th class="hidden-print">Laporan</th>
					
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_visit_home as $key => $value): ?>
					<?php
				$laporan = $value['laporan'];
				if($laporan == ""){
					$laporan="Belum Upload Laporan";
				}

				?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_jenjang']; ?> <br></td>
			<td><?php echo $value['nama_semester']; ?>  </td>
			<td><?php echo $value['mapel']; ?>  </td>
			<td><?php echo $value['koordinator_supervisi']; ?>  </td>
			<td><?php echo $value['nama_guru']; ?>  </td>
			<td><?php echo tanggal_indo($value['waktu']) ?></td>
			<td><?php echo $value['nilai_akhir']; ?> ( <br>
				<?php echo $value['kriteria']; ?> )
			</td>
			<td>
			<b><?php echo $laporan ?></b> <br> <br>
			<!-- <?php //echo $value['proposal'] ?> <br> -->
				<a href="index.php?halaman=upload_supervisi&id_supervisi=<?php echo $value['id_supervisi']; ?>" class="btn btn-primary" >Upload File</a> <br>
				<!-- <a href="index.php?halaman=upload_proposal_visit_home&id_visit_home=<?php //echo $value['id_visit_home']; ?>" class="" >Upload Proposal</a> <br>	 -->
				<a href="../laporan/supervisi/<?php echo $laporan ?>" class="btn btn-success" >Download File</a>	 <br>

					

				<a href="index.php?halaman=edit_supervisi&id_supervisi=<?php echo $value['id_supervisi']; ?>" class="btn btn-warning" >Ubah Data</a> <br>
				<a href="index.php?halaman=hapus_supervisi&id_supervisi=<?php echo $value['id_supervisi']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data supervisi?') " >Hapus Data</a> 
				
						
			</td>

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