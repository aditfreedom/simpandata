<div class="row">
	<div class="col-md-6">
		<h1><b><i class="fa fa-tachometer"></i> DASHBOARD</a></li></b></h1>
	</div>
	<div class="col-md-6">
		<div class="tambah-user">
			
		</div>
	</div>


</div>
<hr>

<?php
$siswa_aktif = $ruang->hitung_jumlahsiswa();
$siswa_aktifsd = $ruang->hitung_jumlahsiswasd();
$siswa_aktifsdlaki = $ruang->hitung_jumlahsiswasdlaki();
$siswa_aktifsdpr = $ruang->hitung_jumlahsiswasdpr();
$siswa_aktifsmp = $ruang->hitung_jumlahsiswasmp();
$siswa_aktifsmplaki = $ruang->hitung_jumlahsiswasmplaki();
$siswa_aktifsmppr = $ruang->hitung_jumlahsiswasmppr();
$siswa_aktifsma = $ruang->hitung_jumlahsiswasma();
$siswa_aktifsmalaki = $ruang->hitung_jumlahsiswasmalaki();
$siswa_aktifsmapr = $ruang->hitung_jumlahsiswasmapr();
$hitungsiswaperempuan = $ruang->hitung_jumlahsiswaperempuan();
$hitungsiswalaki = $ruang->hitung_jumlahsiswalaki();
$hitungsdk = $ruang->hitung_jumlahsdk();
$hitungsdktetap = $ruang->hitung_jumlahsdktetap();
$hitungsdkhonorer = $ruang->hitung_jumlahsdkhonorer();
$hitungsdkojt = $ruang->hitung_jumlahsdkojt();
$hitungnonsdk = $ruang->hitung_jumlahnonsdk();
$hitungjumlahruangan = $ruang->hitung_jumlahruangan();
$hitungalumni = $ruang->hitungalumni();

?>


<div class="row">
<div class="col-lg-6 col-6" style="margin-bottom:10px;">
            <!-- small box -->
            <div class="small-box bg-info"  style="background:#0BA5AF;">
              <div class="inner">
                <table >
                  <tr>
                    <td width="55%"><p style="margin-left:20px;padding-top:10px;font-weight:bold;color:#ffffff;">TOTAL JUMLAH SISWA AKTIF</p>
                    <p style="margin-left:20px;padding-bottom:30px;font-size:50px;color:#ffffff;"><?php echo join(',', $siswa_aktif); ?></p>
                </td>
                <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">LAKI-LAKI</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $hitungsiswalaki); ?></p>
                </td> 
                  <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">PEREMPUAN</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $hitungsiswaperempuan); ?></p></td>
                  </tr>
                </table>          
            </div>             
            </div>
          </div>


          
          <div class="col-lg-6 col-6" style="margin-bottom:10px;">
            <!-- small box -->
            <div class="small-box bg-info"  style="background:#0BA5AF;">
              <div class="inner">
                <table >
                  <tr>
                    <td width="55%"><p style="margin-left:20px;padding-top:10px;font-weight:bold;color:#ffffff;">TOTAL JUMLAH SISWA AKTIF SD</p>
                    <p style="margin-left:20px;padding-bottom:30px;font-size:50px;color:#ffffff;"><?php echo join(',', $siswa_aktifsd); ?></p>
                </td>
                <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">LAKI-LAKI</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $siswa_aktifsdlaki); ?></p>
                </td> 
                  <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">PEREMPUAN</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $siswa_aktifsdpr); ?></p></td>
                  </tr>
                </table>          
            </div>             
            </div>
          </div>

          <div class="col-lg-6 col-6" style="margin-bottom:10px;">
            <!-- small box -->
            <div class="small-box bg-info"  style="background:#DF2B57;">
              <div class="inner">
                <table >
                  <tr>
                    <td width="55%"><p style="margin-left:20px;padding-top:10px;font-weight:bold;color:#ffffff;">TOTAL JUMLAH SISWA AKTIF SMP</p>
                    <p style="margin-left:20px;padding-bottom:30px;font-size:50px;color:#ffffff;"><?php echo join(',', $siswa_aktifsmp); ?></p>
                </td>
                <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">LAKI-LAKI</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $siswa_aktifsmplaki); ?></p>
                </td> 
                  <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">PEREMPUAN</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $siswa_aktifsmppr); ?></p></td>  
                  </tr>
                </table>          
            </div>             
            </div>
          </div>

          <div class="col-lg-6 col-6" style="margin-bottom:10px;">
            <!-- small box -->
            <div class="small-box bg-info"  style="background:#DF2B57;">
              <div class="inner">
                <table >
                  <tr>
                    <td width="55%"><p style="margin-left:20px;padding-top:10px;font-weight:bold;color:#ffffff;">TOTAL JUMLAH SISWA AKTIF SMA</p>
                    <p style="margin-left:20px;padding-bottom:30px;font-size:50px;color:#ffffff;"><?php echo join(',', $siswa_aktifsma); ?></p>
                </td>
                <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">LAKI-LAKI</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $siswa_aktifsmalaki); ?></p>
                </td> 
                  <td width="15%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">PEREMPUAN</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $siswa_aktifsmapr); ?></p>
                  </tr>
                </table>          
            </div>             
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info"  style="background:#2F9CD6;">
              <div class="inner">
              <p style="margin-left:20px;padding-top:20px;font-weight:bold;color:#ffffff;">TOTAL JUMLAH ALUMNI</p>
              <p style="margin-left:20px;padding-bottom:30px;font-size:50px;color:#ffffff;"><?php echo join(',', $hitungalumni); ?></p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-6" style="margin-bottom:10px;">
            <!-- small box -->
            <div class="small-box bg-info"  style="background:#2F9CD6;">
              <div class="inner">
                <table >
                  <tr>
                    <td width="45%"><p style="margin-left:20px;padding-top:10px;font-weight:bold;color:#ffffff;">TOTAL JUMLAH SDK AKTIF</p>
                    <p style="margin-left:20px;padding-bottom:30px;font-size:50px;color:#ffffff;"><?php echo join(',', $hitungsdk); ?></p>
                </td>
                <td width="10%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">TETAP</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $hitungsdktetap); ?></p>
                </td> 
                  <td width="10%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">OJT</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $hitungsdkojt); ?></p>
                  </td> 
                  <td width="10%">
                  <p style="padding-top:20px;text-align:center;font-weight:bold;color:#ffffff;">HONORER</p>
                  <p style="padding-bottom:30px;text-align:center;font-size:30px;color:#ffffff;"><?php echo join(',', $hitungsdkhonorer); ?></p>
                  </td>
                  </tr>
                </table>          
            </div>             
            </div>
          </div>


          <div class="col-lg-6 col-6" style="margin-bottom:10px;">
            <!-- small box -->
            <div class="small-box bg-info"  style="background:#333333;">
              <div class="inner">
                <table >
                  <tr>
                    <td width="45%"><p style="margin-left:20px;padding-top:10px;font-weight:bold;color:#ffffff;">TOTAL JUMLAH NON SDK AKTIF</p>
                    <p style="margin-left:20px;padding-bottom:30px;font-size:50px;color:#ffffff;"><?php echo join(',', $hitungnonsdk); ?></p>
                </td>
                <td width="10%">
                </td> 
                  <td width="10%">
                  </td> 
                  <td width="10%">
                  </td>
                  </tr>
                </table>          
            </div>             
            </div>
          </div>

         