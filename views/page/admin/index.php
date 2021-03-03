<?php 
    if ($_GET['views_admin'] == "beranda") {
        $page = "Beranda"; $title = $page . " | PO'OPIYOHE";
    } else if ($_GET['views_admin'] == "kemlem") {
        $page = "Kementrian/Lembaga"; $title = $page . " | PO'OPIYOHE";
    } else if ($_GET['views_admin'] == "auditor"){
        $page = "Auditor"; $title= $page . " | PO'OPIYOHE";
    } else if ($_GET['views_admin'] == "auditan"){
        $page = "Auditan"; $title = $page . " | PO'OPIYOHE";
    }
?>

<?php include 'views/layout/admin/header.php'; ?>
<?php include 'views/layout/admin/navbar.php'; ?>
<?php include 'views/layout/admin/sidebar.php'; ?>

<?php
    if ($_GET['views_admin'] == "beranda") {
        include 'views/page/admin/beranda.php';
    } else if ($_GET['views_admin'] == "kemlem") {
        include 'views/page/admin/master_data/kemlem.php';
    } else if($_GET['views_admin'] == "auditor"){
        include 'views/page/admin/daftar_audit/auditor.php';
    } else if($_GET['views_admin'] == "auditan"){
        include 'views/page/admin/daftar_audit/auditan.php';

    }
    else {
        include 'views/page/admin/beranda.php';
    }
?>

<?php include 'views/layout/admin/footer.php'; ?>