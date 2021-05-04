<?php
    function cek_status_rekom($idtmn, $mysqli)
    {
        $sql_data_rekomendasi = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$idtmn'");
        while ($row_data_rekomendasi = $sql_data_rekomendasi->fetch_object()) {
            $sql_rekomendasi = $mysqli->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$row_data_rekomendasi->id_rekomendasi'");
            $row_rekomendasi = $sql_rekomendasi->fetch_object();

            $sql_tindak_lanjut = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
            $sql_tl_tuntas = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi' AND status='Tuntas'");
            $sql_tl_tuntas_sebagian = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi' AND status='Tuntas Sebagian'");
            $sql_tl_belum_tuntas = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi' AND status='Belum Tuntas'");
            if (mysqli_num_rows($sql_tindak_lanjut) > 0) {
                if (mysqli_num_rows($sql_tl_tuntas) > 0 && mysqli_num_rows($sql_tl_tuntas_sebagian) == 0 && mysqli_num_rows($sql_tl_belum_tuntas) == 0) {
                    while ($rws_tindak_lanjut = $sql_tindak_lanjut->fetch_assoc()) {
                        $status_tl[] = $rws_tindak_lanjut['status'];
                    }
                    // echo "<pre>";
                    // print_r($status_tl);
                    // echo "</pre>";
                    // return false;
                    if (in_array("", $status_tl)) {
                        $mysqli->query("UPDATE data_rekomendasi SET status='Tuntas Sebagian' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                    } else {
                        $mysqli->query("UPDATE data_rekomendasi SET status='Tuntas' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                    }
                // return false;
                } else if (mysqli_num_rows($sql_tl_tuntas) > 0 && mysqli_num_rows($sql_tl_tuntas_sebagian) == 0 && mysqli_num_rows($sql_tl_belum_tuntas) > 0) {
                    $mysqli->query("UPDATE data_rekomendasi SET status='Tuntas Sebagian' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                } else if (mysqli_num_rows($sql_tl_tuntas) > 0 && mysqli_num_rows($sql_tl_tuntas_sebagian) > 0 && mysqli_num_rows($sql_tl_belum_tuntas) == 0) {
                    $mysqli->query("UPDATE data_rekomendasi SET status='Tuntas Sebagian' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                } else if (mysqli_num_rows($sql_tl_tuntas) == 0 && mysqli_num_rows($sql_tl_tuntas_sebagian) > 0 && mysqli_num_rows($sql_tl_belum_tuntas) == 0) {
                    $mysqli->query("UPDATE data_rekomendasi SET status='Tuntas Sebagian' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                } else if (mysqli_num_rows($sql_tl_tuntas) == 0 && mysqli_num_rows($sql_tl_tuntas_sebagian) > 0 && mysqli_num_rows($sql_tl_belum_tuntas) > 0) {
                    $mysqli->query("UPDATE data_rekomendasi SET status='Tuntas Sebagian' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                } else if (mysqli_num_rows($sql_tl_tuntas) == 0 && mysqli_num_rows($sql_tl_tuntas_sebagian) == 0 && mysqli_num_rows($sql_tl_belum_tuntas) > 0) {
                    while ($rws_tindak_lanjut = $sql_tindak_lanjut->fetch_assoc()) {
                        $status_tl[] = $rws_tindak_lanjut['status'];
                    }
                    if (in_array("", $status_tl)) {
                        $mysqli->query("UPDATE data_rekomendasi SET status='Cek TL' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                    } else {
                        $mysqli->query("UPDATE data_rekomendasi SET status='Belum Tuntas' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                    }
                } else {
                    $mysqli->query("UPDATE data_rekomendasi SET status='Cek TL' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
                }
            }
            // else {
            //     $mysqli->query("UPDATE data_rekomendasi SET status='' WHERE id_rekomendasi='$row_rekomendasi->id_rekomendasi'");
            // }
        }
    }

    function cek_status_temuan($idtmn_fortmn, $mysqli)
    {
        $sql_tmn = $mysqli->query("SELECT * FROM temuan WHERE id_temuan='$idtmn_fortmn'");
        while ($row_tmn = $sql_tmn->fetch_object()) {
            $sql_dtrkm = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_tmn->id_temuan'");
            $sql_dtrkm_tuntas = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_tmn->id_temuan' AND status='Tuntas'");
            $sql_dtrkm_sebagian = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_tmn->id_temuan' AND status='Tuntas Sebagian'");
            $sql_dtrkm_belum = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_temuan='$row_tmn->id_temuan' AND status='Belum Tuntas'");

            if (mysqli_num_rows($sql_dtrkm) > 0) {
                if (mysqli_num_rows($sql_dtrkm_tuntas) > 0 && mysqli_num_rows($sql_dtrkm_sebagian) == 0 && mysqli_num_rows($sql_dtrkm_belum) == 0) {
                    while ($row_dtrkm = $sql_dtrkm->fetch_object()) {
                        $status_tmn[] = $row_dtrkm->status;
                    }
                    // echo "<pre>";
                    // print_r($status_tmn);
                    // echo "</pre>";
                    if (in_array("Cek TL", $status_tmn)) {
                        $mysqli->query("UPDATE temuan SET status='Tuntas Sebagian' WHERE id_temuan='$row_tmn->id_temuan'");
                    } else {
                        $mysqli->query("UPDATE temuan SET status='Tuntas' WHERE id_temuan='$row_tmn->id_temuan'");
                    }
                } else if (mysqli_num_rows($sql_dtrkm_tuntas) > 0 && mysqli_num_rows($sql_dtrkm_sebagian) == 0 && mysqli_num_rows($sql_dtrkm_belum) > 0) {
                    $mysqli->query("UPDATE temuan SET status='Tuntas Sebagian' WHERE id_temuan='$row_tmn->id_temuan'");
                } else if (mysqli_num_rows($sql_dtrkm_tuntas) > 0 && mysqli_num_rows($sql_dtrkm_sebagian) > 0 && mysqli_num_rows($sql_dtrkm_belum) == 0) {
                    $mysqli->query("UPDATE temuan SET status='Tuntas Sebagian' WHERE id_temuan='$row_tmn->id_temuan'");
                } else if (mysqli_num_rows($sql_dtrkm_tuntas) == 0 && mysqli_num_rows($sql_dtrkm_sebagian) > 0 && mysqli_num_rows($sql_dtrkm_belum) == 0) {
                    $mysqli->query("UPDATE temuan SET status='Tuntas Sebagian' WHERE id_temuan='$row_tmn->id_temuan'");
                } else if (mysqli_num_rows($sql_dtrkm_tuntas) == 0 && mysqli_num_rows($sql_dtrkm_sebagian) > 0 && mysqli_num_rows($sql_dtrkm_belum) > 0) {
                    $mysqli->query("UPDATE temuan SET status='Tuntas Sebagian' WHERE id_temuan='$row_tmn->id_temuan'");
                } else if (mysqli_num_rows($sql_dtrkm_tuntas) == 0 && mysqli_num_rows($sql_dtrkm_sebagian) == 0 && mysqli_num_rows($sql_dtrkm_belum) > 0) {
                    while ($row_dtrkm = $sql_dtrkm->fetch_assoc()) {
                        $status_tmn[] = $row_dtrkm['status'];
                    }
                    if (in_array("Cek TL", $status_tmn)) {
                        $mysqli->query("UPDATE temuan SET status='Cek TL' WHERE id_temuan='$row_tmn->id_temuan'");
                    } else {
                        $mysqli->query("UPDATE temuan SET status='Belum Tuntas' WHERE id_temuan='$row_tmn->id_temuan'");
                    }
                } else {
                    $mysqli->query("UPDATE temuan SET status='Cek TL' WHERE id_temuan='$row_tmn->id_temuan'");
                }
            }
        }
    }

    function cek_status_penugasan($idpngsn, $mysqli)
    {
        $sql_pngsn = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan='$idpngsn'");
        $row_pngsn = $sql_pngsn->fetch_object();
        $sql_tmn = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_pngsn->id_penugasan'");
        $sql_tmn_tuntas = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_pngsn->id_penugasan' AND status='Tuntas'");
        $sql_tmn_sebagaian = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_pngsn->id_penugasan' AND status='Tuntas Sebagian'");
        $sql_tmn_belum = $mysqli->query("SELECT * FROM temuan WHERE id_penugasan='$row_pngsn->id_penugasan' AND status='Belum Tuntas'");

        if (mysqli_num_rows($sql_tmn) > 0) {
            if (mysqli_num_rows($sql_tmn_tuntas) > 0 && mysqli_num_rows($sql_tmn_sebagaian) == 0 && mysqli_num_rows($sql_tmn_belum) == 0) {
                while ($row_tmn = $sql_tmn->fetch_object()) {
                    $status_tmn[] = $row_tmn->status;
                }
                // echo "<pre>";
                // print_r($status_tmn);
                // echo "</pre>";
                if (in_array("Cek TL", $status_tmn)) {
                    $mysqli->query("UPDATE penugasan SET status='Tuntas Sebagian' WHERE id_penugasan='$row_pngsn->id_penugasan'");
                } else {
                    $mysqli->query("UPDATE penugasan SET status='Tuntas' WHERE id_penugasan='$row_pngsn->id_penugasan'");
                }
            } else if (mysqli_num_rows($sql_tmn_tuntas) > 0 && mysqli_num_rows($sql_tmn_sebagaian) == 0 && mysqli_num_rows($sql_tmn_belum) > 0) {
                $mysqli->query("UPDATE penugasan SET status='Tuntas Sebagian' WHERE id_penugasan='$row_pngsn->id_penugasan'");
            } else if (mysqli_num_rows($sql_tmn_tuntas) > 0 && mysqli_num_rows($sql_tmn_sebagaian) > 0 && mysqli_num_rows($sql_tmn_belum) == 0) {
                $mysqli->query("UPDATE penugasan SET status='Tuntas Sebagian' WHERE id_penugasan='$row_pngsn->id_penugasan'");
            } else if (mysqli_num_rows($sql_tmn_tuntas) == 0 && mysqli_num_rows($sql_tmn_sebagaian) > 0 && mysqli_num_rows($sql_tmn_belum) == 0) {
                $mysqli->query("UPDATE penugasan SET status='Tuntas Sebagian' WHERE id_penugasan='$row_pngsn->id_penugasan'");
            } else if (mysqli_num_rows($sql_tmn_tuntas) == 0 && mysqli_num_rows($sql_tmn_sebagaian) > 0 && mysqli_num_rows($sql_tmn_belum) > 0) {
                $mysqli->query("UPDATE penugasan SET status='Tuntas Sebagian' WHERE id_penugasan='$row_pngsn->id_penugasan'");
            } else if (mysqli_num_rows($sql_tmn_tuntas) == 0 && mysqli_num_rows($sql_tmn_sebagaian) == 0 && mysqli_num_rows($sql_tmn_belum) > 0) {
                while ($row_tmn = $sql_tmn->fetch_assoc()) {
                    $status_tmn[] = $row_tmn['status'];
                }
                if (in_array("Cek TL", $status_tmn)) {
                    $mysqli->query("UPDATE penugasan SET status='Cek TL' WHERE id_penugasan='$row_pngsn->id_penugasan'");
                } else {
                    $mysqli->query("UPDATE penugasan SET status='Belum Tuntas' WHERE id_penugasan='$row_pngsn->id_penugasan'");
                }
            } else {
                $mysqli->query("UPDATE penugasan SET status='Cek TL' WHERE id_penugasan='$row_pngsn->id_penugasan'");
            }
        }
    }
?>