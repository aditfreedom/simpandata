<?php include 'config/class.php'; ?>



<!DOCTYPE html>
<html>
<head>
	<title>SIMFONI</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login_admin.css">
</head>
<body>
</body>
<br/>
<br/>
<p></p>
<p></p>
<h1 align="center"><U>SIMFONI</U></h1>
<h1 align="center">SISTEM INFORMASI FORM ONLINE</h1>
<h1 align="center">SEKOLAH SUKMA BANGSA BIREUEN</h1>


<div class="kotak_login">
	<p class="tulisan_login">Silakan Login</p>
	<img src="assets/img/sukma.jpg" class="gambar" align="middle">
	<br/>
	<form method="POST">
		<!--<label>Username</label>-->

		<input type="text" name="username" class="form_login" placeholder="username..." required="">
		<!--<label>Password</label>-->

		<input type="password" name="password" class="form_login" placeholder="password..." required="">

		<input type="submit" class="tombol_login" value="Login" name="login">

		<br/>
		<br/>
	</form>


	<?php 
	if (isset($_POST['login']))
	{
		$cek = $admin->login($_POST['username'], $_POST['password']);
		
				 		// echo "$cek";

		if ($cek=='admin') 
		{
			// echo "<script>alert('login berhasil')</script>";
			echo "<script>location='admin/index.php'</script>";
		} 
		else 
			{
				$cek_pengguna = $pengguna->login($_POST['username'], $_POST['password']);
				if ($cek_pengguna == "pengguna") 
				{
					$level_pengguna = $_SESSION['pengguna']['nama_jenjang'];
					echo "<script>location='pengguna/$level_pengguna/index.php'</script>";
				} 
				else
				{
					echo "<script>alert('login gagal')</script>";
					echo "<script>location='index.php'</script>";
				}
				
			}
	}
	?>

	
</div>
</body>
</html>