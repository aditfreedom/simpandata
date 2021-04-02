<h3>Tambah Data lomba</h3>
<hr>

<?php 
	// $data_mapel1 = $mapel1->tampil_mapel1();
	// $data_mapel2 = $mapel2->tampil_mapel2();
	// $data_mapel3 = $mapel3->tampil_mapel3();
	
	
	$data_lomba = $lomba->tampil_lomba_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_tp = $tp->tampil_tp_admin();
	$data_jk = $jk->tampil_jk_admin();
	
	


	// echo "<pre>";
	// print_r($data_jenjang);
	// echo "</pre>";

	// echo "<pre>";
	 //print_r($data_jurusan);
	 //echo "</pre>";

	 //echo "<pre>";
	 //print_r($data_jk);
	 //echo "</pre>";
?>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="row">
	<div class="col-md-6">
		<form method="POST">			
					
			<div class="form-group">
				<label>Tahun Pelajaran</label>
				<select class="form-control" name="id_tp">
					<option value="">Pilih Tahun Pelajaran</option>
				<?php foreach ($data_tp as $key => $value): ?>
					<option value="<?php echo $value['id_tp'] ?>" > <?php echo $value['nama_tp'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>


			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama_siswa" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="id_jk">
					<option value="">Pilih Jenis Kelamin</option>
				<?php foreach ($data_jk as $key => $value): ?>
					<option value="<?php echo $value['id_jk'] ?>" > <?php echo $value['nama_jk'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			
			<div class="form-group">
				<label>Jenjang</label>
				<select class="form-control" name="id_jenjang">
					<option value="">Pilih Jenjang</option>
				<?php foreach ($data_jenjang as $key => $value): ?>
					<option value="<?php echo $value['id_jenjang'] ?>" > <?php echo $value['nama_jenjang'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			
			<div class="form-group">
				<label>Nama Lomba</label>
				<input type="text" name="nama_lomba" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Lokasi</label>
				<input type="text" name="lokasi_lomba" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Tahun</label>
				<input type="text" name="tahun_lomba" class="form-control" required="">
			</div>

			
			<div class="form-group">
				<label>Penyelenggara</label>
				<input type="text" name="penyelenggara_lomba" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Hasil</label>
				<input type="text" name="hasil_lomba" class="form-control" required="">
			</div>

			
			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$lomba->simpan_lomba($_POST['id_jenjang'], $_POST['id_tp'], $_POST['id_jk'], $_POST['nama_siswa'], $_POST['lokasi_lomba'], $_POST['nama_lomba'],  $_POST['tahun_lomba'], $_POST['penyelenggara_lomba'], $_POST['hasil_lomba']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=lomba'</script>";
			}
		?>

	</div>
</div>