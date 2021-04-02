
<?php  
	
	$id_datapustaka = $_GET['id_datapustaka'];
	//$id_guru = $_SESSION['pengguna']['id_guru'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_datapustaka = $datapustaka->ambil_datapustaka($id_datapustaka);


$data_jenjang = $jenjang->tampil_jenjang_admin();
$data_semester = $semester->tampil_semester_admin();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Kegiatan Perpustakaan</title>
</head>
<body>
	<h3>Edit Data Kegiatan Perpustakaan</h3>
	<hr>
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="row">
	<div class="col-md-6">
		<form method="POST">			
			
			
		
			<div class="form-group">
				<label>Semester</label>
				<select class="form-control" name="id_semester">
					<!-- <option value="">Pilih level</option> -->
					<?php foreach ($data_semester as $key => $value): ?>
						<option value="<?php echo $value['id_semester']; ?>" <?php if($value['id_semester']==$detail_datapustaka['id_semester']){echo "selected";} ?> > <?php echo $value['nama_semester'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>


			<div class="form-group">
				<label>Level</label>
				<select class="form-control" name="id_jenjang">
					<!-- <option value="">Pilih level</option> -->
					<?php foreach ($data_jenjang as $key => $value): ?>
						<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_datapustaka['id_jenjang']){echo "selected";} ?> > <?php echo $value['nama_jenjang'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>


			
			<div class="form-group">
				<label>Nama Kegiatan</label>
				<input type="text" name="kegiatan" class="form-control" value="<?php echo $detail_datapustaka['kegiatan']; ?>" >
			</div>


			<div class="form-group">
					<label>Tanggal Kegiatan</label>
					<input type="date" name="waktu_1" class="" value="<?php echo $detail_datapustaka['waktu_1']; ?>" > 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" value="<?php echo $detail_datapustaka['waktu_2']; ?>">	
			</div>


			<div class="form-group">
				<label>Tujuan</label>
				<input type="text" name="tujuan" class="form-control" value="<?php echo $detail_datapustaka['tujuan']; ?>" >
			</div>

			<div class="form-group">
				<label>Sasaran</label>
				<input type="text" name="sasaran" class="form-control" value="<?php echo $detail_datapustaka['sasaran']; ?>" >
			</div>

				

			<div class="form-group">
				<label>Biaya - (Rp)</label>
				<input type="text" name="biaya" class="form-control" value="<?php echo $detail_datapustaka['biaya']; ?>" >
			</div>

			

			
			
			
			
			<button class="btn btn-primary" name="ubah">Ubah</button>

		</form>

		<?php 
			if (isset($_POST['ubah']))
			{
				$datapustaka->ubah_datapustaka($_POST['id_semester'], $_POST['id_jenjang'], $_POST['kegiatan'], $_POST['waktu_1'], $_POST['waktu_2'], $_POST['tujuan'], $_POST['sasaran'], $_POST['biaya'],  $_GET['id_datapustaka']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_pustaka'</script>";
			}
		?>

	</div>
</div>

</body>
</html>