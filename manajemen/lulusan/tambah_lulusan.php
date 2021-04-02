<h1>Tambah Data Lulusan</h1>
<hr>

<?php 
	// $data_mapel1 = $mapel1->tampil_mapel1();
	// $data_mapel2 = $mapel2->tampil_mapel2();
	// $data_mapel3 = $mapel3->tampil_mapel3();
	
	
	$data_lulusan = $lulusan->tampil_lulusan_admin();
	$data_jurusan = $jurusan->tampil_jurusan_admin();
	$data_tp = $tp->tampil_tp_admin();
	$data_jk = $jk->tampil_jk_admin();
	$data_statuspt = $statuspt->tampil_statuspt_admin();
	


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
				<label>Jurusan</label>
				<select class="form-control" name="id_jurusan">
					<option value="">Pilih Jurusan</option>
				<?php foreach ($data_jurusan as $key => $value): ?>
					<option value="<?php echo $value['id_jurusan'] ?>" > <?php echo $value['nama_jurusan'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			


			<div class="form-group">
				<label>Universitas/Sekolah</label>
				<input type="text" name="nama_kampus" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Status Sekolah/PT</label>
				<select class="form-control" name="id_statuspt">
					<option value="">Pilih Status Sekolah/PT</option>
				<?php foreach ($data_statuspt as $key => $value): ?>
					<option value="<?php echo $value['id_statuspt'] ?>" > <?php echo $value['nama_statuspt'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Jalur Masuk</label>
				<input type="text" name="jalur_kampus" class="form-control" required="" placeholder="Bila tidak ada, isi tanda -">
			</div>

			<div class="form-group">
				<label>Program Studi</label>
				<input type="text" name="jurusan_kampus" class="form-control" required="" placeholder="Bila tidak ada, isi tanda -">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="ket_lulus" class="form-control" required="" placeholder="Bila tidak ada, isi tanda -">
			</div>

			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$lulusan->simpan_lulusan($_POST['id_jurusan'], $_POST['id_tp'], $_POST['id_jk'], $_POST['id_statuspt'], $_POST['nama_siswa'], $_POST['nama_kampus'], $_POST['jalur_kampus'],  $_POST['jurusan_kampus'], $_POST['ket_lulus']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=lulusan'</script>";
			}
		?>

	</div>
</div>