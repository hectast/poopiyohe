<?php
function tampil_data($id_instansi, $base_url, $mysqli)
{
    $sql_penugasan = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in='{$id_instansi}'");
    $no = 1;
    while ($row_penugasan = $sql_penugasan->fetch_object()) {
        // $sql_temuan = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_penugasan->id_penugasan'");
        // $row_temuan = $sql_temuan->fetch_object();
        echo "";
?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row_penugasan->uraian_penugasan; ?></td>
            <td>
                <small class="badge badge-warning">Belum ditindaklanjuti</small>
            </td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                <a href="<?= $base_url; ?>detail_temuan/<?= $row_penugasan->id_penugasan; ?>" class="dropdown-item"><i class="fe fe-search"></i> Detail Penugasan</a>
                <a href="<?= $base_url; ?>input_tindak_lanjut/<?= $row_penugasan->id_penugasan; ?>" class="dropdown-item"><i class="fe fe-plus-circle"></i> Input Tindak Lanjut</a>

                </div>
            </td>
        </tr>
<?php
        echo "";
        $no++;
    }
}
?>