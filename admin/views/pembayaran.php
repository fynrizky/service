<div class="row">
          <div class="col-lg-12">
            <h1>Tabel Pembayaran <small>A Blank Slate</small></h1>
            <button type="button" class="btn btn-primary btn-sm pull-right" id="tambahdatapembayaran" data-toggle="modal" data-target="#tambahpembayaran">
                <i class="fa fa-plus"></i> Tambah 
            </button>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Blank Page</li>
            </ol>
          </div>
        </div><!-- /.row -->

        
<?php 
if(@$_GET['hapus']){
  $pembayaran->hapus($koneksi,$_GET['hapus']);
  echo "<script>alert('Data Berhasil Di Hapus');</script>";
  echo "<script>window.location.href='?hal=pembayaran';</script>";
}

?>


<section>

<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Pembayaran</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <!-- disini -->
                  <table class="table table-bordered table-hover table-striped" id="dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Kode Service</th>
                        <th>Total Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $qry = $pembayaran->tampilpembayaran($koneksi);
                    foreach($qry as $dat => $data){

                      ?>
                      <tr>
                        <td><?= $dat + 1 ?></td>
                        <td><?= $data['nama_pelanggan'] ?></td>
                        <td><?= $data['kode_service'] ?></td>
                        <td><?= 'Rp. '.number_format($data['total_pembayaran']).',-'; ?></td>
                        <td>
                          <?= $data['status_pembayaran'] == "lunas" ? '<span class="label label-success" style="border-radius: 100px; font-size: 10px; ">Lunas</span>' : '' ?>
                        </td>
                        <td><?= date('d-m-Y', strtotime($data['tgl_pembayaran'])) ?></td>
                        <td>
                        <!-- <a href="?hal=ubahpembayaran&id=1" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</a> -->
                        <a href="?hal=pembayaran&hapus=<?= $data['id_pembayaran'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Dihapus ?')"><i class="fa fa-trash-o"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  
              </div><!-- table responsive -->
            </div><!-- panel body -->
          </div>
        </div><!-- /.row -->

        <?php include_once 'aksi/mtambahpembayaran.php'; ?>
</section>