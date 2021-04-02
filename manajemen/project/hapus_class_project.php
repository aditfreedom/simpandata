<?php 
// mendapatkan id user dari url
$id_project = $_GET['id_project'];

//objek user yang menjalankan fugsi hapus user berdasarkan id_user di url
$project->hapus_class_project($id_project);
echo "<script>alert('Data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_class_project'</script>";
?>