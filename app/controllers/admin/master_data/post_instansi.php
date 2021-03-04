<?php

include 'app/controllers/admin/master_data/function_instansi.php';
include 'app/flash_message.php';

if (isset($_POST['simpan_data'])) {
    $instansi = $_POST['instansi'];
    $id_kemlem = $_POST['id_kemlem'];

    simpan_data($instansi, $id_kemlem, $mysqli);
    flash("msg_simpan_data", "Data berhasil di simpan");
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

if (isset($_POST['ubah_data'])) {
    $id = $_POST['id'];
    $instansi = $_POST['instansi'];
    $id_kemlem = $_POST['id_kemlem'];
    $token_edit = $_POST['token_edit'];

    $tkn = 'sam_san_tech)';
    $token = md5("$tkn:$id");

    if ($token_edit === $token) {
        ubah_data($id, $instansi, $id_kemlem, $mysqli);
        flash("msg_ubah_data", "Data berhasil di ubah");
    }
}