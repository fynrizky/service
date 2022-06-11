<div class="modal fade" id="tambahpembayaran" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Pembayaran</h4>
      </div>
            <div class="modal-body">

              <?php 
                if(isset($_POST['simpanpembayaran'])){
                
                  $statuspem = "lunas";
                  $pembayaran->tambahpembayaran($koneksi,$_POST['pelanggan'],$_POST['dataservice'],$statuspem,$_POST['tglpem']);
                  echo "<script>alert('Data Berhasil Di Tambah');</script>";
                  echo "<script>window.location.href='?hal=pembayaran';</script>";
                }
              ?>

                <form action="" id="forminput" method="post" enctype="multipart/form-data">
                   
                <div class="form-group">
                        <label for="pelanggan">Pelanggan</label>
                        <?php $qry = $pelanggan->tampilpelanggan($koneksi); ?>
                        <select class="form-control" name="pelanggan" id="pelanggan">
                            <option value="">Tambah Pelanggan</option>
                            <?php foreach($qry as $dat => $data): ?>
                                <option value="<?= $data['id_pelanggan'] ?>"><?= $data['nama_pelanggan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <div class="form-group">
                        <label for="dataservice">Kode Service</label>
                        <?php $qry = $dataservice->tampildataservice($koneksi); ?>
                        <select class="form-control" name="dataservice" id="dataservice">
                            <option value="">Kode Data Service</option>
                            <?php foreach($qry as $dat => $data): ?>
                                <option value="<?= $data['id_data_service'] ?>"><?= $data['kode_service'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="tglpem">Tanggal Pembayaran</label>
                        <input type="date" id="tglpem" name="tglpem" class="form-control" value="<?= date('Y-m-d'); ?>" placeholder="Tgl Pembayaran" required>
                    </div>
                    
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="formbtn" class="btn btn-primary btn-sm" name="simpanpembayaran"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->