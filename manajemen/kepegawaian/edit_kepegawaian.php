<?php  
	
	$id_guru = $_GET['id'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

	$detail_guru = $guru->ambil_kepegawaian($id_guru);



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
	<title>Edit Data Kepegawaian</title>
</head>
<body>
	<h1>Edit Kepegawaian</h1>
	<hr>
	
	<form method="POST">

	<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama_pegawai" class="form-control" value="<?php echo $detail_guru['nama_pegawai']; ?>" required="">
			</div>

			<div class="form-group">
			<label>Jenis Kelamin</label>
			<select class="form-control" name="jenis_kelamin">
					<option hidden selected value="<?php echo $detail_guru['jk']; ?>"><?php echo $detail_guru['jk']; ?></option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
			</select>
			</div>

			<div class="form-group">
				<label>NIP</label>
				<input type="text" name="nip" class="form-control" value="<?php echo $detail_guru['nip']; ?>" required="">
			</div>

			<div class="form-group">
				<label>Pendidikan</label>
				<textarea class="form-control" rows="3" name="pendidikan" ><?php echo $detail_guru['pendidikan']; ?></textarea>
			</div>

			<div class="form-group">
				<label>Tahun Lulus</label>
				<input type="text" name="lulus" class="form-control" value="<?php echo $detail_guru['lulus']; ?>" required="">
			</div>

			<div class="form-group">
				<label>Status Guru</label>
				<select class="form-control" name="status" value="">
					<option hidden selected value="<?php echo $detail_guru['status']; ?>"><?php echo $detail_guru['status']; ?></option>
					<option value="SDK">SDK</option>
					<option value="SDK HONORER">SDK HONORER</option>
					<option value="OJT">OJT</option>
					<option value="NON SDK">NON SDK</option>
					<option value="TENAGA HARIAN">TENAGA HARIAN</option>
					<option value="TIDAK AKTIF">TIDAK AKTIF</option>
				</select>
		</div>

		<button class="btn btn-primary" name="ubah">UBAH</button>
		</form>


		<?php
			//jika ada tombol ubah

			if (isset($_POST['ubah']))
			{
				// obyek user mengakses fungsi ubah user berdasarkan id user dari url
				 $guru->ubah_kepegawaian($_POST['nama_pegawai'], $_POST['jenis_kelamin'], $_POST['nip'], $_POST['pendidikan'], $_POST['lulus'], $_POST['status'], $_GET['id']);

				echo "<script>alert('Data berhasil diubah');</script>";
				echo "<script>location='index.php?halaman=tampil_kepegawaian';</script>";
			  
			  	
			} 
			    
		?>

</body>
</html>