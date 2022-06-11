<div class="modal fade" id="tambahpelanggan" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Pelanggan</h4>
      </div>
            <div class="modal-body">
            <!-- disini -->
            <?php
            if(isset($_POST['simpanpl'])) {
              $pelanggan->tambahpelanggan($koneksi,$_POST['namapl'],$_POST['alamatpl'],$_POST['emailpl'],$_POST['notelppl']);
              echo "<script>alert('Data Berhasil Di Tambah');</script>";
              echo "<script>window.location.href='?hal=pelanggan';</script>";
            }
            ?>

                <form action="" id="forminput" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namapl">Nama Pelanggan</label>
                        <input type="text" id="namapl" name="namapl" class="form-control" placeholder="Masukan Nama Pelanggan" required>
                        <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamatpl">Alamat Pelanggan</label>
                        <textarea type="text" id="alamatpl" name="alamatpl" class="form-control" placeholder="Alamat Pelanggan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="emailpl">Email Pelanggan</label>
                        <input type="text" id="emailpl" name="emailpl" class="form-control" placeholder="Masukan Email Pelanggan" required="">
                    </div>
                    
                    <div class="form-group">
                        <label for="notelppl">No Telp</label>
                        <input type="number" id="notelppl" name="notelppl" class="form-control" placeholder="Masukan No Telp Pelanggan" required>
                    </div>
                    
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="formbtn" class="btn btn-primary btn-sm" name="simpanpl"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->