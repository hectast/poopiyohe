<?php

$id_auditor = $_SESSION['id'];

// ketua
$stmt_getDataKetua = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Ketua Tim'");
                $stmt_getDataKetua->execute();
                $rslt_getDataKetua = $stmt_getDataKetua->get_result();
                $rowKetua = $rslt_getDataKetua->fetch_assoc();
$stmt_getDataKetua->close();

// anggota
$stmt_getDataAnggota = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Anggota Tim'");
                $stmt_getDataAnggota->execute();
                $rslt_getDataAnggota = $stmt_getDataAnggota->get_result();
                $rowAnggota = $rslt_getDataAnggota->fetch_assoc();
$stmt_getDataAnggota->close();

// dalnis
$stmt_getDataDalnis = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Pengendali Teknis'");
                $stmt_getDataDalnis->execute();
                $rslt_getDataDalnis = $stmt_getDataDalnis->get_result();
                $rowDalnis = $rslt_getDataDalnis->fetch_assoc();
$stmt_getDataDalnis->close();

// korwas and monitoring
$stmt_getData = $mysqli->prepare("SELECT * FROM auditor WHERE id = {$id_auditor}");
                $stmt_getData->execute();
                $rslt_getData = $stmt_getData->get_result();
                $rowToken = $rslt_getData->fetch_assoc();
                $akses = $rowToken['akses'];
$stmt_getData->close();             