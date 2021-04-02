<div class="row">
	<div class="col-md-6">
		<h3>Tambah Data Kegiatan Peningkatan Kapasitas Guru</h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tampil_kegiatan" class="btn btn-primary">Tampil Data Kegiatan</a>
			
		</div>
	</div>


</div>
<?php 
	
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
		<form method="POST" enctype="multipart/form-data">			
					
			<div class="form-group" >
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
				<label>Penanggung Jawab</label>
				<input type="text" name="nama" class="form-control" required="" placeholder="">
			</div>


			<div class="form-group">
				<label>Topik</label>
				<input type="text" name="topik" class="form-control" required="" placeholder="tema kegiatan">
			</div>


			<div class="form-group">
				<label>Bentuk Kegiatan</label>
				<input type="text" name="bentuk" class="form-control" required="" placeholder="bisa berupa FGBB/FGD/seminar/pelatihan">
			</div>

			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" required=""> 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" required="">	
					
			</div>

			<div class="form-group">
				<label>Biaya (Rp)</label>
				<input type="text" name="biaya" class="form-control" required="" placeholder="dalam bentuk angka">
			</div>

					
			

			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$kegiatan->simpan_kegiatan($_POST['id_jenjang'], $_POST['id_semester'], $_POST['nama'],  $_POST['topik'], $_POST['bentuk'], $_POST['waktu_1'], $_POST['waktu_2'], $_POST['biaya']);

				
			
				
				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_kegiatan'</script>";
			}

			
		?>

	</div>
</div>