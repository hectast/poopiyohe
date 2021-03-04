<?php

include 'app/controllers/admin/daftar_audit/function_auditor.php';
include 'app/flash_message.php';

if (isset($_POST['simpan'])) {
    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
    $unique = 'ADTR' . $today . $rand;

    $idauditor = $unique;

    $namaauditor = $_POST['namaauditor'];
    $insert = simpan_data($idauditor, $namaauditor, $mysqli);
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
    $idauditor = $_POST['idauditor'];
    $namaauditor = $_POST['namaauditor'];
    $token_ubah = $_POST['token_ubah'];

    $tkn = 'sam_san_tech)';
    $token = md5("$tkn:$idauditor");
    if ($token_ubah === $token) {
        edit_data($idauditor, $namaauditor, $mysqli);
        flash("msg_edit_data", "Data berhasi diubah");
    }
}
