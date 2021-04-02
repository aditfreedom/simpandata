
<?php  
	
	$id_datapustaka = $_GET['id_datapustaka'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detaildatapustaka = $datapustaka->ambil_datapustaka($id_datapustaka);

$data_jenjang = $jenjang->tampil_jenjang_admin();
$data_semester = $semester->tampil_semester_admin();

// echo "<pre>";
// print_r($detail_project);
// echo "</pre>";
	
// // 	$data_jenjang = $jenjang->tampil_jenjang();

// 	echo "<pre>";
// print_r($semua_mapel1);
// echo "</pre>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Laporan Kegiatan Pustaka</title>
</head>
<body>
	<h3>Upload Laporan Kegiatan Pustaka</h3>
	<hr>
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="row">
	<div class="col-md-6">
		<form method="POST" enctype="multipart/form-data">			
			
		
				
			<div class="form-group">
				<label>Upload Laporan</label>
				<input type="file" name="file_up" class="form-control" >
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

				move_uploaded_file($lokasi, "../laporan/pustaka/$nama");
				$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
				$database->query("UPDATE datapustaka SET laporan='$nama' WHERE id_datapustaka='$id_datapustaka'");
				}
				else
				{
					$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
					$database->query("UPDATE datapustaka SET laporan='$nama' WHERE id_datapustaka='$id_datapustaka'");
				}

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_pustaka'</script>";

				
			}
		?>

	</div>
</div>

</body>
</html>