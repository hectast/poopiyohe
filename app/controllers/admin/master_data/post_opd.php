<?php 

include 'app/controllers/admin/master_data/function_opd.php';
include 'app/flash_message.php';


if (isset($_POST['simpan_data'])) {
    $opd = $_POST['opd'];
    $id_pemda = $_POST['id_pemda'];

    simpan_data($opd,$id_pemda,$mysqli);
    flash("msg_simpan_data", "Data berhasil di simpan");
}

if (isset($_POST['ubah_data'])) {
    $id = $_POST['id'];
    $opd = $_POST['opd'];
    $id_pemda = $_POST['id_pemda'];
    $token_edit = $_POST['token_edit'];

    $tkn = 'sam_san_tech)';
    $token = md5("$tkn:$id");

    if ($token_edit === $token) {
        ubah_data($id, $opd, $id_pemda, $mysqli);
        flash("msg_ubah_data", "Data berhasil di ubah");
    }
}

if (isset($_POST['hapus_data'])) {
    $id = $_POST['id'];
    $token_hapus = $_POST['token_hapus'];

    $tkn = 'sam_san_tech)';
    $token = md5("$tkn:$id");

    if ($token_hapus === $token) {
        hapus_data($id, $mysqli);
        flash("msg_hapus_data", "Data berhasil di hapus");
    }
}

 ?>