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
            <td align="center">
                <?php if ($row->akses == 1) : ?>
                    <span class="badge badge-success text-light">Monitoring</span>
                <?php elseif ($row->akses == 2) : ?>
                    <span class="badge badge-primary text-light">Korwas</span>
                <?php else : ?>
                    <span class="badge badge-danger text-light"><i class="fe fe-slash"></i></span>
                <?php endif; ?>
            </td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php if ($row->akses == 0) : ?>
                    <form action="data_auditor" method="post">
                        <input type="hidden" name="token_korwas" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="akses_korwas" class="dropdown-item" onclick="return confirm('Anda yakin memeberikan akses korwas?')">Akses Korwas</button>
                    </form>
                    <form action="data_auditor" method="post">
                        <input type="hidden" name="token_monitoring" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="akses_monitoring" class="dropdown-item" onclick="return confirm('Anda yakin memeberikan akses monitoring?')">Akses Monitoring</button>
                    </form>
                    <div class="border-bottom"></div>
                    <?php else : ?>
                    <form action="data_auditor" method="post">
                        <input type="hidden" name="token_hapus_akses" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="hapus_akses" class="dropdown-item" onclick="return confirm('Anda yakin menghapus akses <?= $row->akses == 2 ? 'Korwas' : 'Monitoring'; ?>?')">Hapus Akses <?= $row->akses == 2 ? "Korwas" : "Monitoring"; ?></button>
                    </form>
                    <div class="border-bottom"></div>
                    <?php endif; ?>
                    
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

function simpan_data($namaauditor, $emailauditor, $hash_pass, $mysqli)
{
    $insert = $mysqli->prepare("INSERT INTO auditor(nama,email,password)  VALUES ('$namaauditor','$emailauditor','$hash_pass')");
    $insert->execute();
}

function edit_data($id, $namaauditor, $emailauditor, $mysqli)
{
    $edit = $mysqli->prepare("UPDATE auditor SET nama='$namaauditor' , email='$emailauditor' WHERE id='$id'");
    $edit->execute();
}

function akses_korwas($id, $mysqli)
{
    $akses_korwas = $mysqli->prepare("UPDATE auditor SET akses=2 WHERE id='$id'");
    $akses_korwas->execute();
}

function akses_monitoring($id, $mysqli)
{
    $akses_monitoring = $mysqli->prepare("UPDATE auditor SET akses=1 WHERE id='$id'");
    $akses_monitoring->execute();
}

function hapus_akses($id, $mysqli)
{
    $hapus_akses = $mysqli->prepare("UPDATE auditor SET akses=0 WHERE id='$id'");
    $hapus_akses->execute();
}