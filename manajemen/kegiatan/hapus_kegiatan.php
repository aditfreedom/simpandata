<?php 
// mendapatkan id user dari url
$id_kegiatan = $_GET['id_kegiatan'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$kegiatan->hapus_kegiatan($id_kegiatan);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_kegiatan'</script>";
?>