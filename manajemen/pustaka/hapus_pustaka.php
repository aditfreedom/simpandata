<?php 
// mendapatkan id user dari url
$id_datapustaka = $_GET['id_datapustaka'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$datapustaka->hapus_datapustaka($id_datapustaka);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_pustaka'</script>";
?>