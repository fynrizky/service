<div class="modal fade" id="tambahmesin" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Mesin</h4>
      </div>
            <div class="modal-body">
            <!-- disini -->
            <?php 
                if(isset($_POST['simpanmesin'])){
                  $mesin->tambahmesin($koneksi,$_POST['pelanggan'],$_POST['namamesin'],$_POST['typemesin'],$_POST['tglpenerimaan']);
                  echo "<script>alert('Data Berhasil Di Tambah');</script>";
                  echo "<script>window.location.href='?hal=mesin';</script>";
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
                        <label for="namamesin">Mesin</label>
                        <input type="text" id="namamesin" name="namamesin" class="form-control" placeholder="Masukan Nama Mesin" required>
                    </div>
                    <div class="form-group">
                        <label for="typemesin">Type Mesin</label>
                        <input type="text" id="typemesin" name="typemesin" class="form-control" placeholder="Masukan Type Mesin" required>
                    </div>
                    <div class="form-group">
                        <label for="tglpenerimaan">Tanggal Penerimaan Mesin</label>
                        <input type="date" id="tglpenerimaan" name="tglpenerimaan" value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="Masukan Tgl Penerimaan" required>
                    </div>
                    
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="formbtn" class="btn btn-primary btn-sm" name="simpanmesin"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->