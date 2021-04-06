<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">   
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<br>
<div class="row">
	<div class="col-md-6">
		<h3>Video Profil Calon Peserta Didik</h3>
		<h3>Sekolah Sukma Bangsa Bireuen</h3>
	</div>
</div>
<hr>
 <?php  
$semua_project = $project->tampil_lainnya();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Video</title>
</head>
<body>
		<table class="table table-hover table-striped" id="data-table" style="width:100%;">
			<thead>
				<tr>
					<th>Nama Calon PD</th>
					<th>Jenis Pendaftaran</th>
					<th>No Kartu Peserta Ujian</th>
					<th>Video</th>
					<th>Aksi</th>
				</tr>
			</thead>
				

			<tbody>
				<?php foreach ($semua_project as $key => $value): ?>
		<tr>
			<td><?php echo $value['nama'] ;?></td>
			<td><?php echo $value['jenis']; ?></td>
			<td><?php echo $value['no_kartu']; ?></td>
			<td class="hidden-print"><?php echo $value['laporan'] ?></td>
			<td><a href="../video/<?php echo $value['laporan']; ?>" class="btn btn-danger" target="_blank">Lihat Video</a></td>	
		</tr>
		<?php endforeach ?>	
			</tbody>
		</table>	


	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


    <script>

      $(document).ready(function() {
          var table = $('#data-table').DataTable({
            "processing": true,
       		 "serverSide": true,
       		 "ajax": "../manajemen/lainnya/server_processing.php",
				"columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-danger' >Lihat Video</button>"
        } ],
			"scrollX": true,
            pageLength: 5,
        dom: 'Bfrtip',
        "oLanguage": {
   "sSearch": "Cari : "
 },
    });
	$('#data-table tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.open('../video/'+data[ 3 ],'_blank')
    } );

      } 
	  
	  
	  );
    </script>
	 <script type="text/javascript">
        function tombollihat() {
            return '<a href="../video/<?php echo $value['laporan']; ?>"  onclick="myFunc()" class="btn btn-danger" target="_blank">Lihat Video</a>';
        }

		function myFunc() {
            console.log("Button was clicked!!!");
        }
    </script>

</body>
</html>