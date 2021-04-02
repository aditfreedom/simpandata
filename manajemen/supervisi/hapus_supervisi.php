<?php 
// mendapatkan id user dari url
$id_supervisi = $_GET['id_supervisi'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$visit_home->hapus_supervisi($id_supervisi);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_supervisi'</script>";
?>