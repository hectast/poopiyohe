<?php
function tampil_data_auditor($mysqli){
    $nomor = 1;
    $query = "SELECT * FROM auditor ORDER BY id ASC";
    $result = $mysqli->query($query);
    while($r = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $r['nama'] ?></td>
            <td><a href="" class="btn btn-sm btn-primary"><i class="fe fe-plus-circle"></i> </a></td>
        </tr>
    <?php
    }
}

?>