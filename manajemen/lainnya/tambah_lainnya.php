<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">   
</head>
<br>
<div id="alert"></div>
<h2 class="text-center font-weight-bold">FORM PENGIRIMAN VIDEO PROFIL</h2>
<h2 class="text-center font-weight-bold">PPDB SEKOLAH SUKMA BANGSA BIREUEN</h2>
<h2 class="text-center font-weight-bold">TP. 2021/2022</h2>
<hr>

<div>
			<form method="POST" enctype="multipart/form-data">			
					
			<div class="form-group">
				<label class="font-weight-bold">JENIS PENDAFTARAN</label>
				<select class="form-control" name="jenis">
					<option value="" hidden>Pilih Level</option>
					<option value="SISWA BARU SD" >SISWA BARU SD</option>		
					<option value="SISWA BARU SMP" >SISWA BARU SMP</option>		
					<option value="SISWA BARU SMA" >SISWA BARU SMA</option>		
					<option value="PINDAHAN SD" >PINDAHAN SD</option>		
					<option value="PINDAHAN SMP" >PINDAHAN SMP</option>		
					<option value="PINDAHAN SMA" >PINDAHAN SMA</option>	
				</select>
			</div>

			<div class="form-group">
				<label class="font-weight-bold">NO. KARTU PESERTA UJIAN</label>
				<input type="text" name="no_kartu" class="form-control" required="" >
			</div>

			<div class="form-group">
				<label class="font-weight-bold">NAMA CALON PESERTA DIDIK</label>
				<input type="text" name="nama" class="form-control" required="" >
			</div>

			<div class="form-group">
				<label class="font-weight-bold">UPLOAD VIDEO</label>
				<input type="file" name="laporan" class="form-control" >
			</div>
			
			<button class="btn btn-info" name="simpan" style="width:100%;" onclick="tampilalert()"><b>Kirim Video</b></button>

		</form>
<br>

		<?php 
			if (isset($_POST['simpan']))
			{

				$nama = $_FILES['laporan']['name'];
				$lokasi = $_FILES['laporan']['tmp_name'];
				$extension = pathinfo($nama, PATHINFO_EXTENSION);
				$nama2       = md5($nama).'.'.$extension;
				move_uploaded_file($lokasi, "../video/$nama2");


				$project->simpan_lainnya($_POST['jenis'], $_POST['no_kartu'], $_POST['nama'], $nama2);



				echo "<script>alert('Video Berhasil Terkirim, Selamat Mengikuti Tes!')</script>";
				echo "<script>location='index.php?halaman=tambah_lainnya'</script>";

				
			}
			
		?>

</div>

<script>

function tampilalert() {
	document.getElementById("alert").innerHTML = '<div class="alert alert-danger" role="alert">File Sedang Dikirim, Harap Tunggu Sejenak</div>';
}

  

</script>