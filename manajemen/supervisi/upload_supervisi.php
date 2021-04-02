
<?php  
	
	$id_supervisi = $_GET['id_supervisi'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_visit = $visit->ambil_supervisi($id_supervisi);
$data_mapel = $mapel->tampil_mapel();
$data_kelas = $kelas->tampil_kelas_admin();
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
	<title>Upload Laporan Supervisi</title>
</head>
<body>
	<h1>Upload Laporan Supervisi</h1>
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
				$extension = pathinfo($nama, PATHINFO_EXTENSION);
				$nama2       = md5($nama).'.'.$extension;

				if (!empty($lokasi))
				{

				move_uploaded_file($lokasi, "../laporan/supervisi/$nama2");
				$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
				$database->query("UPDATE supervisi SET laporan='$nama2' WHERE id_supervisi='$id_supervisi'");
				print_r($database);

				}
				else
				{
					$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
					$database->query("UPDATE supervisi SET laporan='$nama2' WHERE id_supervisi='$id_supervisi'");
					// print_r($database);
				}



				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_supervisi'</script>";

				
			}
		?>

	</div>
</div>

</body>
</html>