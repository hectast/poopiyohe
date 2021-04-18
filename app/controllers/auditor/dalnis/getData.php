<?php

$id_auditor = $_SESSION['id'];
$stmt_getDataDalnis = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Pengendali Teknis'");
                $stmt_getDataDalnis->execute();
                $rslt_getDataDalnis = $stmt_getDataDalnis->get_result();
                $rowDalnis = $rslt_getDataDalnis->fetch_assoc();
$stmt_getDataDalnis->close();