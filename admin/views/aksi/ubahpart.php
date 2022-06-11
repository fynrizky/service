<div class="container">
<div class="row">

        <div class="col-md-12 offset-md-4">
            <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-weight: bold;"> Edit Part</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <!-- disini -->
                            <?php 
                            $row = $part->ambilpart($koneksi,$_GET['id']);
                            
                            ?>

                            <?php 
                                if(isset($_POST['save'])){
                                    $part->ubahpart($koneksi,$_POST['namapart'],$_POST['typepart'],$_POST['hrgpart'],$_GET['id']);
                                    echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                    echo "<script>window.location.href='?hal=part';</script>";
                                }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="namapart">Nama Part</label>
                                <input type="text" id="namapart" name="namapart" value="<?= $row[1] ?>" class="form-control" placeholder="Nama Part" required="">
                                <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                            </div>
                            <div class="form-group">
                                <label for="typepart">Type Part</label>
                                <input type="text" id="typepart" name="typepart" value="<?= $row[2] ?>" class="form-control" placeholder="Type Part" required="">
                            </div>
                            <div class="form-group">
                                <label for="hrgpart">Harga Part</label>
                                <input type="number" id="hrgpart" name="hrgpart" value="<?= $row[3] ?>" class="form-control" placeholder="Harga" required>
                            </div>
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?hal=part" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>