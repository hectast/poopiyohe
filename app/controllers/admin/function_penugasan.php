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
        $id_instansi = $row->id_instansi_vertikal;
        $qinstansi = "SELECT * FROM instansi_vertikal WHERE id = '$id_instansi'";
        $rwinstansi = $mysqli->query($qinstansi);
        $rinstansi = mysqli_fetch_assoc($rwinstansi);
        $id_pemda = $row->id_pemda;
        $qpemda = "SELECT * FROM pemda WHERE id = '$id_pemda'";
        $rwpemda = $mysqli->query($qpemda);
        $rpemda = mysqli_fetch_assoc($rwpemda);
        $status = $row->status;
        $tkn = 'sam_san_tech)';
        $token = md5("$tkn:$idtugas");
        echo "";
?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $rinstansi['nama_instansi']; ?></td>
            <td><?= $rpemda['pemda']; ?></td>
            <td><a href="" data-toggle="modal" data-target="#defaultModalx<?= $idtugas; ?>" class="btn btn-sm btn-primary"><i class="fe fe-search"></i> Lihat Auditor</a></td>
            <td><?= $status; ?></td>           
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#defaultModal<?= $idtugas; ?>">Ubah</button>
                    <form action="instansi_vertikal" method="post">
                        <input type="hidden" name="token_hapus" value="<?= $token; ?>">
                        <input type="hidden" name="id" value="">
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
                        <div class="row">
                            <div class="col-2">No</div>
                            <div class="col-10">Nama</div>
                        </div>

                        <?php
                            $nmr = 1;
                            $qaudit = "SELECT * FROM auditor_penugasan WHERE id_tugas='$idtugas'";
                            $rsauditor = $mysqli->query($qaudit);
                            while($rwauditor = mysqli_fetch_assoc($rsauditor)){

                            $idtugas_t = $rwauditor['id'];
                           
                            $auditorname = $mysqli->query("SELECT * FROM auditor WHERE id = '$idtugas_t'");
                           while( $rowauditor = mysqli_fetch_assoc($auditorname)){
                             $auditorname_t = $rowauditor['nama'];
                        ?>
                        <div class="row">
                            <div class="col-2"><?= $nmr++ ?></div>
                            <div class="col-10"><?= $auditorname_t; ?></div>
                        
                        </div>
                        <?php
                           }
                        }
                           ?>
                        

                    </div>
                   

                </div>
            </div>
        </div>
        <!-- modal2 -->


    <?php
                           
    }
}

function tampil_data_auditor($mysqli)
{
    $query = "SELECT * FROM auditor";
    $to = $mysqli->prepare($query);
    $to->execute();
    $result = $to->get_result();
    $no = 1;
    $nomor = 1;
    while ($row = $result->fetch_object()) {
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $id = $row->id ?></td>
            <td><?= $row->nama ?></td>
            <td>
                <form action="tambah_penugasan" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" name="tambah_auditor" class="btn btn-sm btn-primary"><i class="fe fe-plus-circle"></i> Auditor</button>
                </form>

            </td>
        </tr>
    <?php
    }
}

function tampil_data_auditor_selek($mysqli)
{
    if (empty($_SESSION['keranjang'])) {
    ?>
        <tr>
            <td colspan="3" align="center">Auditor Kosong</td>
        </tr>
        <?php
    } else {
        $nomor = 1;
        foreach (($_SESSION["keranjang"]) as $id) :
        ?>
            <?php
            $query = $mysqli->query("SELECT * FROM auditor WHERE id = '$id' ");
            $tampil = $query->fetch_assoc();
            ?>
            <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $tampil['nama']; ?></td>
                <td>
                    <form action="tambah_penugasan" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" name="hapus_keranjang" class="btn btn-sm btn-danger "><i class="fe fe-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    <?php }
}


function tampil_data_pemda($mysqli)
{
    $query = "SELECT * FROM pemda";
    $result = $mysqli->query($query);
    while ($d = mysqli_fetch_assoc($result)) {
    ?>
        <option value="<?= $d['id'] ?>"><?= $d['pemda']; ?></option>
<?php
    }
}
?>