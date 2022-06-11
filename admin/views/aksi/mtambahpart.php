<div class="modal fade" id="tambahpart" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Part</h4>
      </div>
            <div class="modal-body">
            <!-- disini -->
            <?php 
                if(isset($_POST['simpanpart'])){
                  $part->tambahpart($koneksi,$_POST['namapart'],$_POST['typepart'],$_POST['hrgpart']);
                  echo "<script>alert('Data Berhasil Di Tambah');</script>";
                  echo "<script>window.location.href='?hal=part';</script>";
                }
              ?>

                <form action="" id="forminput" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label for="namapart">Nama part</label>
                        <input type="text" id="namapl" name="namapart" class="form-control" placeholder="Masukan Nama Part" required>
                    </div>
                    <div class="form-group">
                        <label for="typepart">Type part</label>
                        <input type="text" id="typepart" name="typepart" class="form-control" placeholder="Masukan Type Part" required>
                    </div>
                    <div class="form-group">
                        <label for="hrgpart">Harga Part</label>
                        <input type="number" id="hrgpart" name="hrgpart" class="form-control" placeholder="Harga Part" required>
                    </div>
                    
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="formbtn" class="btn btn-primary btn-sm" name="simpanpart"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->