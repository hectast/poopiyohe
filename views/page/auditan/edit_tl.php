<?php
$sql_rekomendasi = "SELECT * FROM rekomendasi WHERE id_rekomendasi='{$_GET['id']}'";
$stmt_rekomendasi = $mysqli->prepare($sql_rekomendasi);
$stmt_rekomendasi->execute();
$result_rekomendasi = $stmt_rekomendasi->get_result();
$row_rekomendasi = $result_rekomendasi->fetch_object();

if (mysqli_num_rows($result_rekomendasi) > 0) {
    $sql_data_rekomendasi = $mysqli->prepare("SELECT * FROM data_rekomendasi WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
    $sql_data_rekomendasi->execute();
    $result_data_rekomendasi = $sql_data_rekomendasi->get_result();
    $row_data_rekomendasi = $result_data_rekomendasi->fetch_object();

    $sql_temuan = $mysqli->prepare("SELECT * FROM temuan WHERE id_temuan='$row_data_rekomendasi->id_temuan'");
    $sql_temuan->execute();
    $result_temuan = $sql_temuan->get_result();
    $row_temuan = $result_temuan->fetch_object();

?>
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url; ?>auditan_cek_tl/<?= $_GET['tm'] ?>/<?= $_GET['id'] ?>" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <input type="hidden" name="id_temuan" value="<?= $row_data_rekomendasi->id_temuan; ?>">
                            <input type="hidden" name="id_rekomendasi" value="<?= $row_data_rekomendasi->id_rekomendasi; ?>">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4>Temuan <?= $_GET['tm']; ?></h4>
                                </div>
                            </div>
                            <div class="border-bottom mb-3"></div>
                            <?php
                            $query_cek = $mysqli->query("SELECT * FROM temuan WHERE id_temuan ='$row_temuan->id_temuan'");
                            $cek = $query_cek->fetch_assoc();
                            $nonrp = $cek['jenisnominal'];

                            if ($nonrp == "Non Rupiah") {
                            } else {
                            ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nilai Awal Temuan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" name="" value="<?= number_format($row_temuan->isirupiah); ?>" type="text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Saldo</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" value="<?= number_format($row_temuan->saldo); ?>" type="text" disabled>
                                                <input type="hidden" name="saldo" value="<?= $row_temuan->saldo; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="form-group">
                                <label>Rekomendasi/Saran/Atensi</label>
                                <input type="text" class="form-control mb-2" value="<?= $row_rekomendasi->rekomendasi; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql_tl = $mysqli->prepare("SELECT * FROM tindak_lanjut WHERE id_tl='$_GET[tl]'");
                    $sql_tl->execute();
                    $result_tl = $sql_tl->get_result();
                    while ($row_tl = $result_tl->fetch_object()) {
                    ?>
                    <form action="<?= $base_url ?>auditan_cek_tl/<?= $_GET['tm'] ?>/<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_tl" value="<?= $_GET['tl']; ?>"> 
                        <input type="hidden" name="id_rekomendasi" value="<?= $_GET['id']; ?>">                   
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Uraian TL</label>
                                    <input class="form-control" name="uraian_tl" type="text" >
                                </div>
                                <div class="form-group">
                                    <label>Nominal TL</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        
                                        <input class="form-control" name="nominal_tl" oninvalid="this.setCustomValidity('Nominal Melebihi Saldo (Rp. <?= number_format($cek['saldo']) ?>)')" type="number" max="<?= $cek['saldo'] ?>">
                                        <small></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bukti TL</label>
                                    <br>                
                                    <input type="hidden" name="file_sebelumnya" value="<?= $row_tl->file_tl; ?>">            
                                   <input type="file" name="file">
                                </div>
                                <button class="btn btn-primary btn-block" type="submit" name="edit_tl"><i class="fe fe-send"></i> Kirim</button>
                              
                                   
                            </div>
                        </div>
                    </form>

                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </main>
<?php
}
?>