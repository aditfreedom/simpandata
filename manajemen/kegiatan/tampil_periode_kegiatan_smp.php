<?php 
$id_semester = $_GET['id_semester'];

//$data_periode = $project->ambil_periode_project_admin($id_semester);
$semua_kegiatan = $kegiatan->tampil_kegiatan_periode_smp($id_semester);





?>

<div class="row">
	<div class="col-md-6">
		<h3>Data Kegiatan Peningkatan Kapasitas Guru SMP  </h3>
		<h3>Sekolah Sukma Bangsa <?php echo ($db_lokasi)?></h3>
		
	</div>
<hr>


	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=cek_tampil_periode_kegiatan_smp" class="btn btn-primary">Pilih Semester</a>
			
		</div>
	</div>


</div>



<!DOCTYPE html>
<html>
<head>
	<title>Data kegiatan Peningkatan Kapasitas Guru SMP</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	

<div class="row">
	<div class="col-md-12">
	
		<table class="table table-bordered" id="data-table">
			
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
				
					<a href="../laporan/kegiatan/<?php echo $value['laporan'] ?>" class="" >Download Laporan</a>	
					<br>	

			</td>
			<!-- <td class="hidden-print"><?php //echo $value['proposal'] ?> <br>
				<a href="index.php?halaman=upload_proposal_kegiatan&id_kegiatan=<?php //echo $value['id_kegiatan']; ?>" class="" >Upload</a> <br>	


				
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