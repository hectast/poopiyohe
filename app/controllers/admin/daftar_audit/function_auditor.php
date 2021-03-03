<?php

function tampil_data($mysqli){
    $query = "SELECT * FROM auditor ORDER BY nama ASC";
    $to = $mysqli->prepare($query);
    $to->execute();
    $result = $to->get_result();
    $no = 1;
    while ($row = $result->fetch_object()) {
        $id = $row->id;
        $tkn = 'sam_san_tech)';
        $token = md5("$tkn:$id");
        echo "";


?>
 <tr>
            <td><?= $no; ?></td>
            <td><?= $row->nama; ?></td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Ubah</a>
                    <form action="kemlem" method="post">
                        <input type="hidden" name="token_hapus" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="hapus_data" class="dropdown-item">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php
        echo "";
        $no++;
    }
}   
function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM auditor WHERE id='$id'");
    $delete->execute();
}