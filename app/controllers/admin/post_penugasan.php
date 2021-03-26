<?php
include 'app/controllers/admin/function_penugasan.php';
include 'app/flash_message.php';
error_reporting(0);
if (isset($_POST['addpenugasan'])) {
    $no_st          = $_POST['no_st'];
    $nama_penugasan = $_POST['nama_penugasan'];
    $tgl_st         = $_POST['tgl_st'];
    $jp             = $_POST['jenis_penugasan'];
   
    if ($jp != 'Lainnya') {
        $jenis_penugasan = $_POST['jenis_penugasan'];
    } else {
        $jenis_penugasan = $_POST['lainnya'];
    }

    $pkpt = $_POST['pkpt'];
    $kf1 = $_POST['kf1'];

    $auditan_in     = $_POST['vertikal'];
    $auditan_opd    = $_POST['opd'];
    if (empty($auditan_in)) {
        $auditan_instansi = '-';
    } else {
        $auditan_instansi = $_POST['vertikal'];
    }

    if (empty($auditan_opd)) {
        $auditan_opda = '-';
    } else {
        $auditan_opda = $_POST['opd'];
    }
    
    $insert = $mysqli->query("INSERT INTO penugasan VALUES ('','$no_st','$tgl_st','$nama_penugasan','$jenis_penugasan','$auditan_instansi','$auditan_opda','Belum Validasi','$pkpt','$kf1')");

    $auditor = $_POST['auditor'];
    $peran = $_POST['peran'];
    $total = count($auditor)-1;
    $id_terakhir = $mysqli->insert_id;

    for ($i = 0; $i < $total; $i++) {
        $queryinput = "INSERT INTO penugasan_auditor VALUES('','$id_terakhir','$auditor[$i]','$peran[$i]')";
        $insert2 = $mysqli->query($queryinput);
    }


    flash("msg_addpenugasan", "Data Berhasil Disimpan");
}
