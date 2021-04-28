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
    $sql_penugasan_iv = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in='{$id_instansi}'");
    $sql_penugasan_opd = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd='{$id_instansi}'");
    $no = 1;

    if (mysqli_num_rows($sql_penugasan_iv) > 0) {

        while ($row_penugasan_iv = $sql_penugasan_iv->fetch_object()) {
            $sql_temuan_iv = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_penugasan_iv->id_penugasan'");
            $row_temuan_iv2 = $sql_temuan_iv->fetch_object();
            echo "";
?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= isset($row_temuan_iv2->no_laporan) ? $row_temuan_iv2->no_laporan : "Temuan belum di input."; ?></td>
                <td><?= tgl_indo($row_temuan_iv2->tgl_laporan); ?></td>
                <td><?= $row_penugasan_iv->uraian_penugasan; ?></td>
                <td>
                    <?php while ($row_temuan_iv = $sql_temuan_iv->fetch_object()) : ?>
                        <?php
                        $sql_data_rekomendasi_iv = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_temuan_iv->id_temuan'");
                        ?>
                        <?php while ($row_data_rekomendasi_iv = $sql_data_rekomendasi_iv->fetch_object()) : ?>
                            <?php
                            $array_data_rekomendasi_iv[] = $row_data_rekomendasi_iv->id_rekomendasi;
                            $sql_tindak_lanjut_iv = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_data_rekomendasi_iv->id_rekomendasi'");
                            ?>
                            <?php while ($row_tindak_lanjut_iv = $sql_tindak_lanjut_iv->fetch_object()) : ?>
                                <?php
                                $array_iv[] = $row_tindak_lanjut_iv->id_rekomendasi;
                                ?>
                            <?php endwhile; ?>
                        <?php endwhile; ?>
                    <?php endwhile; ?>

                    <?php
                    if (isset($array_tl_iv) && isset($array_data_rekomendasi_iv)) {
                        $rekom_iv = array_unique($array_data_rekomendasi_iv);
                        $tl_iv = array_unique($array_tl_iv);
                        if (count($tl_iv) == count($rekom_iv)) {
                            echo "<small class='badge badge-success'>Tuntas</small>";
                        } else if (count($tl_iv) < count($rekom_iv)) {
                            echo "<small class='badge badge-warning text-light'>Tuntas Sebagian</small>";
                        } else {
                            echo "<small class='badge badge-danger'>Belum TL</small>";
                        }
                    } else {
                        echo "<small class='badge badge-danger'>Belum TL</small>";
                    }
                    ?>
                </td>
                <td>
                    <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fe fe-settings"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?= $base_url; ?>detail_temuan/<?= $row_penugasan_iv->id_penugasan; ?>" class="dropdown-item"><i class="fe fe-search"></i> Detail Penugasan</a>
                    </div>
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
                    $sql_nominal = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan = '$id_tugas'");
                   
                    while( $row_nominal = $sql_nominal->fetch_assoc()){
                       if(empty($row_nominal['isirupiah'])){
                           $row_nominal['isirupiah'] =0;
                       }
                        $ttl = 0;
                       $ttl += $row_nominal['isirupiah'];
                       echo ltrim(number_format($ttl),'0');
                    }
                }else{
                    echo 0;
                }           
                ?></td>
                <td>
                    <?php
                        $sql_temuan_opd = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_penugasan_opd->id_penugasan'");
                    ?>
                    <?php while ($row_temuan_opd = $sql_temuan_opd->fetch_object()) : ?>
                        <?php
                        $sql_data_rekomendasi_opd = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_temuan_opd->id_temuan'");
                        ?>
                        <?php while ($row_data_rekomendasi_opd = $sql_data_rekomendasi_opd->fetch_object()) : ?>
                            <?php
                            $array_data_rekomendasi_opd[] = $row_data_rekomendasi_opd->id_rekomendasi;
                            $sql_tindak_lanjut_opd = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_data_rekomendasi_opd->id_rekomendasi'");
                            ?>
                            <?php while ($row_tindak_lanjut_opd = $sql_tindak_lanjut_opd->fetch_object()) : ?>
                                <?php
                                $array_tl_opd[] = $row_tindak_lanjut_opd->id_rekomendasi;
                                ?>
                            <?php endwhile; ?>
                        <?php endwhile; ?>
                    <?php endwhile; ?>

                    <?php
                    if (isset($array_tl_opd) && isset($array_data_rekomendasi_opd)) {
                        $rekom_opd = array_unique($array_data_rekomendasi_opd);
                        $tl_opd = array_unique($array_tl_opd);
                        if (count($tl_opd) == count($rekom_opd)) {
                            echo "<small class='badge badge-success'>Tuntas</small>";
                        } else if (count($tl_opd) < count($rekom_opd)) {
                            echo "<small class='badge badge-warning text-light'>Tuntas Sebagian</small>";
                        } else {
                            echo "<small class='badge badge-danger'>Belum TL</small>";
                        }
                    } else {
                        echo "<small class='badge badge-danger'>Belum TL</small>";
                    }
                    ?>
                </td>
                <td>
                    <?php if (mysqli_num_rows($sql_temuan_opd) > 0) : ?>
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