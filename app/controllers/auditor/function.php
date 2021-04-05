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
    $querx = "SELECT * FROM penugasan ORDER BY id_penugasan";
    $result = $mysqli->query($querx);
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <td><?= $row['no_st'] ?></td>
            <td><?= tgl_indo($row['tgl_st']); ?></td>
            <td><?= $row['uraian_penugasan']; ?></td>
            <td><?= $row['jenis_penugasan'] ?></td>
            <td><?= $row['pkpt'] ?> | <?= $row['kf1'] ?></td>
            <td>
                <?php
                if ($row['status'] == 'Belum Divalidasi') {
                ?>
                    <small class="badge badge-danger"><?= $row['status']; ?></small>
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
                    <a href="" class="dropdown-item"> <i class="fe fe-search"></i> Lihat Detail</a>
                    <a href="tambah_temuan" class="dropdown-item"> <i class="fe fe-edit"></i> Tambah Temuan</a>
                </div>
            </td>
        </tr>
    <?php
    }
}
?>