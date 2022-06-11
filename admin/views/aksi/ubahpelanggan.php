<div class="container">
<div class="row">

        <div class="col-md-12 offset-md-4">
            <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-weight: bold;"> Edit Pelanggan</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <!-- disini -->
                            <?php 
                            $row = $pelanggan->ambilpelanggan($koneksi,$_GET['id']);
                            
                            ?>

                            <?php 
                                if(isset($_POST['save'])){
                                    $pelanggan->ubahpelanggan($koneksi,$_POST['namapl'],$_POST['alamatpl'],$_POST['emailpl'],$_POST['notelppl'],$_GET['id']);
                                    echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                    echo "<script>window.location.href='?hal=pelanggan';</script>";
                                }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="namapl">Nama Pelanggan</label>
                                <input type="text" id="namapl" name="namapl" value="<?= $row['nama_pelanggan'] ?>" class="form-control" placeholder="Nama Pelanggan" required="">
                                <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                            </div>
                            <div class="form-group">
                                <label for="alamatpl">Alamat Pelanggan</label>
                                <textarea type="text" id="alamatpl" name="alamatpl" class="form-control" placeholder="Alamat Pelanggan" required><?= $row['alamat_pelanggan'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="emailpl">Email Pelanggan</label>
                                <input type="text" id="emailpl" name="emailpl" value="<?= $row['email_pelanggan'] ?>" class="form-control" placeholder="Masukan Email Pelanggan" required="">
                            </div>
                            <div class="form-group">
                                <label for="notelppl">No Telp</label>
                                <input type="number" id="notelppl" name="notelppl" value="<?= $row['telp_pelanggan'] ?>" class="form-control" placeholder="Masukan No Telp Pelanggan" required>
                            </div>
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?hal=pelanggan" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>