<?php
$sql = "SELECT * FROM temuan WHERE id_temuan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_object();

if (mysqli_num_rows($result) > 0) {
?>
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url; ?>detail_temuan/<?= $row->id_penugasan; ?>" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>

            <div class="row justify-content-center mt-4">

                <div class="col-md-8">
                    <?php
                    $sql_data_rekomendasi = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row->id_temuan'");
                    ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4>Temuan 1</h4>
                                </div>
                            </div>
                            <div class="border-bottom mb-3"></div>
                            <?php while ($row_data_rekomendasi = $sql_data_rekomendasi->fetch_object()) : ?>
                                <div class="form-group">
                                    <?php
                                    $sql_rekomendasi = $mysqli->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$row_data_rekomendasi->id_rekomendasi'");
                                    $row_rekomendasi = $sql_rekomendasi->fetch_object()
                                    ?>
                                    <label>Rekomendasi/Saran/Atensi</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mb-2" value="<?= $row_rekomendasi->rekomendasi; ?>" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?= $base_url; ?>tindak_lanjut_rekom/<?= $row_rekomendasi->id_rekomendasi; ?>" class="btn btn-block btn-primary">Tindak Lanjut</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Tindak Lanjut</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Upload Bukti</label>
                                    <input type="file" class="form-control-file">
                                </div> -->
                            <?php endwhile; ?>  
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
<?php
}
?>