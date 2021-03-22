<?php
if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "beranda_auditan") {
    $page = "Beranda";
    $title = $page . " | PO'OPIYOHE";
}
?>

<?php include 'views/layout/auditan/header.php'; ?>
<?php include 'views/layout/auditan/navbar.php'; ?>
<?php include 'views/layout/auditan/sidebar.php'; ?>

<?php
if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "beranda_auditan") {
    include 'views/page/auditan/beranda.php';
} else {

    include 'views/page/auditan/beranda.php';
}
?>

<?php include 'views/layout/auditan/footer.php'; ?>