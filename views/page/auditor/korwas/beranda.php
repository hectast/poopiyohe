<?php
$stmtGetTemuan = $mysqli->prepare("SELECT * FROM temuan");
$stmtGetTemuan->execute();
$rslt_getTemuan = $stmtGetTemuan->get_result();

$stmtGetPenugasan = $mysqli->prepare("SELECT * FROM penugasan");
$stmtGetPenugasan->execute();
$rslt_getPenugasan = $stmtGetPenugasan->get_result();


// Tuntas
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
$count_tuntas = count($idPngsn_tuntas);
$count_sebagian = count($idPngsn_sebagian);
$count_belum= count($idPngsn_belum);
$totalrekom = $count_tuntas + $count_sebagian + $count_belum;
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
                                                    $query_nilai_sebagian = $mysqli->query("SELECT sum(nominal_tl) AS ttl FROM tindak_lanjut JOIN data_rekomendasi ON tindak_lanjut.id_rekomendasi = data_rekomendasi.id_rekomendasi WHERE data_rekomendasi.status = 'Tuntas Sebagian' ");
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
                                                $query_ttl_b_tuntas = $mysqli->query("SELECT count(id_rekomendasi) AS ttl FROM data_rekomendasi WHERE status = ''");
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

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="py-5 text-center">
                            <!-- query -->
                            <?php
                            $trad = $mysqli->query("SELECT avg(trad) AS average FROM penilaian");
                            $xtrad = mysqli_fetch_assoc($trad);
                            $itrad = $xtrad['average'];
                            ?>
                            <!-- query -->
                            <p class=" mb-2">Trusted Advisor</p>
                            <h1 class="mb-1" style="font-size: 70px;"><?= round($itrad, 2) ?></h1>
                            <div class="small text-primary"><a href="<?= $base_url ?>trusted_advisor">Lihat Detail</a></div>
                        </div>
                        <div class="row align-items-center mb-1">
                            <table class="table">
                                <tr>
                                    <td>Intelectual Currious</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $ic = $mysqli->query("SELECT avg(ic) AS average FROM penilaian");
                                    $xic = mysqli_fetch_assoc($ic);
                                    $iic = $xic['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iic) ?></td>
                                </tr>
                                <tr>
                                    <td>Technical Expertise</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $te = $mysqli->query("SELECT avg(te) AS average FROM penilaian");
                                    $xte = mysqli_fetch_assoc($te);
                                    $ite = $xte['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ite) ?></td>
                                </tr>
                                <tr>
                                    <td>Ethical Resilience</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $er = $mysqli->query("SELECT avg(er) AS average FROM penilaian");
                                    $xer = mysqli_fetch_assoc($er);
                                    $ier = $xer['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ier) ?></td>
                                </tr>
                                <tr>
                                    <td>Inspirational Leaders</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $il = $mysqli->query("SELECT avg(il) AS average FROM penilaian");
                                    $xil = mysqli_fetch_assoc($il);
                                    $iil = $xil['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iil) ?></td>
                                </tr>
                                <tr>
                                    <td>Open-Mindedness</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $om = $mysqli->query("SELECT avg(om) AS average FROM penilaian");
                                    $xom = mysqli_fetch_assoc($om);
                                    $iom = $xom['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iom) ?></td>
                                </tr>
                                <tr>
                                    <td>Critical Thinker</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $ct = $mysqli->query("SELECT avg(ct) AS average FROM penilaian");
                                    $xct = mysqli_fetch_assoc($ct);
                                    $ict = $xct['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ict) ?></td>
                                </tr>
                                <tr>
                                    <td>Dynamic Communicators</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $dc = $mysqli->query("SELECT avg(dc) AS average FROM penilaian");
                                    $xdc = mysqli_fetch_assoc($dc);
                                    $idc = $xdc['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($idc) ?></td>
                                </tr>
                                <tr>
                                    <td>Result Foccused</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $rf = $mysqli->query("SELECT avg(rf) AS average FROM penilaian");
                                    $xrf = mysqli_fetch_assoc($rf);
                                    $irf = $xrf['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($irf) ?></td>
                                </tr>
                                <tr>
                                    <td>Insightful Relationship</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $ir = $mysqli->query("SELECT avg(ir) AS average FROM penilaian");
                                    $xir = mysqli_fetch_assoc($ir);
                                    $iir = $xir['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iir) ?></td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="py-5 text-center">
                            <!-- query -->
                            <?php
                            $pnrb = $mysqli->query("SELECT avg(pnrb) AS average FROM penilaian");
                            $xpnrb = mysqli_fetch_assoc($pnrb);
                            $ipnrb = $xpnrb['average'];
                            ?>
                            <!-- query -->
                            <p class=" mb-2">PAN RB</p>
                            <h1 class="mb-1" style="font-size: 70px;"><?= round($ipnrb, 2) ?></h1>
                            <div class="small text-primary"><a href="<?= $base_url ?>pan_rb">Lihat Detail</a></div>
                        </div>
                        <div class="row align-items-center mb-1">
                            <table class="table">
                                <tr>
                                    <td>Persyaratan</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $sya = $mysqli->query("SELECT avg(sya) AS average FROM penilaian");
                                    $xsya = mysqli_fetch_assoc($sya);
                                    $isya = $xsya['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($isya) ?></td>
                                </tr>
                                <tr>
                                    <td>Sistem, Mekanisme dan Prosedur</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $smp = $mysqli->query("SELECT avg(smp) AS average FROM penilaian");
                                    $xsmp = mysqli_fetch_assoc($smp);
                                    $ismp = $xsmp['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ismp) ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Penyelesaian</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $wak = $mysqli->query("SELECT avg(wak) AS average FROM penilaian");
                                    $xwak = mysqli_fetch_assoc($wak);
                                    $iwak = $xwak['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iwak) ?></td>
                                </tr>
                                <tr>
                                    <td>Biaya / Tarif</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $bia = $mysqli->query("SELECT avg(bia) AS average FROM penilaian");
                                    $xbia = mysqli_fetch_assoc($bia);
                                    $ibia = $xbia['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ibia) ?></td>
                                </tr>
                                <tr>
                                    <td>Produk Spesifikasi Jenis Layanan</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $pro = $mysqli->query("SELECT avg(pro) AS average FROM penilaian");
                                    $xpro = mysqli_fetch_assoc($pro);
                                    $ipro = $xpro['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ipro) ?></td>
                                </tr>
                                <tr>
                                    <td>Kompetensi Pelaksana</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $kom = $mysqli->query("SELECT avg(kom) AS average FROM penilaian");
                                    $xkom = mysqli_fetch_assoc($kom);
                                    $ikom = $xkom['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ikom) ?></td>
                                </tr>
                                <tr>
                                    <td>Perilaku Pelaksana</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $per = $mysqli->query("SELECT avg(per) AS average FROM penilaian");
                                    $xper = mysqli_fetch_assoc($per);
                                    $iper = $xper['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iper) ?></td>
                                </tr>
                                <tr>
                                    <td>Penanganan Pengaduan,Saran dan Masukan</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $psm = $mysqli->query("SELECT avg(psm) AS average FROM penilaian");
                                    $xpsm = mysqli_fetch_assoc($psm);
                                    $ipsm = $xpsm['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ipsm) ?></td>
                                </tr>
                                <tr>
                                    <td>Sarana dan Prasarana</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $sar = $mysqli->query("SELECT avg(sar) AS average FROM penilaian");
                                    $xsar = mysqli_fetch_assoc($sar);
                                    $isar = $xsar['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($isar) ?></td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="py-5 text-center">
                            <!-- query -->
                            <?php
                            $pion = $mysqli->query("SELECT avg(pion) AS average FROM penilaian");
                            $xpion = mysqli_fetch_assoc($pion);
                            $ipion = $xpion['average'];
                            ?>
                            <!-- query -->
                            <p class=" mb-2">PIONIR</p>
                            <h1 class="mb-1" style="font-size: 70px;"><?= round($ipion, 2) ?></h1>
                            <div class="small text-primary"><a href="<?= $base_url ?>/pionir">Lihat Detail</a></div>
                        </div>
                        <div class="row align-items-center mb-1">
                            <table class="table">
                                <tr>
                                    <td>Profesional</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $prf = $mysqli->query("SELECT avg(prf) AS average FROM penilaian");
                                    $xprf = mysqli_fetch_assoc($prf);
                                    $iprf = $xprf['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iprf) ?></td>
                                </tr>
                                <tr>
                                    <td>Integritas</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $itg = $mysqli->query("SELECT avg(itg) AS average FROM penilaian");
                                    $xitg = mysqli_fetch_assoc($itg);
                                    $iitg = $xitg['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iitg) ?></td>
                                </tr>
                                <tr>
                                    <td>Orientasi Pengguna</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $orp = $mysqli->query("SELECT avg(orp) AS average FROM penilaian");
                                    $xorp = mysqli_fetch_assoc($orp);
                                    $iorp = $xorp['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iorp) ?></td>
                                </tr>
                                <tr>
                                    <td>Nurani</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $nur = $mysqli->query("SELECT avg(nur) AS average FROM penilaian");
                                    $xnur = mysqli_fetch_assoc($nur);
                                    $inur = $xnur['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($inur) ?></td>
                                </tr>
                                <tr>
                                    <td>Independen</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $ind = $mysqli->query("SELECT avg(ind) AS average FROM penilaian");
                                    $xind = mysqli_fetch_assoc($ind);
                                    $iind = $xind['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($iind) ?></td>
                                </tr>
                                <tr>
                                    <td>Responsibel</td>
                                    <td>:</td>
                                    <!-- query -->
                                    <?php
                                    $res = $mysqli->query("SELECT avg(res) AS average FROM penilaian");
                                    $xres = mysqli_fetch_assoc($res);
                                    $ires = $xres['average'];
                                    ?>
                                    <!-- query -->
                                    <td><?= round($ires) ?></td>
                                </tr>
                            </table>

                        </div>

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