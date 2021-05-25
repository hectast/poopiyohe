<?php
// error_reporting(0);
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

function tampil_data($id_instansi, $base_url, $mysqli)
{
    $sql_penugasan_iv = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in='{$id_instansi}' ORDER BY no_st DESC");
    $sql_penugasan_opd = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd='{$id_instansi}' ORDER BY no_st DESC");
    $no = 1;

    if (mysqli_num_rows($sql_penugasan_iv) > 0) {

        while ($row_penugasan_iv = $sql_penugasan_iv->fetch_object()) {
            $sql_temuan_iv = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_penugasan_iv->id_penugasan'");
            $row_temuan_iv2 = $sql_temuan_iv->fetch_object();
            echo "";
?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row_penugasan_iv->no_st ?></td>
                <td><?= isset($row_temuan_iv2->no_laporan) ? $row_temuan_iv2->no_laporan : "<small><i>Temuan belum di input.</i></small>"; ?></td>
                <td><?= isset($row_temuan_iv2->tgl_laporan) ? tgl_indo($row_temuan_iv2->tgl_laporan) : "<small><i>Temuan belum di input.</i></small>"; ?></td>
                <td><?= $row_penugasan_iv->uraian_penugasan; ?></td>
                <td><?php
                if(isset($row_temuan_iv2->id_temuan)){ 
                $id_tugas = $row_temuan_iv2->id_penugasan;
                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                echo mysqli_num_rows($sql_jumlah);
                }else{
                    echo 0;
                }           
                ?> Temuan</td>
                <td>Rp. <?php
                if(isset($row_temuan_iv2->id_temuan)){ 
                    $id_tugas = $row_temuan_iv2->id_penugasan;
                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                    while($row_nominal = $sql_nominal->fetch_array()){
                        echo number_format($row_nominal['SUM(isirupiah)']);
                    }
                }else{
                    echo 0;
                }           
                ?></td>
                <td>
                    <?php
                        if ($row_penugasan_iv->status == "Tuntas") {
                            echo "
                                <small class='badge badge-success text-light'>$row_penugasan_iv->status</small>
                            ";
                        } else if ($row_penugasan_iv->status == "Tuntas Sebagian") {
                            echo "
                                <small class='badge badge-warning text-light'>$row_penugasan_iv->status</small>
                            ";
                        } else if ($row_penugasan_iv->status == "Belum Tuntas") {
                            echo "
                                <small class='badge badge-danger text-light'>$row_penugasan_iv->status</small>
                            ";
                        } else {
                            echo "
                                <small class='badge badge-danger text-light'>Belum TL</small>
                            ";    
                        }
                    ?>
                </td>
                <td>
                    <?php if (mysqli_num_rows($sql_temuan_iv) > 0) : ?>
                    <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fe fe-settings"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?= $base_url; ?>detail_temuan/<?= $row_penugasan_iv->id_penugasan; ?>" class="dropdown-item"><i class="fe fe-search"></i> Detail Penugasan</a>
                    </div>
                    <?php else : ?>
                    <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fe fe-slash"></span>
                    </button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php
            echo "";
            $no++;
        }
    } else if (mysqli_num_rows($sql_penugasan_opd) > 0) {

        while ($row_penugasan_opd = $sql_penugasan_opd->fetch_object()) {
            $sql_temuan_opd2 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_penugasan_opd->id_penugasan'");
            $row_temuan_opd2 = $sql_temuan_opd2->fetch_object();
            echo "";
        ?>
            <tr>
                <td><?= $no; ?> </td>
                <td><?= $row_penugasan_opd->no_st ?></td>
                <td><?= isset($row_temuan_opd2->no_laporan) ? $row_temuan_opd2->no_laporan : "<small><i>Temuan belum di input.</i></small>"; ?></td>
                <td><?= isset($row_temuan_opd2->tgl_laporan) ? tgl_indo($row_temuan_opd2->tgl_laporan) : "<small><i>Temuan belum di input.</i></small>"; ?></td>
                <td><?= $row_penugasan_opd->uraian_penugasan; ?></td>
                <td><?php
                if(isset($row_temuan_opd2->id_temuan)){ 
                $id_tugas = $row_temuan_opd2->id_penugasan;
                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                echo mysqli_num_rows($sql_jumlah);
                }else{
                    echo 0;
                }           
                ?> Temuan</td>
                <td>Rp. <?php
                if(isset($row_temuan_opd2->id_temuan)){ 
                    $id_tugas = $row_temuan_opd2->id_penugasan;
                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                    while($row_nominal = $sql_nominal->fetch_array()){
                        echo number_format($row_nominal['SUM(isirupiah)']);
                    }
                   
                    
                }else{
                    echo 0;
                }           
                ?></td>
                <td>
                    <?php
                        if ($row_penugasan_opd->status == "Tuntas") {
                            echo "
                                <small class='badge badge-success text-light'>$row_penugasan_opd->status</small>
                            ";
                        } else if ($row_penugasan_opd->status == "Tuntas Sebagian") {
                            echo "
                                <small class='badge badge-warning text-light'>$row_penugasan_opd->status</small>
                            ";
                        } else if ($row_penugasan_opd->status == "Belum Tuntas") {
                            echo "
                                <small class='badge badge-danger text-light'>$row_penugasan_opd->status</small>
                            ";
                        } else {
                            echo "
                                <small class='badge badge-danger text-light'>Belum TL</small>
                            ";    
                        }
                    ?>
                </td>
                <td>
                    <?php if (mysqli_num_rows($sql_temuan_opd2) > 0) : ?>
                    <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fe fe-settings"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?= $base_url; ?>detail_temuan/<?= $row_penugasan_opd->id_penugasan; ?>" class="dropdown-item"><i class="fe fe-search"></i> Detail Penugasan</a>
                    </div>
                    <?php else : ?>
                    <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fe fe-slash"></span>
                    </button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php
            echo "";
            $no++;
        }
    } else {
        ?>
        <tr class="text-center">
            <td colspan="4">Maaf data belum ditemukan.</td>
        </tr>
<?php
    }
}
?>