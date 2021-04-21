<?php
include 'app/controllers/auditor/dalnis/function.php';
include 'app/flash_message.php';

if (isset($_POST['teruskan_data'])) {
    $id_penugasan = $_POST['id_penugasan'];

    teruskan_data($id_penugasan, $mysqli);
    flash("msg_teruskan_data", "Data berhasil di teruskan ke Dalnis dan Korwas");
}
?>