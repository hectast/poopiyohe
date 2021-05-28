<?php
    if (isset($_POST['tuntas'])) {
        $id_tl = $_POST['id_tl'];
        $id_rekomendasi = $_POST['id_rekomendasi'];

        $data_rekom = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_rekomendasi = '$id_rekomendasi'");
        $row_rekom = $data_rekom->fetch_assoc();
      
        $data_tl = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_tl = '$id_tl'");
        $row_tl = $data_tl->fetch_assoc();
        $nominal = $row_tl['nominal_tl'];


        $id_temuan = $row_rekom['id_temuan'];
        $data_temuan = $mysqli->query("SELECT * FROM temuan WHERE id_temuan = '$id_temuan'");
        $row_temuan = $data_temuan->fetch_assoc();
        $saldo = $row_temuan['saldo'];

        $saldo_akhir = $saldo - $nominal;


        $sql_tuntas = $mysqli->prepare("UPDATE tindak_lanjut SET status='Tuntas' WHERE id_tl='{$id_tl}'");
        $sql_tuntas->execute();

        $sql_saldo = $mysqli->query("UPDATE temuan SET saldo = '$saldo_akhir' WHERE  id_temuan = '$id_temuan'");

        ?>
            <script>
                alert("Memperbarui data");
                document.location.href = "<?= $base_url ?>monitoring_detail_tl/<?= $row_temuan['id_penugasan']; ?>";
                document.location.href = "<?= $base_url ?>monitoring_detail_tl/<?= $row_temuan['id_penugasan']; ?>";
            </script>
        <?php
    } else if (isset($_POST['tuntas_sebagian'])) {
        $id_tl = $_POST['id_tl'];
        $id_rekomendasi = $_POST['id_rekomendasi'];

        $data_rekom = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_rekomendasi = '$id_rekomendasi'");
        $row_rekom = $data_rekom->fetch_assoc();
      
        $data_tl = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_tl = '$id_tl'");
        $row_tl = $data_tl->fetch_assoc();
        $nominal = $row_tl['nominal_tl'];


        $id_temuan = $row_rekom['id_temuan'];
        $data_temuan = $mysqli->query("SELECT * FROM temuan WHERE id_temuan = '$id_temuan'");
        $row_temuan = $data_temuan->fetch_assoc();
        $saldo = $row_temuan['saldo'];

        $saldo_akhir = $saldo - $nominal; 
        
        $sql_tuntas = $mysqli->prepare("UPDATE tindak_lanjut SET status='Tuntas Sebagian' WHERE id_tl='{$id_tl}'");
        $sql_tuntas->execute();

        $sql_saldo = $mysqli->query("UPDATE temuan SET saldo = '$saldo_akhir' WHERE  id_temuan = '$id_temuan'");

        ?>
        <script>
            alert("Memperbarui data");
            document.location.href = "<?= $base_url ?>monitoring_detail_tl/<?= $row_temuan['id_penugasan']; ?>";
            document.location.href = "<?= $base_url ?>monitoring_detail_tl/<?= $row_temuan['id_penugasan']; ?>";
        </script>
        <?php
    } else if (isset($_POST['belum_tuntas'])) {
        $id_tl = $_POST['id_tl'];
        $id_rekomendasi = $_POST['id_rekomendasi'];

        $data_rekom = $mysqli->query("SELECT * FROM data_rekomendasi WHERE id_rekomendasi = '$id_rekomendasi'");
        $row_rekom = $data_rekom->fetch_assoc();

        $id_temuan = $row_rekom['id_temuan'];
        $data_temuan = $mysqli->query("SELECT * FROM temuan WHERE id_temuan = '$id_temuan'");
        $row_temuan = $data_temuan->fetch_assoc();

        $sql_tuntas = $mysqli->prepare("UPDATE tindak_lanjut SET status='Belum Tuntas' WHERE id_tl='{$id_tl}'");
        $sql_tuntas->execute();
        ?>
        <script>
            alert("Memperbarui data");
            document.location.href = "<?= $base_url ?>monitoring_detail_tl/<?= $row_temuan['id_penugasan']; ?>";
            document.location.href = "<?= $base_url ?>monitoring_detail_tl/<?= $row_temuan['id_penugasan']; ?>";
        </script>
        <?php
    }
?>