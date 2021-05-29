<?php
error_reporting(0);
include 'app/controllers/admin/cetak.php';
?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                        <form action="cetak_laporan" method="POST">
                            <label>Tanggal</label>
                            <div class="form-group mb-3">
                                <label>
                                    <div style="font-size: 12px;">Mulai Tanggal</div>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fe fe-calendar"></i></span>
                                    </div>
                                    <input id="tgl_mulai" placeholder="masukkan tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>
                                    <div style="font-size: 12px;">Selesai Tanggal</div>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fe fe-calendar"></i></span>
                                    </div>
                                    <input id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir" required>
                                </div>
                            </div>
                            <label>Jenis Penugasan</label>
                            <div class="form-group mb-3">
                                <select class="form-control" name="jenis_penugasan" id="jp">
                                    <option hidden>-Jenis Penugasan-</option>
                                    <option value="Audit">Audit</option>
                                    <option value="Verifikasi">Verifikasi</option>
                                    <option value="Evaluasi">Evaluasi</option>
                                    <option value="Review">Review</option>
                                    <option value="Monitoring">Monitoring</option>
                                    <option value="Asistensi">Asistensi</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <button type="submit" name="cetak" class="btn btn-block btn-primary"><i class="fe fe-search"></i> Tampilkan</button>
                        </form>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-4 -->

        </div>
        <?php
        if (isset($_POST['cetak'])) {
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title"><?= $page; ?></strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>
                                        <div>
                                            <?php
                                            if ($_POST['tgl_awal'] == null || $_POST['tgl_akhir'] == null) {
                                                echo "Tanggal Awal / Tanggal Akhir Belum Diinput";
                                            } else {
                                                echo "Mulai Tanggal " . "<b>" . tgl_indo($_POST['tgl_awal']) . "</b>" . " s/d " . "<b>" . tgl_indo($_POST['tgl_akhir']) . "</b>";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Penugasan</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if ($_POST['jenis_penugasan'] == '-Jenis Penugasan-') {
                                            echo "Jenis Penugasan Belum Diinput";
                                        } else {
                                            echo $_POST['jenis_penugasan'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <form action="cetak" method="post">
                            <input type="hidden" name="jenis_penugasan" value="<?= $_POST['jenis_penugasan'] ?>">
                            <input type="hidden" name="tgl_awal" value="<?= $_POST['tgl_awal'] ?>">
                            <input type="hidden" name="tgl_akhir" value="<?= $_POST['tgl_akhir'] ?>">
                            <button class="btn btn-primary mt-2" type="submit"><i class="fe fe-printer"></i> Cetak</button>
                            </form>
                            <h3 class="text-center">Rekapitulasi TPB Bidwas IPP</h3>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Tahun</td>
                                        <td colspan="2">Rekomendasi</td>
                                        <td colspan="3">Tindak Lanjut</td>
                                        <td colspan="3">Saldo</td>
                                    </tr>
                                    <tr>
                                        <td>Kj</td>
                                        <td>Nilai (Rp. )</td>
                                        <td>Kj</td>
                                        <td>%</td>
                                        <td>Nilai (Rp. )</td>
                                        <td>Kj</td>
                                        <td>%</td>
                                        <td>Nilai (Rp. )</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    if ($_POST['jenis_penugasan'] == 'Audit' || $_POST['jenis_penugasan'] == 'Verifikasi' || $_POST['jenis_penugasan'] == 'Evaluasi' || $_POST['jenis_penugasan'] == 'Review' || $_POST['jenis_penugasan'] == 'Monitoring' || $_POST['jenis_penugasan'] == 'Asistensi') {
                                        $query  = $mysqli->query("SELECT *, count(data_rekomendasi.id_rekomendasi) AS ttl FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan JOIN data_rekomendasi ON data_rekomendasi.id_temuan = temuan.id_temuan WHERE jenis_penugasan = '$_POST[jenis_penugasan]' AND jenisnominal = 'Rupiah' AND tgl_laporan BETWEEN '$_POST[tgl_awal]' and '$_POST[tgl_akhir]' GROUP BY YEAR(tgl_laporan)");
                                    } else {
                                        $query  = $mysqli->query("SELECT *, count(data_rekomendasi.id_rekomendasi) AS ttl FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan JOIN data_rekomendasi ON data_rekomendasi.id_temuan = temuan.id_temuan WHERE jenis_penugasan != 'Audit' AND jenis_penugasan != 'Verifikasi' AND jenis_penugasan != 'Evaluasi' AND jenis_penugasan != 'Review' AND jenis_penugasan != 'Monitoring' AND jenis_penugasan != 'Asistensi' AND jenisnominal = 'Rupiah' AND tgl_laporan BETWEEN '$_POST[tgl_awal]' and '$_POST[tgl_akhir]' GROUP BY YEAR(tgl_laporan)");
                                    }
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td>
                                                <?php
                                                $thn =  date("Y", strtotime($row['tgl_laporan']));
                                                echo $thn;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $kejadian_rekom = $row['ttl'];
                                                $k_rekom[] = $row['ttl'];   
                                                ?>
                                            </td>
                                            <td>Rp.
                                                <?php
                                                $query_kg = $mysqli->query("SELECT sum(isirupiah) AS ttl FROM temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE year(tgl_laporan) = '$thn' AND penugasan.jenis_penugasan = '$row[jenis_penugasan]'");
                                                while ($rw_kg = $query_kg->fetch_assoc()) {
                                                    $nilai_rekom = $rw_kg['ttl'];
                                                    echo number_format($nilai_rekom);
                                                    $n_rekom[] = $rw_kg['ttl'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $query_kg_tl = $mysqli->query("SELECT *, count(data_rekomendasi.id_rekomendasi) AS ttl FROM data_rekomendasi JOIN temuan ON data_rekomendasi.id_temuan = temuan.id_temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.jenis_penugasan = '$row[jenis_penugasan]' AND data_rekomendasi.status ='Tuntas' AND year(tgl_laporan) = '$thn'");
                                                $rw_tl = $query_kg_tl->fetch_assoc();
                                                echo $kejadian_tl = $rw_tl['ttl'];
                                                $k_tl[] = $rw_tl['ttl'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $persen_tl = 0;
                                                $persen_tl = ($kejadian_tl / $kejadian_rekom) * 100;
                                                echo round($persen_tl, 2) . " %";
                                                ?>
                                            </td>
                                            <td>Rp.
                                                <?php
                                                $query_tl = $mysqli->query("SELECT *, sum(tindak_lanjut.nominal_tl) AS ttl FROM tindak_lanjut JOIN data_rekomendasi ON tindak_lanjut.id_rekomendasi = data_rekomendasi.id_rekomendasi JOIN temuan ON data_rekomendasi.id_temuan = temuan.id_temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.jenis_penugasan = '$row[jenis_penugasan]' AND data_rekomendasi.status = 'Tuntas' AND year(tgl_laporan) = '$thn'");
                                                $rw_tln = $query_tl->fetch_assoc();
                                                $nilai_tl = $rw_tln['ttl'];
                                                echo number_format($nilai_tl);
                                                $n_tl[] = $rw_tln['ttl'];

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $kejadian_saldo = 0;
                                                $kejadian_saldo = $kejadian_rekom - $kejadian_tl;
                                                echo $kejadian_saldo;
                                                $k_saldo[] = $kejadian_saldo;
                                                ?>
                                            </td>
                                            <td>
                                                <?php

                                                $persen_saldo = 0;
                                                $persen_saldo = ($kejadian_saldo / $kejadian_rekom) * 100;
                                                echo round($persen_saldo, 2) . " %";
                                                ?>
                                            </td>
                                            <td>Rp.
                                                <?php
                                                $nilai_saldo = 0;
                                                $nilai_saldo = $nilai_rekom - $nilai_tl;
                                                echo number_format($nilai_saldo);
                                                $n_saldo[] = $nilai_saldo;
                                                ?>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    <tr>
                                        <td colspan="2">Total</td>
                                        <td>
                                            <?php
                                            $jmlh_k_rekom = array_sum($k_rekom);
                                            echo $jmlh_k_rekom;
                                            ?>
                                        </td>
                                        <td>Rp. 
                                        <?php
                                            $jmlh_n_rekom = array_sum($n_rekom);
                                            echo number_format($jmlh_n_rekom);
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                            $jmlh_k_tl = array_sum($k_tl);
                                            echo $jmlh_k_tl;
                                            ?>
                                        </td>
                                        <td>
                                        <?php 
                                         $prsn_rekom = ($jmlh_k_tl / $jmlh_k_rekom)*100;
                                         echo round($prsn_rekom,2).' %';
                                        ?>
                                        </td>
                                        <td>Rp. 
                                        <?php
                                            $jmlh_n_tl = array_sum($n_tl);
                                            echo number_format($jmlh_n_tl);
                                        ?>
                                        </td>
                                        <td>
                                        <?php
                                            $jmlh_k_saldo = array_sum($k_saldo);
                                            echo $jmlh_k_saldo;
                                        ?>
                                        </td>
                                        <td>
                                            <?php
                                             $prsn = ($jmlh_k_saldo / $jmlh_k_rekom)*100;
                                             echo round($prsn,2). "%";
                                             
                                            ?>
                                        </td>
                                        <td>Rp. 
                                        <?php
                                            $jmlh_n_saldo = array_sum($n_saldo);
                                            echo number_format($jmlh_n_saldo);
                                        ?>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                    </div> <!-- / .card -->
                </div> <!-- .col-4 -->
            </div>
        <?php } ?>
    </div>
</main>