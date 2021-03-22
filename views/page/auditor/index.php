<?php
if (isset($_GET['views_auditor']) && $_GET['views_auditor'] == "beranda_auditor") {
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
} else {

    include 'views/page/auditor/beranda.php';
}
?>

<?php include 'views/layout/auditor/footer.php'; ?>