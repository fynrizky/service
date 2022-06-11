<div class="modal fade" id="tambahdataservice" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Service</h4>
      </div>
            <div class="modal-body">
            <!-- disini -->
            <?php 
                if(isset($_POST['simpandataservice'])){
                  $kode = 'SV'.$_POST['pelanggan'].$_POST['mesin'].$_POST['teknisi'];
                  $pelanggan = $_POST['pelanggan'];
                  $mesin = $_POST['mesin'];
                  $teknisi = $_POST['teknisi'];

                  $exp = $_POST['part'];
                    $explode = explode("/",$exp);
                    $id_part = $explode[0];
                    $nama_part = $explode[1];
                    $harga_part = $explode[2];
                    
                    if($id_part < 1){
                        $id_part = '0';
                        $nama_part = 'tidak ada';
                        $harga_part = '0';
                    }else{
                        $id_part = $explode[0];
                        $nama_part = $explode[1];
                        $harga_part = $explode[2];
                     
                  }
                  $totalpembayaran = $_POST['totalpembayaran'] + $harga_part;
                  $status = "menunggu";
                  $tgl = date('Y-m-d');

                  $dataservice->tambahdataservice($koneksi,$kode,$pelanggan,$mesin,$teknisi,$id_part,$nama_part,$harga_part,$totalpembayaran,$status,$tgl);
                  
                  echo "<script>alert('Data Berhasil Di Tambah');</script>";
                  echo "<script>window.location.href='?hal=dataservice';</script>";
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
                        <label for="mesin">Mesin</label>
                        <?php $qry = $mesin->tampilmesin($koneksi); ?>
                        <select class="form-control" name="mesin" id="mesin">
                            <option value="">Tambah Mesin</option>
                            <?php foreach($qry as $dat => $data): ?>
                                <option value="<?= $data['id_mesin'] ?>"><?= $data['nama_mesin'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="teknisi">Teknisi</label>
                        <?php $qry = $teknisi->tampilteknisi($koneksi); ?>
                        <select class="form-control" name="teknisi" id="teknisi">
                            <option value="">Tambah Teknisi</option>
                            <?php foreach($qry as $dat => $data): ?>
                                <option value="<?= $data['id_teknisi'] ?>"><?= $data['nama_teknisi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="part">Part</label>
                        <?php $qry = $part->tampilpart($koneksi); ?>
                        <select class="form-control" name="part" id="part">
                            <option value="">Tambah Part</option>
                            <?php foreach($qry as $dat => $data): ?>
                                <option value="<?= $data['id_part']."/".$data['nama_part']."/".$data['harga_part']; ?>"><?= $data['nama_part'] ?></option>
                                <?php endforeach; ?>
                                <option value="0">Tidak Tambah Part</option>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="totalpembayaran">Total Pembayaran</label>
                        <input type="number" id="totalpembayaran" name="totalpembayaran" class="form-control" placeholder="Masukan Total Pembayaran" required>
                    </div>
                    
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="formbtn" class="btn btn-primary btn-sm" name="simpandataservice"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->