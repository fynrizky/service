<div class="row">
          <div class="col-lg-12">
            <h1>Tabel Service <small>SAMAFITRO</small></h1>
            <button type="button" class="btn btn-primary btn-sm pull-right" id="tambahdatadatservice" data-toggle="modal" data-target="#tambahdataservice">
                <i class="fa fa-plus"></i> Tambah 
            </button>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> TEKNISI</a></li>
              <li class="active"><i class="icon-file-alt"></i> Tambah Data</li>
            </ol>
          </div>
        </div><!-- /.row -->

        
<?php 
if(@$_GET['hapus']){
  $dataservice->hapus($koneksi,$_GET['hapus']);
  echo "<script>alert('Data Berhasil Di Hapus');</script>";
  echo "<script>window.location.href='?hal=dataservice';</script>";
}

?>


<section>

<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Service</h3>
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
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sum = 0;
                    $qry = $dataservice->tampildataservice($koneksi);
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
                        <td>
                        <a href="?hal=ubahdataservice&id=<?= $data['id_data_service'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Update</a>
                        <a href="?hal=dataservice&hapus=<?= $data['id_data_service'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Dihapus ?')"><i class="fa fa-trash-o"></i> Hapus</a>
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
                  </table>
                  
              </div><!-- table responsive -->
            </div><!-- panel body -->
          </div>
        </div><!-- /.row -->

        <?php include_once 'aksi/mtambahdataservice.php'; ?>
</section>