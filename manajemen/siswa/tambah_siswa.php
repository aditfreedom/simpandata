<h1>Tambah Data Siswa</h1>
<hr>

<?php 
	// $data_mapel1 = $mapel1->tampil_mapel1();
	// $data_mapel2 = $mapel2->tampil_mapel2();
	// $data_mapel3 = $mapel3->tampil_mapel3();
	
	
	$data_siswa = $siswa->tampil_siswa_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_kelas = $kelas->tampil_kelas_admin();


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
				<label>Kelas</label>
				<select class="form-control" name="id_kelas">
					<option value="">Pilih Kelas</option>
				<?php foreach ($data_kelas as $key => $value): ?>
					<option value="<?php echo $value['id_kelas'] ?>" > <?php echo $value['nama_kelas'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			
			<div class="form-group">
				<label>NIS Siswa</label>
				<input type="text" name="nis_siswa" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama_siswa" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="jk_siswa">
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
					
				</select>
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat_siswa" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Nama Ayah</label>
				<input type="text" name="ayah_siswa" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Nama Ibu</label>
				<input type="text" name="ibu_siswa" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>No Telepon</label>
				<input type="text" name="hp_siswa" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Pekerjaan Orang Tua</label>
				<input type="text" name="kerja_siswa" class="form-control" required="">
			</div>

			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$siswa->simpan_siswa($_POST['id_jenjang'], $_POST['id_kelas'], $_POST['nis_siswa'],  $_POST['nama_siswa'], $_POST['jk_siswa'], $_POST['alamat_siswa'], $_POST['ayah_siswa'], $_POST['ibu_siswa'], $_POST['hp_siswa'], $_POST['kerja_siswa']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=siswa'</script>";
			}
		?>

	</div>
</div>