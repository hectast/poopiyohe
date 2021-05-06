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
            <div class="col-md-6 mb-3">
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
            <div class="col-md-4 mb-3">
                <div class="card forHover">
                    <div class="card-body px-4 forTarget1">
                        <div class="">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span class="h2 mb-0"><?= isset($idPngsn_tuntas) ? count($idPngsn_tuntas) : 0; ?></span>
                                    <p class="text-muted mb-0">
                                        <span class="badge badge-pill badge-success text-light">Tuntas</span>
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <span class="fe fe-32 fe-check-circle text-muted mb-0"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card forHover">
                    <div class="card-body px-4 forTarget2">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0"><?= isset($idPngsn_sebagian) ? count($idPngsn_sebagian) : 0; ?></span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-warning text-light">Tuntas Sebagian</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-minus-circle text-muted mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card forHover">
                    <div class="card-body px-4 forTarget3">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0"><?= isset($idPngsn_belum) ? count($idPngsn_belum) : 0; ?></span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-danger text-light">Belum TL</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-x-circle text-muted mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="targetContent">
            <div id="content1" class="target">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover datatables" id="dataTable-1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No.ST</th>
                                            <th>Tgl.ST</th>
                                            <th>Auditan</th>
                                            <th>Uraian Penugasan</th>
                                            <th>Jenis Penugasan</th>
                                            <th>Ket</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Tuntas
                                            $sql_pngsn_tuntas1 = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas'");
                                        ?>
                                            <?php while ($row_pngsn_tuntas1 = $sql_pngsn_tuntas1->fetch_assoc()) : ?>
                                                <tr>
                                                    <td><?= $row_pngsn_tuntas1['no_st']; ?></td>
                                                    <td><?= tgl_indo($row_pngsn_tuntas1['tgl_st']); ?></td>
                                                    <td>
                                                        <?php
                                                        $instansi_vertikal1 = $row_pngsn_tuntas1['auditan_in'];
                                                        $opede1 = $row_pngsn_tuntas1['auditan_opd'];

                                                        if (empty($instansi_vertikal1)) {
                                                            $result_opede1 = $mysqli->query("SELECT * FROM opd WHERE id = '$opede1'");
                                                            $row_opede1 = mysqli_fetch_assoc($result_opede1);
                                                            echo $row_opede1['nama_instansi'];
                                                            echo " - ";
                                                            echo $row_opede1['nama_pemda'];
                                                        }
                                                        if (empty($opede1)) {
                                                            $result_vertikal1 = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id = '$instansi_vertikal1'");
                                                            $row_vertikal1 = mysqli_fetch_assoc($result_vertikal1);
                                                            echo $row_vertikal1['nama_instansi'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $row_pngsn_tuntas1['uraian_penugasan']; ?></td>
                                                    <td><?= $row_pngsn_tuntas1['jenis_penugasan'] ?></td>
                                                    <td><?= $row_pngsn_tuntas1['pkpt'] ?> , <?= $row_pngsn_tuntas1['kf1'] ?> , <?= $row_pngsn_tuntas1['d1'] ?></td>
                                                    <td><small class="badge badge-success text-light"><?= $row_pngsn_tuntas1['status']; ?></small></td>
                                                    <td>
                                                        <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="fe fe-settings"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="korwas_detail_penugasan/<?= $row_pngsn_tuntas1['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content2" class="target">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover datatables" id="dataTable-2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No.ST</th>
                                            <th>Tgl.ST</th>
                                            <th>Auditan</th>
                                            <th>Uraian Penugasan</th>
                                            <th>Jenis Penugasan</th>
                                            <th>Ket</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_pngsn_tuntas2 = $mysqli->query("SELECT * FROM penugasan WHERE status='Tuntas Sebagian'");
                                        ?>
                                            <?php while ($row_pngsn_tuntas2 = $sql_pngsn_tuntas2->fetch_assoc()) : ?>
                                                <tr>
                                                    <td><?= $row_pngsn_tuntas2['no_st']; ?></td>
                                                    <td><?= tgl_indo($row_pngsn_tuntas2['tgl_st']); ?></td>
                                                    <td>
                                                        <?php
                                                        $instansi_vertikal2 = $row_pngsn_tuntas2['auditan_in'];
                                                        $opede2 = $row_pngsn_tuntas2['auditan_opd'];

                                                        if (empty($instansi_vertikal2)) {
                                                            $result_opede2 = $mysqli->query("SELECT * FROM opd WHERE id = '$opede2'");
                                                            $row_opede2 = mysqli_fetch_assoc($result_opede2);
                                                            echo $row_opede2['nama_instansi'];
                                                            echo " - ";
                                                            echo $row_opede2['nama_pemda'];
                                                        }
                                                        if (empty($opede2)) {
                                                            $result_vertikal2 = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id = '$instansi_vertikal2'");
                                                            $row_vertikal2 = mysqli_fetch_assoc($result_vertikal2);
                                                            echo $row_vertikal2['nama_instansi'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $row_pngsn_tuntas2['uraian_penugasan']; ?></td>
                                                    <td><?= $row_pngsn_tuntas2['jenis_penugasan'] ?></td>
                                                    <td><?= $row_pngsn_tuntas2['pkpt'] ?> , <?= $row_pngsn_tuntas2['kf1'] ?> , <?= $row_pngsn_tuntas2['d1'] ?></td>
                                                    <td><small class="badge badge-warning text-light"><?= $row_pngsn_tuntas2['status'] ?></small></td>
                                                    <td>
                                                        <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="fe fe-settings"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="korwas_detail_penugasan/<?= $row_pngsn_tuntas2['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content3" class="target">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover datatables" id="dataTable-3">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No.ST</th>
                                            <th>Tgl.ST</th>
                                            <th>Auditan</th>
                                            <th>Uraian Penugasan</th>
                                            <th>Jenis Penugasan</th>
                                            <th>Ket</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_pngsn_tuntas3 = $mysqli->query("SELECT * FROM penugasan WHERE status=''");
                                        ?>
                                            <?php while ($row_pngsn_tuntas3 = $sql_pngsn_tuntas3->fetch_assoc()) : ?>
                                                <tr>
                                                    <td><?= $row_pngsn_tuntas3['no_st']; ?></td>
                                                    <td><?= tgl_indo($row_pngsn_tuntas3['tgl_st']); ?></td>
                                                    <td>
                                                        <?php
                                                        $instansi_vertikal3 = $row_pngsn_tuntas3['auditan_in'];
                                                        $opede3 = $row_pngsn_tuntas3['auditan_opd'];

                                                        if (empty($instansi_vertikal3)) {
                                                            $result_opede3 = $mysqli->query("SELECT * FROM opd WHERE id = '$opede3'");
                                                            $row_opede3 = mysqli_fetch_assoc($result_opede3);
                                                            echo $row_opede3['nama_instansi'];
                                                            echo " - ";
                                                            echo $row_opede3['nama_pemda'];
                                                        }
                                                        if (empty($opede3)) {
                                                            $result_vertikal3 = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id = '$instansi_vertikal3'");
                                                            $row_vertikal3 = mysqli_fetch_assoc($result_vertikal3);
                                                            echo $row_vertikal3['nama_instansi'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $row_pngsn_tuntas3['uraian_penugasan']; ?></td>
                                                    <td><?= $row_pngsn_tuntas3['jenis_penugasan'] ?></td>
                                                    <td><?= $row_pngsn_tuntas3['pkpt'] ?> , <?= $row_pngsn_tuntas3['kf1'] ?> , <?= $row_pngsn_tuntas3['d1'] ?></td>
                                                    <td><small class="badge badge-danger text-light">Belum TL</small></td>
                                                    <td>
                                                        <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="fe fe-settings"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="korwas_detail_penugasan/<?= $row_pngsn_tuntas3['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        $('.target').hide();
        $('.forHover').hover(function() {
            $(this).addClass('shadow').css('cursor','pointer');
        }, function() {
            $(this).removeClass('shadow');
        });
        $('.forTarget1').click(function() {
            $('#content2').hide();
            $('#content3').hide();
            $('#content1').slideToggle(600);
        });
        $('.forTarget2').click(function() {
            $('#content1').hide();
            $('#content3').hide();
            $('#content2').slideToggle(600);
        });
        $('.forTarget3').click(function() {
            $('#content1').hide();
            $('#content2').hide();
            $('#content3').slideToggle(600);
        });
    });
</script>