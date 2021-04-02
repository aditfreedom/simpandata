
<div class="row">
	<div class="col-md-6">
<h3>Pilih Data Tahun Pelajaran Lulusan</h3>
<hr>

<?php 



	$data_tp = $tp->tampil_tp_admin();
?>

<!-- cek tahun
<pre>
	<?php //print_r($data_tahun); ?>
</pre> -->



		<form method="POST">
			
			<div class="form-group">
				<label>Tahun Pelajaran</label>
				<select class="form-control" name="id_tp" required="">
					<option>Pilih Tahun Pelajaran</option>
					<?php foreach ($data_tp as $key => $value): ?>
					<option value="<?php echo $value['id_tp']; ?>"><?php echo $value['nama_tp']; ?></option>

					<?php endforeach ?>
				</select>
			</div>
			<button class="btn btn-primary" name="proses">Proses</button>
		</form>

		<?php 
			if (isset($_POST['proses']))
			{
				$id_tp = $lulusan->cek_periodelulusan($_POST['id_tp']);
				if ($id_tp == "kosong") 
				{
					echo "<script>alert('Data Tahun Pelajaran tidak ada data') </script>";
					echo "<script>location='index.php?halaman=cek_tampil_periode_lulusan' </script>";

				} else {
					echo "<script>location='index.php?halaman=tampil_periode_lulusan&id_tp=$id_tp' </script>";
				}
				
			}
		?>

	</div>

	
</div>