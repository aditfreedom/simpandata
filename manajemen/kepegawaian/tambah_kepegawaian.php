<h1>Tambah Data Kepegawaian</h1>
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
			<label>Nama</label>
			<input type="text" name="nama_pegawai" class="form-control" required="">
			</div>

			<div class="form-group">
			<label>Jenis Kelamin</label>
			<select class="form-control" name="jenis_kelamin">
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
			</select>
			</div>

			<div class="form-group">
				<label>NIP</label>
				<input type="text" name="nip" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Pendidikan</label>
				<textarea class="form-control" rows="3" name="pendidikan"></textarea>
			</div>

			<div class="form-group">
				<label>Tahun Lulus</label>
				<input type="text" name="lulus" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Status Guru</label>
				<select class="form-control" name="status" value="">
					<option value="SDK">SDK</option>
					<option value="SDK HONORER">SDK HONORER</option>
					<option value="OJT">OJT</option>
					<option value="NON SDK">NON SDK</option>
					<option value="TENAGA HARIAN">TENAGA HARIAN</option>
					<option value="TIDAK AKTIF">TIDAK AKTIF</option>
				</select>
		</div>
			
			<button class="btn btn-primary" name="simpan">Simpan</button>

		</form>

		<?php 
			if (isset($_POST['simpan']))
			{
				$guru->simpan_kepegawaian($_POST['nama_pegawai'], $_POST['jenis_kelamin'], $_POST['nip'], $_POST['pendidikan'], $_POST['lulus'], $_POST['status']);
				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_kepegawaian'</script>";
			}
		?>

	</div>
</div>