<?php

include 'app/controllers/admin/daftar_audit/function_auditor.php';
include 'app/flash_message.php';

if (isset($_POST['simpan'])) {

    $namaauditor = $_POST['namaauditor'];

    simpan_data($namaauditor, $mysqli);
    flash("msg_simpan_data", "Data berhasil ditambahkan");
}


if (isset($_POST['hapus_data'])) {
    $id = $_POST['id'];
    $token_hapus = $_POST['token_hapus'];

    $tkn = 'sam_san_tech)';
    $token = md5("$tkn:$id");

    if ($token_hapus === $token) {
        hapus_data($id, $mysqli);
        flash("msg_hapus_data", "Data berhasil dihapus");
    }
}

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $namaauditor = $_POST['namaauditor'];
    $token_ubah = $_POST['token_ubah'];

    $tkn = 'sam_san_tech)';
    $token = md5("$tkn:$id");
    if ($token_ubah === $token) {
        edit_data($id, $namaauditor, $mysqli);
        flash("msg_edit_data", "Data berhasi diubah");
    }
}
