
<?php  
	
	$id_supervisi = $_GET['id_supervisi'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_visit_home = $visit_home->ambil_supervisi($id_supervisi);
$data_kelas = $kelas->tampil_kelas_admin();
$data_guru = $guru->tampil_guru_admin();
$data_jenjang = $jenjang->tampil_jenjang_admin();
$data_semester = $semester->tampil_semester_admin();
$detail_supervisi = $semester->tampil_supervisi_admin($id_supervisi);
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
	<title>Edit Data Supervisi</title>
</head>
<body>
	<h1>Edit Data Supervisi</h1>
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
				<label>Mata Pelajaran</label>
				<input type="text" name="mapel" class="form-control" value="<?php echo $detail_visit_home['mapel']; ?>">
			</div>

			
			<div class="form-group">
				<label>Evaluator</label>
				<input type="text" name="koordinator_supervisi" class="form-control" value="<?php echo $detail_visit_home['koordinator_supervisi']; ?>">
			</div>

			<div class="form-group">
				<label>Guru Yang Disupervisi</label>
				<input type="text" name="nama_guru" class="form-control" value="<?php echo $detail_visit_home['nama_guru']; ?>">
			</div>

			
			<div class="form-group">
					<label>Waktu Pelaksanaan</label><br>
					<input type="date" name="waktu"  rows="8"  class="" value="<?php echo $detail_visit_home['waktu']; ?>" > 						
			</div>

			<div class="form-group">
				<label>Nilai Akhir</label>
				<input type="text" name="nilai_akhir" class="form-control" value="<?php echo $detail_visit_home['nilai_akhir']; ?>">
				
			</div>
			<div class="form-group">
				<label>Kriteria</label>
				<select class="form-control" name="kriteria">
					<?php foreach ($detail_supervisi as $key => $value): ?>
						<option value="<?php echo $value['kriteria']; ?>" <?php if($value['kriteria']==$detail_visit_home['kriteria']){echo "selected";} ?> > <?php echo $value['kriteria'] ?> </option>
						<option value="Sangat Baik">Sangat Baik</option>
						<option value="Baik">Baik</option>
						<option value="Cukup">Cukup</option>
						<option value="Kurang">Kurang</option>
					<?php endforeach ?>
				</select>
			</div>

			<button class="btn btn-primary" name="ubah">Ubah</button>

		</form>

		<?php 
			if (isset($_POST['ubah']))
			{
				$visit_home->ubah_supervisi($_POST['id_jenjang'], $_POST['id_semester'], $_POST['mapel'], $_POST['koordinator_supervisi'], $_POST['nama_guru'],  $_POST['waktu'], $_POST['nilai_akhir'], $_POST['kriteria'], $_GET['id_supervisi']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_supervisi'</script>";
			}
		?>

	</div>
</div>

</body>
</html>