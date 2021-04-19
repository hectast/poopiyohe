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

function tampil_data_belumreview($mysqli)
{
    $querx = "SELECT * FROM penugasan WHERE status = 'Belum Direview' ORDER BY id_penugasan DESC";
    $result = $mysqli->query($querx);
    while ($row = mysqli_fetch_assoc($result)) {
        $tkn = 'sam_san_tech)';
        $id = $row['id_penugasan'];
        $token = md5("$tkn:$id");
?>
        <tr>
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
                if ($row['status'] == 'Belum Direview') {
                ?>
                    <small class="badge badge-danger"><?= $row['status']; ?></small>
                <?php
                } else if ($row['status'] == 'Belum Divalidasi') {
                ?>
                    <small class="badge badge-warning"><?= $row['status']; ?></small>
                <?php
                } else {
                ?>
                    <small class="badge badge-success"><?= $row['status']; ?></small>
                <?php
                }
                ?>
            </td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <a href="detail_hasil_penugasan/<?= $row['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                    
                        <form action="monitoring_hasil_penugasan" method="post">
                            <input type="hidden" name="id_penugasan" value="<?= $row['id_penugasan']; ?>">
                            <button type="submit" name="teruskan_data" class="dropdown-item" onclick="return confirm('Konfirmasi untuk meneruskan ke Dalnis dan Korwas')"><i class="fe fe-send mt-3"></i> Teruskan ke Dalnis & Korwas</button>
                        </form>
                </div>
            </td>
        </tr>
    <?php
    }
}
function tampil_data_sudahreview($mysqli)
{
    $querx = "SELECT * FROM penugasan WHERE status = 'Sudah Direview' ORDER BY id_penugasan DESC";
    $result = $mysqli->query($querx);
    while ($row = mysqli_fetch_assoc($result)) {
        $tkn = 'sam_san_tech)';
        $id = $row['id_penugasan'];
        $token = md5("$tkn:$id");
?>
        <tr>
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
                if ($row['status'] == 'Belum Direview') {
                ?>
                    <small class="badge badge-danger"><?= $row['status']; ?></small>
                <?php
                } else if ($row['status'] == 'Belum Divalidasi') {
                ?>
                    <small class="badge badge-warning"><?= $row['status']; ?></small>
                <?php
                } else {
                ?>
                    <small class="badge badge-success"><?= $row['status']; ?></small>
                <?php
                }
                ?>
            </td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <a href="detail_hasil_penugasan/<?= $row['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                    <?php
                    if ($row['status'] == 'Belum Direview') {
                    ?>
                        <form action="monitoring_hasil_penugasan" method="post">
                            <input type="hidden" name="id_penugasan" value="<?= $row['id_penugasan']; ?>">
                            <button type="submit" name="teruskan_data" class="dropdown-item" onclick="return confirm('Konfirmasi untuk meneruskan ke Dalnis dan Korwas')"><i class="fe fe-send mt-3"></i> Teruskan ke Dalnis & Korwas</button>
                        </form>
                    <?php
                    }
                    ?>


                </div>
            </td>
        </tr>
    <?php
    }
}

function teruskan_data($id_penugasan, $mysqli) {
    $sql = $mysqli->prepare("UPDATE penugasan SET status='Belum Divalidasi' WHERE id_penugasan='{$id_penugasan}'");
    $sql->execute();
}
?>