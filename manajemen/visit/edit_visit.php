
<?php  
	
	$id_visit = $_GET['id_visit'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_visit = $visit->ambil_visit($id_visit);
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
	<title>Edit Data School visit</title>
</head>
<body>
	<h1>Edit Data School visit</h1>
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
						<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_visit['id_jenjang']){echo "selected";} ?> > <?php echo $value['nama_jenjang'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester">
					<option value="">Pilih Semester</option>
					<?php foreach ($data_semester as $key => $value): ?>
						<option value="<?php echo $value['id_semester']; ?>" <?php if($value['id_semester']==$detail_visit['id_semester']){echo "selected";} ?> > <?php echo $value['nama_semester'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Kelas Peserta 1</label>
				<select class="form-control" name="id_kelas">
					<option value="">Pilih Kelas</option>
				<?php foreach ($data_kelas as $key => $value): ?>
					<option value="<?php echo $value['id_kelas'] ?>"  <?php if($value['id_kelas']==$detail_visit['id_kelas']){echo "selected";} ?> > <?php echo $value['nama_kelas'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 2</label>
				<select class="form-control" name="id_kelas2">
					<option value="">Pilih kelas</option>
				<?php foreach ($data_kelas2 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas2'] ?>"  <?php if($value['id_kelas2']==$detail_visit['id_kelas2']){echo "selected";} ?> > <?php echo $value['nama_kelas2'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 3</label>
				<select class="form-control" name="id_kelas3">
					<option value="">Pilih kelas</option>
				<?php foreach ($data_kelas3 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas3'] ?>"  <?php if($value['id_kelas3']==$detail_visit['id_kelas3']){echo "selected";} ?> > <?php echo $value['nama_kelas3'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Kelas Peserta 4</label>
				<select class="form-control" name="id_kelas4">
					<option value="">Pilih kelas</option>
				<?php foreach ($data_kelas4 as $key => $value): ?>
					<option value="<?php echo $value['id_kelas4'] ?>"  <?php if($value['id_kelas4']==$detail_visit['id_kelas4']){echo "selected";} ?> > <?php echo $value['nama_kelas4'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>
			
			

			<div class="form-group">
				<label>Koordinator School Visit</label>
				<select class="form-control" name="id_guru">
					<option value="">Nama Guru</option>
				<?php foreach ($data_guru as $key => $value): ?>
					<option value="<?php echo $value['id_guru'] ?>"  <?php if($value['id_guru']==$detail_visit['id_guru']){echo "selected";} ?> > <?php echo $value['nama_guru'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Materi School Visit</label>
				<input type="text" name="tema_visit" class="form-control" value=" <?php echo $detail_visit['tema_visit']; ?> ">
			</div>

			<div class="form-group">
				<label>Tujuan dan Manfaat School Visit</label>
				<input type="text" name="hasil_visit" class="form-control" value=" <?php echo $detail_visit['hasil_visit']; ?> ">
			</div>

			<div class="form-group">
				<label>Lokasi School Visit</label>
				<input type="text" name="lokasi_visit" class="form-control" value=" <?php echo $detail_visit['lokasi_visit']; ?> ">
			</div>


			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" value="<?php echo $detail_visit['waktu_1']; ?>" > 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" value="<?php echo $detail_visit['waktu_2']; ?>">	
			</div>



			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 1</label>
				<select class="form-control" name="id_mapel1">
					<option value="">Pilih Mata Pelajaran Kolaborasi 1</option>
				<?php foreach ($semua_mapel1 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel1'] ?>" <?php if($value['id_mapel1']==$detail_visit['id_mapel1']){echo "selected";} ?>  > <?php echo $value['nama_mapel1'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 2</label>
				<select class="form-control" name="id_mapel2">
					<option value="">Pilih Mata Pelajaran Kolaborasi 2</option>
				<?php foreach ($semua_mapel2 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel2'] ?>" <?php if($value['id_mapel2']==$detail_visit['id_mapel2']){echo "selected";} ?>  > <?php echo $value['nama_mapel2'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 3</label>
				<select class="form-control" name="id_mapel3">
					<option value="">Pilih Mata Pelajaran Kolaborasi 3</option>
				<?php foreach ($semua_mapel3 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel3'] ?>" <?php if($value['id_mapel3']==$detail_visit['id_mapel3']){echo "selected";} ?>  > <?php echo $value['nama_mapel3'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran Kolaborasi 4</label>
				<select class="form-control" name="id_mapel4">
					<option value="">Pilih Mata Pelajaran Kolaborasi 4</option>
				<?php foreach ($semua_mapel4 as $key => $value): ?>
					<option value="<?php echo $value['id_mapel4'] ?>" <?php if($value['id_mapel4']==$detail_visit['id_mapel4']){echo "selected";} ?>  > <?php echo $value['nama_mapel4'] ?> </option>					
				<?php endforeach ?>					
				</select>
			</div>

			

			<div class="form-group">
				<label>Perkiraan Biaya</label>
				<input type="text" name="biaya_visit" class="form-control" value="<?php echo $detail_visit['biaya_visit']; ?>">
			</div>
			
			<button class="btn btn-primary" name="ubah">Ubah</button>

		</form>

		<?php 
			if (isset($_POST['ubah']))
			{
				$visit->ubah_visit($_POST['id_jenjang'], $_POST['id_semester'], $_POST['id_kelas'], $_POST['id_kelas2'], $_POST['id_kelas3'], $_POST['id_kelas4'], $_POST['id_guru'], $_POST['tema_visit'], $_POST['hasil_visit'], $_POST['lokasi_visit'], $_POST['waktu_1'], $_POST['waktu_2'], $_POST['id_mapel1'], $_POST['id_mapel2'], $_POST['id_mapel3'], $_POST['id_mapel4'], $_POST['biaya_visit'], $_GET['id_visit']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_visit'</script>";
			}
		?>

	</div>
</div>

</body>
</html>