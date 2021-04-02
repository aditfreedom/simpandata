<?php 
// mendapatkan id user dari url
$id_visit = $_GET['id_visit'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$visit->hapus_visit($id_visit);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_visit'</script>";
?>