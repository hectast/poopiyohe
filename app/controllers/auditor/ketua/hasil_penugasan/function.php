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

function tampil_data($idFromSA, $peran, $mysqli)
{
    $querPA = "SELECT * FROM penugasan_auditor WHERE id='{$idFromSA}' AND peran='$peran'";
    $resultPA = $mysqli->query($querPA);
    while ($rowPA = $resultPA->fetch_assoc()) {
        $idP = $rowPA['id_penugasan'];

        $querx = "SELECT * FROM penugasan WHERE id_penugasan='{$idP}'";
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
                $sql_temuan = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row['id_penugasan']}'");
                ?>
                <?php while ($row_temuan = $sql_temuan->fetch_object()) : ?>
                    <?php
                    $sql_data_rekomendasi = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_temuan->id_temuan'");
                    ?>
                    <?php while ($row_data_rekomendasi = $sql_data_rekomendasi->fetch_object()) : ?>
                        <?php
                        $array_data_rekomendasi[] = $row_data_rekomendasi->id_rekomendasi;
                        $sql_tindak_lanjut = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_data_rekomendasi->id_rekomendasi'");
                        ?>
                        <?php while ($row_tindak_lanjut = $sql_tindak_lanjut->fetch_object()) : ?>
                            <?php
                            $array_tl[] = $row_tindak_lanjut->id_rekomendasi;
                            ?>
                        <?php endwhile; ?>
                    <?php endwhile; ?>
                <?php endwhile; ?>

                <?php
                if (isset($array_tl) && isset($array_data_rekomendasi)) {
                    $rekom = array_unique($array_data_rekomendasi);
                    $tl = array_unique($array_tl);
                    if (count($tl) == count($rekom)) {
                        echo "<small class='badge badge-success'>Tuntas</small>";
                    } else if (count($tl) < count($rekom)) {
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

                        <a href="ketua_detail_penugasan/<?= $row['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>

                        <!-- <a href="" class="dropdown-item"> <i class="fe fe-search"></i> Lihat Detail</a> -->
                        <a href="ketua_tambah_temuan/<?= $row['id_penugasan']; ?>" class="dropdown-item"> <i class="fe fe-plus"></i> Input Temuan</a>
                        <a href="ketua_edit_temuan/<?= $row['id_penugasan']; ?>" class="dropdown-item"> <i class="fe fe-edit"></i> Edit Temuan</a>


                    </div>
                </td>
            </tr>
<?php
        }
    }
    // echo $rowPA['id'];

}
?>