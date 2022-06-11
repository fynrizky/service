<?php 
session_start();
include_once "admin/koneksi/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="datatables.min.css">
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
</head>
<body>
    
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="?hal=home"> <img src="gambar/Logosmf.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <li <?= @$_GET['hal'] == 'home' ? 'class="active"':''; ?> ><a  class="nav-item nav-link" href="?hal=home">Home <span class="sr-only">(current)</span></a></li>
                <li <?= @$_GET['hal'] == 'service' ? 'class="active"':''; ?> ><a class="nav-item nav-link" href="?hal=service">Service</a></li>
                </div>
            </div>
        </div>
        </nav>
    </section>
     
    <!-- disini  -->
        <?php 
            if(@$_GET['hal'] == 'home' || @$_GET['hal'] == ''){
                include_once 'home.php';
            }
            if(@$_GET['hal'] == 'service'){
                include_once 'service.php';
            }
        ?>
    <!-- end  -->

    <!-- <script src="assets/js/jquery-1.10.2.js"></script> -->
    <script src="bootstrap-4.3.1-dist/js/jquery.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="datatables.min.js"></script>
    <script>
      $(document).ready( function () {
        $('#dataTable').DataTable({
        lengthMenu: [
              [5, 25, 50, -1],
              [5, 25, 50, "All"]
            ]
        });
      });
      </script>
</body>
</html>