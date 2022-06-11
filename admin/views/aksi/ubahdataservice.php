<div class="container">
<div class="row">

        <div class="col-md-12 offset-md-4">
            <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-weight: bold;"> Update Data Service</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <!-- disini -->
                            <?php 
                            // $row = $dataservice->ambildataservice($koneksi,$_GET['id']);
                            
                            ?>

                            <?php 
                                if(isset($_POST['save'])){
                                    $dataservice->ubahdataservice($koneksi,$_POST['status_service'],$_GET['id']);
                                    echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                    echo "<script>window.location.href='?hal=dataservice';</script>";
                                }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                           
                            <div class="form-group">
                                <label for="status_service">Status</label>
                                <select name="status_service" id="status_service" class="form-control">
                                    <option value="menunggu">Menunggu</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>     
                            </div>
                          
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?hal=dataservice" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>