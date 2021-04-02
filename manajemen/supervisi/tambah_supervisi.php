<div class="row">
	<div class="col-md-6">
		<h1>Tambah Data Supervisi</h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tampil_supervisi" class="btn btn-primary">Tampil Data Supervisi</a>
			
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
				<?php foreach ($data_jenjang as $key => $value): ?>
					<option value="<?php echo $value['id_jenjang'] ?>" > <?php echo $value['nama_jenjang'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester">
				<?php foreach ($data_semester as $key => $value): ?>
					<option value="<?php echo $value['id_semester'] ?>" > <?php echo $value['nama_semester'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>
			
			<div class="form-group">
				<label>Mata Pelajaran</label>
				<input type="textarea" name="mapel" class="form-control" placeholder="Mata Pelajaran" required="" >
			</div>

			<div class="form-group">
				<label>Koordinator Supervisi</label>
				<input type="textarea" name="koordinator_supervisi" class="form-control" placeholder="Evaluator" required="" >
			</div>

			<div class="form-group">
				<label>Guru Yang Diupervisi</label>
				<input type="textarea" name="nama_guru" class="form-control" placeholder="Nama Guru Supervisi" required="" >
			</div>


			<div class="form-group">
					<label>Waktu Pelaksanaan</label><br>
					<input type="date" name="waktu_1" class="" required=""> 						
			</div>

			<div class="form-group">
				<label>Nilai Akhir</label>
				<input type="textarea" name="nilai_akhir" class="form-control" required="" >
			</div>

			<div class="form-group">
				<label>Kriteria Nilai Akhir</label>
				<select class="form-control" name="kriteria">
					<option value="Kurang" > Kurang </option>
					<option value="Cukup" > Cukup </option>		
					<option value="Baik" > Baik </option>					
					<option value="Sangat Baik" > Sangat Baik </option>	
				</select>				
			</div>

			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>


		<?php 
			if (isset($_POST['simpan']))
			{
				$visit_home->simpan_supervisi($_POST['id_jenjang'], $_POST['id_semester'], $_POST['mapel'], $_POST['koordinator_supervisi'], $_POST['nama_guru'],  $_POST['waktu_1'], $_POST['nilai_akhir'], $_POST['kriteria']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_supervisi'</script>";
			}
		?>

	</div>
</div>