<?php
function tampil_daftar_tugas($id_instansi, $mysqli)
{
    $nomor = 1;
    $query_iv = $mysqli->prepare("SELECT * FROM penugasan WHERE auditan_in='{$id_instansi}'");
    $query_iv->execute();
    $result_iv = $query_iv->get_result();

    $query_opd = $mysqli->prepare("SELECT * FROM penugasan WHERE auditan_opd='{$id_instansi}'");
    $query_opd->execute();
    $result_opd = $query_opd->get_result();

    if (mysqli_num_rows($result_iv) > 0) {

        while ($row = $result_iv->fetch_object()) {
?>
            <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $row->uraian_penugasan ?></td>
                <td><?= $row->no_st ?></td>
                <td><?= tgl_indo($row->tgl_st) ?></td>
                <td>
                    <div class="badge badge-success">Sudah Terbit Laporan</div>
                </td>
                <td>
                    <?php
                    $queryx = "SELECT * FROM penilaian WHERE id_penugasan = '$row->id_penugasan'";
                    $resultx = $mysqli->query($queryx);
                    $row_nilai = $resultx->fetch_assoc();
                    $cek = $row_nilai['pion'];
                    if (empty($cek)) {
                    ?>
                        <div class="badge badge-danger">Belum Dinilai</div>
                    <?php
                    } else {
                    ?>
                        <div class="badge badge-success">Sudah Dinilai</div>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (empty($cek)) {
                    ?>
                        <a href="detail_penilaian/<?= $row->id_penugasan; ?>" class="btn btn-sm btn-primary"><i class="fe fe-edit"></i> Nilai</a>
                    <?php
                    } else {
                    ?>
                        <?= tgl_indo($row_nilai['tgl_nilai']) ?>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
    } else if (mysqli_num_rows($result_opd) > 0) {

        while ($row = $result_opd->fetch_object()) {
        ?>
            <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $row->uraian_penugasan ?></td>
                <td><?= $row->no_st ?></td>
                <td><?= tgl_indo($row->tgl_st) ?></td>
                <td>
                    <div class="badge badge-success">Sudah Terbit Laporan</div>
                </td>
                <td>
                    <?php
                    $queryx = "SELECT * FROM penilaian WHERE id_penugasan = '$row->id_penugasan'";
                    $resultx = $mysqli->query($queryx);
                    $row_nilai = $resultx->fetch_assoc();
                    @$cek = $row_nilai['pion'];
                    if (empty($cek)) {
                    ?>
                        <div class="badge badge-danger">Belum Dinilai</div>
                    <?php
                    } else {
                    ?>
                        <div class="badge badge-success">Sudah Dinilai</div>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (empty($cek)) {
                    ?>
                        <a href="detail_penilaian/<?= $row->id_penugasan; ?>" class="btn btn-sm btn-primary"><i class="fe fe-edit"></i> Nilai</a>
                    <?php
                    } else {
                    ?>
                        <?= tgl_indo($row_nilai['tgl_nilai']) ?>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr class="text-center">
            <td colspan="7">Maaf data belum ditemukan.</td>
        </tr>
<?php
    }
}

?>