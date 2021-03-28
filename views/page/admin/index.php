<?php
if (isset($_GET['views_admin']) && $_GET['views_admin'] == "beranda_admin") {
    $page = "Beranda";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "opd") {
    $page = "OPD";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "instansi_vertikal") {
    $page = "Instansi Vertikal";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "data_auditor") {
    $page = "Data Auditor";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "datapenugasan") {
    $page = "Data Penugasan";
    $title = $page . " | PO'OPIYOHE";
}else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "tambah_penugasan") {
    $page = "Tambah Data Penugasan";
    $title = $page . " | PO'OPIYOHE";
}
?>

<?php include 'views/layout/admin/header.php'; ?>
<?php include 'views/layout/admin/navbar.php'; ?>
<?php include 'views/layout/admin/sidebar.php'; ?>

<?php
if (isset($_GET['views_admin']) && $_GET['views_admin'] == "beranda_admin") {
    include 'views/page/admin/beranda.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "opd") {
    include 'views/page/admin/master_data/opd.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "instansi_vertikal") {
    include 'views/page/admin/master_data/instansi_vertikal.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "data_auditor") {
    include 'views/page/admin/master_data/auditor.php';

}else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "datapenugasan") {
    include 'views/page/admin/datapenugasan.php';
}else if (isset($_GET['views_admin']) && $_GET['views_admin'] == "tambah_penugasan") {
    include 'views/page/admin/tambah_penugasan.php';
} else {

    include 'views/page/admin/beranda.php';
}
?>

<?php include 'views/layout/admin/footer.php'; ?>