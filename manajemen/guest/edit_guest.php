
<?php  
	
	$id_guest = $_GET['id_guest'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_guest = $guest->ambil_guest($id_guest);
$data_mapel = $mapel->tampil_mapel();
$data_kelas = $kelas->tampil_kelas_admin();
$data_kelas2 = $kelas2->tampil_kelas2_admin();
$data_kelas3 = $kelas3->tampil_kelas3_admin();
$data_kelas4 = $kelas4->tampil_kelas4_admin();
$data_guru = $guru->tampil_guru_admin();
$data_jenjang = $jenjang->tampil_jenjang_admin();
$data_semester = $semester->tampil_semester_admin();
$semua_mapel1 = $mapel1->tampil_mapel1_admin();
$semua_mapel2 = $mapel2->tampil_mapel2_admin();
$semua_mapel3 = $mapel3->tampil_mapel3_admin();
$semua_mapel4 = $mapel4->tampil_mapel4_admin();


// echo "<pre>";
// print_r($detail_guest);
// echo "</pre>";
	
// // 	$data_jenjang = $jenjang->tampil_jenjang();

// 	echo "<pre>";
// print_r($semua_mapel1);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Guest Teacher</title>
</head>
<body>
	<h1>Edit Data Guest Teacher</h1>
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
						<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_guest['id_jenjang']){echo "selected";} ?> > <?php echo $value['nama_jenjang'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester">
					<option value="">Pilih Semester</option>
					<?php foreach ($data_semester as $key => $value): ?>
						<option value="<?php echo $value['id_semester']; ?>" <?php if($value['id_semester']==$detail_guest['id_semester']){echo "selected";} ?> > <?php echo $value['nama_semester'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Kelas Peserta 1</label>
				<select class="form-control" name="id_kelas">
					<option value="">Pilih Kelas</option>
				<?php foreach ($data_kelas as $key => $value): ?>
					<option value="<?php echo $value['id_kelas'] ?>"  <?php if($value['id_kelas']==$detail_guest['id_kelas']){echo "selected";} ?> > <?php echo $value['nama_kelas'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>
			
			<div class="form-group">
				<label>Kelas Peserta 2</label>
				<select class="form-control" name="id_kelas2">
					<option value="">Pilih Kelas</option>
				<?php foreach ($data_kelas2 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas2'] ?>"  <?php if($value['id_kelas2']==$detail_guest['id_kelas2']){echo "selected";} ?> > <?php echo $value['nama_kelas2'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 3</label>
				<select class="form-control" name="id_kelas3">
					<option value="">Pilih Kelas</option>
				<?php foreach ($data_kelas3 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas3'] ?>"  <?php if($value['id_kelas3']==$detail_guest['id_kelas3']){echo "selected";} ?> > <?php echo $value['nama_kelas3'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 4</label>
				<select class="form-control" name="id_kelas4">
					<option value="">Pilih Kelas</option>
				<?php foreach ($data_kelas4 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas4'] ?>"  <?php if($value['id_kelas4']==$detail_guest['id_kelas4']){echo "selected";} ?> > <?php echo $value['nama_kelas4'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran</label>
				<select class="form-control" name="id_mapel1">
					<option value="">Pilih Mata Pelajaran</option>
				<?php foreach ($semua_mapel1 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel1'] ?>" <?php if($value['id_mapel1']==$detail_guest['id_mapel1']){echo "selected";} ?>  > <?php echo $value['nama_mapel1'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Materi Pelajaran</label>
				<input type="text" name="tema_guest" class="form-control" value="<?php echo $detail_guest['tema_guest']; ?>">
			</div>

			<div class="form-group">
				<label>Koordinator Pelaksana Guest Teacher</label>
				<select class="form-control" name="id_guru">
					<option value="">Nama Guru</option>
				<?php foreach ($data_guru as $key => $value): ?>
					<option value="<?php echo $value['id_guru'] ?>"  <?php if($value['id_guru']==$detail_guest['id_guru']){echo "selected";} ?> > <?php echo $value['nama_guru'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Nama Guest Teacher</label>
				<input type="text" name="nama_guest" class="form-control" value="<?php echo $detail_guest['nama_guest']; ?>">
			</div>

			<div class="form-group">
				<label>Tujuan dan Manfaat</label>
				<input type="text" name="hasil_guest" class="form-control" value="<?php echo $detail_guest['hasil_guest']; ?>">
			</div>

			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" value="<?php echo $detail_guest['waktu_1']; ?>" > 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" value="<?php echo $detail_guest['waktu_2']; ?>">	
			</div>




			

			<div class="form-group">
				<label>Perkiraan Biaya</label>
				<input type="text" name="biaya_guest" class="form-control" value="<?php echo $detail_guest['biaya_guest']; ?>">
			</div>
			
			<button class="btn btn-primary" name="ubah">Ubah</button>

		</form>

		<?php 
			if (isset($_POST['ubah']))
			{
				$guest->ubah_guest($_POST['id_jenjang'], $_POST['id_semester'], $_POST['id_kelas'], $_POST['id_kelas2'], $_POST['id_kelas3'], $_POST['id_kelas4'], $_POST['id_mapel1'], $_POST['tema_guest'], $_POST['id_guru'],  $_POST['nama_guest'], $_POST['hasil_guest'],
					$_POST['waktu_1'], $_POST['waktu_2'],   $_POST['biaya_guest'], $_GET['id_guest']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_guest'</script>";
			}
		?>

	</div>
</div>

</body>
</html>