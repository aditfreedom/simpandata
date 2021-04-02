
<div class="row">
	<div class="col-md-6">
<h3>Pilih Data Semester Peningkatan Kapasitas Guru SD</h3>
<hr>

<?php 



	$data_semester = $semester->tampil_semester_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();

	$tahun_sekarang = date("Y");

	// echo $tahun_sekarang;

	for ($i=2015; $i <= $tahun_sekarang ; $i++) 
	{ 
		// menampung tahun dalam array
		$data_tahun[]= $i;
	}
?>

<!-- cek tahun
<pre>
	<?php //print_r($data_tahun); ?>
</pre> -->



		<form method="POST">
			
			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester" required="">
					<option>Pilih semester</option>
					<?php foreach ($data_semester as $key => $value): ?>
					<option value="<?php echo $value['id_semester']; ?>"><?php echo $value['nama_semester']; ?></option>

					<?php endforeach ?>
				</select>
			</div>

			<button class="btn btn-primary" name="proses">Proses</button>
		</form>

		<?php 
			if (isset($_POST['proses']))
			{
				$id_semester = $kegiatan->cek_periodekegiatan_sd($_POST['id_semester']);
				if ($id_semester == "kosong") 
				{
					echo "<script>alert('Data semester tidak ada data') </script>";
					echo "<script>location='index.php?halaman=cek_tampil_periode_kegiatan_sd' </script>";

				} else {
					echo "<script>location='index.php?halaman=tampil_periode_kegiatan_sd&id_semester=$id_semester' </script>";
				}
				
			}
		?>

	</div>

	
</div>