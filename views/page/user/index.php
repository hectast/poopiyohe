<?php
include 'views/layout/user/header.php';

if (isset($_GET['views_user']) && $_GET['views_user'] == "beranda") {
    include 'views/page/user/beranda.php';
} else {
    include 'views/page/user/beranda.php';
}

include 'views/layout/user/footer.php';
?>