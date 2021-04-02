<?php 
// mendapatkan id user dari url
$id_lulusan = $_GET['id_lulusan'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$lulusan->hapus_lulusan($id_lulusan);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=lulusan'</script>";
?>