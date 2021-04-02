<?php  
	
	$id_siswa = $_GET['id_siswa'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

	$detail_siswa = $siswa->ambil_siswa_admin($id_siswa);



// echo "<pre>";
// print_r($detail_pengguna);
// echo "</pre>";
	$data_siswa = $siswa->tampil_siswa_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_kelas = $kelas->tampil_kelas_admin_ubah();
	// $data_mapel = $mapel->tampil_mapel();

// 	echo "<pre>";
// print_r($data_level);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Siswa</title>
</head>
<body>
	<h1>Edit Siswa</h1>
	<hr>
	
	<form method="POST">


		<div class="form-group">
			<label>Jenjang</label>
			<select class="form-control" name="id_jenjang">
				<option value="">Pilih Jenjang</option>
				
				<?php foreach ($data_jenjang as $key => $value): ?>
					<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_siswa['id_jenjang']) {echo "selected";} ?>> <?php echo $value['nama_jenjang'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>
		

		<div class="form-group">
			<label>Kelas</label>
			<select class="form-control" name="id_kelas">
				<option value="">Pilih Kelas</option>
				
				<?php foreach ($data_kelas as $key => $value): ?>
					<option value="<?php echo $value['id_kelas']; ?>" <?php if($value['id_kelas']==$detail_siswa['id_kelas']) {echo "selected";} ?>> <?php echo $value['nama_kelas'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>

		<div class="form-group">
			<label>NIS Siswa</label>
			<input type="text" name="nis_siswa" class="form-control" value="<?php echo $detail_siswa['nis_siswa']; ?>">
		</div>

		<div class="form-group">
			<label>Nama Siswa</label>
			<input type="text" name="nama_siswa" class="form-control" value="<?php echo $detail_siswa['nama_siswa']; ?>">
		</div>

		<div class="form-group">
						<label>Jenis Kelamin</label>
				<select class="form-control" name="jk_siswa" value="">
					<option value="<?php echo $detail_siswa['jk_siswa']; ?>" hidden><?php echo $detail_siswa['jk_siswa']; ?></option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat_siswa" class="form-control" value="<?php echo $detail_siswa['alamat_siswa']; ?>">
		</div>

		<div class="form-group">
			<label>Nama Ayah</label>
			<input type="text" name="ayah_siswa" class="form-control" value="<?php echo $detail_siswa['ayah_siswa']; ?>">
		</div>

		<div class="form-group">
			<label>Nama Ibu</label>
			<input type="text" name="ibu_siswa" class="form-control" value="<?php echo $detail_siswa['ibu_siswa']; ?>">
		</div>

		<div class="form-group">
			<label>No Telepon</label>
			<input type="text" name="hp_siswa" class="form-control" value="<?php echo $detail_siswa['hp_siswa']; ?>">
		</div>

		<div class="form-group">
			<label>Pekerjaan Orang Tua</label>
			<input type="text" name="kerja_siswa" class="form-control" value="<?php echo $detail_siswa['kerja_siswa']; ?>">
		</div>
		

		<button class="btn btn-primary" name="ubah">Ubah</button>

		<?php
			//jika ada tombol ubah

			if (isset($_POST['ubah']))
			{
				// obyek user mengakses fungsi ubah user berdasarkan id user dari url
				 $siswa->ubah_siswa($_POST['id_jenjang'], $_POST['id_kelas'], $_POST['nis_siswa'],  $_POST['nama_siswa'], $_POST['jk_siswa'], $_POST['alamat_siswa'], $_POST['ayah_siswa'], $_POST['ibu_siswa'], $_POST['hp_siswa'], $_POST['kerja_siswa'],  $_GET['id_siswa']);

				echo "<script>alert('Data berhasil diubah');</script>";
				echo "<script>location='index.php?halaman=siswa';</script>";
			  
			  	
			} 
			    
		?>
	</form>

</body>
</html>