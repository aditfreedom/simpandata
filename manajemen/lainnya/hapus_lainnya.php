<?php 
// mendapatkan id user dari url
$id = $_GET['id'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$guru->hapus_lainnya($id);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_lainnya'</script>";
?>