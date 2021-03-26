<?php

function tampil_data($mysqli){
    $query = "SELECT * FROM auditor ORDER BY id ASC";
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
            <td><?= $row->email; ?></td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" data-toggle="modal" data-target="#modal-default<?= $id; ?>">Ubah</button>
                    <form action="data_auditor" method="post">
                        <input type="hidden" name="token_hapus" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="hapus_data" class="dropdown-item" onclick="return confirm('Anda Yakin Menghapus Data Ini?')">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        <div class="modal fade" id="modal-default<?= $id; ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Ubah Auditor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="data_auditor" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $id; ?>">
                                            <div class="form-group">
                                                <label>Nama Auditor</label>
                                                <input type="hidden" name="token_ubah" value="<?= $token; ?>">
                                                <input type="text" autocomplete="off" name="namaauditor" class="form-control" value="<?= $row->nama; ?>" required>
                                                <label>Email Auditor</label>
                                                <input type="email" name="emailauditor" class="form-control" value="<?= $row->email; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
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

function simpan_data($namaauditor, $emailauditor, $mysqli){
    $insert = $mysqli->prepare("INSERT INTO auditor(nama,email)  VALUES ('$namaauditor','$emailauditor')");
    $insert->execute();
}

function edit_data($id, $namaauditor, $emailauditor, $mysqli){
    $edit = $mysqli->prepare("UPDATE auditor SET nama='$namaauditor' , email='$emailauditor' WHERE id='$id'");
    $edit->execute();
}
