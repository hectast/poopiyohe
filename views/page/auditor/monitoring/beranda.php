<?php
$stmtGetTemuan = $mysqli->prepare("SELECT * FROM temuan");
$stmtGetTemuan->execute();
$rslt_getTemuan = $stmtGetTemuan->get_result();

$stmtGetPenugasan = $mysqli->prepare("SELECT * FROM penugasan");
$stmtGetPenugasan->execute();
$rslt_getPenugasan = $stmtGetPenugasan->get_result();

// // Tuntas
// $sql_pngsn_tuntas = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas'");
// while ($row_pngsn_tuntas = $sql_pngsn_tuntas->fetch_assoc()) {
//     $idPngsn_tuntas[] = $row_pngsn_tuntas['id_penugasan'];
// }

// // Tuntas Sebagian
// $sql_pngsn_sebagian = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas Sebagian'");
// while ($row_pngsn_sebagian = $sql_pngsn_sebagian->fetch_assoc()) {
//     $idPngsn_sebagian[] = $row_pngsn_sebagian['id_penugasan'];
// }

// // Tuntas Sebagian
// $sql_pngsn_belum = $mysqli->query("SELECT * FROM penugasan WHERE status=''");
// while ($row_pngsn_belum = $sql_pngsn_belum->fetch_assoc()) {
//     $idPngsn_belum[] = $row_pngsn_belum['id_penugasan'];
// }

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
                <div class="card">
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
                <div class="card">
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
                                <span class="h2 mb-0"><?php
                                
                                $query_ttl_saldo = $mysqli->query("SELECT count(id_rekomendasi) AS ttl FROM data_rekomendasi");
                                $row_ttl_saldo = $query_ttl_saldo->fetch_assoc();
                                echo $row_ttl_saldo['ttl'];

                                ?></span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-primary">Rekomendasi</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <h3 class="mb-0">
                                Rp. 
                                <?php
                                    $query_forTotal = $mysqli->query("SELECT sum(isirupiah) AS ttl FROM temuan");
                                    $row_forTotal = $query_forTotal->fetch_assoc();
                                    echo number_format($row_forTotal['ttl']);
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
                                                <h4><strong><?php
                                                $query_ttl_tuntas = $mysqli->query("SELECT count(id_rekomendasi) AS ttl FROM data_rekomendasi WHERE status='Tuntas'");
                                                $row_ttl_tuntas = $query_ttl_tuntas->fetch_assoc();
                                                echo $row_ttl_tuntas['ttl'];
                                                ?></strong></h4>
                                                <div class="my-0 small">
                                                    <span class="badge badge-pill badge-success text-light">Tuntas</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h4 class="mb-0">
                                                Rp. 
                                                <?php
                                                    $query_nilai_tuntas = $mysqli->query("SELECT sum(nominal_tl) AS ttl FROM tindak_lanjut JOIN data_rekomendasi ON tindak_lanjut.id_rekomendasi = data_rekomendasi.id_rekomendasi WHERE data_rekomendasi.status = 'Tuntas' ");
                                                    $row_nilai_tuntas = $query_nilai_tuntas->fetch_assoc();
                                                    echo number_format($row_nilai_tuntas['ttl']);
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4><strong><?php
                                                $query_ttl_t_sebagian = $mysqli->query("SELECT count(id_rekomendasi) AS ttl FROM data_rekomendasi WHERE status='Tuntas Sebagian'");
                                                $row_ttl_t_sebagian = $query_ttl_t_sebagian->fetch_assoc();
                                                echo $row_ttl_t_sebagian['ttl']
                                                ?></strong></h4>
                                                <div class="my-0 small">
                                                    <span class="badge badge-pill badge-warning text-light">Tuntas Sebagian</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h4 class="mb-0">
                                                Rp. 
                                                <?php
                                                    $query_nilai_sebagian = $mysqli->query("SELECT sum(nominal_tl) AS ttl FROM history_tl JOIN data_rekomendasi ON history_tl.id_rekomendasi = data_rekomendasi.id_rekomendasi WHERE data_rekomendasi.status = 'Tuntas Sebagian' ");
                                                    $row_nilai_sebagian = $query_nilai_sebagian->fetch_assoc();
                                                    echo number_format($row_nilai_sebagian['ttl']);

                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4><strong><?php
                                                $query_ttl_b_tuntas = $mysqli->query("SELECT count(id_rekomendasi) AS ttl FROM data_rekomendasi WHERE status = '' OR status ='Cek TL'");
                                                $row_ttl_b_tuntas = $query_ttl_b_tuntas->fetch_assoc();
                                                echo $row_ttl_b_tuntas['ttl']
                                                ?></strong></h4>
                                                <div class="my- small">
                                                    <span class="badge badge-pill badge-danger text-light">Belum TL</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h4 class="mb-0">
                                                Rp. 
                                                <?php
                                                     $query_nilai_belum = $mysqli->query("SELECT sum(saldo) AS ttl FROM temuan");
                                                     $row_nilai_belum = $query_nilai_belum->fetch_assoc();
                                                     echo number_format($row_nilai_belum['ttl']);
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