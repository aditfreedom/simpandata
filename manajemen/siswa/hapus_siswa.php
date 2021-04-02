<?php 
// mendapatkan id user dari url
$id_siswa = $_GET['id_siswa'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$siswa->hapus_siswa($id_siswa);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=siswa'</script>";
?>