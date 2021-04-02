<div class="row">
	<div class="col-md-6">
		<h1>Tambah Data School Visit</h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tampil_visit" class="btn btn-primary">Tampil Data School Visit</a>
			
		</div>
	</div>


</div>

<?php 
	// $data_mapel1 = $mapel1->tampil_mapel1();
	// $data_mapel2 = $mapel2->tampil_mapel2();
	// $data_mapel3 = $mapel3->tampil_mapel3();
	$data_mapel = $mapel->tampil_mapel();
	$data_mapel1 = $mapel1->tampil_mapel1_admin();
	$data_mapel2 = $mapel2->tampil_mapel2_admin();
	$data_mapel3 = $mapel3->tampil_mapel3_admin();
	$data_mapel4 = $mapel4->tampil_mapel4_admin();
	$data_kelas = $kelas->tampil_kelas_admin();
	$data_kelas2 = $kelas2->tampil_kelas2_admin();
	$data_kelas3 = $kelas3->tampil_kelas3_admin();
	$data_kelas4 = $kelas4->tampil_kelas4_admin();
	$data_guru = $guru->tampil_guru_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_semester = $semester->tampil_semester_admin();

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
				<label>Kelas Peserta 1</label>
				<select class="form-control" name="id_kelas">
					<option value="">Pilih Kelas </option>
				<?php foreach ($data_kelas as $key => $value): ?>
					<option value="<?php echo $value['id_kelas'] ?>" > <?php echo $value['nama_kelas'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 2</label>
				<select class="form-control" name="id_kelas2">
					<option value="">Pilih kelas</option>
				<?php foreach ($data_kelas2 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas2'] ?>" > <?php echo $value['nama_kelas2'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 3</label>
				<select class="form-control" name="id_kelas3">
					<option value="">Pilih kelas</option>
				<?php foreach ($data_kelas3 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas3'] ?>" > <?php echo $value['nama_kelas3'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 4</label>
				<select class="form-control" name="id_kelas4">
					<option value="">Pilih kelas</option>
				<?php foreach ($data_kelas4 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas4'] ?>" > <?php echo $value['nama_kelas4'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>




			<div class="form-group">
				<label>Koordinator School Visit</label>
				<select class="form-control" name="id_guru">
					<option value="">Nama Guru</option>
				<?php foreach ($data_guru as $key => $value): ?>
					<option value="<?php echo $value['id_guru'] ?>" > <?php echo $value['nama_guru'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Materi School Visit</label>
				<input type="text" name="tema_visit" class="form-control" required="" placeholder="disesuaikan dengan KD di materi pelajaran ">
			</div>

			<div class="form-group">
				<label>Tujuan dan Manfaat School Visit</label>
				<input type="text" name="hasil_visit" class="form-control" required="" placeholder="apa yang diharapkan dan manfaat bagi siswa ">
			</div>

			<div class="form-group">
				<label>Lokasi School Visit</label>
				<input type="text" name="lokasi_visit" class="form-control" required="" placeholder="tempat yang akan dijadikan ruang belajar siswa">
			</div>


			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" required=""> 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" required="">	
			</div>



			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 1</label>
				<select class="form-control" name="id_mapel1">
					<option value="">Pilih Mata Pelajaran Kolaborasi 1</option>
				<?php foreach ($data_mapel1 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel1'] ?>" > <?php echo $value['nama_mapel1'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 2</label>
				<select class="form-control" name="id_mapel2">
					<option value="">Pilih Mata Pelajaran Kolaborasi 2</option>
				<?php foreach ($data_mapel2 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel2'] ?>" > <?php echo $value['nama_mapel2'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 3</label>
				<select class="form-control" name="id_mapel3">
					<option value="">Pilih Mata Pelajaran Kolaborasi 3</option>
				<?php foreach ($data_mapel3 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel3'] ?>" > <?php echo $value['nama_mapel3'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 4</label>
				<select class="form-control" name="id_mapel4">
					<option value="">Pilih Mata Pelajaran Kolaborasi 4</option>
				<?php foreach ($data_mapel4 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel4'] ?>" > <?php echo $value['nama_mapel4'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Perkiraan Biaya - (Rp)</label>
				<input type="text" name="biaya_visit" class="form-control" required="" placeholder="dalam bentuk angka">
			</div>
			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$visit->simpan_visit($_POST['id_jenjang'], $_POST['id_semester'], $_POST['id_kelas'], $_POST['id_kelas2'], $_POST['id_kelas3'], $_POST['id_kelas4'], $_POST['id_guru'], $_POST['tema_visit'], $_POST['hasil_visit'], $_POST['lokasi_visit'], $_POST['waktu_1'], $_POST['waktu_2'], $_POST['id_mapel1'], $_POST['id_mapel2'], $_POST['id_mapel3'], $_POST['id_mapel4'], $_POST['biaya_visit']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_visit'</script>";
			}
		?>

	</div>
</div>