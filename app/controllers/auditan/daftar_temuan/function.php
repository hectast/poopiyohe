<?php
    function tampil_data($base_url, $mysqli) {
        $sql_penugasan = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan=62");
        $no=1;
        while ($row_penugasan = $sql_penugasan->fetch_object()) {
            // $sql_temuan = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_penugasan->id_penugasan'");
            // $row_temuan = $sql_temuan->fetch_object();
            echo"";
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row_penugasan->uraian_penugasan; ?></td>
                    <td>
                    <a href="<?= $base_url; ?>detail_temuan/<?= $row_penugasan->id_penugasan; ?>" class="btn btn-sm btn-primary" type="button">
                        <span class="fe fe-search"></span>
                    </a>
                </td>
            </tr>
            <?php
            echo"";
        $no++;
        }
    }
?>