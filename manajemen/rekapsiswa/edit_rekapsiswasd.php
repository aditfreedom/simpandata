<?php  
	
	$id_guru = $_GET['id'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

	$detail_guru = $guru->ambil_rekapsiswasd($id_guru);



// echo "<pre>";
// print_r($detail_pengguna);
// echo "</pre>";
	// $data_mapel = $mapel->tampil_mapel();

// 	echo "<pre>";
// print_r($data_level);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Rekap Siswa SD</title>
</head>
<body>
	<h1>Edit Rekap Siswa SD</h1>
	<hr>
	
	<form method="POST">

	<div class="form-group">
			<label>Tahun Ajaran</label>
			<input type="text" name="tahun_ajaran" class="form-control" required="" value="<?= $detail_guru["tahun_ajaran"];?>">
			</div>
			<h3><b>Kelas I</b></h3>
			<hr>
			<div class="form-group">
				<label>Jumlah Siswa Laki-Laki</label>
				<input type="number" name="lk1" class="form-control" value="<?= $detail_guru["lk1"];?>">
			</div>
			<div class="form-group">
				<label>Jumlah Siswa Perempuan</label>
				<input type="number" name="pr1" class="form-control" value="<?= $detail_guru["pr1"];?>">
			</div>
			<h3><b>Kelas II</b></h3>
			<hr>
			<div class="form-group">
				<label>Jumlah Siswa Laki-Laki</label>
				<input type="number" name="lk2" class="form-control" value="<?= $detail_guru["lk2"];?>" >
			</div>
			<div class="form-group">
				<label>Jumlah Siswa Perempuan</label>
				<input type="number" name="pr2" class="form-control" value="<?= $detail_guru["pr2"];?>">
			</div>
			<h3><b>Kelas III</b></h3>
			<hr>
			<div class="form-group">
				<label>Jumlah Siswa Laki-Laki</label>
				<input type="number" name="lk3" class="form-control"  value="<?= $detail_guru["lk3"];?>">
			</div>
			<div class="form-group">
				<label>Jumlah Siswa Perempuan</label>
				<input type="number" name="pr3" class="form-control" value="<?= $detail_guru["pr3"];?>">
			</div>
			<h3><b>Kelas IV</b></h3>
			<hr>
			<div class="form-group">
				<label>Jumlah Siswa Laki-Laki</label>
				<input type="number" name="lk4" class="form-control" value="<?= $detail_guru["lk4"];?>">
			</div>
			<div class="form-group">
				<label>Jumlah Siswa Perempuan</label>
				<input type="number" name="pr4" class="form-control" value="<?= $detail_guru["pr4"];?>">
			</div>
			<h3><b>Kelas V</b></h3>
			<hr>
			<div class="form-group">
				<label>Jumlah Siswa Laki-Laki</label>
				<input type="number" name="lk5" class="form-control" value="<?= $detail_guru["lk5"];?>">
			</div>
			<div class="form-group">
				<label>Jumlah Siswa Perempuan</label>
				<input type="number" name="pr5" class="form-control" value="<?= $detail_guru["pr5"];?>">
			</div>
			<h3><b>Kelas VI</b></h3>
			<hr>
			<div class="form-group">
				<label>Jumlah Siswa Laki-Laki</label>
				<input type="number" name="lk6" class="form-control" value="<?= $detail_guru["lk6"];?>" >
			</div>
			<div class="form-group">
				<label>Jumlah Siswa Perempuan</label>
				<input type="number" name="pr6" class="form-control" value="<?= $detail_guru["pr6"];?>">
			</div>

		<button class="btn btn-primary" name="ubah" style="width:100%;">UBAH</button>
		</form>


		<?php
			//jika ada tombol ubah

			if (isset($_POST['ubah']))
			{
				// obyek user mengakses fungsi ubah user berdasarkan id user dari url
				 $guru->ubah_rekapsd($_POST['tahun_ajaran'], $_POST['lk1'], $_POST['pr1'], $_POST['lk2'], $_POST['pr2'], $_POST['lk3'], $_POST['pr3'],
				 $_POST['lk4'], $_POST['pr4'],$_POST['lk5'], $_POST['pr5'],$_POST['lk6'], $_POST['pr6'], $_GET['id']);

				echo "<script>alert('Data berhasil diubah');</script>";
				echo "<script>location='index.php?halaman=tampil_rekapsiswa_sd';</script>";
			  
			  	
			} 
			    
		?>

</body>
</html>