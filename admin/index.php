
<?php 
session_start();
include_once 'class/crud.php'; 

if (!isset($_SESSION['adm'])) 
{
	echo "<script>alert('Anda Harus Login..!');</script>";  
	echo "<script>location='loginadmin/login.php';</script>";
	exit();
		  //header('location:login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blank Page - SB Admin</title>

    <!-- Bootstrap core CSS -->
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../dataTables/datatables.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?hal=dashboard" style="font-weight: bold;"><?php echo ucwords($_SESSION['adm']['username']); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
          <?php if(@$_SESSION['admin']): ?>
            <li <?= @$_GET['hal'] == 'dashboard' ? 'class="active"' : '' ?> ><a href="?hal=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li <?= @$_GET['hal'] == 'users' ? 'class="active"' : '' ?> ><a href="?hal=users"><i class="fa fa-user"></i> Users</a></li>
            <li <?= @$_GET['hal'] == 'pelanggan' ? 'class="active"' : '' ?>><a href="?hal=pelanggan"><i class="fa fa-users"></i> Pelanggan</a></li>
            <li <?= @$_GET['hal'] == 'teknisi' ? 'class="active"' : '' ?>><a href="?hal=teknisi"><i class="fa fa-table"></i> Teknisi</a></li>
            <li <?= @$_GET['hal'] == 'part' ? 'class="active"' : '' ?>><a href="?hal=part"><i class="fa fa-edit"></i> Part</a></li>
            <li <?= @$_GET['hal'] == 'mesin' ? 'class="active"' : '' ?>><a href="?hal=mesin"><i class="fa fa-cogs"></i> Mesin</a></li>
            <li <?= @$_GET['hal'] == 'dataservice' ? 'class="active"' : '' ?>><a href="?hal=dataservice"><i class="fa fa-list"></i> Data Service</a></li>
            <li <?= @$_GET['hal'] == 'pembayaran' ? 'class="active"' : '' ?>><a href="?hal=pembayaran"><i class="fa fa-dollar"></i> Pembayaran</a></li>
            <li <?= @$_GET['hal'] == 'lapperbaikan' ? 'class="active"' : '' ?>><a href="?hal=lapperbaikan"><i class="fa fa-file"></i> Laporan Perbaikan</a></li>
            <li <?= @$_GET['hal'] == 'lappembayaran' ? 'class="active"' : '' ?>><a href="?hal=lappembayaran"><i class="fa fa-file"></i> Laporan Pembayaran</a></li>
            <?php elseif(@$_SESSION['teknisi']): ?>
              <li <?= @$_GET['hal'] == 'dashboard' ? 'class="active"' : '' ?> ><a href="?hal=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li <?= @$_GET['hal'] == 'mesin' ? 'class="active"' : '' ?>><a href="?hal=mesin"><i class="fa fa-cubes"></i> Mesin</a></li>
              <li <?= @$_GET['hal'] == 'dataservice' ? 'class="active"' : '' ?>><a href="?hal=dataservice"><i class="fa fa-list"></i> Data Service</a></li>
              <?php elseif(@$_SESSION['pimpinan']): ?>
                <li <?= @$_GET['hal'] == 'lapperbaikan' ? 'class="active"' : '' ?>><a href="?hal=lapperbaikan"><i class="fa fa-file"></i> Laporan Perbaikan</a></li>
                <li <?= @$_GET['hal'] == 'lappembayaran' ? 'class="active"' : '' ?>><a href="?hal=lappembayaran"><i class="fa fa-file"></i> Laporan Pembayaran</a></li>
          
          <?php endif; ?>
            
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ucwords($_SESSION['adm']['username']); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="loginadmin/proseslogin.php?logout=1"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

       <?php 
        if(@$_GET['hal'] == 'dashboard' || @$_GET['hal'] == '')
        {
            include_once 'views/dashboard.php';
        }
        
        /* Users */
        if(@$_GET['hal'] == 'users')
        {
            include_once 'views/users.php';
            
        }
        if(@$_GET['hal'] == 'ubahusers')
        {
            include_once 'views/aksi/ubahusers.php';
        }

        /* pelanggan */
        if(@$_GET['hal'] == 'pelanggan')
        {
            include_once 'views/pelanggan.php';
            
        }
        if(@$_GET['hal'] == 'ubahpelanggan')
        {
            include_once 'views/aksi/ubahpelanggan.php';
        }
        
        /* teknisi */
        if(@$_GET['hal'] == 'teknisi')
        {
          include_once 'views/teknisi.php';
        }
        if(@$_GET['hal'] == 'ubahteknisi')
        {
            include_once 'views/aksi/ubahteknisi.php';
        }
        
        /* part */
        if(@$_GET['hal'] == 'part')
        {
          include_once 'views/part.php';
        }
        if(@$_GET['hal'] == 'ubahpart')
        {
            include_once 'views/aksi/ubahpart.php';
        }
        
        /* Mesin */
        if(@$_GET['hal'] == 'mesin')
        {
          include_once 'views/mesin.php';
        }
        if(@$_GET['hal'] == 'ubahmesin')
        {
            include_once 'views/aksi/ubahmesin.php';
        }
        
        /* Data Service */
        if(@$_GET['hal'] == 'dataservice')
        {
          include_once 'views/dataservice.php';
        }
        if(@$_GET['hal'] == 'ubahdataservice')
        {
            include_once 'views/aksi/ubahdataservice.php';
        }
       
        /* Data Pembayaran */
        if(@$_GET['hal'] == 'pembayaran')
        {
          include_once 'views/pembayaran.php';
        }
        if(@$_GET['hal'] == 'ubahpembayaran')
        {
          include_once 'views/aksi/ubahpembayaran.php';
        }
  
        /* Lap Perbaikan */
        if(@$_GET['hal'] == 'lapperbaikan')
        {
          include_once 'views/laporan_perbaikan.php';
        }
        if(@$_GET['hal'] == 'cetaklaporanperbaikan' || @$_GET['tgl1'] || @$_GET['tgl2'] || @$_GET['semua'])
        {
          include_once "views/cetaklaporan/cetaklaporanperbaikan.php";
        }
        
        /* Lap Pembayaran */
        if(@$_GET['hal'] == 'lappembayaran')
        {
          include_once 'views/laporan_pembayaran.php';
        }
        if(@$_GET['hal'] == 'cetaklaporanpembayaran' || @$_GET['tglpem1'] || @$_GET['tglpem2'] || @$_GET['semuapem'])
        {
          include_once "views/cetaklaporan/cetaklaporanpembayaran.php";
        }
       ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../dataTables/datatables.min.js"></script>
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