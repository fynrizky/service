<?php 
include_once 'koneksi/koneksi.php';

class Dashboard{
    public function pelanggan($koneksi){

        $qry = $koneksi->query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC ");
        $hitung = $qry->num_rows;
        return $hitung;
    }
    public function mesin($koneksi){

        $qry = $koneksi->query("SELECT * FROM mesin ORDER BY id_mesin DESC ");
        $hitung = $qry->num_rows;
        return $hitung;
    }
    public function dataservice($koneksi){

        $qry = $koneksi->query("SELECT * FROM datservice ORDER BY id_data_service DESC ");
        $hitung = $qry->num_rows;
        return $hitung;
    }

}

class Users {
    public function tampilusers($koneksi){
        $qry = $koneksi->query("SELECT * FROM users ORDER BY id_user DESC");
        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung > 0 )
        {
        return $data;    
        }else{
            error_reporting(0);
        }
    }
    public function hapus($koneksi,$id){
        $koneksi->query("DELETE FROM users WHERE id_user='$id'");
    }
    public function ambilusers($koneksi,$id){
        $qry = $koneksi->query("SELECT * FROM users WHERE id_user='$id'");
        $pecah = $qry->fetch_array();
        return $pecah;
    }
    public function ubahusers($koneksi,$username,$id){
        $koneksi->query("UPDATE users SET username='$username' WHERE id_user='$id'");
    }
}

class Pelanggan {
    public function tampilpelanggan($koneksi){
        $qry = $koneksi->query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung > 0 )
        {
        return $data;    
        }else{
            error_reporting(0);
        }
    }
    public function hapus($koneksi,$id){
        $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id'");
    }
    public function ambilpelanggan($koneksi,$id){
        $qry = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
        $pecah = $qry->fetch_array();
        return $pecah;
    }
    public function tambahpelanggan($koneksi,$namapl,$alamatpl,$emailpl,$notelppl){
        $koneksi->query("INSERT INTO pelanggan(nama_pelanggan,alamat_pelanggan,email_pelanggan,telp_pelanggan)
        VALUES('$namapl','$alamatpl','$emailpl','$notelppl')");
    }
    public function ubahpelanggan($koneksi,$namapl,$alamatpl,$emailpl,$notelppl,$id){
        $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$namapl', alamat_pelanggan='$alamatpl', email_pelanggan='$emailpl', telp_pelanggan='$notelppl'
        WHERE id_pelanggan='$id'");
    }
}

class Teknisi{
    
    public function tampilteknisi($koneksi){
        $qry = $koneksi->query("SELECT * FROM teknisi ORDER BY id_teknisi DESC");
        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung > 0 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }
    }
    
    public function tambahteknisi($koneksi,$namateknisi,$emailteknisi,$telpteknisi){
        $koneksi->query("INSERT INTO teknisi(nama_teknisi,email_teknisi,telp_teknisi)
            VALUES('$namateknisi','$emailteknisi','$telpteknisi')");
    }
        
    public function hapus($koneksi,$id){
        $koneksi->query("DELETE FROM teknisi WHERE id_teknisi='$id'");
    }
    
    public function ambilteknisi($koneksi,$id){
        $qry = $koneksi->query("SELECT * FROM teknisi WHERE id_teknisi='$id'");
        $pecah = $qry->fetch_array();
        return $pecah;
    }
    
    public function ubahteknisi($koneksi,$namateknisi,$emailteknisi,$telpteknisi,$id){
        $koneksi->query("UPDATE teknisi SET nama_teknisi='$namateknisi', email_teknisi='$emailteknisi', telp_teknisi='$telpteknisi'
        WHERE id_teknisi='$id'");
    }
    
}

class Part{
    public function tampilpart($koneksi){
        $qry = $koneksi->query("SELECT * FROM part ORDER BY id_part DESC");
        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung > 0 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }
    }

    public function tambahpart($koneksi,$namapart,$typepart,$hargapart){
        $koneksi->query("INSERT INTO part(nama_part,type_part,harga_part)
            VALUES('$namapart','$typepart','$hargapart')");
    }
    
    public function hapus($koneksi,$id){
        $koneksi->query("DELETE FROM part WHERE id_part='$id'");
    }
    
    public function ambilpart($koneksi,$id){
        $qry = $koneksi->query("SELECT * FROM part WHERE id_part='$id'");
        $pecah = $qry->fetch_array();
        return $pecah;
    }
    
    public function ubahpart($koneksi,$namapart,$typepart,$hargapart,$id){
        $koneksi->query("UPDATE part SET nama_part='$namapart', type_part='$typepart', harga_part='$hargapart'
        WHERE id_part='$id'");
    }
}

class Mesin{
    public function tampilmesin($koneksi){
        $qry = $koneksi->query("SELECT * FROM mesin INNER JOIN pelanggan ON mesin.id_pelanggan=pelanggan.id_pelanggan ORDER BY mesin.id_mesin DESC");
        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung > 0 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }
    }
    
    public function tambahmesin($koneksi,$pelanggan,$mesin,$typemesin,$tglpenerimaan){
        $koneksi->query("INSERT INTO mesin(id_pelanggan,nama_mesin,type_mesin,tgl_penerimaan)
            VALUES('$pelanggan','$mesin','$typemesin','$tglpenerimaan')");
    }
    
    public function hapus($koneksi,$id){
        $koneksi->query("DELETE FROM mesin WHERE id_mesin='$id'");
    }
    
    public function ambilmesin($koneksi,$id){
        $qry = $koneksi->query("SELECT * FROM mesin WHERE id_mesin='$id'");
        $pecah = $qry->fetch_array();
        return $pecah;
    }
    
    public function ubahmesin($koneksi,$namamesin,$typemesin,$id){
        $koneksi->query("UPDATE mesin SET nama_mesin='$namamesin', type_mesin='$typemesin' WHERE id_mesin='$id'");
    }
}

class Dataservice{
    public function tampildataservice($koneksi){
        $qry = $koneksi->query("SELECT * FROM datservice 
        INNER JOIN pelanggan ON datservice.id_pelanggan=pelanggan.id_pelanggan 
        INNER JOIN mesin ON datservice.id_mesin=mesin.id_mesin 
        INNER JOIN teknisi ON datservice.id_teknisi=teknisi.id_teknisi
        ORDER BY datservice.id_data_service DESC");
        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung > 0 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }
    }
    
    public function hapus($koneksi,$id){
        $koneksi->query("DELETE FROM datservice WHERE id_data_service='$id'");
    }
    
    public function tambahdataservice($koneksi,$kode,$pelanggan,$mesin,$teknisi,$id_part,$nama_part,$harga_part,$totalpembayaran,$status,$tgl){
        $koneksi->query("INSERT INTO datservice(kode_service,id_pelanggan,id_mesin,id_teknisi,id_part,nama_part,harga_part,total_pembayaran,status_service,tgl_service)
            VALUES('$kode','$pelanggan','$mesin','$teknisi','$id_part','$nama_part','$harga_part','$totalpembayaran','$status','$tgl')");
    }
    
    // public function ambildataservice($koneksi,$id){
    //     $qry = $koneksi->query("SELECT * FROM datservice WHERE id_data_service='$id'");
    //     $pecah = $qry->fetch_array();
    //     return $pecah;
    // }

    public function ubahdataservice($koneksi,$status_service,$id){
        $koneksi->query("UPDATE datservice SET status_service='$status_service' WHERE id_data_service='$id'");
    }
}
class Pembayaran{
    public function tampilpembayaran($koneksi){
        $qry = $koneksi->query("SELECT * FROM pembayaran 
        INNER JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan  
        INNER JOIN datservice ON pembayaran.id_data_service=datservice.id_data_service
        ORDER BY pembayaran.id_pembayaran DESC");
        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung > 0 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }
    }
    public function tambahpembayaran($koneksi,$pelanggan,$dataservice,$statuspem,$tglpem){
        $koneksi->query("INSERT INTO pembayaran(id_pelanggan,id_data_service,status_pembayaran,tgl_pembayaran)
            VALUES('$pelanggan','$dataservice','$statuspem','$tglpem')");
    }
    
    public function hapus($koneksi,$id){
        $koneksi->query("DELETE FROM pembayaran WHERE id_pembayaran='$id'");
    }  
}

class Laporan {
    public function cek_perbaikan_tgl($koneksi,$tgl1,$tgl2){
        $qry = $koneksi->query("SELECT * FROM datservice 
        INNER JOIN pelanggan ON datservice.id_pelanggan=pelanggan.id_pelanggan 
        INNER JOIN mesin ON datservice.id_mesin=mesin.id_mesin 
        INNER JOIN teknisi ON datservice.id_teknisi=teknisi.id_teknisi
        WHERE datservice.status_service='selesai' AND datservice.tgl_service BETWEEN '$tgl1' AND '$tgl2'");

        $hitung = $qry->num_rows;
        if ($hitung >= 1) {//jika data lebih dari or sama dengan satu 
        //if ($hitung > 0) {//jika data lebih dari 0 
            return true;//brrti ada datanya
        } else {//jika tdk
            return false;//brrti tidak ada datanya
        }
    }
    public function tampil_lap_perbaikan_tgl($koneksi,$tgl1,$tgl2){
        $qry = $koneksi->query("SELECT * FROM datservice 
        INNER JOIN pelanggan ON datservice.id_pelanggan=pelanggan.id_pelanggan 
        INNER JOIN mesin ON datservice.id_mesin=mesin.id_mesin 
        INNER JOIN teknisi ON datservice.id_teknisi=teknisi.id_teknisi
        WHERE datservice.status_service='selesai' AND datservice.tgl_service BETWEEN '$tgl1' AND '$tgl2'");

        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung >= 1 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }

    }
    
    public function cek_perbaikan($koneksi){
        $qry = $koneksi->query("SELECT * FROM datservice 
        INNER JOIN pelanggan ON datservice.id_pelanggan=pelanggan.id_pelanggan 
        INNER JOIN mesin ON datservice.id_mesin=mesin.id_mesin 
        INNER JOIN teknisi ON datservice.id_teknisi=teknisi.id_teknisi
        WHERE datservice.status_service='selesai'");

        $hitung = $qry->num_rows;
        if ($hitung >= 1) {//jika data lebih dari or sama dengan satu 
        //if ($hitung > 0) {//jika data lebih dari 0 
            return true;//brrti ada datanya
        } else {//jika tdk
            return false;//brrti tidak ada datanya
        }
    }
    public function tampil_lap_perbaikan($koneksi){
        $qry = $koneksi->query("SELECT * FROM datservice 
        INNER JOIN pelanggan ON datservice.id_pelanggan=pelanggan.id_pelanggan 
        INNER JOIN mesin ON datservice.id_mesin=mesin.id_mesin 
        INNER JOIN teknisi ON datservice.id_teknisi=teknisi.id_teknisi
        WHERE datservice.status_service='selesai'");

        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung >= 1 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }

    }
    
    public function cek_pembayaran_tgl($koneksi,$tglpem1,$tglpem2){
        $qry = $koneksi->query("SELECT * FROM pembayaran 
        INNER JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan  
        INNER JOIN datservice ON pembayaran.id_data_service=datservice.id_data_service
        WHERE pembayaran.status_pembayaran='lunas' AND pembayaran.tgl_pembayaran BETWEEN '$tglpem1' AND '$tglpem2'");

        $hitung = $qry->num_rows;
        if ($hitung >= 1) {//jika data lebih dari or sama dengan satu 
        //if ($hitung > 0) {//jika data lebih dari 0 
            return true;//brrti ada datanya
        } else {//jika tdk
            return false;//brrti tidak ada datanya
        }
    }
    public function tampil_lap_pembayaran_tgl($koneksi,$tglpem1,$tglpem2){
        $qry = $koneksi->query("SELECT * FROM pembayaran 
        INNER JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan  
        INNER JOIN datservice ON pembayaran.id_data_service=datservice.id_data_service
        WHERE pembayaran.status_pembayaran='lunas' AND pembayaran.tgl_pembayaran BETWEEN '$tglpem1' AND '$tglpem2'");

        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung >= 1 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }

    }
    
    public function cek_pembayaran($koneksi){
        $qry = $koneksi->query("SELECT * FROM pembayaran 
        INNER JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan  
        INNER JOIN datservice ON pembayaran.id_data_service=datservice.id_data_service
        WHERE pembayaran.status_pembayaran='lunas'");

        $hitung = $qry->num_rows;
        if ($hitung >= 1) {//jika data lebih dari or sama dengan satu 
        //if ($hitung > 0) {//jika data lebih dari 0 
            return true;//brrti ada datanya
        } else {//jika tdk
            return false;//brrti tidak ada datanya
        }
    }
    public function tampil_lap_pembayaran($koneksi){
        $qry = $koneksi->query("SELECT * FROM pembayaran 
        INNER JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan  
        INNER JOIN datservice ON pembayaran.id_data_service=datservice.id_data_service
        WHERE pembayaran.status_pembayaran='lunas'");

        while($pecah = $qry->fetch_array()){
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if( $hitung >= 1 )
        {
            return $data;    
        }else{
            error_reporting(0);
        }

    }
}


$dashboard = new Dashboard();
$users = new Users();
$pelanggan = new Pelanggan();
$teknisi = new Teknisi();
$part = new Part();
$mesin = new Mesin();
$dataservice = new Dataservice();
$pembayaran = new Pembayaran();
$laporan = new Laporan();


?>