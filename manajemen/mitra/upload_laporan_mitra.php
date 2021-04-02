
<?php  
	
	$id_mitra = $_GET['id_mitra'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_mitra = $mitra->ambil_mitra($id_mitra);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Laporan Kerjasama dan Kemitraan</title>
</head>
<body>
	<h1>Upload Laporan Kerjasama dan Kemitraan</h1>
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

				move_uploaded_file($lokasi, "../laporan/mitra/$nama");
				$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
				$database->query("UPDATE mitra SET laporan='$nama' WHERE id_mitra='$id_mitra'");
				}
				else
				{
					$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
					$database->query("UPDATE mitra SET laporan='$nama' WHERE id_mitra='$id_mitra'");
				}

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_mitra'</script>";

				
			}
		?>

	</div>
</div>

</body>
</html>