<?php

$id_auditor = $_SESSION['id'];
$stmt_getDataAnggota = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Anggota Tim'");
                $stmt_getDataAnggota->execute();
                $rslt_getDataAnggota = $stmt_getDataAnggota->get_result();
                $rowAnggota = $rslt_getDataAnggota->fetch_assoc();
$stmt_getDataAnggota->close();