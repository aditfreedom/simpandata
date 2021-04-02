<?php 
include '../config/class.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VIDEO PPDB</title>
    <link rel="icon" href="../ssb.png" type="image/png">
    <!-- Bootstrap -->
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      </head>
  <body>

      </div>
      <nav class="navbar navbar-expand- bg-info">
      </nav>
    <div class="container">

        <?php 
        if (!isset($_GET['halaman']))
        {
          include 'home.php';
        }
        elseif ($_GET['halaman']=='home') 
        {
          include 'home/home.php';
        }

        elseif ($_GET['halaman']=='hapus_lainnya') 
        {
          include 'lainnya/hapus_lainnya.php';
        }
        elseif ($_GET['halaman']=='edit_event') 
        {
          include 'event/edit_event.php';
        }
        elseif ($_GET['halaman']=='tampil_lainnya') 
        {
          include 'lainnya/tampil_lainnya.php';
        }
        elseif ($_GET['halaman']=='simpan_lainya') 
        {
          include 'lainnya/simpan_lainnya.php';
        }
        elseif ($_GET['halaman']=='tambah_lainnya') 
        {
          include 'lainnya/tambah_lainnya.php';
        }
       


        elseif ($_GET['halaman']=='logout') 
        {
          session_destroy();
          echo "<script>location='../index.php' </script>";
        }
        ?>

        </div>
    </div>
  </div>


    <script src="../assets/ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("theeditor");
    </script>
    <script src="../assets/js/sendiri.js"></script>
    
  </body>
</html>