<?php
    $stmtGetTemuan = $mysqli->prepare("SELECT * FROM temuan WHERE id_penugasan='{$rowKetua['id_penugasan']}'"); 
    $stmtGetTemuan->execute();
    $rslt_getTemuan = $stmtGetTemuan->get_result();
?>
<main role="main" class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0"><?= mysqli_num_rows($rslt_getDataKetua); ?></span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-primary">Penugasan</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-briefcase text-muted mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0"><?= mysqli_num_rows($rslt_getTemuan); ?></span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-primary">Temuan</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-file text-muted mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body px-4">
                        <div class="row">
                            <div class="col-4 text-center">
                                <span class="h3">1</span>
                                <p class="mb-1"><span class="badge badge-pill badge-danger text-light">Belum Ditindak Lanjuti</span></p>
                            </div>
                            <div class="col-4 text-center">
                                <span class="h3">4</span>
                                <p class="mb-1"><span class="badge badge-pill badge-warning text-light">Tindak Lanjut Sebagian</span></p>
                            </div>
                            <div class="col-4 text-center">
                                <span class="h3">3</span>
                                <p class="mb-1"><span class="badge badge-pill badge-success text-light">Tindak Lanjut Tuntas</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- .container-fluid -->
</main> <!-- main -->