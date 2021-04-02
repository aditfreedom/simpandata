<h1>Tambah Data Event Besar</h1>
<hr>

<?php 
	// $data_mapel1 = $mapel1->tampil_mapel1();
	// $data_mapel2 = $mapel2->tampil_mapel2();
	// $data_mapel3 = $mapel3->tampil_mapel3();
	
	


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
			<label>Tahun Event</label>
			<input type="text" name="tahun" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Nama Event</label>
				<input type="text" name="nama_event" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Keterangan Event</label>
				<textarea class="form-control" rows="3" name="keterangan"></textarea>
			</div>

			
			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$guru->simpan_event($_POST['tahun'], $_POST['nama_event'], $_POST['keterangan']);
				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_event'</script>";
			}
		?>

	</div>
</div>