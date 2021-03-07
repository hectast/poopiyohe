<?php

function tampil_data($mysqli)
{
    $query = "SELECT * FROM penugasan";
    $to = $mysqli->prepare($query);
    $to->execute();
    $result = $to->get_result();
    $no = 1;
    while ($row = $result->fetch_object()) {
        $idtugas = $row->id_tugas;
        $tugas = $row->tugas;
        $tkn = 'sam_san_tech)';
        $token = md5("$tkn:$idtugas");
        echo "";
?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row->tugas; ?></td>
            <td><a href="" data-toggle="modal" data-target="#defaultModalx<?= $idtugas; ?>" class="btn btn-sm btn-primary"><i class="fe fe-search"></i> Lihat Auditor</a></td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#defaultModal<?= $idtugas; ?>">Ubah</button>
                    <form action="instansi_vertikal" method="post">
                        <input type="hidden" name="token_hapus" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button type="submit" name="hapus_data" onclick="return confirm('Yakin menghapus data ini?')" class="dropdown-item">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        <!-- modal -->
        <div class="modal fade" id="defaultModalx<?= $idtugas; ?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Form Ubah Instansi Vertikal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                        <h4>asdas</h4>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="ubah_data" class="btn mb-2 btn-primary">Simpan Perubahan</button>
                        </div>
                    
                </div>
            </div>
        </div>
        <!-- modal2 -->
   

<?php
       
    }
}

function tampil_data_auditor($mysqli){
    $query = "SELECT * FROM auditor";
    $to = $mysqli->prepare($query);
    $to->execute();
    $result = $to->get_result();
    $no = 1;
    $nomor=1;
    while ($row = $result->fetch_object()) {
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $id = $row->id?></td>
        <td><?=  $row->nama?></td>
        <td>
          <a href="" class="btn btn-info btn-sm"><i class="fe fe-plus-circle"></i>  </a>
        </td>
    </tr>
<?php
}
}
?>