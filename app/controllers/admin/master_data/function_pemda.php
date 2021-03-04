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

                     <button type="button" class="dropdown-item" data-toggle="modal" data-target="#defaultModal<?= $row->id; ?>">Ubah</button>

                    <form action="pemda" method="post">
                        <input type="hidden" name="token_hapus" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="hapus_data" class="dropdown-item" onclick="return confirm('Yakin menghapus data ini ?')">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>

                            <div class="modal fade" id="defaultModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="pemda" method="post">
                                          <input type="hidden" name="token_edit" value="<?= $token; ?>">
                                          <input type="hidden"  name="idPemda" class="form-control" placeholder="Otomatis" value="<?= $id; ?>">
                                        <div class="form-group">
                                          <label for="message-text" class="col-form-label">Nama Pemda</label>
                                          <input type="text" id="simpleinput" name="namaPemda" class="form-control" value="<?= $row->pemda; ?>">
                                        </div>
                                                                        
                                  </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="ubah_data" class="btn mb-2 btn-primary">Simpan</button>
                                    </div>
                                </div>
                                </form>  
                            </div>
                            </div>

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

function ubah_data($id,$namaPemda,$mysqli)
{
    $ubah = $mysqli->prepare("UPDATE pemda SET pemda='$namaPemda' WHERE id='$id'");
    $ubah->execute();
}

function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM pemda WHERE id='$id'");
    $delete->execute();
}

?>




 ?>