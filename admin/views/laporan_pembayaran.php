<div class="row">
          <div class="col-lg-12">
            <h1>Laporan Pembayaran <small>A Blank Slate</small></h1>
            <div class="row">
		<div class="col-lg-12">
        <form method="post" class="form-inline" style="margin-bottom: 20px;">
                  <div class="col-lg">
                    <div class="form-group">
                      <input type="date" id="tglpem1" value="<?= date('Y-m-d') ?>" class="form-control" name="tglpem1">
                    </div>
                  </div>
                  <br>
                  <label> Hingga </label>
                  <div class="col-lg">
                    <div class="form-group">
                      <input type="date" id="tglpem2" value="<?= date('Y-m-d') ?>" class="form-control" name="tglpem2">
                    </div>
                  </div>
                  <hr/>
                  <div class="form-group">
                    <button type="submit" id="formbtn" name="proses" class="btn btn-default"> Proses</button>
                    <button class="btn btn-primary" name="semua"> Semua Data</button>
                  </div>
		        </form>
		</div>
		</div>

                 <?php if (isset($_POST['proses'])){ ?>
										<a href="?hal=cetaklaporanpembayaran&tglpem1=<?= $_POST['tglpem1']; ?>&tglpem2=<?= $_POST['tglpem2']; ?>" target="_BLANK" class="btn btn-info btn-sm pull-right"> Cetak</a>
								 <?php } ?>
								<?php if (isset($_POST['semua'])){ ?>
										<a href="?hal=cetaklaporanpembayaran&semuapem" target="_BLANK" class="btn btn-info btn-sm pull-right"> Cetak</a>
								<?php } ?>
								<?php if (!isset($_POST['proses']) && !isset($_POST['semua'])){ ?>
										<a href="#" class="btn btn-info btn-sm pull-right" disabled="disabled"> Cetak</a>
                                <?php } ?>
                                
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Blank Page</li>
            </ol>
          </div>
        </div><!-- /.row -->



<section>

<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Laporan</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <!-- disini -->
                  <table class="table table-bordered table-hover table-striped" id="dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Kode Service</th>
                        <th>Pelanggan</th>
                        <th>Total Pembayaran</th>
                        <th>Status Pembayaran</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(isset($_POST['proses'])) {
                    
                    $cek = $laporan->cek_pembayaran_tgl($koneksi,$_POST['tglpem1'],$_POST['tglpem2']);
                    if($cek === false){
                        false;
                    }else{
                    $sum = 0;
                    $qry = $laporan->tampil_lap_pembayaran_tgl($koneksi,$_POST['tglpem1'],$_POST['tglpem2']);
                    foreach($qry as $dat => $data){
                        
                        ?>
                      <tr>
                          <td><?= $dat + 1 ?></td>
                          <td><?= $data['tgl_pembayaran']; ?></td>
                          <td><?= $data['kode_service']; ?></td>
                          <td><?= $data['nama_pelanggan']; ?></td>
                          <td><?= 'Rp. '.number_format($data['total_pembayaran']).',-'; ?></td>
                          
                          <td>
                            <?= $data['status_pembayaran'] == 'lunas' ? '<span class="label label-success" style="border-radius: 100px; font-size: 10px; ">Lunas</span>' : ''; ?>
                          </td>
                          
                        
                        
                    </tr>
                    <?php 
                        $sum+=$data['total_pembayaran'];
                        ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <td colspan="4" style="text-align: center;"><strong>Total</strong></td>
                    <td style="color: black;"><strong>Rp. <?php echo  number_format($sum); ?>,-</strong></td>
                </tfoot>
                <?php } ?>
            <?php 
            }elseif (isset($_POST['semua'])) { 
            ?>
            
            <!-- start -->
            <?php
            $cek = $laporan->cek_pembayaran($koneksi);
                    if($cek === false){
                        false;
                    }else{
                    $sum = 0;
                    $qry = $laporan->tampil_lap_pembayaran($koneksi);
                    foreach($qry as $dat => $data){
                        
                        ?>
                      <tr>
                          <td><?= $dat + 1 ?></td>
                          <td><?= $data['tgl_pembayaran']; ?></td>
                          <td><?= $data['kode_service']; ?></td>
                          <td><?= $data['nama_pelanggan']; ?></td>
                          <td><?= 'Rp. '.number_format($data['total_pembayaran']).',-'; ?></td>
                          
                          <td>
                            <?= $data['status_pembayaran'] == 'lunas' ? '<span class="label label-success" style="border-radius: 100px; font-size: 10px; ">Lunas</span>' : ''; ?>
                          </td>
                        
                    </tr>
                    <?php 
                        $sum+=$data['total_pembayaran'];
                        ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <td colspan="4" style="text-align: center;"><strong>Total</strong></td>
                    <td style="color: black;"><strong>Rp. <?php echo  number_format($sum); ?>,-</strong></td>
                </tfoot>
                <?php } ?>
            <!-- end -->

            <?php }else{ ?>
                <tr>
                        <td colspan="6" align="center">Pilih Opsi Tampil</td>
                      </tr>
                      <tr>
                        <td colspan="4" align="center"><strong>TOTAL</strong></td>
                        <td style="color: red;"><strong>0,-</strong></td>
                      </tr>
            <?php } ?>

            </table>
                  
              </div><!-- table responsive -->
            </div><!-- panel body -->
          </div>
        </div><!-- /.row -->

        <?php include_once 'aksi/mtambahdataservice.php'; ?>
</section>