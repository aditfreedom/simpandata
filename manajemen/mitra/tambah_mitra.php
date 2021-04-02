<div class="row">
	<div class="col-md-6">
		<h3>Tambah Data Kerjasama dan Kemitraan</h3>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tampil_mitra" class="btn btn-primary">Tampil Data Kerjasama dan Kemitraan</a>
			
		</div>
	</div>


</div>
<?php 
	
	$data_jenjang = $jenjang->tampil_jenjang_admin();


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
				<label>Bidang Kegiatan</label>
				<input type="text" name="bidang" class="form-control" required="" placeholder="">
			</div>

			<div class="form-group">
				<label>Nama Mitra</label>
				<input type="text" name="nama_mitra" class="form-control" required="" placeholder="nama lembaga mitra/kerjasama">
			</div>


			<div class="form-group">
				<label>Bentuk Kegiatan</label>
				<input type="text" name="bentuk" class="form-control" required="" placeholder="bisa diisi dengan pelatihan/teacher training atau lainnya">
			</div>

			

			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" required=""> 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" required="">	
					
			</div>

					

			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$mitra->simpan_mitra($_POST['id_jenjang'], $_POST['bidang'], $_POST['nama_mitra'], $_POST['bentuk'],  $_POST['waktu_1'], $_POST['waktu_2']);

				
			
				
				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_mitra'</script>";
			}

			
		?>

	</div>
</div>