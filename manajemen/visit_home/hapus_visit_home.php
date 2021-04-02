<?php 
// mendapatkan id user dari url
$id_visit_home = $_GET['id_visit_home'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$visit_home->hapus_visit_home($id_visit_home);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_visit_home'</script>";
?>