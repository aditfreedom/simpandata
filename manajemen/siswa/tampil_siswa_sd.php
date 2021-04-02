<?php 
$id_kelas = $_GET['id_kelas'];

//$data_periode = $project->ambil_periode_project_admin($id_semester);
$semua_guest = $guest->tampil_siswa_kelas_sd($id_kelas);





?>

<div class="row">
	<div class="col-md-6">
		<h3>Data Siswa SD </h3>
		<h3>Sekolah Sukma Bangsa <?php echo  ($db_lokasi)?></h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user hidden-print">
		<a href="index.php?halaman=cek_tampil_siswa_sd" class="btn btn-primary">Pilih Kelas</a>
			
		</div>
	</div>


</div>
<hr>


<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa SD</title>
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
				<th>Nama Siswa</th>	
				<th>NIS Siswa</th>	
				<th>Kelas</th>	
				<th>Jenis Kelamin</th>	
				<th>Nama Ayah</th>
				<th>Nama Ibu</th>
				<th>Pekerjaan Orang Tua</th>
				<th>No telepon</th>
				<th>Alamat</th>
				<th>Opsi</th>
					<!-- <th class="hidden-print">Proposal</th> -->
					<!-- <th class="hidden-print">Opsi</th> -->
					
				</tr>
			</thead>
				
			<tbody>
				<?php foreach ($semua_guest as $key => $value): ?>
			
		<tr>
		<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_jenjang']; ?></td>			
			<td><?php echo $value['nama_siswa']; ?></td>
			<td><?php echo $value['nis_siswa']; ?></td>
			<td><?php echo $value['nama_kelas']; ?></td>
			<td><?php echo $value['jk_siswa']; ?></td>
			<td><?php echo $value['ayah_siswa']; ?></td>
			<td><?php echo $value['ibu_siswa']; ?></td>
			<td><?php echo $value['kerja_siswa']; ?></td>
			<td><?php echo $value['hp_siswa']; ?></td>
			<td><?php echo $value['alamat_siswa']; ?></td>
			
			
			<td class="hidden-print"> 
				<a href="index.php?halaman=edit_siswa&id_siswa=<?php echo $value['id_siswa']; ?>" class="" ><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></a> <br> <br>
				<a href="index.php?halaman=hapus_siswa&id_siswa=<?php echo $value['id_siswa']; ?>" class="" onclick="return confirm('hapus data siswa <?php echo $value["tema_siswa"]; ?>') " ><div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div></a> 
				
						
			</td>

			<!-- <td class="hidden-print"><?php //echo $value['proposal'] ?> <br>
				<a href="index.php?halaman=upload_proposal_guest&id_guest=<?php //echo $value['id_guest']; ?>" class="" >Upload</a> <br>	


				
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