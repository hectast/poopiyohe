<?php
if (mysqli_num_rows($rslt_getDataKetua) > 0 && isset($_GET['views_ketua'])) {
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
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_data_penugasan") {
        $page = "Data Penugasan";
        $fortitle = "Ketua - Data Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_tambah_penugasan") {
        $page = "Tambah Penugasan";
        $fortitle = "Ketua - Tambah Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_edit_penugasan") {
        $page = "Edit Penugasan";
        $fortitle = "Ketua - Edit Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_lihat_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Ketua - Lihat Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    }
} else if (mysqli_num_rows($rslt_getDataAnggota) > 0 && isset($_GET['views_anggota'])) {
    if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "beranda_anggota") {
        $page = "Beranda";
        $fortitle = "Anggota - Beranda";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_data_penugasan") {
        $page = "Data Penugasan";
        $fortitle = "Anggota - Data Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_tambah_penugasan") {
        $page = "Tambah Penugasan";
        $fortitle = "Anggota - Tambah Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_edit_penugasan") {
        $page = "Edit Penugasan";
        $fortitle = "Anggota - Edit Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_lihat_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Anggota - Lihat Detail Penugasan";
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
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_data_penugasan") {
        $page = "Data Penugasan";
        $fortitle = "Dalnis - Data Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_tambah_penugasan") {
        $page = "Tambah Penugasan";
        $fortitle = "Dalnis - Tambah Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_edit_penugasan") {
        $page = "Edit Penugasan";
        $fortitle = "Dalnis - Edit Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_lihat_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Dalnis - Lihat Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    }
} else if ($akses === 1 && isset($_GET['views_monitoring'])) {
    if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "beranda_monitoring") {
        $page = "Beranda";
        $fortitle = "Monitoring - Beranda";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_tindak_lanjut") {
        $page = "Tindak Lanjut";
        $fortitle = "Monitoring - Tindak Lanjut";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_data_penugasan") {
        $page = "Data Penugasan";
        $fortitle = "Monitoring - Data Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_tambah_penugasan") {
        $page = "Tambah Penugasan";
        $fortitle = "Monitoring - Tambah Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_edit_penugasan") {
        $page = "Edit Penugasan";
        $fortitle = "Monitoring - Edit Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_lihat_penugasan") {
        $page = "Detail Penugasan";
        $fortitle = "Monitoring - Lihat Detail Penugasan";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_detail_tl") {
        $page = "Detail Tindak Lanjut";
        $fortitle = "Monitoring - Detail Tindak Lanjut";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_cek_tl") {
        $page = "Cek Tindak Lanjut";
        $fortitle = "Monitoring - Cek Tindak Lanjut";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "riwayat_tindak_lanjut") {
        $page = "Riwayat Tindak Lanjut";
        $fortitle = "Monitoring - Riwayat Tindak Lanjut";
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
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "trusted_advisor"){
        $page = "Trusted Advisor";
        $fortitle = "Korwas - Trusted Advisor";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "pan_rb"){
        $page = "PAN - RB";
        $fortitle = "Korwas - PAN - RB";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "pionir"){
        $page = "PIONIR";
        $fortitle = "Korwas - PIONIR";
        $title = $fortitle . " | PO'OPIYOHE";
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "detail_nilai"){
        $page = "Detail Penilaian";
        $fortitle = "Detail Penilaian";
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
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_data_penugasan") {
        include 'views/page/auditor/ketua/data_penugasan/datapenugasan.php';
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_tambah_penugasan") {
        include 'views/page/auditor/ketua/data_penugasan/tambah_penugasan.php';
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_edit_penugasan") {
        include 'views/page/auditor/ketua/data_penugasan/edit_penugasan.php';
    } else if (isset($_GET['views_ketua']) && $_GET['views_ketua'] == "ketua_lihat_penugasan") {
        include 'views/page/auditor/ketua/data_penugasan/detailpenugasan.php';
    } else {
        include 'views/page/auditor/ketua/beranda.php';
    }   
} else if (mysqli_num_rows($rslt_getDataAnggota) > 0 && isset($_GET['views_anggota'])) {
    if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "beranda_anggota") {
        include 'views/page/auditor/anggota/beranda.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_data_penugasan") {
        include 'views/page/auditor/anggota/data_penugasan/datapenugasan.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_tambah_penugasan") {
        include 'views/page/auditor/anggota/data_penugasan/tambah_penugasan.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_edit_penugasan") {
        include 'views/page/auditor/anggota/data_penugasan/edit_penugasan.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_lihat_penugasan") {
        include 'views/page/auditor/anggota/data_penugasan/detailpenugasan.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_hasil_penugasan") {
        include 'views/page/auditor/anggota/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_tambah_temuan") {
        include 'views/page/auditor/anggota/hasil_penugasan/tambah_temuan.php';
    } else if (isset($_GET['views_anggota']) && $_GET['views_anggota'] == "anggota_detail_penugasan") {
        include 'views/page/auditor/anggota/hasil_penugasan/detail_penugasan.php';
    } else {
        include 'views/page/auditor/anggota/beranda.php';
    }   
} else if (mysqli_num_rows($rslt_getDataDalnis) > 0 && isset($_GET['views_dalnis'])) {
    if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "beranda_dalnis") {
        include 'views/page/auditor/dalnis/beranda.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_hasil_penugasan") {
        include 'views/page/auditor/dalnis/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_detail_penugasan") {
        include 'views/page/auditor/dalnis/hasil_penugasan/detail_penugasan.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_data_penugasan") {
        include 'views/page/auditor/dalnis/data_penugasan/datapenugasan.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_tambah_penugasan") {
        include 'views/page/auditor/dalnis/data_penugasan/tambah_penugasan.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_edit_penugasan") {
        include 'views/page/auditor/dalnis/data_penugasan/edit_penugasan.php';
    } else if (isset($_GET['views_dalnis']) && $_GET['views_dalnis'] == "dalnis_lihat_penugasan") {
        include 'views/page/auditor/dalnis/data_penugasan/detailpenugasan.php';
    } else {
        include 'views/page/auditor/dalnis/beranda.php';
    }    
} else if ($akses === 1 && isset($_GET['views_monitoring'])) {
    if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "beranda_monitoring") {
        include 'views/page/auditor/monitoring/beranda.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_tindak_lanjut") {
        include 'views/page/auditor/monitoring/tindak_lanjut/hasil_penugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_detail_tl") {
        include 'views/page/auditor/monitoring/tindak_lanjut/detail_penugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_cek_tl") {
        include 'views/page/auditor/monitoring/tindak_lanjut/cek_tl.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_data_penugasan") {
        include 'views/page/auditor/monitoring/data_penugasan/datapenugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_tambah_penugasan") {
        include 'views/page/auditor/monitoring/data_penugasan/tambah_penugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_edit_penugasan") {
        include 'views/page/auditor/monitoring/data_penugasan/edit_penugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_lihat_penugasan") {
        include 'views/page/auditor/monitoring/data_penugasan/detailpenugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "riwayat_tindak_lanjut") {
        include 'views/page/auditor/monitoring/tindak_lanjut/riwayat.php';
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
    } else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "detail_nilai") {
        include 'views/page/auditor/korwas/detail_nilai.php';
    }else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "trusted_advisor"){
        include 'views/page/auditor/korwas/trusted_advisor.php';
    }else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "pan_rb"){
        include 'views/page/auditor/korwas/pan_rb.php';
    }else if (isset($_GET['views_korwas']) && $_GET['views_korwas'] == "pionir"){
        include 'views/page/auditor/korwas/pionir.php';
    }else {
        include 'views/page/auditor/korwas/beranda.php';
    }
} else if ($_SESSION['auditornopngsn'] === 3 && isset($_GET['views_auditor'])) {
    if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "beranda_auditor") {
        include 'views/page/auditor/beranda.php';
    } else {
        include 'views/page/auditor/beranda.php';
    }
} else {

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
    } else if ($akses === 2) {
        ?>
            <script>
                document.location.href = '<?= $base_url; ?>beranda_korwas';
            </script>
        <?php
    } else {
        ?>
            <script>
                document.location.href = '<?= $base_url; ?>beranda_auditor';
            </script>
        <?php
    }
    
}


?>

<?php include 'views/layout/auditor/footer.php'; ?>