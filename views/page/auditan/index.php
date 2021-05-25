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
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "input_tindak_lanjut") {
    $page = "Input Tindak Lanjut";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "tindak_lanjut_rekom") {
    $page = "Tindak Lanjut Rekomendasi";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "penilaian"){
    $page = "Daftar Penugasan";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "detail_penilaian"){
    $page = "Penilaian";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "edit_nilai"){
    $page = "Edit Penilaian";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "auditan_cek_tl"){
    $page = "Cek Tindak Lanjut";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "edit_tl"){
    $page = "Edit Tindak Lanjut";
    $title = $page . " | PO'OPIYOHE";
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "riwayat_tl"){
    $page = "Riwayat Tindak Lanjut";
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
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "input_tindak_lanjut") {
    include 'views/page/auditan/input_tindak_lanjut.php';
} else if (isset($_GET['views_auditan']) && $_GET['views_auditan'] == "tindak_lanjut_rekom") {
    include 'views/page/auditan/tindak_lanjut_rekom.php';
} else if(isset($_GET['views_auditan']) && $_GET['views_auditan'] == "penilaian"){
    include 'views/page/auditan/penilaian/daftar_tugas.php';
} else if(isset($_GET['views_auditan']) && $_GET['views_auditan'] == "detail_penilaian"){
    include 'views/page/auditan/penilaian/detail_penilaian.php';
}else if(isset($_GET['views_auditan']) && $_GET['views_auditan'] == "edit_nilai"){
    include 'views/page/auditan/penilaian/edit_nilai.php';
}else if(isset($_GET['views_auditan']) && $_GET['views_auditan'] == "auditan_cek_tl"){
    include 'views/page/auditan/cek_tl.php';
}else if(isset($_GET['views_auditan']) && $_GET['views_auditan'] == "edit_tl"){
    include 'views/page/auditan/edit_tl.php';
}else if(isset($_GET['views_auditan']) && $_GET['views_auditan'] == "riwayat_tl"){
    include 'views/page/auditan/riwayat.php';
}else {
    include 'views/page/auditan/beranda.php';
}
?>

<?php include 'views/layout/auditan/footer.php'; ?>