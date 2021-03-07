<?php
if (isset($_GET['views_admin']) && $_GET['views_admin'] == "beranda") {
    $page = "Beranda";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "pemda") {
    $page = "Pemerintah Daerah";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "instansi_vertikal") {
    $page = "Instansi Vertikal";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "auditor") {
    $page = "Auditor";
    $title = $page . " | PO'OPIYOHE";
}
?>

<?php include 'views/layout/admin/header.php'; ?>
<?php include 'views/layout/admin/navbar.php'; ?>
<?php include 'views/layout/admin/sidebar.php'; ?>

<?php
if (isset($_GET['views_admin']) && $_GET['views_admin'] == "beranda") {
    include 'views/page/admin/beranda.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "pemda") {
    include 'views/page/admin/master_data/pemda.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "instansi_vertikal") {
    include 'views/page/admin/master_data/instansi.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "auditor") {
    include 'views/page/admin/daftar_audit/auditor.php';
} else {
    include 'views/page/admin/beranda.php';
}
?>

<?php include 'views/layout/admin/footer.php'; ?>