<?php
include '../../../env.php';

if (isset($_POST["view"])) {

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

    $baseUrl = $_POST['baseUrl'];
    $id_instansi = $_POST['id'];
    $sql_penugasan_iv = $mysqli->query("SELECT * FROM penugasan WHERE auditan_in = '{$id_instansi}' AND status='' ORDER BY no_st DESC");
    $sql_penugasan_opd = $mysqli->query("SELECT * FROM penugasan WHERE auditan_opd = '{$id_instansi}' AND status='' ORDER BY no_st DESC");
    // vertikal
    if (mysqli_num_rows($sql_penugasan_iv) > 0) {
        $output_iv = '';
        while ($row_penugasan_iv = $sql_penugasan_iv->fetch_object()) {
            $sql_temuan_iv = $mysqli->query("SELECT * FROM temuan JOIN laporan ON temuan.id_penugasan = laporan.id_penugasan WHERE temuan.id_penugasan='{$row_penugasan_iv->id_penugasan}' AND status=''");
            $row_temuan_iv = $sql_temuan_iv->fetch_object();
            // $row_temuan_iv2 = $sql_temuan_iv->fetch_assoc();
            $date_now_iv = date("Y-m-d");
            $sp2_iv = date("Y-m-d", strtotime($row_temuan_iv->tgl_upload . "+3 month"));
            $sp3_iv = date("Y-m-d", strtotime($row_temuan_iv->tgl_upload . "+4 month"));
            if ($date_now_iv >= $sp2_iv && $date_now_iv < $sp3_iv) {
                $output_iv .= '
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-info fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Peringatan SP2</strong></small>
                                        <div class="my-0 small">
                                            Laporan telah di upload sejak ' . tgl_indo($row_temuan_iv->tgl_upload) . ' <br>
                                            Anda belum melakukan TL selama 90 Hari pada : <br>
                                            - ' . $row_penugasan_iv->no_st . ' <br>
                                            - ' . $row_temuan_iv->no_laporan . ' <br>
                                            - ' . $row_penugasan_iv->uraian_penugasan . '
                                        </div>
                                        <a href="' . $baseUrl . 'app/controllers/auditan/notifikasi/sp2.php?id_penugasan=' . $row_temuan_iv->id_penugasan . '" class="btn btn-sm btn-link">Download SP2</a>
                                        <a href="' . $baseUrl . 'detail_temuan/' . $row_penugasan_iv->id_penugasan . '" class="btn btn-sm btn-link">TL Sekarang >></a>
                                    </div>
                                </div>
                            </div>
                        ';
            } else if ($date_now_iv >= $sp3_iv) {
                $output_iv .= '
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-info fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Peringatan SP3</strong></small>
                                        <div class="my-0 small">
                                            Laporan telah di upload sejak ' . tgl_indo($row_temuan_iv->tgl_upload) . ' <br>
                                            Anda belum melakukan TL selama 120 Hari pada : <br>
                                            - ' . $row_penugasan_iv->no_st . ' <br>
                                            - ' . $row_temuan_iv->no_laporan . ' <br>
                                            - ' . $row_penugasan_iv->uraian_penugasan . '
                                        </div>
                                        <a href="" class="btn btn-sm btn-link">Download SP3</a>
                                        <a href="' . $baseUrl . 'detail_temuan/' . $row_penugasan_iv->id_penugasan . '" class="btn btn-sm btn-link">TL Sekarang >></a>
                                    </div>
                                </div>
                            </div>
                        ';
            } else {
                $output_iv .= '
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-info fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Tindak Lanjut</strong></small>
                                        <div class="my-0 small">
                                            Laporan telah di upload sejak ' . tgl_indo($row_temuan_iv->tgl_upload) . ' <br>
                                            Segera lakukan TL sebelum di beri peringatan ! <br>
                                            - ' . $row_penugasan_iv->no_st . ' <br>
                                            - ' . $row_temuan_iv->no_laporan . ' <br>
                                            - ' . $row_penugasan_iv->uraian_penugasan . '
                                        </div>
                                        <a href="' . $baseUrl . 'detail_temuan/' . $row_penugasan_iv->id_penugasan . '" class="btn btn-sm btn-link">TL Sekarang >></a>
                                    </div>
                                </div>
                            </div>
                        ';
            }
        }
        // $row_penugaasan_iv2 = $sql_penugasan_iv->fetch_object();
        // $sql_temuan_iv1 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_penugaasan_iv2->id_penugasan}' AND status=''");
        // $count_iv = mysqli_num_rows($sql_temuan_iv1);
        $data_iv = array(
            'notification'          => $output_iv
            // 'unseen_notification'   => $count_iv
        );
        echo json_encode($data_iv);
    } else if (mysqli_num_rows($sql_penugasan_opd) > 0) {
        $output_opd = '';
        while ($row_penugasan_opd = $sql_penugasan_opd->fetch_object()) {
            $sql_temuan_opd = $mysqli->query("SELECT * FROM temuan JOIN laporan ON temuan.id_penugasan = laporan.id_penugasan WHERE temuan.id_penugasan='{$row_penugasan_opd->id_penugasan}' AND status=''");
            $row_temuan_opd = $sql_temuan_opd->fetch_object();
            $date_now_opd = date("Y-m-d");
            $sp2_opd = date("Y-m-d", strtotime($row_temuan_opd->tgl_upload . "+3 month"));
            $sp3_opd = date("Y-m-d", strtotime($row_temuan_opd->tgl_upload . "+4 month"));

            if ($date_now_opd >= $sp2_opd && $date_now_opd < $sp3_opd) {
                $output_opd .= '
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-info fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Peringatan SP2</strong></small>
                                        <div class="my-0 small">
                                            Laporan telah di upload sejak ' . tgl_indo($row_temuan_opd->tgl_upload) . ' <br>
                                            Anda belum melakukan TL selama 90 Hari pada : <br>
                                            - ' . $row_penugasan_opd->no_st . ' <br>
                                            - ' . $row_temuan_opd->no_laporan . ' <br>
                                            - ' . $row_penugasan_opd->uraian_penugasan . '
                                        </div>
                                        <a href="' . $baseUrl . 'app/controllers/auditan/notifikasi/sp2.php?id_penugasan=' . $row_temuan_opd->id_penugasan . '" target="_blank" class="btn btn-sm btn-link">Print SP2</a>
                                        <a href="' . $baseUrl . 'detail_temuan/' . $row_penugasan_opd->id_penugasan . '" class="btn btn-sm btn-link">TL Sekarang >></a>
                                    </div>
                                </div>
                            </div>
                        ';
            } else if ($date_now_opd >= $sp3_opd) {
                $output_opd .= '
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-info fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Peringatan SP3</strong></small>
                                        <div class="my-0 small">
                                            Laporan telah di upload sejak ' . tgl_indo($row_temuan_opd->tgl_upload) . ' <br>
                                            Anda belum melakukan TL selama 120 Hari pada : <br>
                                            - ' . $row_penugasan_opd->no_st . ' <br>
                                            - ' . $row_temuan_opd->no_laporan . ' <br>
                                            - ' . $row_penugasan_opd->uraian_penugasan . '
                                        </div>
                                        <a href="' . $baseUrl . 'app/controllers/auditan/notifikasi/sp3.php?id_penugasan=' . $row_temuan_opd->id_penugasan . '" target="_blank" class="btn btn-sm btn-link">Print SP3</a>
                                        <a href="' . $baseUrl . 'detail_temuan/' . $row_penugasan_opd->id_penugasan . '" class="btn btn-sm btn-link">TL Sekarang >></a>
                                    </div>
                                </div>
                            </div>
                        ';
            } else {
                $output_opd .= '
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-info fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Tindak Lanjut</strong></small>
                                        <div class="my-0 small">
                                            Laporan telah di upload sejak ' . tgl_indo($row_temuan_opd->tgl_upload) . ' <br>
                                            TL sekarang sebelum diberi surat peringatan : <br>
                                            - ' . $row_penugasan_opd->no_st . ' <br>
                                            - ' . $row_temuan_opd->no_laporan . ' <br>
                                            - ' . $row_penugasan_opd->uraian_penugasan . '
                                        </div>
                                        <a href="' . $baseUrl . 'detail_temuan/' . $row_penugasan_opd->id_penugasan . '" class="btn btn-sm btn-link">TL Sekarang >></a>
                                    </div>
                                </div>
                            </div>
                        ';
            }
        }
        // $row_penugaasan_iv2 = $sql_penugasan_iv->fetch_object();
        // $sql_temuan_iv1 = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='{$row_penugaasan_iv2->id_penugasan}' AND status=''");
        // $count_iv = mysqli_num_rows($sql_temuan_iv1);
        $data_opd = array(
            'notification'          => $output_opd
            // 'unseen_notification'   => $count_iv
        );
        echo json_encode($data_opd);
    }
}
