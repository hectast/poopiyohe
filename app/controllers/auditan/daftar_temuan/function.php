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
                        $sql_data_rekomendasi = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_temuan_iv->id_temuan'");
                        ?>
                        <?php while ($row_data_rekomendasi = $sql_data_rekomendasi->fetch_object()) : ?>
                            <?php
                            $array_data_rekomendasi[] = $row_data_rekomendasi->id_rekomendasi;
                            $sql_tindak_lanjut = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_data_rekomendasi->id_rekomendasi'");
                            ?>
                            <?php while ($row_tindak_lanjut = $sql_tindak_lanjut->fetch_object()) : ?>
                                <?php
                                $array[] = $row_tindak_lanjut->id_rekomendasi;
                                ?>
                            <?php endwhile; ?>
                        <?php endwhile; ?>
                    <?php endwhile; ?>

                    <?php
                    $napa_dia_rekom = array_unique($array_data_rekomendasi);
                    $napa_dia = array_unique($array);
                    // echo "<pre>";
                    // print_r($napa_dia_rekom);
                    // print_r($napa_dia);
                    // print_r(count($napa_dia_rekom));
                    // echo "<br>";
                    // print_r(count($napa_dia));
                    // echo "</pre>";

                    if (count($napa_dia) == count($napa_dia_rekom)) {
                        echo "<small class='badge badge-success'>Tuntas</small>";
                    } else if (count($napa_dia) < count($napa_dia_rekom)) {
                        echo "<small class='badge badge-warning text-light'>Tuntas Sebagian</small>";
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
                <td><?= $no; ?></td>
                <td><?= isset($row_temuan_opd2->no_laporan) ? $row_temuan_opd2->no_laporan : "<small><i>Temuan belum di input.</i></small>"; ?></td>
                <td><?= isset($row_temuan_opd2->tgl_laporan) ? tgl_indo($row_temuan_opd2->tgl_laporan) : "<small><i>Temuan belum di input.</i></small>"; ?></td>
                <td><?= $row_penugasan_opd->uraian_penugasan; ?></td>
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
                        <small><i>Aksi belum bisa dilakukan.</i></small>
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