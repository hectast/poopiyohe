<?php

$id_auditor = $_SESSION['id'];
$stmt_getData = $mysqli->prepare("SELECT * FROM auditor WHERE id = {$id_auditor}");
                $stmt_getData->execute();
                $rslt_getData = $stmt_getData->get_result();
                $rowToken = $rslt_getData->fetch_assoc();
                $akses = $rowToken['akses'];
$stmt_getData->close();