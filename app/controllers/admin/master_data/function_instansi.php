<?php

function tampil_data($mysqli)
{
    $query = "SELECT * FROM instansi_vertikal ORDER BY nama_instansi ASC";
    $to = $mysqli->prepare($query);
    $to->execute();
    $result = $to->get_result();
    $no = 1;
    while ($row = $result->fetch_object()) {
        $id = $row->id;
        $id_kemlem = $row->id_kemlem;

        $query = "SELECT * FROM kemlem WHERE id='$id_kemlem'";
        $to_kemlem = $mysqli->prepare($query);
        $to_kemlem->execute();
        $result_kemlem = $to_kemlem->get_result();
        $row_kemlem = $result_kemlem->fetch_object();

        $tkn = 'sam_san_tech)';
        $token = md5("$tkn:$id");
        echo "";
?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row->nama_instansi; ?></td>
            <td><?= $row_kemlem->kemlem; ?></td>
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
                        <h5 class="modal-title" id="defaultModalLabel">Form Ubah Instansi Vertikal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="instansi_vertikal" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="token_edit" value="<?= $token; ?>">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <div class="form-group">
                                <label for="instansi" class="col-form-label">Nama Instansi</label>
                                <input type="text" id="instansi" name="instansi" class="form-control" value="<?= $row->nama_instansi; ?>">
                            </div>
                            <div class="form-group">
                                <label for="simple-select2">Kementrian/Lembaga</label>
                                <select class="form-control select2" id="simple-select2" name="id_kemlem">
                                    <option>--Pilih Kementrian/Lembaga--</option>
                                    <?php
                                    $query2 = "SELECT * FROM kemlem";
                                    $to_kemlem2 = $mysqli->prepare($query2);
                                    $to_kemlem2->execute();
                                    $result_kemlem2 = $to_kemlem2->get_result();
                                    while ($row_kemlem2 = $result_kemlem2->fetch_object()) {
                                        if ($row_kemlem2->id == $id_kemlem) {
                                            echo "";
                                    ?>
                                            <option value="<?= $row_kemlem2->id; ?>" selected><?= $row_kemlem2->kemlem; ?></option>
                                        <?php
                                            echo "";
                                        } else {
                                            echo "";
                                        ?>
                                            <option value="<?= $row_kemlem2->id; ?>"><?= $row_kemlem2->kemlem; ?></option>
                                    <?php
                                            echo "";
                                        }
                                    }
                                    ?>
                                </select>
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

function simpan_data($instansi, $id_kemlem, $mysqli)
{
    $save = $mysqli->prepare("INSERT INTO instansi_vertikal (nama_instansi,id_kemlem) VALUES ('$instansi', '$id_kemlem')");
    $save->execute();
}

function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM instansi_vertikal WHERE id='$id'");
    $delete->execute();
}

function ubah_data($id, $instansi, $id_kemlem, $mysqli)
{
    $update = $mysqli->prepare("UPDATE instansi_vertikal SET nama_instansi='$instansi',id_kemlem='$id_kemlem' WHERE id='$id'");
    $update->execute();
}

?>