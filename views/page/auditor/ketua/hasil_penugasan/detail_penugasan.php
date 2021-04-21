<?php

$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {

    $row_penugasan = $result->fetch_assoc();

    function tgl_indo($tanggal){
        $bulan = array (
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
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
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
                                    <td> <?php
                                            if ($row_penugasan['status'] == 'Belum Direview') {
                                            ?>
                                            <small class="badge badge-danger"><?= $row_penugasan['status']; ?></small>
                                        <?php
                                            } else {
                                        ?>
                                            <small class="badge badge-warning"><?= $row_penugasan['status']; ?></small>
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
                                    while ($row_penugasan2 =$result2->fetch_assoc()) {
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
            
            <?php
                $sql_temuan = "SELECT * FROM temuan WHERE id_penugasan='{$row_penugasan['id_penugasan']}'";
                $stmt_temuan = $mysqli->prepare($sql_temuan);
                $stmt_temuan->execute();
                $result_temuan = $stmt_temuan->get_result();
                $no=1;
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