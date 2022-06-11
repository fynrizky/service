<div class="row">
          <div class="col-lg-12">
            <h1>Laporan Perbaikan <small>A Blank Slate</small></h1>
            <div class="row">
		<div class="col-lg-12">
        <form method="post" class="form-inline" style="margin-bottom: 20px;">
                  <div class="col-lg">
                    <div class="form-group">
                      <input type="date" id="tgl1" value="<?= date('Y-m-d') ?>" class="form-control" name="tgl1">
                    </div>
                  </div>
                  <br>
                  <label> Hingga </label>
                  <div class="col-lg">
                    <div class="form-group">
                      <input type="date" id="tgl2" value="<?= date('Y-m-d') ?>" class="form-control" name="tgl2">
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
										<a href="?hal=cetaklaporanperbaikan&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>" target="_BLANK" class="btn btn-info btn-sm pull-right"> Cetak</a>
								 <?php } ?>
								<?php if (isset($_POST['semua'])){ ?>
										<a href="?hal=cetaklaporanperbaikan&semua" target="_BLANK" class="btn btn-info btn-sm pull-right"> Cetak</a>
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
                        <!-- <th>Tanggal</th> -->
                        <th>Kode Service</th>
                        <th>Deskripsi</th>
                        <th>Total Pembayaran</th>
                        <th>Nama Part</th>
                        <th>Harga Part</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(isset($_POST['proses'])) {
                    
                    $cek = $laporan->cek_perbaikan_tgl($koneksi,$_POST['tgl1'],$_POST['tgl2']);
                    if($cek === false){
                        false;
                    }else{
                    $sum = 0;
                    $qry = $laporan->tampil_lap_perbaikan_tgl($koneksi,$_POST['tgl1'],$_POST['tgl2']);
                    foreach($qry as $dat => $data){
                        
                        ?>
                      <tr>
                          <td><?= $dat + 1 ?></td>
                          <td><?= $data['kode_service']; ?></td>
                        <td>
                            <strong>Pelanggan :</strong>
                            
                            <?=  ucwords($data['nama_pelanggan']); ?>
                            <br>
                          <strong>Mesin :</strong>
                          <?= ucwords($data['nama_mesin']); ?>
                          <br>
                          <strong>Teknisi :</strong>
                          <?= ucwords($data['nama_teknisi']); ?>
                          <br>
                          <strong>Tgl Penerimaan :</strong>
                          <br>
                          <?= date('d-m-Y', strtotime($data['tgl_service'])); ?>
                        </td> 
                        
                        <td><?= 'Rp. '.number_format($totalpembayaran = $data['total_pembayaran']-$data['harga_part']).',-'; ?></td>
                        <td><?= $data['nama_part']; ?></td>
                        <td><?= 'Rp. '.number_format($data['harga_part']).',-'; ?></td>
                        
                        <td><?= 'Rp. '.number_format($data['total_pembayaran']).',-'; ?></td><!-- fungsi total pembayaran ada di mtambahdataservice -->
                        
                        <td>
                          <?= $data['status_service'] == 'menunggu' ? '<span class="label label-warning" style="border-radius: 100px; font-size: 10px; ">Menunggu</span>' :
                          ($data['status_service'] == 'proses' ? '<span class="label label-primary" style="border-radius: 100px; font-size: 10px; ">Proses</span>' :
                          '<span class="label label-success" style="border-radius: 100px; font-size: 10px; ">Selesai</span>'); ?>
                        </td>
                        
                    </tr>
                    <?php 
                        $sum+=$data['total_pembayaran'];
                        ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <td colspan="6" style="text-align: center;"><strong>Total</strong></td>
                    <td style="color: black;"><strong>Rp. <?php echo  number_format($sum); ?>,-</strong></td>
                </tfoot>
                <?php } ?>
            <?php 
            }elseif (isset($_POST['semua'])) { 
            ?>
            
            <!-- start -->
            <?php
            $cek = $laporan->cek_perbaikan($koneksi);
                    if($cek === false){
                        false;
                    }else{
                    $sum = 0;
                    $qry = $laporan->tampil_lap_perbaikan($koneksi);
                    foreach($qry as $dat => $data){
                        
                        ?>
                      <tr>
                          <td><?= $dat + 1 ?></td>
                          <td><?= $data['kode_service']; ?></td>
                        <td>
                            <strong>Pelanggan :</strong>
                            
                            <?=  ucwords($data['nama_pelanggan']); ?>
                            <br>
                          <strong>Mesin :</strong>
                          <?= ucwords($data['nama_mesin']); ?>
                          <br>
                          <strong>Teknisi :</strong>
                          <?= ucwords($data['nama_teknisi']); ?>
                          <br>
                          <strong>Tgl Penerimaan :</strong>
                          <br>
                          <?= date('d-m-Y', strtotime($data['tgl_service'])); ?>
                        </td> 
                        
                        <td><?= 'Rp. '.number_format($totalpembayaran = $data['total_pembayaran']-$data['harga_part']).',-'; ?></td>
                        <td><?= $data['nama_part']; ?></td>
                        <td><?= 'Rp. '.number_format($data['harga_part']).',-'; ?></td>
                        
                        <td><?= 'Rp. '.number_format($data['total_pembayaran']).',-'; ?></td><!-- fungsi total pembayaran ada di mtambahdataservice -->
                        
                        <td>
                          <?= $data['status_service'] == 'menunggu' ? '<span class="label label-warning" style="border-radius: 100px; font-size: 10px; ">Menunggu</span>' :
                          ($data['status_service'] == 'proses' ? '<span class="label label-primary" style="border-radius: 100px; font-size: 10px; ">Proses</span>' :
                          '<span class="label label-success" style="border-radius: 100px; font-size: 10px; ">Selesai</span>'); ?>
                        </td>
                        
                    </tr>
                    <?php 
                        $sum+=$data['total_pembayaran'];
                        ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <td colspan="6" style="text-align: center;"><strong>Total</strong></td>
                    <td style="color: black;"><strong>Rp. <?php echo  number_format($sum); ?>,-</strong></td>
                </tfoot>
                <?php } ?>
            <!-- end -->

            <?php }else{ ?>
                <tr>
                        <td colspan="8" align="center">Pilih Opsi Tampil</td>
                      </tr>
                      <tr>
                        <td colspan="6" align="center"><strong>TOTAL</strong></td>
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