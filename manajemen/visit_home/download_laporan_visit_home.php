
<?php  
	
	$id_project = $_GET['id_project'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_project = $project->ambil_project($id_project);
$data_mapel = $mapel->tampil_mapel();
$data_kelas = $kelas->tampil_kelas();
$data_guru = $guru->tampil_guru();
$data_jenjang = $jenjang->tampil_jenjang();
$semua_mapel1 = $mapel1->tampil_mapel1();
$semua_mapel2 = $mapel2->tampil_mapel2();
$semua_mapel3 = $mapel3->tampil_mapel3();
$semua_mapel4 = $mapel4->tampil_mapel4();


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
	<title>Download Laporan Home Visit</title>
</head>
<body>
	<h1>Download Laporan Home Visit</h1>
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

				move_uploaded_file($lokasi, "project/laporan/$nama");
				$database = new mysqli("localhost", "root", "", "simfoni");
				$database->query("UPDATE project SET laporan='$nama' WHERE id_project='$id_project'");
				}
				else
				{
					$database = new mysqli("localhost", "root", "", "simfoni");
					$database->query("UPDATE project SET laporan='$nama' WHERE id_project='$id_project'");
				}

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_class_project'</script>";

				
			}
		?>

	</div>
</div>

</body>
</html>