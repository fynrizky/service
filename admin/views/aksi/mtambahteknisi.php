<div class="modal fade" id="tambahteknisi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Teknisi</h4>
      </div>
            <div class="modal-body">

              <?php 
                if(isset($_POST['simpanteknisi'])){
                  $teknisi->tambahteknisi($koneksi,$_POST['namateknisi'],$_POST['emailteknisi'],$_POST['telpteknisi']);
                  echo "<script>alert('Data Berhasil Di Tambah');</script>";
                  echo "<script>window.location.href='?hal=teknisi';</script>";
                }
              ?>

                <form action="" id="forminput" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label for="namateknisi">Nama Teknisi</label>
                        <input type="text" id="namateknisi" name="namateknisi" class="form-control" placeholder="Masukan Nama Teknisi" required>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="emailteknisi">Email Teknisi</label>
                        <input type="text" id="emailteknisi" name="emailteknisi" class="form-control" placeholder="Masukan Email Teknisi" required>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="telpteknisi">No Telp</label>
                        <input type="number" id="telpteknisi" name="telpteknisi" class="form-control" placeholder="Masukan No Telp Pelanggan" required>
                    </div>
                    
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="formbtn" class="btn btn-primary btn-sm" name="simpanteknisi"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->