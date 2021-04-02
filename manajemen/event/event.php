<div class="row">
	<div class="col-md-6">
		<h1>DATA EVENT BESAR SSB BIREUEN</h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tambah_event" class="btn btn-primary">Tambah</a>
			
		</div>
	</div>


</div>
<hr>

<?php 
	// $user adalah objek user dari class.php
	// tampil_user adalah fungsi pada class user dari class.php
	// objek user menjalankan fungsi tampil user
	$data_guru = $guru->tampil_event();
	$data_jenjang = $jenjang->tampil_jenjang_admin();
// 	echo "<pre>";
// print_r($data_pengguna);
// echo "</pre>";
?>
<!-- melihat isi array data user -->
<!-- <pre><?php //print_r($data_user); ?></pre>  -->

<table class="table table-hover table-striped" id="data-table" style="width:100%;">
	<thead>
		<tr>
			<th>No</th>			
			<th>Tahun</th>
			<th>Nama Event</th>	
			<th>Keterangan</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_guru as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['tahun']; ?></td>
			<td><?php echo $value['nama_event']; ?></td>
			<td><?php echo $value['keterangan']; ?></td>	
			
			
			<td>
				<a href="index.php?halaman=edit_event&id=<?php echo $value['id_event'] ?>" class="btn btn-success">Edit</a><br><br>
				<a href="index.php?halaman=hapus_event&id=<?php echo $value['id_event']; ?>" class="btn btn-danger" onclick="return confirm('hapus data <?php echo $value["nama_guru"]; ?> ?')">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>