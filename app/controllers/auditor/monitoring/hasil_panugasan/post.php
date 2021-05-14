<?php
include 'app/controllers/auditor/monitoring/hasil_panugasan/function.php';
include 'app/controllers/auditor/monitoring/hasil_panugasan/function_upload.php';
include 'app/flash_message.php';

if (isset($_POST['teruskan_data'])) {
    $id_penugasan = $_POST['id_penugasan'];

    teruskan_data($id_penugasan, $mysqli);
    flash("msg_teruskan_data", "Data berhasil di teruskan ke Dalnis dan Korwas");
}

if(isset($_POST['review_data'])){
    $id_penugasan = $_POST['id_penugasan'];
    review_data($id_penugasan,$mysqli);
    flash("msg_review_data","Data telah direview");
}

if(isset($_POST['upload_surat'])){
    $id_penugasan = $_POST['id_penugasan'];
    $nomor_tuntas = $_POST['nomor_tuntas'];
    $tgl_tuntas   = $_POST['tgl_tuntas']; 
    $dokumen = upload_surat();
    if (!$dokumen) {
        return false;
    }
    $query = "INSERT INTO surat_tuntas VALUES ('','$id_penugasan','$nomor_tuntas','$tgl_tuntas','$dokumen')";
    tambah_surat($id_penugasan,$nomor_tuntas,$tgl_tuntas,$dokumen,$mysqli);
    flash("msg_insert_tuntas","Surat tuntas telah diinput");    
}
?>



