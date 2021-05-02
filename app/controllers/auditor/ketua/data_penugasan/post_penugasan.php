<?php
include 'app/controllers/auditor/ketua/data_penugasan/function_penugasan.php';
include 'app/flash_message.php';
error_reporting(0);
if (isset($_POST['addpenugasan'])) {
    $stmt_pngsn = $mysqli->prepare("SELECT * FROM penugasan WHERE no_st='{$_POST['no_st']}'");
    $stmt_pngsn->execute();
    $rslt_pngsn = $stmt_pngsn->get_result();
    if (mysqli_num_rows($rslt_pngsn) > 0) {
    ?>
        <script>
            alert('Maaf, No. ST yang anda masukkan sudah ada !');
            document.location.href = 'ketua_tambah_penugasan';
        </script>
    <?php
        return false;
    }
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
    $d1 = $_POST['d1'];

    $auditan_in     = $_POST['vertikal'];
    $auditan_opd    = $_POST['opd'];
 
    
    $insert = $mysqli->query("INSERT INTO penugasan VALUES ('','$no_st','$tgl_st','$nama_penugasan','$jenis_penugasan','$auditan_in','$auditan_opd','Belum Direview','$pkpt','$kf1','$d1','Belum TL')");

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
if(isset($_POST['editpenugasan'])){
    $no_st          = $_POST['no_st'];
    $nama_penugasan = $_POST['nama_penugasan'];
    $tgl_st         = $_POST['tgl_st'];
    $jp             = $_POST['jenis_penugasan'];
    $status         = $_POST['status'];
    $pkpt = $_POST['pkpt'];
    $kf1 = $_POST['kf1'];
    $idid = $_POST['idid'];

      
    if ($jp != 'Lainnya') {
        $jenis_penugasan = $_POST['jenis_penugasan'];
    } else {
        $jenis_penugasan = $_POST['lainnya'];
    }

    if(empty($_POST['vertikal'])){
        $instansi_vertikal = $_POST['vertikaledit'];
    }else{
        $instansi_vertikal = $_POST['vertikal'];
    }

    if(empty($_POST['opd'])){
        $opd = $_POST['opdedit'];
    }else{
        $opd = $_POST['opd'];
    }

    $update = $mysqli->query("UPDATE penugasan SET no_st = '$no_st', tgl_st = '$tgl_st', uraian_penugasan = '$nama_penugasan', jenis_penugasan = '$jenis_penugasan', auditan_in = '$instansi_vertikal', auditan_opd = '$opd',status = '$status',pkpt='$pkpt',kf1 = '$kf1' WHERE id_penugasan = '$idid'");
    $auditor = $_POST['auditor'];
    $peran = $_POST['peran'];
    $total = count($auditor)-1;
    
   
    if($auditor[0] == 0){   
       
    }else{
        $mysqli->query("DELETE FROM penugasan_auditor WHERE id_penugasan = '$idid'");
        for ($i = 0; $i < $total; $i++) {
            $queryinput = "INSERT INTO penugasan_auditor VALUES('','$idid','$auditor[$i]','$peran[$i]')";
            $insert2 = $mysqli->query($queryinput);
        }
    }
    flash("msg_edit_data", "Data berhasil diubah");
    }
if(isset($_POST['lihat_data'])){
    $id_tampil = $_POST['id_lihat'];
    
}
if(isset($_POST['hapus_data'])){
    $id = $_POST['id_lihat'];
    $token = $_POST['token'];
    $tkn = 'sam_san_tech)';
    $token2 = md5("$tkn:$id");
    if ($token === $token2) {
        hapus_data($id, $mysqli);
        flash("msg_hapus_data", "Data berhasil dihapus");
    }
}