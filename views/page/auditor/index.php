<?php
if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "beranda_auditor") {
    $page = "Beranda";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "laporan") {
    $page = "Laporan";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "input_laporan") {
    $page = "Input Laporan";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "edit_laporan") {
    $page = "Edit Laporan";
    $title = $page . " | PO'OPIYOHE";
}
?>

<?php include 'views/layout/auditor/header.php'; ?>
<?php include 'views/layout/auditor/navbar.php'; ?>
<?php include 'views/layout/auditor/sidebar.php'; ?>

<?php
if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "beranda_auditor") {
    include 'views/page/auditor/beranda.php';
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "laporan") {
    include 'views/page/auditor/laporan/laporan.php';
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "input_laporan") {
    include 'views/page/auditor/laporan/input_laporan.php';
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "edit_laporan") {
    include 'views/page/auditor/laporan/edit_laporan.php';
} else {
    include 'views/page/auditor/beranda.php';
}
?>

<?php include 'views/layout/auditor/footer.php'; ?>