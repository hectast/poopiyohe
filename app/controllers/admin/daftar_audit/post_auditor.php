<?php
include 'app/controllers/admin/daftar_audit/function_auditor.php';
include 'app/flash_message.php';

if (isset($_POST['simpan'])) {

    $namaauditor = $_POST['namaauditor'];
    $emailauditor = $_POST['email_auditor'];

    $passord_default = "poopiyohe";
    $hash_pass = password_hash($passord_default, PASSWORD_DEFAULT);

    $query = "SELECT* FROM auditor WHERE email='{$emailauditor}'";
    $to_query = $mysqli->prepare($query);
    $to_query->execute();
    $result_query = $to_query->get_result();
    
    if (mysqli_num_rows($result_query) > 0) {
        flash("msg_gagal_data", "Email yang anda masukkan sudah digunakan!");
        return false;
    }

    simpan_data($namaauditor, $emailauditor, $hash_pass, $mysqli);
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
    $emailauditor = $_POST['emailauditor'];
    $token_ubah = $_POST['token_ubah'];

    $tkn = 'sam_san_tech)';
    $token = md5("$tkn:$id");


    $query = "SELECT* FROM auditor WHERE email='{$emailauditor}'";
    $to_query = $mysqli->prepare($query);
    $to_query->execute();
    $result_query = $to_query->get_result();
    
    if (mysqli_num_rows($result_query) > 0) {
        flash("msg_gagal_data", "Email yang anda masukkan sudah digunakan!");
        return false;
    }

    if ($token_ubah === $token) {
        edit_data($id, $namaauditor, $emailauditor, $mysqli);
        flash("msg_edit_data", "Data berhasi diubah");
    }
}
