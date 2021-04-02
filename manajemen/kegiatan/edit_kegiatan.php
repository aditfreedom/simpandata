
<?php  
	
	$id_kegiatan = $_GET['id_kegiatan'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_kegiatan = $kegiatan->ambil_kegiatan($id_kegiatan);

$data_jenjang = $jenjang->tampil_jenjang_admin();
$data_semester = $semester->tampil_semester_admin();


// echo "<pre>";
// print_r($detail_kegiatan);
// echo "</pre>";
	
// // 	$data_jenjang = $jenjang->tampil_jenjang();

// 	echo "<pre>";
// print_r($semua_mapel1);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data kegiatan</title>
</head>
<body>
	<h3>Edit Data kegiatan Peningkatan Kapasitas Guru </h3>
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
						<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_kegiatan['id_jenjang']){echo "selected";} ?> > <?php echo $value['nama_jenjang'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester">
					<option value="">Pilih Semester</option>
					<?php foreach ($data_semester as $key => $value): ?>
						<option value="<?php echo $value['id_semester']; ?>" <?php if($value['id_semester']==$detail_kegiatan['id_semester']){echo "selected";} ?> > <?php echo $value['nama_semester'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>

			

			<div class="form-group">
				<label>Penanggung Jawab</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $detail_kegiatan['nama']; ?>">
			</div>

			
			<div class="form-group">
				<label>Topik</label>
				<input type="text" name="topik" class="form-control" value="<?php echo $detail_kegiatan['topik']; ?>">
			</div>

			<div class="form-group">
				<label>Bentuk Kegiatan</label>
				<input type="text" name="bentuk" class="form-control" value="<?php echo $detail_kegiatan['bentuk']; ?>">
			</div>

			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" value="<?php echo $detail_kegiatan['waktu_1']; ?>" > 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" value="<?php echo $detail_kegiatan['waktu_2']; ?>">	
			</div>




			

			<div class="form-group">
				<label>Biaya - (Rp)</label>
				<input type="text" name="biaya" class="form-control" value="<?php echo $detail_kegiatan['biaya']; ?>">
			</div>
			
			<button class="btn btn-primary" name="ubah">Ubah</button>

		</form>

		<?php 
			if (isset($_POST['ubah']))
			{
				$kegiatan->ubah_kegiatan($_POST['id_jenjang'], $_POST['id_semester'], $_POST['nama'],  $_POST['topik'], $_POST['bentuk'], $_POST['waktu_1'], $_POST['waktu_2'], $_POST['biaya'], $_GET['id_kegiatan']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_kegiatan'</script>";
			}
		?>

	</div>
</div>

</body>
</html>