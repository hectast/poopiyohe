<?php
    if (isset($_POST['tuntas'])) {
        $id_tl = $_POST['id_tl'];
        
        $sql_tuntas = $mysqli->prepare("UPDATE tindak_lanjut SET status='Tuntas' WHERE id_tl='{$id_tl}'");
        $sql_tuntas->execute();
    } else if (isset($_POST['tuntas_sebagian'])) {
        $id_tl = $_POST['id_tl'];
        
        $sql_tuntas = $mysqli->prepare("UPDATE tindak_lanjut SET status='Tuntas Sebagian' WHERE id_tl='{$id_tl}'");
        $sql_tuntas->execute();
    } else if (isset($_POST['belum_tuntas'])) {
        $id_tl = $_POST['id_tl'];
        
        $sql_tuntas = $mysqli->prepare("UPDATE tindak_lanjut SET status='Belum Tuntas' WHERE id_tl='{$id_tl}'");
        $sql_tuntas->execute();
    }
?>