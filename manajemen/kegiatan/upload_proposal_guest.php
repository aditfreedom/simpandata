
<?php  
	
	$id_guest = $_GET['id_guest'];
// 	echo "<pre>";
// print_r($id_user);
// echo "</pre>";

$detail_guest = $guest->ambil_guest($id_guest);
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
	<title>Upload Proposal Guest Teacher</title>
</head>
<body>
	<h1>Upload Proposal Guest Teacher</h1>
	<hr>
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="row">
	<div class="col-md-6">
		<form method="POST" enctype="multipart/form-data">			
			
		
				
			<div class="form-group">
				<label>Upload Proposal</label>
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

				move_uploaded_file($lokasi, "../laporan/proposal/$nama");
				$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
				$database->query("UPDATE guest SET proposal='$nama' WHERE id_guest='$id_guest'");
				}
				else
				{
					$database = new mysqli("localhost", "root", "kebersamaan", "simfoni");
					$database->query("UPDATE guest SET proposal='$nama' WHERE id_guest='$id_guest'");
				}

				echo "<script>alert('data tersimpan')</script>";
				echo "<script>location='index.php?halaman=tampil_guest'</script>";

				
			}
		?>

	</div>
</div>

</body>
</html>