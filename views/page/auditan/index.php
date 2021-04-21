<?php
if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "beranda_auditan") {
    $page = "Beranda";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "daftar_temuan") {
    $page = "Daftar Penugasan BPKP";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "detail_temuan") {
    $page = "Detail Temuan";
    $title = $page . " | PO'OPIYOHE";
}
?>

<?php include 'views/layout/auditan/header.php'; ?>
<?php include 'views/layout/auditan/navbar.php'; ?>
<?php include 'views/layout/auditan/sidebar.php'; ?>

<?php
if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "beranda_auditan") {
    include 'views/page/auditan/beranda.php';
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "daftar_temuan") {
    include 'views/page/auditan/daftar_temuan/daftar_temuan.php';
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "detail_temuan") {
    include 'views/page/auditan/daftar_temuan/detail_daftar_temuan.php';
} else {
    include 'views/page/auditan/beranda.php';
}
?>

<?php include 'views/layout/auditan/footer.php'; ?>