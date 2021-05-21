<?php
$stmtGetTemuan = $mysqli->prepare("SELECT * FROM temuan");
$stmtGetTemuan->execute();
$rslt_getTemuan = $stmtGetTemuan->get_result();

$stmtGetPenugasan = $mysqli->prepare("SELECT * FROM penugasan");
$stmtGetPenugasan->execute();
$rslt_getPenugasan = $stmtGetPenugasan->get_result();

// Tuntas
$sql_pngsn_tuntas = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas'");
while ($row_pngsn_tuntas = $sql_pngsn_tuntas->fetch_assoc()) {
    $idPngsn_tuntas[] = $row_pngsn_tuntas['id_penugasan'];
}

// Tuntas Sebagian
$sql_pngsn_sebagian = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas Sebagian'");
while ($row_pngsn_sebagian = $sql_pngsn_sebagian->fetch_assoc()) {
    $idPngsn_sebagian[] = $row_pngsn_sebagian['id_penugasan'];
}

// Tuntas Sebagian
$sql_pngsn_belum = $mysqli->query("SELECT * FROM penugasan WHERE status=''");
while ($row_pngsn_belum = $sql_pngsn_belum->fetch_assoc()) {
    $idPngsn_belum[] = $row_pngsn_belum['id_penugasan'];
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<main role="main" class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0"><?= mysqli_num_rows($rslt_getPenugasan); ?></span>
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
            <div class="col-md-4 mb-3">
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
            <div class="col-md-4 mb-3">
                <div class="card forHover">
                    <div class="card-body forTarget">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0"><?= isset($totalrekom) ? $totalrekom : 0; ?></span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-primary">Rekomendasi</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <h3 class="mb-0">
                                    Rp.
                                    <?php
                                    $query_forTotal = $mysqli->query("SELECT sum(saldo) FROM temuan");
                                    $row_forTotal = $query_forTotal->fetch_assoc();
                                    echo number_format($row_forTotal['sum(saldo)']);
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" id="contentTarget">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4><strong><?= isset($idPngsn_tuntas) ? count($idPngsn_tuntas) : 0; ?></strong></h4>
                                                <div class="my-0 small">
                                                    <span class="badge badge-pill badge-success text-light">Tuntas</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h4 class="mb-0">
                                                    Rp.
                                                    <?php
                                                    $query_forTotal1 = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas'");
                                                    while ($row_forTotal1 = $query_forTotal1->fetch_assoc()) {
                                                        $query_saldoTuntas = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan = '{$row_forTotal1['id_penugasan']}'");
                                                        $row_saldoTuntas = $query_saldoTuntas->fetch_assoc();
                                                        $dataSaldoTuntas[] = isset($row_saldoTuntas['saldo']) ? $row_saldoTuntas['saldo'] : 0;
                                                        // echo number_format($row_saldoTuntas['sum(saldo)']);
                                                    }
                                                    $totalSaldoTuntas = array_sum($dataSaldoTuntas);
                                                    echo number_format($totalSaldoTuntas);
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4><strong><?= isset($idPngsn_sebagian) ? count($idPngsn_sebagian) : 0; ?></strong></h4>
                                                <div class="my-0 small">
                                                    <span class="badge badge-pill badge-warning text-light">Tuntas Sebagian</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h4 class="mb-0">
                                                    Rp.
                                                    <?php
                                                    $query_forTotal2 = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas Sebagian'");
                                                    while ($row_forTotal2 = $query_forTotal2->fetch_assoc()) {
                                                        $query_saldoSebagian = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan = '{$row_forTotal2['id_penugasan']}'");
                                                        $row_saldoSebagian = $query_saldoSebagian->fetch_assoc();
                                                        $dataSaldoSebagian[] = isset($row_saldoSebagian['saldo']) ? $row_saldoSebagian['saldo'] : 0;
                                                    }
                                                    $totalSaldoSebagian = array_sum($dataSaldoSebagian);
                                                    echo number_format($totalSaldoSebagian);
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4><strong><?= isset($idPngsn_belum) ? count($idPngsn_belum) : 0; ?></strong></h4>
                                                <div class="my- small">
                                                    <span class="badge badge-pill badge-danger text-light">Belum TL</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h4 class="mb-0">
                                                    Rp.
                                                    <?php
                                                    $query_forTotal3 = $mysqli->query("SELECT * FROM penugasan WHERE status=''");
                                                    while ($row_forTotal3 = $query_forTotal3->fetch_assoc()) {
                                                        $query_saldoBelum = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan = '{$row_forTotal3['id_penugasan']}'");
                                                        $row_saldoBelum = $query_saldoBelum->fetch_assoc();
                                                        $dataSaldoBelum[] = isset($row_saldoBelum['saldo']) ? $row_saldoBelum['saldo'] : 0;
                                                    }
                                                    $totalSaldoBelum = array_sum($dataSaldoBelum);
                                                    echo $totalSaldoBelum;
                                                    ?>
                                                </h4>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                </div> <!-- / .list-group -->
                            </div> <!-- / .card-body -->
                        </div> <!-- / .card -->
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- .container-fluid -->
</main> <!-- main -->

<script src="<?= $base_url; ?>assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contentTarget').hide();
        $('.forHover').hover(function() {
            $(this).addClass('shadow').css('cursor', 'pointer');
        }, function() {
            $(this).removeClass('shadow');
        });
        $('.forTarget').click(function() {
            $('#contentTarget').slideToggle();
        });
    });
</script>