<?php
include 'app/controllers/auditor/monitoring/hasil_panugasan/function.php';
include 'app/controllers/auditor/monitoring/hasil_panugasan/function_cek_tl.php';
$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    $row_penugasan = $result->fetch_assoc();
?>
    <main role="main" class="main-content">

        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><a href="<?= $base_url ?>monitoring_tindak_lanjut"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
            </div>
        </div>
        <?php
        if (isset($_SESSION['msg_insert_tuntas'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_insert_tuntas'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>

        <div class="row mb-3">

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Penugasan</strong>
                    </div>
                    <div class="card-body">
                        <table class="table mb-1">
                            <tr>
                                <td>No.ST</td>
                                <td>:</td>
                                <td><?= $row_penugasan['no_st']; ?></td>
                            </tr>
                            <tr>
                                <td>Tgl.ST</td>
                                <td>:</td>
                                <td><?= tgl_indo($row_penugasan['tgl_st']) ?></td>
                            </tr>
                            <tr>
                                <td>Uraian Penugasan</td>
                                <td>:</td>
                                <td><?= $row_penugasan['uraian_penugasan'] ?></td>
                            </tr>

                            <tr>
                                <td>Jenis Penugasan</td>
                                <td>:</td>
                                <td><?= $row_penugasan['jenis_penugasan'] ?></td>
                            </tr>
                            <tr>
                                <td>Auditan</td>
                                <td>:</td>
                                <td>
                                    <?php
                                    if (empty($row_penugasan['auditan_in'])) {
                                        $au2 = $row_penugasan['auditan_opd'];
                                        $opd = "SELECT * FROM opd WHERE id='$au2'";
                                        $stmt_opd = $mysqli->prepare($opd);
                                        $stmt_opd->execute();
                                        $result_opd = $stmt_opd->get_result();
                                        $row_opd = $result_opd->fetch_assoc();
                                        echo $row_opd['nama_instansi'];
                                        echo ' - ';
                                        echo $row_opd['nama_pemda'];
                                    } else {
                                        $au = $row_penugasan['auditan_in'];
                                        $inve = "SELECT * FROM instansi_vertikal WHERE id='$au'";
                                        $stmt_inve = $mysqli->prepare($inve);
                                        $stmt_inve->execute();
                                        $result_inve = $stmt_inve->get_result();
                                        $row_inve = $result_inve->fetch_assoc();
                                        echo $row_inve['nama_instansi'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><?= $row_penugasan['pkpt'] ?> , <?= $row_penugasan['kf1'] ?> , <?= $row_penugasan['d1'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Auditor (Personel)</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Peran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql2 = "SELECT * FROM penugasan_auditor WHERE id_penugasan = '$row_penugasan[id_penugasan]'";
                                $stmt2 = $mysqli->prepare($sql2);
                                $stmt2->execute();
                                $result2 = $stmt2->get_result();
                                while ($row_penugasan2 = $result2->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php
                                            $nama_auditor = $row_penugasan2['id'];
                                            $sql3 = "SELECT * FROM auditor WHERE id = '$nama_auditor'";
                                            $stmt3 = $mysqli->prepare($sql3);
                                            $stmt3->execute();
                                            $result3 = $stmt3->get_result();
                                            $row_auditor = mysqli_fetch_assoc($result3);
                                            echo $row_auditor['nama'];
                                            ?>
                                        </td>
                                        <td><?= $row_penugasan2['peran']; ?></td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Status</strong>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <h4 class="mb-1">
                                    <?php
                                        $idpngsn = $row_penugasan["id_penugasan"];
                                        cek_status_penugasan($idpngsn, $mysqli);
                                        
                                        if ($row_penugasan["status"] == "Tuntas") {
                                        ?>
                                            <i class='fe fe-x-circle text-success'></i><br />
                                            <span class='badge badge-success text-light'>Tuntas</span>
                                        <?php
                                        } else if ($row_penugasan["status"] == "Tuntas Sebagian") {
                                        ?>
                                            <i class='fe fe-x-circle text-warning'></i><br />
                                            <span class='badge badge-warning text-light'>Tuntas Sebagian</span>
                                        <?php
                                        } else if ($row_penugasan["status"] == "Belum Tuntas") {
                                        ?>
                                            <i class='fe fe-x-circle text-danger'></i><br />
                                            <span class='badge badge-danger text-light'>Belum Tuntas</span>
                                        <?php
                                        } else {
                                        ?>
                                            <i class='fe fe-x-circle text-danger'></i><br />
                                            <span class='badge badge-danger text-light'>Belum TL</span>
                                        <?php  
                                        }
                                    ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql_baktl = "SELECT * FROM baktl WHERE id_penugasan = '{$row_penugasan['id_penugasan']}'";
            $stmt_baktl = $mysqli->prepare($sql_baktl);
            $stmt_baktl->execute();
            $result_baktl = $stmt_baktl->get_result();

            $sql_surat_tuntas = "SELECT * FROM surat_tuntas WHERE id_penugasan = '{$row_penugasan['id_penugasan']}'";
            $stmt_surat_tuntas = $mysqli->prepare($sql_surat_tuntas);
            $stmt_surat_tuntas->execute();
            $result_surat_tuntas = $stmt_surat_tuntas->get_result();
            ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Lihat File Upload</strong>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <div class="d-flex justify-content-center">
                                    <?php if (mysqli_num_rows($result_surat_tuntas) > 0) : ?>
                                        <div class="col-sm-3 col-4">
                                            <h4 class="mb-1">
                                                <i class="fe fe-mail text-primary"></i><br />
                                                <span class="badge badge-primary text-light" style="cursor: pointer;" data-toggle="modal" data-target="#modalSuratTuntas">
                                                    Surat Tuntas
                                                </span>
                                            </h4>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
                                        <div class="col-sm-3 col-4">
                                            <h4 class="mb-1">
                                                <i class="fe fe-file-text text-primary"></i><br />
                                                <span class="badge badge-primary text-light" style="cursor: pointer;" data-toggle="modal" data-target="#modalBaktl">
                                                    BAKTL
                                                </span>
                                            </h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
            <?php
            $row_baktl = $result_baktl->fetch_assoc();
            $fileBaktl = $row_baktl['file_upload'];
            ?>
            <div class="modal fade" id="modalBaktl" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <h5><i class="fe fe-file-text"></i> BAKTL</h5>
                                </div>
                            </div>
                            <object data="<?= $base_url ?>assets/uploads/baktl/<?= $fileBaktl ?>" width="100%" height="600"></object>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (mysqli_num_rows($result_surat_tuntas) > 0) : ?>
            <?php
            $row_surat_tuntas = $result_surat_tuntas->fetch_assoc();
            $file_surat_tuntas = $row_surat_tuntas['surat_tuntas'];
            $nomor_surat_tuntas = $row_surat_tuntas['nomor_surat'];
            $tanggal_surat_tuntas = $row_surat_tuntas['tgl_surat'];
            ?>
            <div class="modal fade" id="modalSuratTuntas" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <h5><i class="fe fe-mail"></i> Surat Tuntas</h5>
                                    <div class="border-bottom"></div>
                                    <p class="mt-3">
                                        <?= $nomor_surat_tuntas; ?>
                                        <br>
                                        <?= $tanggal_surat_tuntas; ?>
                                    </p>
                                </div>
                            </div>
                            <object data="<?= $base_url ?>assets/uploads/surat_tuntas/<?= $file_surat_tuntas ?>" width="100%" height="600"></object>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>



        <?php
        $sql_temuan = "SELECT * FROM temuan WHERE id_penugasan='{$row_penugasan['id_penugasan']}'";

        $stmt_temuan = $mysqli->prepare($sql_temuan);
        $stmt_temuan->execute();
        $result_temuan = $stmt_temuan->get_result();
        $no = 1;
        $cek = mysqli_num_rows($result_temuan);
        ?>
        <?php
        if ($cek != 0) {
        ?>
            <?php while ($row_temuan = $result_temuan->fetch_object()) : ?>
                <div class="row">
                    <div class="col-md-12">

                        <h4>
                            <i class="fe fe-search text-primary"></i> Temuan <?= $no; ?>
                            <?php
                                $idtmn_fortmn = $row_temuan->id_temuan;
                                cek_status_temuan($idtmn_fortmn, $mysqli);

                                if ($row_temuan->status == "Tuntas") {
                                ?>
                                    <span class="badge badge-success text-light">Tuntas</span>
                                <?php
                                } else if ($row_temuan->status == "Tuntas Sebagian") {
                                ?>
                                    <span class="badge badge-warning text-light">Tuntas Sebagian</span>
                                <?php
                                } else if ($row_temuan->status == "Belum Tuntas") {
                                ?>
                                    <span class="badge badge-danger text-light">Belum Tuntas</span>
                                <?php
                                }
                            ?>
                        </h4>


                        <div class="row mb-3">
                            <?php if (!is_numeric($row_temuan->isirupiah)) : ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Rupiah</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="mb-1 text-success text-center">
                                                Non Rupiah
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Saldo</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="mb-1 text-danger text-center">
                                                Rp. 0
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Kondisi</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="mb-1 text-danger">
                                                <?= $row_temuan->kondisi; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Rupiah</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="mb-1 text-danger text-center">
                                                Rp. <?= number_format($row_temuan->isirupiah); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Saldo</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="mb-1 text-danger text-center">
                                                Rp. <?= number_format($row_temuan->saldo); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Kondisi</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="mb-1 text-danger">
                                                <?= $row_temuan->kondisi; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="uraian-tab<?= $no; ?>" data-toggle="tab" href="#uraian<?= $no; ?>" role="tab" aria-controls="uraian<?= $no; ?>" aria-selected="true">Uraian</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="kriteria-tab<?= $no; ?>" data-toggle="tab" href="#kriteria<?= $no; ?>" role="tab" aria-controls="kriteria<?= $no; ?>" aria-selected="false">Kriteria</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="sebab-tab<?= $no; ?>" data-toggle="tab" href="#sebab<?= $no; ?>" role="tab" aria-controls="sebab<?= $no; ?>" aria-selected="false">Sebab</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="akibat-tab<?= $no; ?>" data-toggle="tab" href="#akibat<?= $no; ?>" role="tab" aria-controls="akibat<?= $no; ?>" aria-selected="false">Akibat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="rekomendasi-tab<?= $no; ?>" data-toggle="tab" href="#rekomendasi<?= $no; ?>" role="tab" aria-controls="rekomendasi<?= $no; ?>" aria-selected="false">Rekomendasi</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="uraian<?= $no; ?>" role="tabpanel" aria-labelledby="uraian-tab<?= $no; ?>">
                                        <table class="table" style="display: table;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th><strong>Uraian</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_data_uraian = $mysqli->query("SELECT * FROM data_uraian WHERE id_temuan='$row_temuan->id_temuan'");
                                                while ($row_data_uraian = $sql_data_uraian->fetch_object()) {
                                                    $sql_uraian = $mysqli->query("SELECT * FROM uraian WHERE id_uraian='$row_data_uraian->id_uraian'");
                                                    $row_uraian = $sql_uraian->fetch_object();
                                                    echo "";
                                                ?>
                                                    <tr>
                                                        <td><?= $row_uraian->uraian; ?></td>
                                                    </tr>
                                                <?php
                                                    echo "";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="kriteria<?= $no; ?>" role="tabpanel" aria-labelledby="kriteria-tab<?= $no; ?>">
                                        <table class="table" style="display: table;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th><strong>Kriteria</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_data_kriteria = $mysqli->query("SELECT * FROM data_kriteria WHERE id_temuan='$row_temuan->id_temuan'");

                                                while ($row_data_kriteria = $sql_data_kriteria->fetch_object()) {
                                                    $sql_kriteria = $mysqli->query("SELECT * FROM kriteria WHERE id_kriteria='$row_data_kriteria->id_kriteria'");
                                                    $row_kriteria = $sql_kriteria->fetch_object();
                                                    echo "";
                                                ?>
                                                    <tr>
                                                        <td><?= $row_kriteria->kriteria; ?></td>
                                                    </tr>
                                                <?php
                                                    echo "";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="sebab<?= $no; ?>" role="tabpanel" aria-labelledby="sebab-tab<?= $no; ?>">
                                        <table class="table" style="display: table;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th><strong>Sebab</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_data_sebab = $mysqli->query("SELECT * FROM data_sebab WHERE id_temuan='$row_temuan->id_temuan'");

                                                while ($row_data_sebab = $sql_data_sebab->fetch_object()) {
                                                    $sql_sebab = $mysqli->query("SELECT * FROM sebab WHERE id_sebab='$row_data_sebab->id_sebab'");
                                                    $row_sebab = $sql_sebab->fetch_object();
                                                    echo "";
                                                ?>
                                                    <tr>
                                                        <td><?= $row_sebab->sebab; ?></td>
                                                    </tr>
                                                <?php
                                                    echo "";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="akibat<?= $no; ?>" role="tabpanel" aria-labelledby="akibat-tab<?= $no; ?>">
                                        <table class="table" style="display: table;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th><strong>Akibat</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_data_akibat = $mysqli->query("SELECT * FROM data_akibat WHERE id_temuan='$row_temuan->id_temuan'");
                                                while ($row_data_akibat = $sql_data_akibat->fetch_object()) {
                                                    $sql_akibat = $mysqli->query("SELECT * FROM akibat WHERE id_akibat='$row_data_akibat->id_akibat'");
                                                    $row_akibat = $sql_akibat->fetch_object();
                                                    echo "";
                                                ?>
                                                    <tr>
                                                        <td><?= $row_akibat->akibat; ?></td>
                                                    </tr>
                                                <?php
                                                    echo "";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="rekomendasi<?= $no; ?>" role="tabpanel" aria-labelledby="rekomendasi-tab<?= $no; ?>">
                                        <div class="row justify-content-center">
                                            <?php
                                                $idtmn = $row_temuan->id_temuan;
                                                cek_status_rekom($idtmn, $mysqli);

                                                $no_rekom = 1;
                                                $sql_dtrekom = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_temuan->id_temuan'");
                                                while ($row_dtrekom = $sql_dtrekom->fetch_object()) {

                                                    $sql_rekom = $mysqli->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$row_dtrekom->id_rekomendasi'");
                                                    while ($row_rekom = $sql_rekom->fetch_object()) {
                                                        if ($row_dtrekom->status == "Cek TL") {
                                                            ?>
                                                            <div class="col-md-4">
                                                                <div class="card shadow bg-primary text-center mb-3">
                                                                    <div class="card-body p-4">
                                                                        <span class="circle circle-md bg-primary-light">
                                                                            <i class="fe fe-edit-2 fe-24 text-white"></i>
                                                                        </span>
                                                                        <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                        <p class="text-white mt-1 mb-3"><?= $row_rekom->rekomendasi; ?></p>
                                                                        <a href="<?= $base_url; ?>monitoring_cek_tl/<?= $no; ?>/<?= $row_rekom->id_rekomendasi; ?>" class="btn bg-primary-light text-white">Cek TL<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                                                                    </div> <!-- .card-body -->
                                                                </div> <!-- .card -->
                                                            </div>
                                                            <?php
                                                        } else if ($row_dtrekom->status == "Tuntas") {
                                                            ?>
                                                                <div class="col-md-4">
                                                                    <div class="card shadow bg-success text-center mb-3">
                                                                        <div class="card-body p-4">
                                                                            <span class="circle circle-md bg-success-light">
                                                                                <i class="fe fe-check fe-24 text-white"></i>
                                                                            </span>
                                                                            <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                            <p class="text-white mt-1 mb-3"><?= $row_rekom->rekomendasi; ?></p>
                                                                            <a href="<?= $base_url; ?>monitoring_cek_tl/<?= $no; ?>/<?= $row_rekom->id_rekomendasi; ?>" class="btn bg-success-light text-white">Cek TL<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                                                                        </div> <!-- .card-body -->
                                                                    </div> <!-- .card -->
                                                                </div>
                                                            <?php
                                                        } else if ($row_dtrekom->status == "Tuntas Sebagian") {
                                                            ?>
                                                                <div class="col-md-4">
                                                                    <div class="card shadow bg-warning text-center mb-3">
                                                                        <div class="card-body p-4">
                                                                            <span class="circle circle-md bg-warning-light">
                                                                                <i class="fe fe-minus fe-24 text-white"></i>
                                                                            </span>
                                                                            <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                            <p class="text-white mt-1 mb-3"><?= $row_rekom->rekomendasi; ?></p>
                                                                            <a href="<?= $base_url; ?>monitoring_cek_tl/<?= $no; ?>/<?= $row_rekom->id_rekomendasi; ?>" class="btn bg-warning-light text-white">Cek TL<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                                                                        </div> <!-- .card-body -->
                                                                    </div> <!-- .card -->
                                                                </div>
                                                            <?php
                                                        } else if ($row_dtrekom->status == "Belum Tuntas") {
                                                            ?>
                                                                <div class="col-md-4">
                                                                    <div class="card shadow bg-danger text-center mb-3">
                                                                        <div class="card-body p-4">
                                                                            <span class="circle circle-md bg-danger-light">
                                                                                <i class="fe fe-alert-circle fe-24 text-white"></i>
                                                                            </span>
                                                                            <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                            <p class="text-white mt-1 mb-3"><?= $row_rekom->rekomendasi; ?></p>
                                                                            <a href="<?= $base_url; ?>monitoring_cek_tl/<?= $no; ?>/<?= $row_rekom->id_rekomendasi; ?>" class="btn bg-danger-light text-white">Cek TL<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                                                                        </div> <!-- .card-body -->
                                                                    </div> <!-- .card -->
                                                                </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <div class="col-md-4">
                                                                    <div class="card shadow bg-danger text-center mb-3">
                                                                        <div class="card-body p-4">
                                                                            <span class="circle circle-md bg-danger-light">
                                                                                <i class="fe fe-x fe-24 text-white"></i>
                                                                            </span>
                                                                            <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                            <p class="text-white mt-1 mb-3"><?= $row_rekom->rekomendasi; ?></p>
                                                                            <a href="javascript:void(0)" class="btn bg-danger-light text-white" style="cursor:unset;">Belum Diusulkan</a>
                                                                        </div> <!-- .card-body -->
                                                                    </div> <!-- .card -->
                                                                </div>
                                                            <?php
                                                        }
                                                    }
                                                    $no_rekom++;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php $no++; ?>
            <?php endwhile; ?>

        <?php
        } else {
        ?>
            <h3 class="mb-5">
                <div class="badge badge-danger "><i class="fe fe-x-circle"></i> </div> Data Temuan Masih Kosong
            </h3>
        <?php
        }
        ?>

        </div> <!-- .container-fluid -->
    </main> <!-- main -->
<?php
} else {
?>
    <script>
        alert("Maaf data tidak diketahui !");
        document.location.href = '<?= $base_url; ?>monitoring_hasil_penugasan';
    </script>
<?php
}
?>