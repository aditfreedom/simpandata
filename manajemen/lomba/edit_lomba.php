<?php  
	
	$id_lomba = $_GET['id_lomba'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

	$detail_lomba = $lomba->ambil_lomba_admin($id_lomba);



// echo "<pre>";
// print_r($detail_pengguna);
// echo "</pre>";
	$data_lomba = $lomba->tampil_lomba_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_tp = $tp->tampil_tp_admin();
	$data_jk = $jk->tampil_jk_admin();
	
	// $data_mapel = $mapel->tampil_mapel();

// 	echo "<pre>";
// print_r($data_level);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data lomba</title>
</head>
<body>
	<h3>Edit lomba</h3>
	<hr>
	
	<form method="POST">

			
		<div class="form-group">
			<label>Tahun Pelajaran</label>
			<select class="form-control" name="id_tp">
				<option value="">Pilih Tahun Pelajaran</option>
				
				<?php foreach ($data_tp as $key => $value): ?>
					<option value="<?php echo $value['id_tp']; ?>" <?php if($value['id_tp']==$detail_lomba['id_tp']) {echo "selected";} ?>> <?php echo $value['nama_tp'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>

		<div class="form-group">
			<label>Nama Siswa</label>
			<input type="text" name="nama_siswa" class="form-control" value="<?php echo $detail_lomba['nama_siswa']; ?>">
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select class="form-control" name="id_jk">
				<option value="">Pilih Jenis Kelamin</option>
				
				<?php foreach ($data_jk as $key => $value): ?>
					<option value="<?php echo $value['id_jk']; ?>" <?php if($value['id_jk']==$detail_lomba['id_jk']) {echo "selected";} ?>> <?php echo $value['nama_jk'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>
		

		<div class="form-group">
			<label>Jenjang</label>
			<select class="form-control" name="id_jenjang">
				<option value="">Pilih Jenjang</option>
				
				<?php foreach ($data_jenjang as $key => $value): ?>
					<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_lomba['id_jenjang']) {echo "selected";} ?>> <?php echo $value['nama_jenjang'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>
		
		<div class="form-group">
			<label>Nama Lomba</label>
			<input type="text" name="nama_lomba" class="form-control" value="<?php echo $detail_lomba['nama_lomba']; ?>">
		</div>

		<div class="form-group">
			<label>Lokasi</label>
			<input type="text" name="lokasi_lomba" class="form-control" value="<?php echo $detail_lomba['lokasi_lomba']; ?>">
		</div>

		
		<div class="form-group">
			<label>Tahun</label>
			<input type="text" name="tahun_lomba" class="form-control" value="<?php echo $detail_lomba['tahun_lomba']; ?>">
		</div>

		<div class="form-group">
			<label>Penyelenggara</label>
			<input type="text" name="penyelenggara_lomba" class="form-control" value="<?php echo $detail_lomba['penyelenggara_lomba']; ?>">
		</div>
		
		<div class="form-group">
			<label>Hasil</label>
			<input type="text" name="hasil_lomba" class="form-control" value="<?php echo $detail_lomba['hasil_lomba']; ?>">
		</div>



		<button class="btn btn-primary" name="ubah">Ubah</button>

		<?php
			//jika ada tombol ubah

			if (isset($_POST['ubah']))
			{
				// obyek user mengakses fungsi ubah user berdasarkan id user dari url
				 $lomba->ubah_lomba($_POST['id_jenjang'], $_POST['id_tp'], $_POST['id_jk'], $_POST['nama_siswa'], $_POST['lokasi_lomba'], $_POST['nama_lomba'],  $_POST['tahun_lomba'], $_POST['penyelenggara_lomba'], $_POST['hasil_lomba'],  $_GET['id_lomba']);

				echo "<script>alert('Data berhasil diubah');</script>";
				echo "<script>location='index.php?halaman=lomba';</script>";
			  
			  	
			} 
			    
		?>
	</form>

</body>
</html>