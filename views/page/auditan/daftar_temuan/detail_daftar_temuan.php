<?php
$sql = "SELECT * FROM temuan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_object();
$hal_lain = $row->hal;

if (mysqli_num_rows($result) > 0) {

?>
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url; ?>daftar_temuan" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="temuanArea">

                                        <div id="temuanGroup">
                                            <h5><u>Temuan 1</u></h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label>Rupiah</label>
                                                        <input type="text" id="cekRupiah" class="form-control" value="Rp. <?= number_format($row->isirupiah); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label>Kondisi</label>
                                                        <input type="text" id="cekRupiah" class="form-control" value="<?= $row->kondisi; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php
                                                $sql_data_uraian = $mysqli->query("SELECT * FROM data_uraian WHERE id_temuan='$row->id_temuan'");
                                                $row_data_uraian = $sql_data_uraian->fetch_object();
                                                $sql_uraian = $mysqli->query("SELECT * FROM uraian WHERE id_uraian='$row_data_uraian->id_uraian'");

                                                $sql_data_akibat = $mysqli->query("SELECT * FROM data_akibat WHERE id_temuan='$row->id_temuan'");
                                                $row_data_akibat = $sql_data_akibat->fetch_object();
                                                $sql_akibat = $mysqli->query("SELECT * FROM akibat WHERE id_akibat='$row_data_akibat->id_akibat'");
                                                ?>

                                                <div class="col-md-6">
                                                    <?php while ($row_uraian = $sql_uraian->fetch_object()) : ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="cekRupiah">Uraian</label>
                                                                    <input type="text" class="form-control" value="<?= $row_uraian->uraian; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php while ($row_akibat = $sql_akibat->fetch_object()) : ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="cekRupiah">Akibat</label>
                                                                    <input type="text" class="form-control" value="<?= $row_akibat->akibat; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php
                                                $sql_data_kriteria = $mysqli->query("SELECT * FROM data_kriteria WHERE id_temuan='$row->id_temuan'");
                                                $row_data_kriteria = $sql_data_kriteria->fetch_object();
                                                $sql_kriteria = $mysqli->query("SELECT * FROM kriteria WHERE id_kriteria=14");

                                                $sql_data_sebab = $mysqli->query("SELECT * FROM data_sebab WHERE id_temuan='$row->id_temuan'");
                                                $row_data_sebab = $sql_data_sebab->fetch_object();
                                                $sql_sebab = $mysqli->query("SELECT * FROM sebab WHERE id_sebab='$row_data_sebab->id_sebab'");
                                                ?>
                                                <div class="col-md-6">
                                                    <?php while ($row_kriteria = $sql_kriteria->fetch_object()) : ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="cekRupiah">Kriteria</label>
                                                                    <input type="text" class="form-control" value="<?= $row_kriteria->kriteria; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php while ($row_sebab = $sql_sebab->fetch_object()) : ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="cekRupiah">Sebab</label>
                                                                    <input type="text" class="form-control" value="<?= $row_sebab->sebab; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php
                                                $sql_data_rekomendasi = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row->id_temuan'");
                                                // $row_data_rekomendasi = $sql_data_rekomendasi->fetch_object();

                                                ?>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-3">
                                                                <label for="cekRupiah">Rekomendasi</label>
                                                                <?php while ($row_data_rekomendasi = $sql_data_rekomendasi->fetch_object()) : ?>
                                                                    <?php
                                                                    $sql_rekomendasi = $mysqli->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$row_data_rekomendasi->id_rekomendasi'");
                                                                    $row_rekomendasi = $sql_rekomendasi->fetch_object()
                                                                    ?>
                                                                    <input type="text" class="form-control mb-2" value="<?= $row_rekomendasi->rekomendasi; ?>" disabled>
                                                                <?php endwhile; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-3">
                                                                <label for="cekRupiah">Hal-hal Lain</label>
                                                                <input type="text" class="form-control mb-2" value="<?= $hal_lain; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
<?php
}
?>