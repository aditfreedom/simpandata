
<div class="row">
	<div class="col-md-6">
		<h1>DATA REKAP SISWA <br> SD SUKMA BANGSA BIREUEN</h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
		<a href="index.php?halaman=tambah_rekapsiswasd" class="btn btn-primary">Tambah Data</a>
			
		</div>
	</div>


</div>
<hr>

<?php 
	// $user adalah objek user dari class.php
	// tampil_user adalah fungsi pada class user dari class.php
	// objek user menjalankan fungsi tampil user

	$data_guru = $guru->rekapsiswa_sd();
	$data_jenjang = $jenjang->tampil_jenjang_admin();

// 	echo "<pre>";
// print_r($data_pengguna);
// echo "</pre>";
?>
<!-- melihat isi array data user -->
<!-- <pre><?php //print_r($data_user); ?></pre>  -->
<div class="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

<!-- tampil grafik
<div id="grafik"></div> -->


</div>
<hr>

<div class="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width:100%;">
<h3 class="text-center"><b>Rekap Jumlah Total Siswa SD</h3>
<h3 class="text-center">Sekolah Sukma Bangsa Bireuen</b></h3>
<table class="table table-hover table-bordered" id="data-table" >
	<thead>
		<tr>
			<th rowspan="3" class="text-center">Tahun Ajaran</th>			
			<th colspan="18" class="text-center">Kelas</th>
			<th rowspan="3" class="text-center">Total</th>
			<th rowspan="3" class="text-center">Opsi</th>
		</tr>
		
		<tr>
		<th colspan="3" class="text-center">I</th>
		<th colspan="3" class="text-center">II</th>
		<th colspan="3" class="text-center">III</th>
		<th colspan="3" class="text-center">IV</th>
		<th colspan="3" class="text-center">V</th>
		<th colspan="3" class="text-center">VI</th>
		</tr>

		<tr>
		<th class="text-center">LK</th>
		<th class="text-center">PR</th>
		<th class="text-center">JLH</th>
		<th class="text-center">LK</th>
		<th class="text-center">PR</th>
		<th class="text-center">JLH</th>
		<th class="text-center">LK</th>
		<th class="text-center">PR</th>
		<th class="text-center">JLH</th>
		<th class="text-center">LK</th>
		<th class="text-center">PR</th>
		<th class="text-center">JLH</th>
		<th class="text-center">LK</th>
		<th class="text-center">PR</th>
		<th class="text-center">JLH</th>
		<th class="text-center">LK</th>
		<th class="text-center">PR</th>
		<th class="text-center">JLH</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_guru as $key => $value): ?>
			
		<tr>
		<td class="text-center"><?= $value['tahun_ajaran']; ?></td>
		<td class="text-center"><?= $value['lk1']; ?></td>
		<td class="text-center"><?= $value['pr1']; ?></td>
		<td class="text-center"><b><?= $value['lk1']+$value['pr1']; ?></b></td>
		<td class="text-center"><?= $value['lk2']; ?></td>
		<td class="text-center"><?= $value['pr2']; ?></td>
		<td class="text-center"><b><?= $value['lk2']+$value['pr2']; ?></b></td>
		<td class="text-center"><?= $value['lk3']; ?></td>
		<td class="text-center"><?= $value['pr3']; ?></td>
		<td class="text-center"><b><?= $value['lk3']+$value['pr3']; ?></b></td>
		<td class="text-center"><?= $value['lk4']; ?></td>
		<td class="text-center"><?= $value['pr4']; ?></td>
		<td class="text-center"><b><?= $value['lk4']+$value['pr4']; ?></b></td>
		<td class="text-center"><?= $value['lk5']; ?></td>
		<td class="text-center"><?= $value['pr5']; ?></td>
		<td class="text-center"><b><?= $value['lk5']+$value['pr5']; ?></b></td>
		<td class="text-center"><?= $value['lk6']; ?></td>
		<td class="text-center"><?= $value['pr6']; ?></td>
		<td class="text-center"><b><?= $value['lk6']+$value['pr6']; ?></b></td>
		<td class="text-center"><b><?= $value['lk1']+$value['pr1']+$value['lk2']+$value['pr2']+$value['lk3']+$value['pr3']+$value['lk4']+$value['pr4']
								+$value['lk5']+$value['pr5']+$value['lk6']+$value['pr6']; ?></b></td>



			
			<td>
				<a href="index.php?halaman=edit_rekapsiswasd&id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
				<a href="index.php?halaman=hapus_rekapsiswasd&id=<?php echo $value['id']; ?>" class="btn btn-danger" onclick="return confirm('hapus data?')">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<h4 style="color:red;font-weight:bold;">*Dihitung per 1 Januari</h4>
</div>


<?php
$tp = [];
$total = [];
foreach ($data_guru as $key => $value){
	$tp[]= $value['tahun_ajaran'];
	$total[]=$value['lk1']+$value['pr1']+$value['lk2']+$value['pr2']+$value['lk3']+$value['pr3']+$value['lk4']+$value['pr4']
	+$value['lk5']+$value['pr5']+$value['lk6']+$value['pr6'];

}

?>


<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
Highcharts.chart('grafik', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'GRAFIK REKAP SISWA SD SUKMA BANGSA BIREUEN'
    },
    subtitle: {
        text: 'Per 1 Januari'
    },
    xAxis: {
        categories: 
			
			<?php echo json_encode($tp); ?>

		 ,
        crosshair: true,
		title: {
            text: 'Tahun Pelajaran'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Siswa'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Siswa</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            borderWidth: 0
        }
    },
    series: [{
		name: 'Jumlah Siswa',
        data: 
			<?php echo json_encode($total); ?>
    }]

});
var chart = $('grafik').highcharts();
  setTimeout(function() {
    chart.exportChart();
  }, 2000);
</script> -->

