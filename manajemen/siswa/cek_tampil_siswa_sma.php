
<div class="row">
	<div class="col-md-6">
<h3>Tampil Data Siswa Jenjang SMA</h3>
<hr>

<?php 



	$data_kelas_sd = $kelas->tampil_kelas_sma();
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
				<label>Kelas</label>
				<select class="form-control" name="id_kelas" required="">
					<option>Pilih Kelas</option>
					<?php foreach ($data_kelas_sd as $key => $value): ?>
					<option value="<?php echo $value['id_kelas']; ?>"><?php echo $value['nama_kelas']; ?></option>

					<?php endforeach ?>
				</select>
			</div>

			<button class="btn btn-primary" name="proses">Proses</button>
		</form>

		<?php 
			if (isset($_POST['proses']))
			{
				$id_kelas = $guest->cek_periodekelas_sma($_POST['id_kelas']);
				if ($id_kelas == "kosong") 
				{
					echo "<script>alert('Data kelas tidak ada data') </script>";
					echo "<script>location='index.php?halaman=cek_tampil_siswa_sma' </script>";

				} else {
					echo "<script>location='index.php?halaman=tampil_siswa_sma&id_kelas=$id_kelas' </script>";
				}
				
			}
		?>

	</div>

	
</div>