<?php
$id_instansi = $_SESSION['id'];
$query_in = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in = '$id_instansi'");
$query_opd = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd = '$id_instansi'");

if (mysqli_num_rows($query_in) > 0) {
    while ($row_in_forTL = $query_in->fetch_assoc()) {
        // Tuntas
        $sql_pngsn_tuntas = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_in_forTL['id_penugasan']} AND status='Tuntas'");
        while ($row_pngsn_tuntas = $sql_pngsn_tuntas->fetch_assoc()) {
            $idPngsn_tuntas[] = $row_pngsn_tuntas['id_penugasan'];
        }

        // Tuntas Sebagian
        $sql_pngsn_sebagian = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_in_forTL['id_penugasan']} AND status='Tuntas Sebagian'");
        while ($row_pngsn_sebagian = $sql_pngsn_sebagian->fetch_assoc()) {
            $idPngsn_sebagian[] = $row_pngsn_sebagian['id_penugasan'];
        }

        // Tuntas Sebagian
        $sql_pngsn_belum = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_in_forTL['id_penugasan']} AND status=''");
        while ($row_pngsn_belum = $sql_pngsn_belum->fetch_assoc()) {
            $idPngsn_belum[] = $row_pngsn_belum['id_penugasan'];
        }
    }
} else if (mysqli_num_rows($query_opd) > 0) {
    while ($row_opd_forTL = $query_opd->fetch_assoc()) {
        // Tuntas
        $sql_pngsn_tuntas = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_opd_forTL['id_penugasan']} AND status='Tuntas'");
        while ($row_pngsn_tuntas = $sql_pngsn_tuntas->fetch_assoc()) {
            $idPngsn_tuntas[] = $row_pngsn_tuntas['id_penugasan'];
        }

        // Tuntas Sebagian
        $sql_pngsn_sebagian = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_opd_forTL['id_penugasan']} AND status='Tuntas Sebagian'");
        while ($row_pngsn_sebagian = $sql_pngsn_sebagian->fetch_assoc()) {
            $idPngsn_sebagian[] = $row_pngsn_sebagian['id_penugasan'];
        }

        // Tuntas Sebagian
        $sql_pngsn_belum = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_opd_forTL['id_penugasan']} AND status=''");
        while ($row_pngsn_belum = $sql_pngsn_belum->fetch_assoc()) {
            $idPngsn_belum[] = $row_pngsn_belum['id_penugasan'];
        }
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
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-2 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-file text-white"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-muted mb-2">Pengawasan</p>
                                <span class="h3 mb-0">
                                    <?php
                                    if (mysqli_num_rows($query_in) > 0) {
                                        echo mysqli_num_rows($query_in);
                                    } else if (mysqli_num_rows($query_opd) > 0) {
                                        echo mysqli_num_rows($query_opd);
                                    }else{
                                        echo "0";
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-2 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-file text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-muted mb-2">Temuan</p>
                                <span class="h3 mb-0">
                                    <?php
                                    if (mysqli_num_rows($query_in) > 0) {
                                      $query = $mysqli->query("SELECT count(id_temuan) AS ttl FROM temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.auditan_in = '$id_instansi'");
                                      $row   = $query->fetch_assoc();
                                      echo $row['ttl'];
                                    } else if (mysqli_num_rows($query_opd) > 0) {
                                        $query = $mysqli->query("SELECT count(id_temuan) AS ttl FROM temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.auditan_opd = '$id_instansi'");
                                        $row   = $query->fetch_assoc();
                                        echo $row['ttl'];
                                    }else{
                                        echo "0";
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-2 text-center">
                                <span class="circle circle-sm bg-primary text-white p-2">
                                    Rp
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-muted mb-2">Saldo</p>
                                <span class="h3 mb-0">Rp .
                                  <?php
                                    if(mysqli_num_rows($query_opd) > 0){
                                        $query = $mysqli->query("SELECT SUM(saldo) AS ttl FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.auditan_opd = '$id_instansi'");
                                        $row = $query->fetch_assoc();
                                        echo number_format($row['ttl']);
                                    }else if(mysqli_num_rows($query_in) > 0){
                                        $query = $mysqli->query("SELECT SUM(saldo) AS ttl FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.auditan_in = '$id_instansi'");
                                        $row = $query->fetch_assoc();
                                        echo number_format($row['ttl']);
                                    }else{
                                        echo "0";
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover datatables" id="dataTable-1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>No.ST</th>
                                            <th>Nomor Laporan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Uraian Penugasan</th>
                                            <th>Jumlah Temuan</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($query_in) > 0) {
                                            $query_in1 = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in = '$id_instansi'");
                                            while ($row_in_forTL1 = $query_in1->fetch_assoc()) {
                                                // Tuntas
                                                $sql_pngsn_tuntas1 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_in_forTL1['id_penugasan']} AND status='Tuntas'");
                                                $no = 1;
                                        ?>
                                                <?php while ($row_pngsn_tuntas1 = $sql_pngsn_tuntas1->fetch_assoc()) : ?>
                                                    <?php
                                                    $sql_temuan_iv1 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_pngsn_tuntas1['id_penugasan']}'");
                                                    $row_temuan_iv1 = $sql_temuan_iv1->fetch_assoc();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row_pngsn_tuntas1['no_st']; ?></td>
                                                        <td><?= isset($row_temuan_iv1['no_laporan']) ? $row_temuan_iv1['no_laporan'] : "Temuan belum di input."; ?></td>
                                                        <td><?= tgl_indo($row_temuan_iv1['tgl_laporan']); ?></td>
                                                        <td><?= $row_pngsn_tuntas1['uraian_penugasan']; ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($row_temuan_iv1['id_temuan'])) {
                                                                $id_tugas = $row_temuan_iv1['id_penugasan'];
                                                                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                                                                echo mysqli_num_rows($sql_jumlah);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?> Temuan
                                                        </td>
                                                        <td>
                                                            Rp. <?php
                                                                if (isset($row_temuan_iv1['id_temuan'])) {
                                                                    $id_tugas = $row_temuan_iv1['id_penugasan'];
                                                                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                                                                    while ($row_nominal = $sql_nominal->fetch_array()) {
                                                                        echo number_format($row_nominal['SUM(isirupiah)']);
                                                                    }
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><small class="badge badge-success text-light"><?= $row_pngsn_tuntas1['status']; ?></small></td>
                                                        <td>
                                                            <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fe fe-settings"></span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="detail_temuan/<?= $row_pngsn_tuntas1['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            <?php
                                            }
                                        } else if (mysqli_num_rows($query_opd) > 0) {
                                            $query_opd1 = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd = '$id_instansi'");
                                            while ($row_opd_forTL1 = $query_opd1->fetch_assoc()) {
                                                // Tuntas
                                                $sql_pngsn_tuntas1 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_opd_forTL1['id_penugasan']} AND status='Tuntas'");
                                                $no = 1;
                                            ?>
                                                <?php while ($row_pngsn_tuntas1 = $sql_pngsn_tuntas1->fetch_assoc()) : ?>
                                                    <?php
                                                    $sql_temuan_opd1 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_pngsn_tuntas1['id_penugasan']}'");
                                                    $row_temuan_opd1 = $sql_temuan_opd1->fetch_assoc();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row_pngsn_tuntas1['no_st']; ?></td>
                                                        <td><?= isset($row_temuan_opd1['no_laporan']) ? $row_temuan_opd1['no_laporan'] : "Temuan belum di input."; ?></td>
                                                        <td><?= tgl_indo($row_temuan_opd1['tgl_laporan']); ?></td>
                                                        <td><?= $row_pngsn_tuntas1['uraian_penugasan']; ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($row_temuan_opd1['id_temuan'])) {
                                                                $id_tugas = $row_temuan_opd1['id_penugasan'];
                                                                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                                                                echo mysqli_num_rows($sql_jumlah);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?> Temuan
                                                        </td>
                                                        <td>
                                                            Rp. <?php
                                                                if (isset($row_temuan_opd1['id_temuan'])) {
                                                                    $id_tugas = $row_temuan_opd1['id_penugasan'];
                                                                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                                                                    while ($row_nominal = $sql_nominal->fetch_array()) {
                                                                        echo number_format($row_nominal['SUM(isirupiah)']);
                                                                    }
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><small class="badge badge-success text-light"><?= $row_pngsn_tuntas1['status']; ?></small></td>
                                                        <td>
                                                            <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fe fe-settings"></span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="detail_temuan/<?= $row_pngsn_tuntas1['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                        <?php
                                            }
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover datatables" id="dataTable-2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>No.ST</th>
                                            <th>Nomor Laporan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Uraian Penugasan</th>
                                            <th>Jumlah Temuan</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($query_in) > 0) {
                                            $query_in2 = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in = '$id_instansi'");
                                            while ($row_in_forTL2 = $query_in2->fetch_assoc()) {
                                                // Tuntas
                                                $sql_pngsn_tuntas2 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_in_forTL2['id_penugasan']} AND status='Tuntas Sebagian'");
                                                $no = 1;
                                        ?>
                                                <?php while ($row_pngsn_tuntas2 = $sql_pngsn_tuntas2->fetch_assoc()) : ?>
                                                    <?php
                                                    $sql_temuan_iv2 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_pngsn_tuntas2['id_penugasan']}'");
                                                    $row_temuan_iv2 = $sql_temuan_iv2->fetch_assoc();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row_pngsn_tuntas2['no_st']; ?></td>
                                                        <td><?= isset($row_temuan_iv2['no_laporan']) ? $row_temuan_iv2['no_laporan'] : "Temuan belum di input."; ?></td>
                                                        <td><?= tgl_indo($row_temuan_iv2['tgl_laporan']); ?></td>
                                                        <td><?= $row_pngsn_tuntas2['uraian_penugasan']; ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($row_temuan_iv2['id_temuan'])) {
                                                                $id_tugas = $row_temuan_iv2['id_penugasan'];
                                                                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                                                                echo mysqli_num_rows($sql_jumlah);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?> Temuan
                                                        </td>
                                                        <td>
                                                            Rp. <?php
                                                                if (isset($row_temuan_iv2['id_temuan'])) {
                                                                    $id_tugas = $row_temuan_iv2['id_penugasan'];
                                                                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                                                                    while ($row_nominal = $sql_nominal->fetch_array()) {
                                                                        echo number_format($row_nominal['SUM(isirupiah)']);
                                                                    }
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><small class="badge badge-warning text-light"><?= $row_pngsn_tuntas2['status']; ?></small></td>
                                                        <td>
                                                            <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fe fe-settings"></span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="detail_temuan/<?= $row_pngsn_tuntas2['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            <?php
                                            }
                                        } else if (mysqli_num_rows($query_opd) > 0) {
                                            $query_opd2 = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd = '$id_instansi'");
                                            while ($row_opd_forTL2 = $query_opd2->fetch_assoc()) {
                                                // Tuntas
                                                $sql_pngsn_tuntas2 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_opd_forTL2['id_penugasan']} AND status='Tuntas Sebagian'");
                                                $no = 1;
                                            ?>
                                                <?php while ($row_pngsn_tuntas2 = $sql_pngsn_tuntas2->fetch_assoc()) : ?>
                                                    <?php
                                                    $sql_temuan_opd2 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_pngsn_tuntas2['id_penugasan']}'");
                                                    $row_temuan_opd2 = $sql_temuan_opd2->fetch_assoc();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row_pngsn_tuntas2['no_st']; ?></td>
                                                        <td><?= isset($row_temuan_opd2['no_laporan']) ? $row_temuan_opd2['no_laporan'] : "Temuan belum di input."; ?></td>
                                                        <td><?= tgl_indo($row_temuan_opd2['tgl_laporan']); ?></td>
                                                        <td><?= $row_pngsn_tuntas2['uraian_penugasan']; ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($row_temuan_opd2['id_temuan'])) {
                                                                $id_tugas = $row_temuan_opd2['id_penugasan'];
                                                                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                                                                echo mysqli_num_rows($sql_jumlah);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?> Temuan
                                                        </td>
                                                        <td>
                                                            Rp. <?php
                                                                if (isset($row_temuan_opd2['id_temuan'])) {
                                                                    $id_tugas = $row_temuan_opd2['id_penugasan'];
                                                                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                                                                    while ($row_nominal = $sql_nominal->fetch_array()) {
                                                                        echo number_format($row_nominal['SUM(isirupiah)']);
                                                                    }
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><small class="badge badge-warning text-light"><?= $row_pngsn_tuntas2['status']; ?></small></td>
                                                        <td>
                                                            <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fe fe-settings"></span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="detail_temuan/<?= $row_pngsn_tuntas2['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                        <?php
                                            }
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover datatables" id="dataTable-3">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>No.ST</th>
                                            <th>Nomor Laporan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Uraian Penugasan</th>
                                            <th>Jumlah Temuan</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (mysqli_num_rows($query_in) > 0) {
                                            $query_in3 = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in = '$id_instansi'");
                                            while ($row_in_forTL3 = $query_in3->fetch_assoc()) {
                                                // Tuntas
                                                $sql_pngsn_tuntas3 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_in_forTL3['id_penugasan']} AND status=''");
                                                $no = 1;
                                        ?>
                                                <?php while ($row_pngsn_tuntas3 = $sql_pngsn_tuntas3->fetch_assoc()) : ?>
                                                    <?php
                                                    $sql_temuan_iv3 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_pngsn_tuntas3['id_penugasan']}'");
                                                    $row_temuan_iv3 = $sql_temuan_iv3->fetch_assoc();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row_pngsn_tuntas3['no_st']; ?></td>
                                                        <td><?= isset($row_temuan_iv3['no_laporan']) ? $row_temuan_iv3['no_laporan'] : "<i>Temuan belum di input.</i>"; ?></td>
                                                        <td><?= tgl_indo($row_temuan_iv3['tgl_laporan']); ?></td>
                                                        <td><?= $row_pngsn_tuntas3['uraian_penugasan']; ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($row_temuan_iv3['id_temuan'])) {
                                                                $id_tugas = $row_temuan_iv3['id_penugasan'];
                                                                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                                                                echo mysqli_num_rows($sql_jumlah);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?> Temuan
                                                        </td>
                                                        <td>
                                                            Rp. <?php
                                                                if (isset($row_temuan_iv3['id_temuan'])) {
                                                                    $id_tugas = $row_temuan_iv3['id_penugasan'];
                                                                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                                                                    while ($row_nominal = $sql_nominal->fetch_array()) {
                                                                        echo number_format($row_nominal['SUM(isirupiah)']);
                                                                    }
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><small class="badge badge-danger text-light">Belum TL</small></td>
                                                        <td>
                                                            <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fe fe-settings"></span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="detail_temuan/<?= $row_pngsn_tuntas3['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            <?php
                                            }
                                        } else if (mysqli_num_rows($query_opd) > 0) {
                                            $query_opd3 = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd = '$id_instansi'");
                                            while ($row_opd_forTL3 = $query_opd3->fetch_assoc()) {
                                                // Tuntas
                                                $sql_pngsn_tuntas3 = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan={$row_opd_forTL3['id_penugasan']} AND status=''");
                                                $no = 1;
                                            ?>
                                                <?php while ($row_pngsn_tuntas3 = $sql_pngsn_tuntas3->fetch_assoc()) : ?>
                                                    <?php
                                                    $sql_temuan_opd3 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_pngsn_tuntas3['id_penugasan']}'");
                                                    $row_temuan_opd3 = $sql_temuan_opd3->fetch_assoc();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row_pngsn_tuntas3['no_st']; ?></td>
                                                        <td><?= isset($row_temuan_opd3['no_laporan']) ? $row_temuan_opd3['no_laporan'] : "<i>Temuan belum di input.</i>"; ?></td>
                                                        <td><?= isset($row_temuan_opd3['tgl_laporan']) ? tgl_indo($row_temuan_opd3['tgl_laporan']) : "<i>Temuan belum di input.</i>"; ?></td>
                                                        <td><?= $row_pngsn_tuntas3['uraian_penugasan']; ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($row_temuan_opd3['id_temuan'])) {
                                                                $id_tugas = $row_temuan_opd3['id_penugasan'];
                                                                $sql_jumlah = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan ='$id_tugas'");
                                                                echo mysqli_num_rows($sql_jumlah);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?> Temuan
                                                        </td>
                                                        <td>
                                                            Rp. <?php
                                                                if (isset($row_temuan_opd3['id_temuan'])) {
                                                                    $id_tugas = $row_temuan_opd3['id_penugasan'];
                                                                    $sql_nominal = $mysqli->query("SELECT SUM(isirupiah) FROM temuan WHERE id_penugasan = '$id_tugas'");
                                                                    while ($row_nominal = $sql_nominal->fetch_array()) {
                                                                        echo number_format($row_nominal['SUM(isirupiah)']);
                                                                    }
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><small class="badge badge-danger text-light">Belum TL</small></td>
                                                        <td>
                                                            <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fe fe-settings"></span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="detail_temuan/<?= $row_pngsn_tuntas3['id_penugasan']; ?>" class="dropdown-item"><i class="fe fe-search"></i> Lihat Detail</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                        <?php
                                            }
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

    </div> <!-- .container-fluid -->
</main> <!-- main -->

<script src="<?= $base_url; ?>assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.target').hide();
        $('.forHover').hover(function() {
            $(this).addClass('shadow').css('cursor', 'pointer');
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