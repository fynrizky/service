<div class="row">
          <div class="col-lg-12">
            <h1>Dashboard <small>Admin</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Blank Page</li>
            </ol>
          </div>
        </div><!-- /.row -->

  <div class="row">

  
  <!-- Start -->
  <?php $pelanggan = $dashboard->pelanggan($koneksi);?>
  <div class="col-lg-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= $pelanggan; ?></p>
                    <p class="announcement-text">Pelanggan</p>
                  </div>
                </div>
              </div>
              <a href="?hal=pelanggan">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Mentions
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
<!-- End -->
  
<!-- Start -->
  <?php $mesin = $dashboard->mesin($koneksi);?>
  <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-cogs fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= $mesin; ?></p>
                    <p class="announcement-text">Data Mesin</p>
                  </div>
                </div>
              </div>
              <a href="?hal=mesin">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Mentions
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
<!-- End -->
  
  
<!-- Start -->
  <?php $dataservice = $dashboard->dataservice($koneksi);?>
  <div class="col-lg-3">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-list fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= $dataservice; ?></p>
                    <p class="announcement-text">Data Service</p>
                  </div>
                </div>
              </div>
              <a href="?hal=dataservice">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Mentions
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
<!-- End -->
  
</div><!-- row -->