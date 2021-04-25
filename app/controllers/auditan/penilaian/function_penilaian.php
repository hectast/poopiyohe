<?php
function tampil_daftar_tugas($mysqli)
{
    $nomor = 1;
    $query = $mysqli->prepare("SELECT * FROM penugasan ORDER BY id_penugasan DESC");
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {
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
                $row_nilai = mysqli_fetch_assoc($resultx);
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
}

?>