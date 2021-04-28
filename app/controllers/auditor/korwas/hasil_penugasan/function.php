<?php

function tgl_indo($tanggal)
{
    $bulan = array(
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

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function tampil_data($mysqli)
{
    $querx = "SELECT * FROM penugasan ORDER BY id_penugasan DESC";
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

                if (empty($instansi_vertikal)) {
                    $result_opede = $mysqli->query("SELECT * FROM opd WHERE id = '$opede'");
                    $row_opede = mysqli_fetch_assoc($result_opede);
                    echo $row_opede['nama_instansi'];
                    echo " - ";
                    echo $row_opede['nama_pemda'];
                }
                if (empty($opede)) {
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
                if ($row['status_tl'] == 'Tuntas') {
                ?>
                    <small class="badge badge-success">Tuntas</small>
                <?php
                } else if ($row['status_tl'] == 'Tuntas Sebagian') {
                ?>
                    <small class="badge badge-warning">Tuntas Sebagian</small>
                <?php
                } else {
                ?>
                    <small class="badge badge-danger"><?= $row['status_tl']; ?></small>
                <?php
                }
                ?>
            </td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="korwas_detail_penugasan/<?= $row['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                    <a href="korwas_edit_temuan/<?= $row['id_penugasan']; ?>" class="dropdown-item"> <i class="fe fe-edit"></i> Edit Temuan</a>
                </div>
            </td>
        </tr>
    <?php
    }
}

function tampil_trusted_advisor($mysqli)
{
    $nomor = 1;
    $ambil_penilaian = $mysqli->query("SELECT * FROM penilaian");
    while ($row_penilaian = mysqli_fetch_assoc($ambil_penilaian)) {
        $id_penugasan = $row_penilaian['id_penugasan'];
        $trad = $row_penilaian['trad'];
        $ambil_penugasan = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan = '$id_penugasan'");
        $row_penugasan = mysqli_fetch_assoc($ambil_penugasan);
        $uraian = $row_penugasan['uraian_penugasan'];
        $no_st = $row_penugasan['no_st'];
        $tgl  = $row_penugasan['tgl_st'];
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $no_st ?></td>
            <td><?= tgl_indo($tgl) ?></td>
            <td><?= $uraian ?></td>
            <td>
                
                    <?= round($trad) ?>
                
            </td>
            <td><a href="detail_nilai/<?= $id_penugasan?>" class="btn btn-primary btn-sm"><i class="fe fe-search"></i> Detail Nilai</a></td>
        </tr>
    <?php
    }
}
function tampil_pan($mysqli)
{
    $nomor = 1;
    $ambil_penilaian = $mysqli->query("SELECT * FROM penilaian");
    while ($row_penilaian = mysqli_fetch_assoc($ambil_penilaian)) {
        $id_penugasan = $row_penilaian['id_penugasan'];
        $pnrb = $row_penilaian['pnrb'];
        $ambil_penugasan = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan = '$id_penugasan'");
        $row_penugasan = mysqli_fetch_assoc($ambil_penugasan);
        $uraian = $row_penugasan['uraian_penugasan'];
        $no_st = $row_penugasan['no_st'];
        $tgl  = $row_penugasan['tgl_st'];
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $no_st ?></td>
            <td><?= tgl_indo($tgl) ?></td>
            <td><?= $uraian ?></td>
            <td>
                
                    <?= round($pnrb) ?>
                
            </td>
            <td><a href="detail_nilai/<?= $id_penugasan?>" class="btn btn-primary btn-sm"><i class="fe fe-search"></i> Detail Nilai</a></td>
        </tr>
    <?php
    }
}
function tampil_pion($mysqli)
{
    $nomor = 1;
    $ambil_penilaian = $mysqli->query("SELECT * FROM penilaian");
    while ($row_penilaian = mysqli_fetch_assoc($ambil_penilaian)) {
        $id_penugasan = $row_penilaian['id_penugasan'];
        $pion = $row_penilaian['pion'];
        $ambil_penugasan = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan = '$id_penugasan'");
        $row_penugasan = mysqli_fetch_assoc($ambil_penugasan);
        $uraian = $row_penugasan['uraian_penugasan'];
        $no_st = $row_penugasan['no_st'];
        $tgl  = $row_penugasan['tgl_st'];
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $no_st ?></td>
            <td><?= tgl_indo($tgl) ?></td>
            <td><?= $uraian ?></td>
            <td>
                
                    <?= round($pion) ?>
              
            </td>
            <td><a href="detail_nilai/<?= $id_penugasan?>" class="btn btn-primary btn-sm"><i class="fe fe-search"></i> Detail Nilai</a></td>
        </tr>
<?php
    }
}
?>