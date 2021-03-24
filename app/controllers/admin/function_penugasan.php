<?php
function tampil_data($mysqli)
{
   
     $nomor = 1;
    $query = "SELECT * FROM penugasan";
    $result = $mysqli->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $idtugas = $row['id_penugasan'];
?>
        <tr>
            
            <td><?= $nomor++ ?></td>
            <td><?= $row['no_st'] ?></td>
            <td><?= date('d-m-Y', strtotime($row['tgl_st'])) ?></td>
            <td><?= $row['nama_penugasan'] ?></td>
            <td><?= $row['jenis_penugasan'] ?></td>
            
            <td>
                <?php
                if (empty($row['auditan_in'])) {
                    $id_opd = $row['auditan_opd'];
                    $result_opd = $mysqli->query("SELECT * FROM opd WHERE id = '$id_opd'");
                    $row_opd = mysqli_fetch_assoc($result_opd);
                    echo $row_opd['nama_instansi'];
                } else {
                    $id_vertikal = $row['auditan_in'];
                    $result_vertikal = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id = '$id_vertikal'");
                    $row_vertikal = mysqli_fetch_assoc($result_vertikal);
                    echo $row_vertikal['nama_instansi'];
                }
                ?>
            </td>
            <td>
            <a href="" data-toggle="modal" data-target="#defaultModalx<?= $idtugas; ?>" class="btn btn-sm btn-primary"><i class="fe fe-search"></i> Lihat Auditor</a>
            </td>
            <td>
            <?php
                if ($row['status'] == 'Belum Selesai') {
                ?>
                    <div class="badge badge-danger"><?= $row['status'] ?></div>
                <?php
                } else {
                ?>
                    <div class="badge badge-success"><?= $row['status'] ?></div>
                <?php
                }
                ?>
            </td>
            <td>
                <a href="#"><i class="fe fe-settings"></i></a>
            </td>
        </tr>
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
                            <div class="col-4">No</div>
                            <div class="col-8">Nama</div>
                        </div>

                        <?php
                            $nmr = 1;
                            $qaudit = "SELECT * FROM penugasan_auditor WHERE id_penugasan='$idtugas'";
                            $rsauditor = $mysqli->query($qaudit);
                            while($rwauditor = mysqli_fetch_assoc($rsauditor)){

                            $idtugas_t = $rwauditor['id'];
                           
                            $auditorname = $mysqli->query("SELECT * FROM auditor WHERE id = '$idtugas_t'");
                           while( $rowauditor = mysqli_fetch_assoc($auditorname)){
                             $auditorname_t = $rowauditor['nama'];
                        ?>
                        <div class="row mt-4">
                            <div class="col-4"><?= $nmr++ ?></div>
                            <div class="col-8"><?= $auditorname_t; ?></div>
                        
                        </div>
                        <?php
                           }
                        }
                           ?>
                        

                    </div>
                   

                </div>
            </div>
        </div> 
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

    while ($row = $result->fetch_object()) {
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->nama ?></td>
            <td>
                <form action="tambah_penugasan" method="POST">
                    <input type="hidden" name="id" value="<?= $row->id ?>">
                    <button type="submit" name="tambah_auditor" class="btn btn-sm btn-primary"><i class="fe fe-plus-circle"></i></button>
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
?>