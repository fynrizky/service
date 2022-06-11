<div class="container">
<div class="row">

        <div class="col-md-12 offset-md-4">
            <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-weight: bold;"> Edit Users</h3>
                        </div>
                        <hr />
                            <?php 
                            $row = $users->ambilusers($koneksi,$_GET['id']);
                            
                            ?>

                            <?php 
                                if(isset($_POST['save'])){
                                    $users->ubahusers($koneksi,$_POST['user'],$_GET['id']);
                                    echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                    echo "<script>window.location.href='?hal=users';</script>";
                                }
                            ?>
                        <div class="box-body">
                            <!-- disini -->
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user">Nama Users</label>
                                <input type="text" id="user" name="user" value="<?= $row['username'] ?>" class="form-control" placeholder="Username" required="">
                                <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                            </div>
                            
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?hal=users" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>