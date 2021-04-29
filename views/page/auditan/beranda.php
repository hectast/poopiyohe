<?php
$id_instansi = $_SESSION['id'];
?>
<main role="main" class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-1 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-file text-white"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0">Pengawasan</p>
                                                <span class="h3 mb-0">
                                                    <?php
                                                    $query_in = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in = '$id_instansi'");
                                                    $query_opd = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd = '$id_instansi'");

                                                    if (mysqli_num_rows($query_in) > 0) {
                                                        echo mysqli_num_rows($query_in);
                                                    } else if (mysqli_num_rows($query_opd) > 0) {
                                                        echo mysqli_num_rows($query_opd);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-file text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0">Temuan</p>
                                                <span class="h3 mb-0">
                                                    <?php
                                                    if (mysqli_num_rows($query_in) > 0) {
                                                        while($row_in2 = $query_in->fetch_assoc()){
                                                            $temuan_in = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan = '$row_in2[id_penugasan]'");
                                                           echo mysqli_num_rows($temuan_in);
                                                        }
                                                    } else if (mysqli_num_rows($query_opd) > 0) {
                                                      while($row_opd2 = $query_opd->fetch_assoc()){
                                                          $temuan_opd = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan = '$row_opd2[id_penugasan]'");
                                                         echo mysqli_num_rows($temuan_opd);
                                                      }
                                                    }
                                                    ?>                                            
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 mb-3">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <span class="text-white m-auto mb-0">Rp.</span>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0">Saldo</p>
                                                <span class="h3 mb-0">Rp. 
                                                <?php
                                                    if (mysqli_num_rows($query_in) > 0) {
                                                        $query_iv = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in = '$id_instansi'");
                                                        while($row_iv = $query_iv->fetch_assoc()) {
                                                            $saldo = $mysqli->query("SELECT sum(saldo) FROM temuan WHERE id_penugasan = '$row_iv[id_penugasan]'");
                                                            $row_saldo = $saldo->fetch_assoc();
                                                            echo number_format($row_saldo['sum(saldo)']);
                                                        }  
                                                    } else if (mysqli_num_rows($query_opd) > 0) {
                                                       $query_opd = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd = '$id_instansi'");
                                                       while($row_opdd = $query_opd->fetch_assoc()) {
                                                           $saldo = $mysqli->query("SELECT sum(saldo) FROM temuan WHERE id_penugasan = '$row_opdd[id_penugasan]'");
                                                           $row_saldo = $saldo->fetch_assoc();
                                                           echo number_format($row_saldo['sum(saldo)']);
                                                       }  
                                                    }
                                                ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h2 mb-0">0</span>
                                        <p class="text-muted mb-0">
                                            <span class="badge badge-pill badge-success">Tuntas</span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-32 fe-check-circle text-muted mb-0"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h2 mb-0">0</span>
                                        <p class="text-muted mb-0">
                                            <span class="badge badge-pill badge-warning">Tuntas Sebagian</span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-32 fe-alert-circle text-muted mb-0"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h2 mb-0">0</span>
                                        <p class="text-muted mb-0">
                                            <span class="badge badge-pill badge-danger">Belum Ada Tindak Lanjut</span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-32 fe-x-circle text-muted mb-0"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="card shadow"></div>

                    </div>
                </div>

            </div>
        </div>

    </div> <!-- .container-fluid -->
</main> <!-- main -->