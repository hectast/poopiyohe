<?php

function tampil_data($mysqli)
{
    $query = "SELECT * FROM kemlem ORDER BY kemlem ASC";
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
            <td><?= $row->kemlem; ?></td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#defaultModal<?= $id; ?>">Ubah</button>
                    <form action="kemlem" method="post">
                        <input type="hidden" name="token_hapus" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="hapus_data" onclick="return confirm('Yakin menghapus data ini?')" class="dropdown-item">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>

        <div class="modal fade" id="defaultModal<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Form Ubah Kementrian/Lembaga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="kemlem" method="post">
                        <div class="modal-body">
                                <input type="hidden" name="token_edit" value="<?= $token; ?>">
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                <div class="form-group">
                                    <label for="kemlem" class="col-form-label">Nama Kementrian/Lembaga</label>
                                    <input type="text" id="kemlem" name="kemlem" class="form-control" value="<?= $row->kemlem; ?>">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="ubah_data" class="btn mb-2 btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
        echo "";
        $no++;
    }
}

function simpan_data($kemlem, $mysqli)
{
    $save = $mysqli->prepare("INSERT INTO kemlem (kemlem) VALUES ('$kemlem')");
    $save->execute();
}

function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM kemlem WHERE id='$id'");
    $delete->execute();
}

function ubah_data($id, $kemlem, $mysqli)
{
    $update = $mysqli->prepare("UPDATE kemlem SET kemlem='$kemlem' WHERE id='$id'");
    $update->execute();
}

?>