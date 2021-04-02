<div class="row">
	<div class="col-md-6">
		<h3>Tambah Data Kegiatan Perpustakaan</h3>
	</div>
	


</div>
<?php 
	
	
	$data_jenjang = $jenjang->tampil_jenjang_pjruangan();
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
				<label>Semester</label>
				<select class="form-control" name="id_semester" required="">
					<option value="">Pilih Semester</option>
				<?php foreach ($data_semester as $key => $value): ?>
					<option value="<?php echo $value['id_semester'] ?>" > <?php echo $value['nama_semester'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Level</label>
				<select class="form-control" name="id_jenjang" >
					 <option value="">Pilih Level</option> 
				<?php foreach ($data_jenjang as $key => $value): ?>
					<option  value="<?php echo $value['id_jenjang'] ?>" > <?php echo $value['nama_jenjang'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Nama Kegiatan</label>
				<input type="text" name="kegiatan" class="form-control" required="" placeholder="">
			</div>

			<div class="form-group">
					<label>Tanggal Kegiatan</label>
					<input type="date" name="waktu_1" class="" required=""> 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" required="">	
			</div>

			<div class="form-group">
				<label>Tujuan</label>
				<input type="text" name="tujuan" class="form-control" required="" placeholder="">
			</div>

			<div class="form-group">
				<label>Sasaran</label>
				<input type="text" name="sasaran" class="form-control" required="" placeholder="">
			</div>

			<div class="form-group">
				<label>Biaya - (Rp)</label>
				<input type="text" name="biaya" class="form-control" required="" placeholder="dalam bentuk angka, contoh: 200.000">
			</div>

			

			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$datapustaka->simpan_datapustaka($_POST['id_semester'], $_POST['id_jenjang'], $_POST['kegiatan'], $_POST['waktu_1'], $_POST['waktu_2'], $_POST['tujuan'], $_POST['sasaran'], $_POST['biaya'] );

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_pustaka'</script>";
			}
		?>

	</div>
</div>
