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
    $idtugas = $_POST['idtugas'];
    $id_pemda = $_POST['id_pemda'];
    $id_instansi = $_POST['id_instansi'];

    $insert = $mysqli->query("INSERT INTO penugasan VALUES ('','$id_instansi','$id_pemda','Sementara')");
    $id_terakhir = $mysqli->insert_id;

    foreach($_SESSION['keranjang'] as $id){
        $query = $mysqli->query("SELECT * FROM auditor WHERE id ='$id'");
        $tampil = $query->fetch_array();
        $idauditor = $tampil['id'];
        $nama = $tampil['nama'];
        $mysqli->query("INSERT INTO auditor_penugasan VALUES('','$id_terakhir','$idauditor')");
        
    }
    unset($_SESSION['keranjang']);
    echo"
    <script>
        alert('Data Berhasil Disimpan');
        window.location.href='http://localhost/poopiyohe/data_penugasan';
    </script>
    ";
    

}
