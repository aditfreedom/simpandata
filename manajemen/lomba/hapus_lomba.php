<?php 
// mendapatkan id user dari url
$id_lomba = $_GET['id_lomba'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$lomba->hapus_lomba($id_lomba);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=lomba'</script>";
?>