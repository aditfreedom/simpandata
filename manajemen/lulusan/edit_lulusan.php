<?php  
	
	$id_lulusan = $_GET['id_lulusan'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

	$detail_lulusan = $lulusan->ambil_lulusan_admin($id_lulusan);



// echo "<pre>";
// print_r($detail_pengguna);
// echo "</pre>";
	$data_lulusan = $lulusan->tampil_lulusan_admin();
	$data_jurusan = $jurusan->tampil_jurusan_admin();
	$data_tp = $tp->tampil_tp_admin();
	$data_jk = $jk->tampil_jk_admin();
	$data_statuspt = $statuspt->tampil_statuspt_admin();
	// $data_mapel = $mapel->tampil_mapel();

// 	echo "<pre>";
// print_r($data_level);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data lulusan</title>
</head>
<body>
	<h1>Edit lulusan</h1>
	<hr>
	
	<form method="POST">

			
		<div class="form-group">
			<label>Tahun Pelajaran</label>
			<select class="form-control" name="id_tp">
				<option value="">Pilih Tahun Pelajaran</option>
				
				<?php foreach ($data_tp as $key => $value): ?>
					<option value="<?php echo $value['id_tp']; ?>" <?php if($value['id_tp']==$detail_lulusan['id_tp']) {echo "selected";} ?>> <?php echo $value['nama_tp'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>

		
		<div class="form-group">
			<label>Nama Siswa</label>
			<input type="text" name="nama_siswa" class="form-control" value="<?php echo $detail_lulusan['nama_siswa']; ?>">
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select class="form-control" name="id_jk">
				<option value="">Pilih Jenis Kelamin</option>
				
				<?php foreach ($data_jk as $key => $value): ?>
					<option value="<?php echo $value['id_jk']; ?>" <?php if($value['id_jk']==$detail_lulusan['id_jk']) {echo "selected";} ?>> <?php echo $value['nama_jk'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>
		

		<div class="form-group">
			<label>Jurusan</label>
			<select class="form-control" name="id_jurusan">
				<option value="">Pilih Jurusan</option>
				
				<?php foreach ($data_jurusan as $key => $value): ?>
					<option value="<?php echo $value['id_jurusan']; ?>" <?php if($value['id_jurusan']==$detail_lulusan['id_jurusan']) {echo "selected";} ?>> <?php echo $value['nama_jurusan'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>
		
		

		<div class="form-group">
			<label>Universitas</label>
			<input type="text" name="nama_kampus" class="form-control" value="<?php echo $detail_lulusan['nama_kampus']; ?>">
		</div>

		<div class="form-group">
			<label>Status</label>
			<select class="form-control" name="id_statuspt">
				<option value="">Pilih Status PT</option>
				
				<?php foreach ($data_statuspt as $key => $value): ?>
					<option value="<?php echo $value['id_statuspt']; ?>" <?php if($value['id_statuspt']==$detail_lulusan['id_statuspt']) {echo "selected";} ?>> <?php echo $value['nama_statuspt'] ?></option>
					
				<?php endforeach ?>

			</select>
		</div>
		
		<div class="form-group">
			<label>Jalur Masuk</label>
			<input type="text" name="jalur_kampus" class="form-control" value="<?php echo $detail_lulusan['jalur_kampus']; ?>">
		</div>

		<div class="form-group">
			<label>Program Studi</label>
			<input type="text" name="jurusan_kampus" class="form-control" value="<?php echo $detail_lulusan['jurusan_kampus']; ?>">
		</div>


		<div class="form-group">
			<label>Keterangan</label>
			<input type="text" name="ket_lulus" class="form-control" value="<?php echo $detail_lulusan['ket_lulus']; ?>">
		</div>
		

		<button class="btn btn-primary" name="ubah">Ubah</button>

		<?php
			//jika ada tombol ubah

			if (isset($_POST['ubah']))
			{
				// obyek user mengakses fungsi ubah user berdasarkan id user dari url
				 $lulusan->ubah_lulusan($_POST['id_jurusan'], $_POST['id_tp'], $_POST['id_jk'], $_POST['id_statuspt'], $_POST['nama_siswa'], $_POST['nama_kampus'], $_POST['jalur_kampus'],  $_POST['jurusan_kampus'], $_POST['ket_lulus'],  $_GET['id_lulusan']);

				echo "<script>alert('Data berhasil diubah');</script>";
				echo "<script>location='index.php?halaman=lulusan';</script>";
			  
			  	
			} 
			    
		?>
	</form>

</body>
</html>