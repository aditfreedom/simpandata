
<div class="row">
	<div class="col-md-6">
<h3>Pilih Level Data Kemitraan dan Kerjasama</h3>
<hr>

<?php 



	$semua_mitra = $mitra->tampil_mitra_admin();

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
				<label>Level</label>
				<select class="form-control" name="id_mitra" required="">
					<option>Pilih Level</option>
					<?php foreach ($semua_mitra as $key => $value): ?>
					<option value="<?php echo $value['id_mitra']; ?>"><?php echo $value['jenjang']; ?></option>

					<?php endforeach ?>
				</select>
			</div>

			<button class="btn btn-primary" name="proses">Proses</button>
		</form>

		<?php 
			if (isset($_POST['proses']))
			{
				$id_mitra = $mitra->cek_periodemitra_sd($_POST['id_mitra']);
				if ($id_mitra == "kosong") 
				{
					echo "<script>alert('Data mitra tidak ada data') </script>";
					echo "<script>location='index.php?halaman=cek_tampil_level_mitra' </script>";

				} else {
					echo "<script>location='index.php?halaman=tampil_level_mitra&id_mitra=$id_mitra' </script>";
				}
				
			}
		?>

	</div>

	
</div>