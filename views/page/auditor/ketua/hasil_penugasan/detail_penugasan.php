<?php

$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {

    $row_penugasan = $result->fetch_assoc();

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
                <div class="col-12">
                    <h2 class="page-title">
                        <a href="<?= $base_url; ?>ketua_hasil_penugasan" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a>
                        <?= $page; ?>
                    </h2>
                </div>
            </div>
            <div class="row mb-3">

                <div class="col-7">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong class="card-title">Data Penugasan</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>No.ST</td>
                                    <td>:</td>
                                    <td><?= $row_penugasan['no_st'] ?></td>
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
                <div class="col-5">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong class="card-title">Data Auditor (Personel)</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
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
            </div> <!-- .row -->

            <div class="row mb-3">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Status</strong>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-1">
                                        <?php
                                        $sql_tmn = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_penugasan['id_penugasan']}'");
                                        ?>
                                        <?php while ($row_tmn = $sql_tmn->fetch_object()) : ?>
                                            <?php
                                            $sql_data_rekom = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_tmn->id_temuan'");
                                            ?>
                                            <?php while ($row_data_rekom = $sql_data_rekom->fetch_object()) : ?>
                                                <?php
                                                $array_rekom[] = $row_data_rekom->id_rekomendasi;
                                                $sql_tl = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_data_rekom->id_rekomendasi'");
                                                ?>
                                                <?php while ($row_tl = $sql_tl->fetch_object()) : ?>
                                                    <?php
                                                    $array_tl[] = $row_tl->id_rekomendasi;
                                                    ?>
                                                <?php endwhile; ?>
                                            <?php endwhile; ?>
                                        <?php endwhile; ?>

                                        <?php
                                        if (isset($array_tl) && isset($array_rekom)) {
                                            $unique_rekom = array_unique($array_rekom);
                                            $unique_tl = array_unique($array_tl);
                                            if (count($unique_tl) == count($unique_rekom)) {
                                                echo "
                                                    <i class='fe fe-check-circle text-success'></i><br />
                                                    <span class='badge badge-success text-light'>Tuntas</span>
                                                ";
                                            } else if (count($unique_tl) < count($unique_rekom)) {
                                                echo "
                                                    <i class='fe fe-alert-circle text-warning'></i><br />
                                                    <span class='badge badge-warning text-light'>Tuntas Sebagian</span>
                                                ";
                                            } else {
                                                echo "
                                                    <i class='fe fe-x-circle text-danger'></i><br />
                                                    <span class='badge badge-danger text-light'>Belum TL</span>
                                                ";
                                            }
                                        } else {
                                            echo "
                                                <i class='fe fe-x-circle text-danger'></i><br />
                                                <span class='badge badge-danger text-light'>Belum TL</span>
                                            ";
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
            ?>
            <?php while ($row_temuan = $result_temuan->fetch_object()) : ?>
                <div class="row">
                    <div class="col-md-12">

                        <h4>
                            <i class="fe fe-search text-primary"></i> Temuan <?= $no; ?>
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
                                <div class="col-md-8">
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
                                <div class="col-md-8">
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
                                        <a class="nav-link active" id="uraianakibat-tab<?= $no; ?>" data-toggle="tab" href="#uraianakibat<?= $no; ?>" role="tab" aria-controls="uraianakibat<?= $no; ?>" aria-selected="true">Uraian & Akibat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="kriteriasebab-tab<?= $no; ?>" data-toggle="tab" href="#kriteriasebab<?= $no; ?>" role="tab" aria-controls="kriteriasebab<?= $no; ?>" aria-selected="false">Kriteria & Sebab</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="rekomendasi-tab<?= $no; ?>" data-toggle="tab" href="#rekomendasi<?= $no; ?>" role="tab" aria-controls="rekomendasi<?= $no; ?>" aria-selected="false">Rekomendasi</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="uraianakibat<?= $no; ?>" role="tabpanel" aria-labelledby="uraianakibat-tab<?= $no; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kriteriasebab<?= $no; ?>" role="tabpanel" aria-labelledby="kriteriasebab-tab<?= $no; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rekomendasi<?= $no; ?>" role="tabpanel" aria-labelledby="rekomendasi-tab<?= $no; ?>">
                                        <div class="row justify-content-center">
                                            <?php
                                            $sql_data_rekomendasi = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_temuan->id_temuan'");
                                            $no_rekom = 1;
                                            while ($row_data_rekomendasi = $sql_data_rekomendasi->fetch_object()) {
                                                $sql_rekomendasi = $mysqli->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$row_data_rekomendasi->id_rekomendasi'");
                                                $row_rekomendasi = $sql_rekomendasi->fetch_object();

                                                $sql_tindak_lanjut = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                                                if (mysqli_num_rows($sql_tindak_lanjut) > 0) {
                                            ?>
                                                    <div class="col-md-4">
                                                        <div class="card shadow bg-success text-center mb-3">
                                                            <div class="card-body p-4">
                                                                <span class="circle circle-md bg-success-light">
                                                                    <i class="fe fe-check fe-24 text-white"></i>
                                                                </span>
                                                                <h5 class="mb-1 text-light mt-3">Rekomendasi <?= $no_rekom; ?></h5>
                                                                <p class="text-white mt-1 mb-3"><?= $row_rekomendasi->rekomendasi; ?></p>
                                                                <a href="javascript:void(0)" class="btn bg-success-light text-white" style="cursor:unset;">Sudah Ditindak Lanjuti</a>
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
                                                                <p class="text-white mt-1 mb-3"><?= $row_rekomendasi->rekomendasi; ?></p>
                                                                <a href="javascript:void(0)" class="btn bg-danger-light text-white" style="cursor:unset;">Belum Ditindak Lanjuti</a>
                                                            </div> <!-- .card-body -->
                                                        </div> <!-- .card -->
                                                    </div>
                                            <?php
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

        </div> <!-- .container-fluid -->
    </main> <!-- main -->
<?php
} else {
?>
    <script>
        alert("Maaf data tidak diketahui !");
        document.location.href = '<?= $base_url; ?>detail_penugasan';
    </script>
<?php
}
?>