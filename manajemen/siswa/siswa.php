<div class="row">
	<div class="col-md-6">
		<h1>DATA SISWA</h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tambah_siswa" class="btn btn-primary">Tambah</a>
			
		</div>
	</div>


</div>
<hr>

<?php 
	// $user adalah objek user dari class.php
	// tampil_user adalah fungsi pada class user dari class.php
	// objek user menjalankan fungsi tampil user
	$data_siswa = $siswa->tampil_siswa_admin();
	/*$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_kelas = $kelas->tampil_kelas_admin();*/
// 	echo "<pre>";
// print_r($data_pengguna);
// echo "</pre>";
?>
<!-- melihat isi array data user -->
<!-- <pre><?php //print_r($data_user); ?></pre>  -->

<table class="table table-hover table-striped" id="data-table" >
<thead>
		<tr>
			<th>No</th>			
			<th>Jenjang</th>		
			<th>Nama Siswa</th>	
			<th>NIS Siswa</th>	
			<th>Kelas</th>	
			<th>Jenis Kelamin</th>	
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>Pekerjaan Orang Tua</th>
			<th>No telepon</th>
			<th>Alamat</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_siswa as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_jenjang']; ?></td>			
			<td><?php echo $value['nama_siswa']; ?></td>
			<td><?php echo $value['nis_siswa']; ?></td>
			<td><?php echo $value['nama_kelas']; ?></td>
			<td><?php echo $value['jk_siswa']; ?></td>
			<td><?php echo $value['ayah_siswa']; ?></td>
			<td><?php echo $value['ibu_siswa']; ?></td>
			<td><?php echo $value['kerja_siswa']; ?></td>
			<td><?php echo $value['hp_siswa']; ?></td>
			<td><?php echo $value['alamat_siswa']; ?></td>
			
			
			<td class="hidden-print"> 
				<a href="index.php?halaman=edit_siswa&id_siswa=<?php echo $value['id_siswa']; ?>" class="" ><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></a> <br> <br>
				<a href="index.php?halaman=hapus_siswa&id_siswa=<?php echo $value['id_siswa']; ?>" class="" onclick="return confirm('hapus data siswa <?php echo $value["tema_siswa"]; ?>') " ><div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div></a> 
				
						
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>