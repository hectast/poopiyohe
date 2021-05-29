<?php
$stmtGetTemuan = $mysqli->prepare("SELECT * FROM temuan WHERE id_penugasan='{$rowAnggota['id_penugasan']}'");
$stmtGetTemuan->execute();
$rslt_getTemuan = $stmtGetTemuan->get_result();

$sql_pngsn_adtr = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id='{$rowAnggota['id']}' AND peran='Anggota Tim'");
while ($row_pngsn_adtr = $sql_pngsn_adtr->fetch_assoc()) {
    // Tuntas
    $sql_pngsn_tuntas = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_pngsn_adtr['id_penugasan']} AND status='Tuntas'");
    while ($row_pngsn_tuntas = $sql_pngsn_tuntas->fetch_assoc()) {
        $idPngsn_tuntas[] = $row_pngsn_tuntas['id_penugasan'];
    }

    // Tuntas Sebagian
    $sql_pngsn_sebagian = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_pngsn_adtr['id_penugasan']} AND status='Tuntas Sebagian'");
    while ($row_pngsn_sebagian = $sql_pngsn_sebagian->fetch_assoc()) {
        $idPngsn_sebagian[] = $row_pngsn_sebagian['id_penugasan'];
    }

    // Tuntas Sebagian
    $sql_pngsn_belum = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_pngsn_adtr['id_penugasan']} AND status=''");
    while ($row_pngsn_belum = $sql_pngsn_belum->fetch_assoc()) {
        $idPngsn_belum[] = $row_pngsn_belum['id_penugasan'];
    }

    //rekom_tuntas
    $sql_rekom_tuntas = $mysqli->query("SELECT * FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan JOIN data_rekomendasi ON temuan.id_temuan = data_rekomendasi.id_temuan WHERE penugasan.id_penugasan={$row_pngsn_adtr['id_penugasan']} AND data_rekomendasi.status='Tuntas'");
    while($row_rekom_tuntas = $sql_rekom_tuntas->fetch_assoc()){
        $tuntas[] = $row_rekom_tuntas['id_rekomendasi'];
    }

     //rekom_tuntas_sebagian
     $sql_rekom_tuntas_sebagian = $mysqli->query("SELECT * FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan JOIN data_rekomendasi ON temuan.id_temuan = data_rekomendasi.id_temuan WHERE penugasan.id_penugasan={$row_pngsn_adtr['id_penugasan']} AND data_rekomendasi.status='Tuntas Sebagian'");
     while($row_rekom_tuntas_sebagian = $sql_rekom_tuntas_sebagian->fetch_assoc()){
         $tuntas_sebagian[] = $row_rekom_tuntas_sebagian['id_rekomendasi'];
     }

     //rekom_bl
     $sql_rekom_blm = $mysqli->query("SELECT * FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan JOIN data_rekomendasi ON temuan.id_temuan = data_rekomendasi.id_temuan WHERE (penugasan.id_penugasan={$row_pngsn_adtr['id_penugasan']}) AND (data_rekomendasi.status='' OR data_rekomendasi.status='Cek TL' OR data_rekomendasi.status='Belum Tuntas')");
     while($row_rekom_blm = $sql_rekom_blm->fetch_assoc()){
         $tuntas_blm[] = $row_rekom_blm['id_rekomendasi'];
     }
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
                                <span class="h2 mb-0"><?= mysqli_num_rows($rslt_getDataAnggota); ?></span>
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
                                <span class="h2 mb-0">
                                <?php 
                                    $query_TMN = $mysqli->query("SELECT count(id_temuan) AS ttl FROM temuan JOIN penugasan_auditor ON penugasan_auditor.id_penugasan = temuan.id_penugasan WHERE penugasan_auditor.id = '{$rowAnggota['id']}'");
                                    $row_TMN = $query_TMN->fetch_assoc();
                                    echo $row_TMN['ttl']; 
                                ?>
                                </span>
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
        Status Penugasan :
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
                                        $sql_pngsn_adtr1 = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id='{$rowAnggota['id']}' AND peran='Anggota Tim'");
                                        while ($row_pngsn_adtr1 = $sql_pngsn_adtr1->fetch_assoc()) {
                                            // Tuntas
                                            $sql_pngsn_tuntas1 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_pngsn_adtr1['id_penugasan']} AND status='Tuntas'");
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
                                                            <a href="anggota_detail_penugasan/<?= $row_pngsn_tuntas1['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
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
                                        $sql_pngsn_adtr2 = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id='{$rowAnggota['id']}' AND peran='Anggota Tim'");
                                        while ($row_pngsn_adtr2 = $sql_pngsn_adtr2->fetch_assoc()) {
                                            $sql_pngsn_tuntas2 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_pngsn_adtr2['id_penugasan']} AND status='Tuntas Sebagian'");
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
                                                            <a href="anggota_detail_penugasan/<?= $row_pngsn_tuntas2['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
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
                                        $sql_pngsn_adtr3 = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id='{$rowAnggota['id']}' AND peran='Anggota Tim'");
                                        while ($row_pngsn_adtr3 = $sql_pngsn_adtr3->fetch_assoc()) {
                                            $sql_pngsn_tuntas3 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_pngsn_adtr3['id_penugasan']} AND status=''");
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
                                                            <a href="anggota_detail_penugasan/<?= $row_pngsn_tuntas3['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Jumlah Rekomendasi :
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0">
                                <?php
                                echo count($tuntas);
                                ?>
                                </span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-success text-white">Rekomendasi Tuntas</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-check text-muted mb-0"></span>
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
                                <span class="h2 mb-0">
                                <?php
                                echo count($tuntas_sebagian);
                                ?>
                                 </span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-warning text-white">Rekomendasi Tuntas Sebagian</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-minus text-muted mb-0"></span>
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
                                <span class="h2 mb-0">
                                <?php
                                echo count($tuntas_blm);
                                ?>
                                </span>
                                <p class="text-muted mb-0">
                                    <span class="badge badge-pill badge-danger text-white">Rekomendasi Belum Tuntas/Belum TL</span>
                                </p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-x text-muted mb-0"></span>
                            </div>
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