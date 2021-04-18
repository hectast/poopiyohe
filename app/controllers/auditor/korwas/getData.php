<?php

$id_auditor = $_SESSION['id'];
$stmt_getDataKorwas = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Koordinator Pengawas'");
                $stmt_getDataKorwas->execute();
                $rslt_getDataKorwas = $stmt_getDataKorwas->get_result();
                $rowKorwas = $rslt_getDataKorwas->fetch_assoc();
$stmt_getDataKorwas->close();