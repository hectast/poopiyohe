<?php

$id_auditor = $_SESSION['id'];
$stmt_getDataKetua = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Ketua Tim'");
                $stmt_getDataKetua->execute();
                $rslt_getDataKetua = $stmt_getDataKetua->get_result();
                $rowKetua = $rslt_getDataKetua->fetch_assoc();
$stmt_getDataKetua->close();