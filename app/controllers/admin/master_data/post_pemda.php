<?php 
include 'app/controllers/admin/master_data/function_pemda.php';
include 'app/flash_message.php';


if (isset($_POST['simpan'])) {
	$namaPemda = $_POST['namaPemda'];

	simpan_data($namaPemda,$mysqli);
	flash("msg_sukses_data", "Data berhasil di simpan");
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