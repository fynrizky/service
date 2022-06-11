<div class="container">
<div class="row">

        <div class="col-md-12 offset-md-4">
            <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-weight: bold;"> Edit Teknisi</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <!-- disini -->
                            <?php 
                            $row = $teknisi->ambilteknisi($koneksi,$_GET['id']);
                            
                            ?>

                            <?php 
                                if(isset($_POST['save'])){
                                    $teknisi->ubahteknisi($koneksi,$_POST['namateknisi'],$_POST['emailteknisi'],$_POST['telpteknisi'],$_GET['id']);
                                    echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                    echo "<script>window.location.href='?hal=teknisi';</script>";
                                }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="namateknisi">Nama Teknisi</label>
                                <input type="text" id="namateknisi" name="namateknisi" value="<?= $row[1] ?>" class="form-control" placeholder="Nama Teknisi" required="">
                                <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                            </div>
                            <div class="form-group">
                                <label for="emailteknisi">Email Teknisi</label>
                                <input type="text" id="emailteknisi" name="emailteknisi" value="<?= $row[2] ?>" class="form-control" placeholder="Masukan Email Teknisi" required="">
                            </div>
                            <div class="form-group">
                                <label for="telpteknisi">No Telp</label>
                                <input type="number" id="telpteknisi" name="telpteknisi" value="<?= $row[3] ?>" class="form-control" placeholder="Masukan No Telp Teknisi" required>
                            </div>
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?hal=teknisi" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>