<?php
// error_reporting(0);
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['tipe_user'] != 'auditor') {
	header('Location: beranda');
	exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['tipe_user'] == 'auditan') {
	header('Location: auditan');
	exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['tipe_user'] == 'admin') {
	header('Location: admin');
	exit;
}
include 'app/log_auditor.php';

$base_url = 'http://localhost/poopiyohe/';

include 'app/env.php';
include 'app/controllers/login/cek_session.php';
include 'app/controllers/auditor/getData.php';
require_once 'views/page/auditor/index.php';


