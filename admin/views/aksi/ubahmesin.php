<div class="container">
<div class="row">

        <div class="col-md-12 offset-md-4">
            <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-weight: bold;"> Edit Mesin</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <!-- disini -->
                            <?php 
                            $row = $mesin->ambilmesin($koneksi,$_GET['id']);
                            
                            ?>

                            <?php 
                                if(isset($_POST['save'])){
                                    $mesin->ubahmesin($koneksi,$_POST['namamesin'],$_POST['typemesin'],$_GET['id']);
                                    echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                    echo "<script>window.location.href='?hal=mesin';</script>";
                                }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="namamesin">Nama Mesin</label>
                                <input type="text" id="namamesin" name="namamesin" value="<?= $row[2] ?>" class="form-control" placeholder="Nama Mesin" required="">
                                <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                            </div>
                            <div class="form-group">
                                <label for="typemesin">Type Mesin</label>
                                <input type="text" id="typemesin" name="typemesin" value="<?= $row[3] ?>" class="form-control" placeholder="Type Mesin" required="">
                            </div>
                          
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?hal=mesin" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>