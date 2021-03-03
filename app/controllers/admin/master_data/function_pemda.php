<?php 

function tampil_data($mysqli)
{
	$query = "SELECT * FROM pemda ORDER BY pemda ASC";
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
            <td><?= $row->pemda; ?></td>
            <td>
                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Aksi</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="pemda?id=<?= $id ?>">Ubah</a>
                    <form action="pemda" method="post">
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


function simpan_data($namaPemda,$mysqli)
{
	$simpan = $mysqli->prepare("INSERT INTO pemda VALUES ('','$namaPemda')"); 
	$simpan->execute();
}

function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM pemda WHERE id='$id'");
    $delete->execute();
}

?>




 ?>