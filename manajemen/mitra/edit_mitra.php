
<?php  
	
	$id_mitra = $_GET['id_mitra'];

$detail_mitra = $mitra->ambil_mitra($id_mitra);
$data_jenjang = $jenjang->tampil_jenjang_admin();



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mitra</title>
</head>
<body>
	<h3>Edit Data Kerjasama dan Kemitraan </h3>
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
						<option value="<?php echo $value['id_jenjang']; ?>" <?php if($value['id_jenjang']==$detail_mitra['id_jenjang']){echo "selected";} ?> > <?php echo $value['nama_jenjang'] ?> </option>
					<?php endforeach ?>
				</select>
			</div>

			
			<div class="form-group">
				<label>Bidang Kegiatan</label>
				<input type="text" name="bidang" class="form-control" value="<?php echo $detail_mitra['bidang']; ?>">
			</div>

			<div class="form-group">
				<label>Nama Mitra</label>
				<input type="text" name="nama_mitra" class="form-control" value="<?php echo $detail_mitra['nama_mitra']; ?>">
			</div>

			<div class="form-group">
				<label>Bentuk Kegiatan</label>
				<input type="text" name="bentuk" class="form-control" value="<?php echo $detail_mitra['bentuk']; ?>">
			</div>

			
			<div class="form-group">
					<label>Waktu Pelaksanaan</label>
					<input type="date" name="waktu_1" class="" value="<?php echo $detail_mitra['waktu_1']; ?>" > 	
					<b>s/d</b>	
					<input type="date" name="waktu_2" class="" value="<?php echo $detail_mitra['waktu_2']; ?>">	
			</div>

			
			<button class="btn btn-primary" name="ubah">Ubah</button>

		</form>

		<?php 
			if (isset($_POST['ubah']))
			{
				$mitra->ubah_mitra($_POST['id_jenjang'],  $_POST['bidang'], $_POST['nama_mitra'], $_POST['bentuk'], $_POST['waktu_1'], $_POST['waktu_2'], $_GET['id_mitra']);

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_mitra'</script>";
			}
		?>

	</div>
</div>

</body>
</html>