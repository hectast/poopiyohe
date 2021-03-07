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
            <td><?= $row->nama_instansi; ?></td>
            <td><?= $row->keterangan; ?></td>
            <td><?= $row_pemda->pemda; ?></td>

            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#defaultModal<?= $id; ?>">Ubah</button>
                    <form action="instansi_vertikal" method="post">
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
                                <label for="pilih-pemda">Pemerintah Daerah</label>
                                <select class="form-control select2 <?= $id; ?>" id="pilih-pemda" name="id_pemda">
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
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" class="form-control"><?= $row->keterangan; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="ubah_data" class="btn mb-2 btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src='assets/js/select2.min.js'></script>
        <script>
              $('.select2.<?= $id; ?>').select2({
                theme: 'bootstrap4',
              });
        </script>

<?php
        echo "";
        $no++;

    }
}

function simpan_data($instansi, $keterangan, $id_pemda, $mysqli)
{
    $save = $mysqli->prepare("INSERT INTO instansi_vertikal (nama_instansi,keterangan,id_pemda) VALUES ('$instansi','$keterangan', '$id_pemda')");
    $save->execute();
}

function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM instansi_vertikal WHERE id='$id'");
    $delete->execute();
}

function ubah_data($id, $instansi, $keterangan, $id_pemda, $mysqli)
{
    $update = $mysqli->prepare("UPDATE instansi_vertikal SET nama_instansi='$instansi', keterangan='$keterangan', id_pemda='$id_pemda' WHERE id='$id'");
    $update->execute();
}

?>