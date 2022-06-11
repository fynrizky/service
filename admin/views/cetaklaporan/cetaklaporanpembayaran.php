<style type="text/css">
*{
font-family: Arial;
font-size: 12px;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
.container{
	margin-top: 10px;
	width: 800px;
	margin-left: auto;
	margin-right: auto;
}
table.grid{
width:20.4cm ;
font-size: 9pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
background: #F0F0F0;
border: 0.2mm solid #000;
text-align:center;
padding-left:0.2cm;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border:0.2mm solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
h3{
font-size: 10pt;
}
.header{
display: block;
width:20.4cm ;
margin-bottom: 0.3cm;
text-align: center;
margin-top: 10px;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:20cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:20cm ;
}
.page {
font-size:13px;
padding-top: 20px;
}
.footer{
	padding-top: 20px;
	margin-left: 600px;
}
</style>
<?php
// include 'class.crudlaporan.php';
// $perusahaan = new Perusahaan();
// $cetaklaporan = new Cetak_Laporan();
if (isset($_GET['tglpem1']) && isset($_GET['tglpem2'])) {
	$dat = $laporan->tampil_lap_pembayaran_tgl($koneksi,$_GET['tglpem1'],$_GET['tglpem2']);
}else{
	$dat = $laporan->tampil_lap_pembayaran($koneksi);
}
// $per = $perusahaan->tampil_perusahaan($koneksi);
// $namaper = $per['nama_perusahaan'];
// $alamat = $per['alamat'];
// $pemilik = $per['pemilik'];
// $kota = $per['kota'];
$judul_H = "CETAK LAPORAN PEMBAYARAN <br>";
$tgl = date('d-m-Y');
function myheader($judul_H){
echo  "<div class='header'>
		  		<h2>".$judul_H."</h2>
		  	</div>
		<table class='grid'>
		<tr>
			<th width='3%'>No</th>
            <th>Tanggal Pembayaran</th>
            <th>Kode Service</th>
            <th>Pelanggan</th>
            <th>Total Pembayaran</th>
            <th>Status Pembayaran</th>
		</tr>";		
}
function myfooter(){
	echo "</table>";
}
	echo "<div class='container' align='center'>";
	$page =1;
	$gtotal =null;
	foreach ($dat as $index => $data) {
		$no = $index + 1;
		$total = $data['total_pembayaran'];
		$gtotal = $gtotal + $total;
		if(($no % 25) == 1){
		   	if($index + 1 > 1){
		        myfooter();
		        echo "<div class='pagebreak'>
				<div class='page' align='center'>Hal - $page</div>
				</div>";
				$page++;
		  	}
		   	myheader($judul_H);
		}
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$data[tgl_pembayaran]</td>
				<td align='center'>$data[kode_service]</td>
				<td align='center'>$data[nama_pelanggan]</td>
				<td align='left'>Rp. ".number_format($data['total_pembayaran'])."</td>
				<td align='center'>$data[status_pembayaran]</td>
				</tr>";
    }
    if(!isset($_GET['semuapem'])){
        echo "<tr><td colspan='4' align='center'><b>Total</b></td><td><b>Rp. ".number_format($gtotal)."</td></tr>";
    }else{
        echo "<tr><td colspan='4' align='center'><b>Total</b></td><td><b>Rp. ".number_format($gtotal)."</td></tr>";
    }
    
            myfooter();
	echo "<div class='footer'>
			<div>Jakarta, ".date('d-m-Y')."</div>
			<div style='margin-top:90px; margin-right:5px;'>Pimpinan</div>
		</div>";
	echo "<div class='page' align='center'>Hal - ".$page."</div>";
	echo "</div>";
?>
<script type="text/javascript">
	window.print();
</script>