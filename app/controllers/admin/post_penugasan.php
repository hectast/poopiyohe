<?php
include 'app/controllers/admin/function_penugasan.php';
include 'app/flash_message.php';

if(isset($_POST['tambah_auditor'])){
    $id = $_POST['id'];
    $_SESSION['keranjang'][$id] = $id ;
    flash("msg_sukses_data", "Auditor Berhasil Ditambahkan");
    
}else if(isset($_POST['hapus_keranjang'])){
    $id = $_POST['id'];
    unset($_SESSION['keranjang'][$id]);
    flash("msg_sukses_hapus_data", "Auditor Berhasil Dihapus");
}else if(isset($_POST['addpenugasan'])){
    $no_st = $_POST['no_st'];
    $nama_penugasan = $_POST['nama_penugasan'];
    $tgl_st = $_POST['tgl_st'];
    $jp = $_POST['jenis_penugasan'];
    if($jp != 'Lainnya'){
        $jenis_penugasan = $_POST['jenis_penugasan'];
    }else{
        $jenis_penugasan = $_POST['lainnya'];
    }

    $auditan_in = $_POST['vertikal'];
    $auditan_opd = $_POST['opd'];


    $insert = $mysqli->query("INSERT INTO penugasan VALUES ('','$no_st','$tgl_st','$nama_penugasan','$jenis_penugasan','$auditan_in','$auditan_opd','Belum Selesai')");
    $id_terakhir = $mysqli->insert_id;




    foreach($_SESSION['keranjang'] as $id){
        $query = $mysqli->query("SELECT * FROM auditor WHERE id ='$id'");
        $tampil = $query->fetch_array();
        $idauditor = $tampil['id'];
        $nama = $tampil['nama'];
        $mysqli->query("INSERT INTO penugasan_auditor VALUES('','$id_terakhir','$idauditor')");
        
    }
    unset($_SESSION['keranjang']);
    echo"
    <script>
        alert('Data Berhasil Disimpan');
        window.location.href='http://localhost/poopiyohe/data_penugasan';
    </script>
    ";
}

?>