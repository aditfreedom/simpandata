<div class="row">
	<div class="col-md-6">
		<h1>Data Lulusan</h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<!-- <a href="index.php?halaman=tambah_lulusan" class="btn btn-primary">Tambah</a> -->
			
		</div>
	</div>


</div>
<hr>

<?php 
	// $user adalah objek user dari class.php
	// tampil_user adalah fungsi pada class user dari class.php
	// objek user menjalankan fungsi tampil user
	$data_lulusan = $lulusan->tampil_lulusan_admin();
	/*$data_jenjang = $jenjang->tampil_jenjang_admin();
	$data_kelas = $kelas->tampil_kelas_admin();*/
// 	echo "<pre>";
// print_r($data_pengguna);
// echo "</pre>";
?>
<!-- melihat isi array data user -->
<!-- <pre><?php //print_r($data_user); ?></pre>  -->

<table class="table table-bordered" id="data-table" >
	<thead>
		<tr>
			<th>No</th>			
			<th>Tahun Pelajaran</th>
			<th>Nama Siswa</th>	
			<th>Jenis Kelamin</th>				
			<th>Jurusan</th>
			<th>Universitas</th>	
			<th>Status</th>	
			<th>Jalur Masuk</th>	
			<th>Program Studi</th>
			<th>Keterangan</th>
			<!-- <th>Opsi</th> -->
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_lulusan as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_tp']; ?></td>
			<td><?php echo $value['nama_siswa']; ?></td>
			<td><?php echo $value['nama_jk']; ?></td>
			<td><?php echo $value['nama_jurusan']; ?></td>
			<td><?php echo $value['nama_kampus']; ?></td>
			<td><?php echo $value['nama_statuspt']; ?></td>
			<td><?php echo $value['jalur_kampus']; ?></td>
			<td><?php echo $value['jurusan_kampus']; ?></td>
			<td><?php echo $value['ket_lulus']; ?></td>
			
			
		</tr>
		<?php endforeach ?>
	</tbody>
</table>