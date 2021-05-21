<?php

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function tampil_data($mysqli)
{
    $querx = "SELECT * FROM penugasan WHERE status_tl='Sudah Diusulkan' ORDER BY no_st DESC";
    $result = $mysqli->query($querx);
    $no=1;
    while ($row = mysqli_fetch_assoc($result)) {
        $tkn = 'sam_san_tech)';
        $id = $row['id_penugasan'];
        $token = md5("$tkn:$id");
?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['no_st'] ?></td>
            <td><?= tgl_indo($row['tgl_st']); ?></td>
            <td>
            <?php 
            $instansi_vertikal = $row['auditan_in'];
            $opede             = $row['auditan_opd'];
            
            if(empty($instansi_vertikal)){
                $result_opede = $mysqli->query("SELECT * FROM opd WHERE id = '$opede'");
                $row_opede = mysqli_fetch_assoc($result_opede);
                echo $row_opede['nama_instansi']; echo " - "; echo $row_opede['nama_pemda'];
            }
             if(empty($opede)){
                $result_vertikal = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id = '$instansi_vertikal'");
                $row_vertikal = mysqli_fetch_assoc($result_vertikal);
                echo $row_vertikal['nama_instansi'];
            }
            
            
            ?>
            </td>
            <td><?= $row['uraian_penugasan']; ?></td>
            <td><?= $row['jenis_penugasan'] ?></td>
            <td><?= $row['pkpt'] ?> , <?= $row['kf1'] ?> , <?= $row['d1'] ?></td>
            <td>
                <?php
                if ($row['status'] == 'Tuntas') {
                ?>
                    <small class="badge badge-success text-light"><?= $row['status']; ?></small>
                <?php
                } else if ($row['status'] == 'Tuntas Sebagian') {
                ?>
                    <small class="badge badge-warning text-light"><?= $row['status']; ?></small>
                <?php
                } else if($row['status'] == 'Belum Tuntas') {
                ?>
                    <small class="badge badge-danger text-light"><?= $row['status']; ?></small>
                <?php
                } else {
                    ?>
                    <small class="badge badge-danger text-light">Belum TL</small>
                <?php
                }
                ?>
            </td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <a href="monitoring_detail_tl/<?= $row['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
    
                </div>
            </td>
        </tr>
    <?php
    }
}

function teruskan_data($id_penugasan, $mysqli) {
    $sql = $mysqli->prepare("UPDATE penugasan SET status ='Belum Divalidasi' WHERE id_penugasan='{$id_penugasan}'");
    $sql->execute();
}

function review_data($id_penugasan, $mysqli){
    $sql = $mysqli->prepare("UPDATE penugasan SET status = 'Sudah Direview' WHERE id_penugasan = '{$id_penugasan}'");
    $sql->execute();
}

function tambah_surat($id_penugasan, $nomor_surat, $tgl_surat, $dokumen, $mysqli){
    $query = "INSERT INTO surat_tuntas VALUES ('','$id_penugasan','$nomor_surat','$tgl_surat','$dokumen')";
    $sql = $mysqli->prepare($query);
    $sql->execute();
}





?>