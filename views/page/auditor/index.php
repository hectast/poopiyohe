<?php
if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "beranda_auditor") {
    $page = "Beranda";
    $title = $page . " | PO'OPIYOHE";
}else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "hasil_penugasan") {
    $page = "Hasil Penugasan";
    $title = $page . " | PO'OPIYOHE";
}else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "tambah_temuan") {
    $page = "Tambah Temuan";
    $title = $page . " | PO'OPIYOHE";
}else if ($akses === 1 && isset($_GET['views_monitoring'])) {
    if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "beranda_monitoring") {
        $page = "Beranda Monitoring";
        $title = $page . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_hasil_penugasan") {
        $page = "Hasil Penugasan";
        $title = $page . " | PO'OPIYOHE";
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "detail_hasil_penugasan") {
        $page = "Detail Penugasan";
        $title = $page . " | PO'OPIYOHE";
    }
} else {
    $page = "Beranda";
    $title = $page . " | PO'OPIYOHE";
}
?>

<?php include 'views/layout/auditor/header.php'; ?>
<?php include 'views/layout/auditor/navbar.php'; ?>
<?php include 'views/layout/auditor/sidebar.php'; ?>

<?php
if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "beranda_auditor") {
    include 'views/page/auditor/beranda.php';
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "hasil_penugasan") {
    include 'views/page/auditor/hasil_penugasan/hasil_penugasan.php';
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "tambah_temuan") {
    include 'views/page/auditor/hasil_penugasan/tambah_temuan.php';
} else if ($akses === 1 && isset($_GET['views_monitoring'])) {
    if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "beranda_monitoring") {
        include 'views/page/auditor/monitoring/beranda.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "monitoring_hasil_penugasan") {
        include 'views/page/auditor/monitoring/hasil_penugasan/hasil_penugasan.php';
    } else if (isset($_GET['views_monitoring']) && $_GET['views_monitoring'] == "detail_hasil_penugasan") {
        include 'views/page/auditor/monitoring/hasil_penugasan/detail_penugasan.php';
    }
} else if ($akses !== 1 && isset($_GET['views_monitoring'])) {
    ?>
        <script>
            alert('Maaf anda tidak di izinkan mengakses halaman ini !');
            document.location.href = 'beranda_auditor';
        </script>
    <?php
} else {
    include 'views/page/auditor/beranda.php';
}

?>

<?php include 'views/layout/auditor/footer.php'; ?>