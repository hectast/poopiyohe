<?php
if (mysqli_num_rows($rslt_getDataKetua) > 0) {
    if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "beranda_ketua") {
        $page = "Beranda";
        $fortitle = "Ketua - Beranda";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_hasil_penugasan") {
        $page = "Hasil Penugasan";
        $fortitle = "Ketua - Hasil Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_tambah_temuan") {
        $page = "Tambah Temuan";
        $fortitle = "Ketua - Tambah Temuan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketuan_edit_temuan") {
        $page = "Edit Temuan";
        $fortitle = "Ketua - Edit Temuan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_detail_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Ketua - Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    }
} else if (mysqli_num_rows($rslt_getDataAnggota) > 0 && isset($_GET['views_anggota'])) {
    if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "beranda_anggota") {
        $page = "Beranda";
        $fortitle = "Anggota - Beranda";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_hasil_penugasan") {
        $page = "Hasil Penugasan";
        $fortitle = "Anggota - Hasil Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_detail_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Anggota - Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    }
} else if (mysqli_num_rows($rslt_getDataDalnis) > 0 && isset($_GET['views_dalnis'])) {
    if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "beranda_dalnis") {
        $page = "Beranda";
        $fortitle = "Dalnis - Beranda";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_hasil_penugasan") {
        $page = "Hasil Penugasan";
        $fortitle = "Dalnis - Hasil Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_detail_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Dalnis - Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    }
} else if ($akses === 1 && isset($_GET['views_monitoring'])) {
    if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "beranda_monitoring") {
        $page = "Beranda";
        $fortitle = "Monitoring - Beranda";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_hasil_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Monitoring - Hasil Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_detail_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Monitoring - Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    }
} else if ($akses === 2) {
    if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "beranda_korwas") {
        $page = "Beranda";
        $fortitle = "Korwas - Beranda";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_data_penugasan") {
        $page = "Data Penugasan";
        $fortitle = "Korwas - Data Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_tambah_penugasan") {
        $page = "Tambah Penugasan";
        $fortitle = "Korwas - Tambah Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_edit_penugasan") {
        $page = "Edit Penugasan";
        $fortitle = "Korwas - Edit Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_lihat_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Korwas - Lihat Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_hasil_penugasan") {
        $page = "Hasil Penugasan";
        $fortitle = "Korwas - Hasil Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_detail_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Korwas - Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    }
}
?>

<?php include 'views/layout/auditor/header.php'; ?>
<?php include 'views/layout/auditor/navbar.php'; ?>
<?php include 'views/layout/auditor/sidebar.php'; ?>

<?php
 if (mysqli_num_rows($rslt_getDataKetua) > 0 && isset($_GET['views_ketua'])) {
    if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "beranda_ketua") {
        include 'views/page/auditor/ketua/beranda.php';
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_hasil_penugasan") {
        include 'views/page/auditor/ketua/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_tambah_temuan") {
        include 'views/page/auditor/ketua/hasil_penugasan/tambah_temuan.php';
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketuan_edit_temuan") {
        include 'views/page/auditor/ketua/hasil_penugasan/edit_temuan.php';
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_detail_penugasan") {
        include 'views/page/auditor/ketua/hasil_penugasan/detail_penugasan.php';
    } else {
        include 'views/page/auditor/ketua/beranda.php';
    }   
} else if (mysqli_num_rows($rslt_getDataAnggota) > 0 && isset($_GET['views_anggota'])) {
    if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "beranda_anggota") {
        include 'views/page/auditor/anggota/beranda.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_hasil_penugasan") {
        include 'views/page/auditor/anggota/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_detail_penugasan") {
        include 'views/page/auditor/anggota/hasil_penugasan/detail_penugasan.php';
    } else {
        include 'views/page/auditor/ketua/beranda.php';
    }   
} else if (mysqli_num_rows($rslt_getDataDalnis) > 0 && isset($_GET['views_dalnis'])) {
    if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "beranda_dalnis") {
        include 'views/page/auditor/dalnis/beranda.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_hasil_penugasan") {
        include 'views/page/auditor/dalnis/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_detail_penugasan") {
        include 'views/page/auditor/dalnis/hasil_penugasan/detail_penugasan.php';
    } else {
        include 'views/page/auditor/dalnis/beranda.php';
    }    
} else if ($akses === 1 && isset($_GET['views_monitoring'])) {
    if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "beranda_monitoring") {
        include 'views/page/auditor/monitoring/beranda.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_hasil_penugasan") {
        include 'views/page/auditor/monitoring/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_detail_penugasan") {
        include 'views/page/auditor/monitoring/hasil_penugasan/detail_penugasan.php';
    } else {
        include 'views/page/auditor/monitoring/beranda.php';
    }
} else if ($akses === 2 && isset($_GET['views_korwas'])) {
    if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "beranda_korwas") {
        include 'views/page/auditor/korwas/beranda.php';
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_data_penugasan") {
        include 'views/page/auditor/korwas/data_penugasan/datapenugasan.php';
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_tambah_penugasan") {
        include 'views/page/auditor/korwas/data_penugasan/tambah_penugasan.php';
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_edit_penugasan") {
        include 'views/page/auditor/korwas/data_penugasan/edit_penugasan.php';
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_lihat_penugasan") {
        include 'views/page/auditor/korwas/data_penugasan/detailpenugasan.php';
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_hasil_penugasan") {
        include 'views/page/auditor/korwas/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "korwas_detail_penugasan") {
        include 'views/page/auditor/korwas/hasil_penugasan/detail_penugasan.php';
    } else {
        include 'views/page/auditor/korwas/beranda.php';
    }
} else {

    if (isset($_GET['views_ketua']) && !mysqli_num_rows($rslt_getDataKetua) > 0) {
        if (mysqli_num_rows($rslt_getDataAnggota) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_anggota';
                </script>
            <?php
        } else if (mysqli_num_rows($rslt_getDataDalnis) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_dalnis';
                </script>
            <?php
        } else if ($akses === 1) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_monitoring';
                </script>
            <?php
        } else if ($akses === 2) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_korwas';
                </script>
            <?php
        }
    } else if (isset($_GET['views_anggota']) && !mysqli_num_rows($rslt_getDataAnggota) > 0) { 
        if (mysqli_num_rows($rslt_getDataKetua) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_ketua';
                </script>
            <?php
        } else if (mysqli_num_rows($rslt_getDataDalnis) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_dalnis';
                </script>
            <?php
        } else if ($akses === 1) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_monitoring';
                </script>
            <?php
        } else if ($akses === 2) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_korwas';
                </script>
            <?php
        }
    } else if (isset($_GET['views_dalnis']) && !mysqli_num_rows($rslt_getDataDalnis) > 0) {
        if (mysqli_num_rows($rslt_getDataKetua) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_ketua';
                </script>
            <?php
        } else if (mysqli_num_rows($rslt_getDataAnggota) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_anggota';
                </script>
            <?php
        } else if ($akses === 1) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_monitoring';
                </script>
            <?php
        } else if ($akses === 2) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_korwas';
                </script>
            <?php
        }
    } else if (isset($_GET['views_monitoring']) && $akses !== 1) {
        if (mysqli_num_rows($rslt_getDataKetua) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_ketua';
                </script>
            <?php
        } else if (mysqli_num_rows($rslt_getDataAnggota) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_anggota';
                </script>
            <?php
        } else if (mysqli_num_rows($rslt_getDataDalnis) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_dalnis';
                </script>
            <?php
        } else if ($akses === 2) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_korwas';
                </script>
            <?php
        }
    }  else if (isset($_GET['views_korwas']) && $akses !== 2) {
        if (mysqli_num_rows($rslt_getDataKetua) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_ketua';
                </script>
            <?php
        } else if (mysqli_num_rows($rslt_getDataAnggota) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_anggota';
                </script>
            <?php
        } else if (mysqli_num_rows($rslt_getDataDalnis) > 0) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_dalnis';
                </script>
            <?php
        } else if ($akses === 1) {
            ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_monitoring';
                </script>
            <?php
        }
    } else {
        ?>
            <script>
                document.location.href = '<?= $base_url; ?>beranda_ketua';
            </script>
        <?php
    }
    
}


?>

<?php include 'views/layout/auditor/footer.php'; ?>