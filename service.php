<section>
<div class="container" style="margin-top:20px;">

    <div class="card">
        <h5 class="card-header">Data Service</h5>
        <div class="card-body">


            <!-- Search form -->
            <form class="form-inline ml-auto" method="post">
                <div class="md-form my-0">
                    <input class="form-control" type="text" name="pencarian" placeholder="Search Masukan Kode" aria-label="Search">
                </div>
                <button class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit" id="formbtn" name="search"> Search</button>
            </form>
            <hr>
            
            <div class="table-responsive">

                <table class="table table-bordered table-hover table-striped" id="dataTable">
                <thead>
                      <tr>
                        <th>No</th>
                        <!-- <th>Tanggal</th> -->
                        <th>Kode Service</th>
                        <th>Deskripsi</th>
                        <th>Total Pembayaran</th>
                        <th>Nama Part</th>
                        <th>Harga Part</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    if(isset($_POST['search'])){

                    
                    ?>
                    <?php 
                    $no = 1;
                    $qry = $koneksi->query("SELECT * FROM datservice 
                    INNER JOIN pelanggan ON datservice.id_pelanggan=pelanggan.id_pelanggan 
                    INNER JOIN mesin ON datservice.id_mesin=mesin.id_mesin 
                    INNER JOIN teknisi ON datservice.id_teknisi=teknisi.id_teknisi
                    WHERE kode_service='$_POST[pencarian]' ORDER BY datservice.id_data_service DESC");
                    while($data = $qry->fetch_array()){

                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['kode_service']; ?></td>
                        <td>
                          <strong>Pelanggan :</strong>
                          
                          <?=  ucwords($data['nama_pelanggan']); ?>
                          <br>
                          <strong>Mesin :</strong>
                          <?= ucwords($data['nama_mesin']); ?>
                          <br>
                          <strong>Teknisi :</strong>
                          <?= ucwords($data['nama_teknisi']); ?>
                          <br>
                          <strong>Tgl Penerimaan :</strong>
                          <br>
                          <?= date('d-m-Y', strtotime($data['tgl_penerimaan'])); ?>
                        </td> 
                        
                        <td><?= 'Rp. '.number_format($totalpembayaran = $data['total_pembayaran']-$data['harga_part']).',-'; ?></td>
                        <td><?= $data['nama_part']; ?></td>
                        <td><?= 'Rp. '.number_format($data['harga_part']).',-'; ?></td>
                      
                        <td><?= 'Rp. '.number_format($data['total_pembayaran']).',-'; ?></td><!-- fungsi total pembayaran ada di mtambahdataservice -->
                        
                        <td>
                          <?= $data['status_service'] == 'menunggu' ? '<span class="badge badge-pill badge-warning" style="border-radius: 100px; font-size: 12px; ">Menunggu</span>' :
                          ($data['status_service'] == 'proses' ? '<span class="badge badge-pill badge-primary" style="border-radius: 100px; font-size: 12px; ">Proses</span>' :
                          '<span class="badge badge-pill badge-success" style="border-radius: 100px; font-size: 12px; ">Selesai</span>'); ?>
                        </td>
                        
                      </tr>
                      <?php 
                        // $sum+=$data['total_pembayaran'];
                      ?>
                    <?php } ?>
                    <?php } ?>
                    </tbody>
                    <!-- <tfoot>
                            <td colspan="6" style="text-align: center;"><strong>Total</strong></td>
                            <td style="color: black;"><strong>Rp. <?php echo  number_format($sum); ?>,-</strong></td>
                    </tfoot> -->
                </table>
            </div>
            
            </div>
    </div>

</div>
</section>