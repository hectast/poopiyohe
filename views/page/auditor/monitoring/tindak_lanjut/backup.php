// if (mysqli_num_rows($sql_tindak_lanjut) > 0) {
                                                    $rws_tindak_lanjut = $sql_tindak_lanjut->fetch_assoc();
                                                    if ($rws_tindak_lanjut['status'] == "Tuntas" && $rws_tindak_lanjut['status'] != "Tuntas Sebagian") {
                                                ?>
                                                    <div class="col-md-4">
                                                        <div class="card shadow bg-success text-center mb-3">
                                                            <div class="card-body p-4">
                                                                <span class="circle circle-md bg-success-light">
                                                                    <i class="fe fe-check fe-24 text-white"></i>
                                                                </span>
                                                                <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                <p class="text-white mt-1 mb-3"><?= $row_rekomendasi->rekomendasi; ?></p>
                                                                <a href="<?= $base_url; ?>monitoring_cek_tl/<?= $no; ?>/<?= $row_rekomendasi->id_rekomendasi; ?>" class="btn bg-success-light text-white">Cek TL<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                                                            </div> <!-- .card-body -->
                                                        </div> <!-- .card -->
                                                    </div>
                                                <?php
                                                    } else if ($rws_tindak_lanjut['status'] == "Tuntas Sebagian") {
                                                ?>
                                                    <div class="col-md-4">
                                                        <div class="card shadow bg-warning text-center mb-3">
                                                            <div class="card-body p-4">
                                                                <span class="circle circle-md bg-warning-light">
                                                                    <i class="fe fe-minus fe-24 text-white"></i>
                                                                </span>
                                                                <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                <p class="text-white mt-1 mb-3"><?= $row_rekomendasi->rekomendasi; ?></p>
                                                                <a href="<?= $base_url; ?>monitoring_cek_tl/<?= $no; ?>/<?= $row_rekomendasi->id_rekomendasi; ?>" class="btn bg-warning-light text-white">Cek TL<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                                                            </div> <!-- .card-body -->
                                                        </div> <!-- .card -->
                                                    </div>
                                                <?php
                                                    } else {
                                                ?>
                                                        <div class="col-md-4">
                                                            <div class="card shadow bg-primary text-center mb-3">
                                                                <div class="card-body p-4">
                                                                    <span class="circle circle-md bg-primary-light">
                                                                        <i class="fe fe-edit-2 fe-24 text-white"></i>
                                                                    </span>
                                                                    <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                    <p class="text-white mt-1 mb-3"><?= $row_rekomendasi->rekomendasi; ?></p>
                                                                    <a href="<?= $base_url; ?>monitoring_cek_tl/<?= $no; ?>/<?= $row_rekomendasi->id_rekomendasi; ?>" class="btn bg-primary-light text-white">Cek TL<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                                                                </div> <!-- .card-body -->
                                                            </div> <!-- .card -->
                                                        </div>
                                                <?php
                                                    }
                                                } else {
                                                ?>
                                                    <div class="col-md-4">
                                                        <div class="card shadow bg-danger text-center mb-3">
                                                            <div class="card-body p-4">
                                                                <span class="circle circle-md bg-danger-light">
                                                                    <i class="fe fe-x fe-24 text-white"></i>
                                                                </span>
                                                                <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                <p class="text-white mt-1 mb-3"><?= $row_rekomendasi->rekomendasi; ?></p>
                                                                <a href="javascript:void(0)" class="btn bg-danger-light text-white" style="cursor:unset;">Belum Diusulkan</a>
                                                            </div> <!-- .card-body -->
                                                        </div> <!-- .card -->
                                                    </div>
                                            <?php
                                                }