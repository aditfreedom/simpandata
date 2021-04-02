
<?php  
	
	$id_visit_home = $_GET['id_visit_home'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_visit_home = $visit_home->ambil_visit_home($id_visit_home);
$data_kelas = $kelas->tampil_kelas_admin();
$data_guru = $guru->tampil_guru_admin();
$data_jenjang = $jenjang->tampil_jenjang_admin();
$data_semester = $semester->tampil_semester_admin();
$data_siswa = $siswa->tampil_siswa_admin();



// echo "<pre>";
// print_r($detail_visit);
// echo "</pre>";
	
// // 	$data_jenjang = $jenjang->tampil_jenjang();

// 	echo "<pre>";
// print_r($semua_mapel1);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Home visit</title>
</head>
<body>
	<h1>Edit Data Home visit</h1>
	<hr>
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="row">
	<div class="col-md-6">
		<form method="POST">			
			
		
		

			<div class="form-group">
				<label>Level</label>
				<select class="form-control" name="id_jenjang">
					<option value="">Pilih level</option>
					<?php foreach ($data_jenjang as $key => $value): ?>
						<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_visit_home['id_jenjang']){echo "selected";} ?> > <?php echo $value['nama_jenjang'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester">
					<option value="">Pilih Semester</option>
					<?php foreach ($data_semester as $key => $value): ?>
						<option value="<?php echo $value['id_semester']; ?>" <?php if($value['id_semester']==$detail_visit_home['id_semester']){echo "selected";} ?> > <?php echo $value['nama_semester'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Kelas </label>
				<select class="form-control" name="id_kelas">
					<option value="">Pilih Kelas</option>
				<?php foreach ($data_kelas as $key => $value): ?>
					<option value="<?php echo $value['id_kelas'] ?>"  <?php if($value['id_kelas']==$detail_visit_home['id_kelas']){echo "selected";} ?> > <?php echo $value['nama_kelas'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			
			<div class="form-group">
				<label>Koordinator Home visit_home</label>
				<select class="form-control" name="id_guru">
					<option value="">Nama Guru</option>
				<?php foreach ($data_guru as $key => $value): ?>
					<option value="<?php echo $value['id_guru'] ?>"  <?php if($value['id_guru']==$detail_visit_home['id_guru']){echo "selected";} ?> > <?php echo $value['nama_guru'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Siswa yang Dikunjungi</label>
				<select class="form-control" name="id_siswa">
					<option value="">Nama Siswa</option>
				<?php foreach ($data_siswa as $key => $value): ?>
					<option value="<?php echo $value['id_siswa'] ?>"  <?php if($value['id_siswa']==$detail_visit_home['id_siswa']){echo "selected";} ?> > <?php echo $value['nama_siswa'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			
			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1"  rows="8"  class="" value="<?php echo $detail_visit_home['waktu_1']; ?>" > 						
			</div>

			<div class="form-group">
				<label>Tujuan Kunjungan Ke Rumah</label>
				<input type="textarea" name="tujuan_visit_home" class="form-control" value="<?php echo $detail_visit_home['tujuan_visit_home']; ?>">
				
			</div>

			<div class="form-group">
				<label>Hasil Wawancara & Observasi</label>
				<input type="textarea" name="hasil_visit_home" class="form-control" value="<?php echo $detail_visit_home['hasil_visit_home']; ?>">
				
			</div>

			<div class="form-group">
				<label>Tindak Lanjut Hasil Kunjungan</label>
				<input type="textarea" name="lanjutan_visit_home" class="form-control" value="<?php echo $detail_visit_home['lanjutan_visit_home']; ?>">				
			</div>

			

			<button class="btn btn-primary" name="ubah">Ubah</button>

		</form>

		<?php 
			if (isset($_POST['ubah']))
			{
				$visit_home->ubah_visit_home($_POST['id_jenjang'], $_POST['id_semester'], $_POST['id_kelas'], $_POST['id_guru'], $_POST['id_siswa'],  $_POST['waktu_1'], $_POST['tujuan_visit_home'], $_POST['hasil_visit_home'], $_POST['lanjutan_visit_home'], $_GET['id_visit_home']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_visit_home'</script>";
			}
		?>

	</div>
</div>

</body>
</html>