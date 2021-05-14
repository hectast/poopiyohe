<?php
include 'app/controllers/auditor/monitoring/hasil_panugasan/post.php';
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
                <h2 class="page-title"><a href="<?= $base_url ?>monitoring_hasil_penugasan"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
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
        <div class="row">

            <div class="col-7">
                <div class="card shadow mb-4">
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
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td> 
                                    <?php
                                        if ($row_penugasan['status_tl'] == 'Tuntas') {
                                        ?>
                                        <small class="badge badge-success">Tuntas</small>
                                    <?php
                                        } else if ($row_penugasan['status_tl'] == 'Tuntas Sebagian') {
                                    ?>
                                        <small class="badge badge-warning">Tuntas Sebagian</small>
                                    <?php
                                        } else {
                                    ?>
                                        <small class="badge badge-danger"><?= $row_penugasan['status_tl'] ?></small>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card shadow mb-4">
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

                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Lihat File Upload</strong>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 text-center">
                                        <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalBaktl"><i class="fe fe-file-text"></i> BAKTL</button>
                                        <?php endif; ?>

                                        <?php if (mysqli_num_rows($result_surat_tuntas) > 0) : ?>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalSuratTuntas"><i class="fe fe-mail"></i> Surat Tuntas</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- .row -->

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
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div id="temuanArea">

                                    <div id="temuanGroup">
                                        <h5><u>Temuan <?= $no; ?></u></h5>
                                        <?php if (!empty($row_temuan->isirupiah)) : ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label>Rupiah</label>
                                                        <input type="text" id="cekRupiah" class="form-control" value="<?= is_numeric($row_temuan->isirupiah) ? "Rp. " . number_format($row_temuan->isirupiah) : $row_temuan->isirupiah; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label>Kondisi</label>
                                                    <input type="text" id="cekRupiah" class="form-control" value="<?= $row_temuan->kondisi; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php
                                            $sql_data_uraian = $mysqli->query("SELECT * FROM data_uraian WHERE id_temuan='$row_temuan->id_temuan'");
                                            $sql_data_akibat = $mysqli->query("SELECT * FROM data_akibat WHERE id_temuan='$row_temuan->id_temuan'");
                                            ?>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="cekRupiah">Uraian</label>
                                                            <?php while ($row_data_uraian = $sql_data_uraian->fetch_object()) : ?>
                                                                <?php
                                                                $sql_uraian = $mysqli->query("SELECT * FROM uraian WHERE id_uraian='$row_data_uraian->id_uraian'");
                                                                $row_uraian = $sql_uraian->fetch_object();
                                                                ?>
                                                                <input type="text" class="form-control mb-2" value="<?= $row_uraian->uraian; ?>" disabled>
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="cekRupiah">Akibat</label>
                                                            <?php while ($row_data_akibat = $sql_data_akibat->fetch_object()) : ?>
                                                                <?php
                                                                $sql_akibat = $mysqli->query("SELECT * FROM akibat WHERE id_akibat='$row_data_akibat->id_akibat'");
                                                                $row_akibat = $sql_akibat->fetch_object();
                                                                ?>
                                                                <input type="text" class="form-control mb-2" value="<?= $row_akibat->akibat; ?>" disabled>
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php
                                            $sql_data_kriteria = $mysqli->query("SELECT * FROM data_kriteria WHERE id_temuan='$row_temuan->id_temuan'");
                                            $sql_data_sebab = $mysqli->query("SELECT * FROM data_sebab WHERE id_temuan='$row_temuan->id_temuan'");
                                            ?>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="cekRupiah">Kriteria</label>
                                                            <?php while ($row_data_kriteria = $sql_data_kriteria->fetch_object()) : ?>
                                                                <?php
                                                                $sql_kriteria = $mysqli->query("SELECT * FROM kriteria WHERE id_kriteria='$row_data_kriteria->id_kriteria'");
                                                                $row_kriteria = $sql_kriteria->fetch_object();
                                                                ?>
                                                                <input type="text" class="form-control mb-2" value="<?= $row_kriteria->kriteria; ?>" disabled>
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="cekRupiah">Sebab</label>
                                                            <?php while ($row_data_sebab = $sql_data_sebab->fetch_object()) : ?>
                                                                <?php
                                                                $sql_sebab = $mysqli->query("SELECT * FROM sebab WHERE id_sebab='$row_data_sebab->id_sebab'");
                                                                $row_sebab = $sql_sebab->fetch_object();
                                                                ?>
                                                                <input type="text" class="form-control mb-2" value="<?= $row_sebab->sebab; ?>" disabled>
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php
                                            $sql_data_rekomendasi = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_temuan->id_temuan'");
                                            ?>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="cekRupiah">Rekomendasi</label>
                                                    <?php while ($row_data_rekomendasi = $sql_data_rekomendasi->fetch_object()) : ?>
                                                        <?php
                                                        $sql_rekomendasi = $mysqli->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$row_data_rekomendasi->id_rekomendasi'");
                                                        $row_rekomendasi = $sql_rekomendasi->fetch_object()
                                                        ?>
                                                        <input type="text" class="form-control mb-2" value="<?= $row_rekomendasi->rekomendasi; ?>" disabled>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
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

        <?php
        if ($row_penugasan['status'] == 'Belum Direview') {
        ?>
            <form action="<?= $base_url ?>/monitoring_hasil_penugasan" method="post">
                <input type="hidden" name="id_penugasan" value="<?= $row_penugasan['id_penugasan']; ?>">
                <button type="submit" name="review_data" class="btn btn-primary"> <i class="fe fe-clipboard"></i> Review Data</button>
            </form>
            <?php
        } else if ($row_penugasan['status'] == 'Sudah Direview') {

            $sql_cektuntas = "SELECT * FROM surat_tuntas WHERE id_penugasan = '$row_penugasan[id_penugasan]'";
            $tuntas = $mysqli->query($sql_cektuntas);
            $cek_tuntas = mysqli_num_rows($tuntas);

            if ($cek_tuntas <= 0) {
            ?>
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#defaultModal"><i class="fe fe-mail"></i> Upload Surat Tuntas</button>
                <!-- modals -->
                <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel"><i class="fe fe-mail"></i> Input Surat Tuntas </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Nomor Surat</label>
                                        <input type="text" name="id_penugasan" value="<?= $row_penugasan['id_penugasan']; ?>" hidden>
                                        <input type="text" name="nomor_tuntas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Surat</label>
                                        <input type="date" name="tgl_tuntas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">File Surat</label>
                                        <div class="form-group">
                                            <input type="file" id="file" name="file" class="form-control-file" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="upload_surat" class="btn mb-2 btn-primary">Kirim</button>
                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modals -->




            <?php
            } else {
                $query_surat = "SELECT * FROM surat_tuntas WHERE id_penugasan = {$row_penugasan['id_penugasan']}";
                $result_surat = $mysqli->query($query_surat);
                $row_surat = mysqli_fetch_assoc($result_surat);
                $cek_surat = mysqli_num_rows($result_surat);
                // echo "<center>";
                // print_r($cek_surat);
                // echo "</center>";
                if ($cek_surat > 0) {
                    $filesurat = $row_surat['surat_tuntas'];
                }
            ?>

                <form class="mb-5" action="<?= $base_url ?>monitoring_hasil_penugasan" method="POST">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsurat"><i class="fe fe-eye"></i> Lihat Surat Tuntas</button>
                    <!-- modals2 -->
                    <div class="modal fade" id="modalsurat" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel"><i class="fe fe-mail"></i> Surat Tuntas </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <table class="table table-borderless" border="0">
                                        <tr>
                                            <td>Nomor Surat</td>
                                            <td>:</td>
                                            <td><?= $row_surat['nomor_surat']  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Surat</td>
                                            <td>:</td>
                                            <td><?= tgl_indo($row_surat['tgl_surat']);  ?></td>
                                        </tr>
                                        <tr>

                                            <td colspan="3"><object data="<?= $base_url ?>assets/uploads/surat_tuntas/<?= $filesurat ?>" width="100%" height="500"></object></td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- modals2 -->
                    <input type="hidden" name="id_penugasan" value="<?= $row_penugasan['id_penugasan'] ?>">
                    <button type="submit" name="teruskan_data" class="btn btn-secondary"> <i class="fe fe-send"></i> Teruskan Ke Korwas dan Dalnis</button>
                </form>


        <?php
            }
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