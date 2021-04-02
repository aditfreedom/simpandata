
<?php  
	
	$id_kegiatan = $_GET['id_kegiatan'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_kegiatan = $kegiatan->ambil_kegiatan($id_kegiatan);

$data_jenjang = $jenjang->tampil_jenjang_admin();
$data_semester = $semester->tampil_semester_admin();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Laporan Kegiatan</title>
</head>
<body>
	<h1>Upload Laporan Kegiatan</h1>
	<hr>
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="row">
	<div class="col-md-6">
		<form method="POST" enctype="multipart/form-data">			
			
		
				
			<div class="form-group">
				<label>Upload Laporan</label>
				<input type="file" name="file_up" class="form-control" > <br>
			</div>
			
			<button class="btn btn-primary" name="upload">Upload</button>

		</form>

		<?php 
			if (isset($_POST['upload']))
			{
				
				$nama = $_FILES['file_up']['name'];
				$lokasi = $_FILES['file_up']['tmp_name'];

				if (!empty($lokasi))
				{

				move_uploaded_file($lokasi, "../laporan/kegiatan/$nama");
				$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
				$database->query("UPDATE kegiatan SET laporan='$nama' WHERE id_kegiatan='$id_kegiatan'");
				}
				else
				{
					$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
					$database->query("UPDATE kegiatan SET laporan='$nama' WHERE id_kegiatan='$id_kegiatan'");
				}

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_kegiatan'</script>";

				
			}
		?>

	</div>
</div>

</body>
</html>