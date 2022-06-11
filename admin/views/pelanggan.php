<div class="row">
          <div class="col-lg-12">
            <h1>Tabel Pelanggan <small>A Blank Slate</small></h1>
            <button type="button" class="btn btn-primary btn-sm pull-right" id="tambahdatapelanggan" data-toggle="modal" data-target="#tambahpelanggan">
                <i class="fa fa-plus"></i> Tambah 
            </button>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Blank Page</li>
            </ol>
          </div>
        </div><!-- /.row -->

<section>


<?php 
if(@$_GET['hapus']){
  $pelanggan->hapus($koneksi,$_GET['hapus']);
  echo "<script>alert('Data Berhasil Di Hapus');</script>";
  echo "<script>window.location.href='?hal=pelanggan';</script>";
}

?>


<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Pelanggan</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <!-- disini -->
                  <table class="table table-bordered table-hover table-striped" id="dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat Pelanggan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <?php 
                    $qry = $pelanggan->tampilpelanggan($koneksi);
                    foreach($qry as $dat => $data){
                    ?>
                      <tr>
                        <td><?= $dat + 1 ?></td>
                        <td><?= $data['nama_pelanggan'] ?></td>
                        <td><?= $data['alamat_pelanggan'] ?></td>
                        <td><?= $data['email_pelanggan'] ?></td>
                        <td><?= $data['telp_pelanggan'] ?></td>
                        <td>
                        <a href="?hal=ubahpelanggan&id=<?= $data['id_pelanggan'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</a>
                        <a href="?hal=pelanggan&hapus=<?= $data['id_pelanggan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Dihapus ?')"><i class="fa fa-trash-o"></i>Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  
              </div><!-- table responsive -->
            </div><!-- panel body -->
          </div>
        </div><!-- /.row -->
        
        <?php include_once 'aksi/mtambahpelanggan.php'; ?>
        
  </section>