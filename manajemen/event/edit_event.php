<?php  
	
	$id_guru = $_GET['id'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

	$detail_guru = $guru->ambil_event($id_guru);



// echo "<pre>";
// print_r($detail_pengguna);
// echo "</pre>";
	$data_guru = $guru->tampil_guru_admin();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
	// $data_mapel = $mapel->tampil_mapel();

// 	echo "<pre>";
// print_r($data_level);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Event</title>
</head>
<body>
	<h1>Edit Event</h1>
	<hr>
	
	<form method="POST">

	<div class="form-group">
			<label>Tahun Event</label>
			<input type="text" name="tahun" class="form-control" value="<?php echo $detail_guru['tahun']; ?>" required="">
			</div>

			<div class="form-group">
			<label>Nama Event</label>
			<input type="text" name="nama_event" class="form-control" value="<?php echo $detail_guru['nama_event']; ?>" required="">
			</div>
		
			<div class="form-group">
				<label>Keterangan</label>
				<textarea class="form-control" rows="3" name="keterangan" ><?php echo $detail_guru['keterangan']; ?></textarea>
			</div>

			

		<button class="btn btn-primary" name="ubah">UBAH</button>
		</form>


		<?php
			//jika ada tombol ubah

			if (isset($_POST['ubah']))
			{
				// obyek user mengakses fungsi ubah user berdasarkan id user dari url
				 $guru->ubah_event($_POST['tahun'], $_POST['nama_event'], $_POST['keterangan'], $_GET['id']);

				echo "<script>alert('Data berhasil diubah');</script>";
				echo "<script>location='index.php?halaman=tampil_event';</script>";
			  
			  	
			} 
			    
		?>

</body>
</html>