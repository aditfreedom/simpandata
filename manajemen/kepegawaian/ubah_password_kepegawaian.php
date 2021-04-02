<?php $id_guru = $_GET['id_guru']; ?>

<h1>Ubah Password</h1>
<form method="POST">
	<div class="form-group">
		<label>Password Baru</label>
		<input type="password" name="password_guru" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Ulangi Password Baru</label>
		<input type="password" name="ulangi" class="form-control" required="">
	</div>
	<button name="ubah" class="btn btn-primary" onclick="return confirm('Yakin Ubah Password')">Ubah Password</button>
	<a href="" class="btn btn-danger" >Batal</a>
</form>

<?php 
if (isset($_POST['ubah'])) 
{
	if ($_POST['password_guru']==$_POST['ulangi']) 
	{
		// ubah password baru
		$pengguna->ubah_password_pengguna($_POST['password_guru'], $id_guru);
		echo "<script>alert('password berhasil diubah')</script>";
		echo "<script>location='index.php?halaman=pengguna'</script>";
	}
	else
	{
		echo "<script>alert('password tidak sama')</script>";
		echo "<script>location='index.php?halaman=ubah_password_penggunau&id_guru=$id_guru'</script>";
	}
	
}
 ?>