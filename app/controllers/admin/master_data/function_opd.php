<?php

function tampil_data($mysqli)
{
    $query = "SELECT * FROM opd ORDER BY nama_instansi ASC";
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
            <td><?= $row->nama_instansi; ?></td>
            <td><?= $row->nama_pemda; ?></td>
            <td><?= $row->keterangan; ?></td>

            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#defaultModal<?= $id; ?>">Ubah</button>
                    <form action="OPD" method="post">
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
                    <form action="OPD" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="token_edit" value="<?= $token; ?>">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <div class="form-group">
                                <label for="instansi" class="col-form-label">Nama Instansi</label>
                                <input type="text" id="instansi" name="instansi" class="form-control" value="<?= $row->nama_instansi; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pilih-pemda">Pemerintah Daerah</label>
                                <select class="form-control select2 <?= $id; ?>" id="pilih-pemda" name="nama_pemda">
                                    <option>--Pilih Pemerintah Daerah--</option> 
                                    <?php
                                        if ($row->nama_pemda == "Provinsi Gorontalo") {
                                            echo "
                                                <option value='{$row->nama_pemda}' selected>Provinsi Gorontalo</option>
                                                <option>Kota Gorontalo</option>
                                                <option>Kabupaten Gorontalo</option>
                                                <option>Kabupaten Boalemo</option>
                                                <option>Kabupaten Pohuwato</option>
                                                <option>Kabupaten Bone Bolango</option>
                                                <option>Kabupaten Gorontalo Utara</option>

                                            ";
                                        }elseif ($row->nama_pemda == "Kota Gorontalo") {
                                            echo "
                                                <option>Provinsi Gorontalo</option>
                                                <option value='{$row->nama_pemda}' selected>Kota Gorontalo</option>
                                                <option>Kabupaten Gorontalo</option>
                                                <option>Kabupaten Boalemo</option>
                                                <option>Kabupaten Pohuwato</option>
                                                <option>Kabupaten Bone Bolango</option>
                                                <option>Kabupaten Gorontalo Utara</option>

                                            ";
                                        }elseif ($row->nama_pemda == "Kabupaten Gorontalo") {
                                            echo "
                                                <option>Provinsi Gorontalo</option>
                                                <option>Kota Gorontalo</option>
                                                <option value='{$row->nama_pemda}' selected>Kabupaten Gorontalo</option>
                                                <option>Kabupaten Boalemo</option>
                                                <option>Kabupaten Pohuwato</option>
                                                <option>Kabupaten Bone Bolango</option>
                                                <option>Kabupaten Gorontalo Utara</option>
                                            ";
                                        }elseif ($row->nama_pemda == "Kabupaten Boalemo") {
                                            echo "
                                                <option>Provinsi Gorontalo</option>
                                                <option>Kota Gorontalo</option>
                                                <option>Kabupaten Gorontalo</option>
                                                <option value='{$row->nama_pemda}' selected>Kabupaten Boalemo</option>
                                                <option>Kabupaten Pohuwato</option>
                                                <option>Kabupaten Bone Bolango</option>
                                                <option>Kabupaten Gorontalo Utara</option>
                                            ";
                                        }elseif ($row->nama_pemda == "Kabupaten Pohuwato") {
                                            echo "                                                
                                                <option>Provinsi Gorontalo</option>
                                                <option>Kota Gorontalo</option>
                                                <option>Kabupaten Gorontalo</option>
                                                <option>Kabupaten Boalemo</option>
                                                <option value='{$row->nama_pemda}' selected>Kabupaten Pohuwato</option>
                                                <option>Kabupaten Bone Bolango</option>
                                                <option>Kabupaten Gorontalo Utara</option>
                                            ";
                                        }elseif ($row->nama_pemda == "Kabupaten Bone Bolango") {
                                            echo "                                                
                                                <option>Provinsi Gorontalo</option>
                                                <option>Kota Gorontalo</option>
                                                <option>Kabupaten Gorontalo</option>
                                                <option>Kabupaten Boalemo</option>
                                                <option>Kabupaten Pohuwato</option>
                                                <option value='{$row->nama_pemda}' selected>Kabupaten Bone Bolango</option>
                                                <option>Kabupaten Gorontalo Utara</option>
                                            ";
                                        }elseif ($row->nama_pemda == "Kabupaten Gorontalo Utara") {
                                            echo "
                                                <option>Provinsi Gorontalo</option>
                                                <option>Kota Gorontalo</option>
                                                <option>Kabupaten Gorontalo</option>
                                                <option>Kabupaten Boalemo</option>
                                                <option>Kabupaten Pohuwato</option>
                                                <option>Kabupaten Bone Bolango</option>
                                                <option value='{$row->nama_pemda}' selected>Kabupaten Gorontalo Utara</option>
                                            ";
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

function simpan_data($instansi, $nama_pemda, $keterangan, $mysqli)
{
    $save = $mysqli->prepare("INSERT INTO opd (nama_instansi,nama_pemda,keterangan) VALUES ('$instansi','$nama_pemda','$keterangan')");
    $save->execute();
}

function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM opd WHERE id='$id'");
    $delete->execute();
}

function ubah_data($id, $instansi, $nama_pemda, $keterangan, $mysqli)
{
    $update = $mysqli->prepare("UPDATE opd SET nama_instansi='$instansi', nama_pemda='$nama_pemda',keterangan='$keterangan' WHERE id='$id'");
    $update->execute();
}

?>