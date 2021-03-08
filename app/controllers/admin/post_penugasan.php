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
}
