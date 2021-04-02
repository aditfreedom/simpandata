<?php 
// mendapatkan id user dari url
$id_mitra = $_GET['id_mitra'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$mitra->hapus_mitra($id_mitra);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_mitra'</script>";
?>