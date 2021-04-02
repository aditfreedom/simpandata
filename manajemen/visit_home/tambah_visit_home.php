<div class="row">
	<div class="col-md-6">
		<h1>Tambah Data Home Visit</h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tampil_visit_home" class="btn btn-primary">Tampil Data Home Visit</a>
			
		</div>
	</div>


</div>

<?php 
	
	$data_kelas = $kelas->tampil_kelas_admin();
	$data_guru = $guru->tampil_guru_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_semester = $semester->tampil_semester_admin();
	$data_siswa = $siswa->tampil_siswa_admin();

	// echo "<pre>";
	// print_r($data_jenjang);
	// echo "</pre>";

	// echo "<pre>";
	// print_r($data_mapel);
	// echo "</pre>";

	// echo "<pre>";
	// print_r($data_jenjang);
	// echo "</pre>";
?>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="row">
	<div class="col-md-6">
		<form method="POST">			
					
			<div class="form-group">
				<label>Level</label>
				<select class="form-control" name="id_jenjang">
					<option value="">Pilih Level</option>
				<?php foreach ($data_jenjang as $key => $value): ?>
					<option value="<?php echo $value['id_jenjang'] ?>" > <?php echo $value['nama_jenjang'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester">
					<option value="">Pilih Semester</option>
				<?php foreach ($data_semester as $key => $value): ?>
					<option value="<?php echo $value['id_semester'] ?>" > <?php echo $value['nama_semester'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas </label>
				<select class="form-control" name="id_kelas">
					<option value="">Pilih Kelas </option>
				<?php foreach ($data_kelas as $key => $value): ?>
					<option value="<?php echo $value['id_kelas'] ?>" > <?php echo $value['nama_kelas'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			
			<div class="form-group">
				<label>Koordinator Home Visit</label>
				<select class="form-control" name="id_guru">
					<option value="">Nama Guru</option>
				<?php foreach ($data_guru as $key => $value): ?>
					<option value="<?php echo $value['id_guru'] ?>" > <?php echo $value['nama_guru'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Siswa Yang Dikunjungi</label>
				<select class="form-control" name="id_siswa">
					<option value="">Nama Siswa</option>
				<?php foreach ($data_siswa as $key => $value): ?>
					<option value="<?php echo $value['id_siswa'] ?>" > <?php echo $value['nama_siswa'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>


			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" required=""> 						
			</div>


			<div class="form-group">
				<label>Tujuan Kunjungan Ke Rumah</label>
				<input type="textarea" name="tujuan_visit_home" class="form-control" required="" >
			</div>

			<div class="form-group">
				<label>Hasil Wawancara & Observasi</label>
				<input type="textarea" name="hasil_visit_home" class="form-control" required="" >
			</div>

			<div class="form-group">
				<label>Tindak Lanjut Hasil Kunjungan</label>
				<input type="textarea" name="lanjutan_visit_home" class="form-control" required="" >		
			</div>

			
			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$visit_home->simpan_visit_home($_POST['id_jenjang'], $_POST['id_semester'], $_POST['id_kelas'], $_POST['id_guru'], $_POST['id_siswa'],  $_POST['waktu_1'], $_POST['tujuan_visit_home'], $_POST['hasil_visit_home'], $_POST['lanjutan_visit_home']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_visit_home'</script>";
			}
		?>

	</div>
</div>