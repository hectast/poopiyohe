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

}else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "temuan") {
    $page = "Temuan";
    $title = $page . " | PO'OPIYOHE";
}else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "input_temuan") {
    $page = "Input Temuan";
    $title = $page . " | PO'OPIYOHE";
}else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "edit_temuan") {
    $page = "Edit Temuan";
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
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "temuan") {
    include 'views/page/auditor/temuan/temuan.php';
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "input_temuan") {
    include 'views/page/auditor/temuan/input_temuan.php';
} else if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "edit_temuan") {
    include 'views/page/auditor/temuan/edit_temuan.php';
} else {
    include 'views/page/auditor/beranda.php';
}
?>

<?php include 'views/layout/auditor/footer.php'; ?>