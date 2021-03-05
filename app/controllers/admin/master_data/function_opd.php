<?php 

function tampil_data($mysqli)
{
    $query = "SELECT * FROM opd ORDER BY nama_unit ASC";
    $to = $mysqli->prepare($query);
    $to->execute();
    $result = $to->get_result();
    $no = 1;
    while ($row = $result->fetch_object()) {
        $id = $row->id;
        $id_pemda = $row->id_pemda;

        $query = "SELECT * FROM pemda WHERE id='$id_pemda'";
        $to_pemda = $mysqli->prepare($query);
        $to_pemda->execute();
        $result_pemda = $to_pemda->get_result();
        $row_pemda = $result_pemda->fetch_object();

        $tkn = 'sam_san_tech)';
        $token = md5("$tkn:$id");
        echo "";
?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row->nama_unit; ?></td>
            <td><?= $row_pemda->pemda; ?></td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#defaultModal<?= $id; ?>">Ubah</button>
                    <form action="opd" method="post">
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
                        <h5 class="modal-title" id="defaultModalLabel">Form Ubah OPD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="opd" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="token_edit" value="<?= $token; ?>">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <div class="form-group">
                                <label for="instansi" class="col-form-label">OPD</label>
                                <input type="text" id="opd" name="opd" class="form-control" value="<?= $row->nama_unit; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pilih-pemda">Pemerintah Daerah</label>
                                <select class="form-control select2ubah" id="pilih-pemda" name="id_pemda">
                                    <option>--Pilih Pemerintah Daerah--</option>
                                    <?php
                                    $query2 = "SELECT * FROM pemda";
                                    $to_pemda2 = $mysqli->prepare($query2);
                                    $to_pemda2->execute();
                                    $result_pemda2 = $to_pemda2->get_result();
                                    while ($row_pemda2 = $result_pemda2->fetch_object()) {
                                        if ($row_pemda2->id == $id_pemda) {
                                            echo "";
                                    ?>
                                            <option value="<?= $row_pemda2->id; ?>" selected><?= $row_pemda2->pemda; ?></option>
                                        <?php
                                            echo "";
                                        } else {
                                            echo "";
                                        ?>
                                            <option value="<?= $row_pemda2->id; ?>"><?= $row_pemda2->pemda; ?></option>
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


function simpan_data($opd, $id_pemda, $mysqli)
{
    $save = $mysqli->prepare("INSERT INTO opd (nama_unit,id_pemda) VALUES ('$opd', '$id_pemda')");
    $save->execute();
}

function ubah_data($id, $opd, $id_pemda, $mysqli)
{
    $update = $mysqli->prepare("UPDATE opd SET nama_unit='$opd',id_pemda='$id_pemda' WHERE id='$id'");
    $update->execute();
}

function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM opd WHERE id='$id'");
    $delete->execute();
}

 ?>