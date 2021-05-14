<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['tipe_user'] != 'admin') {
	header('Location: beranda');
	exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['tipe_user'] == 'auditan') {
	header('Location: auditan');
	exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['tipe_user'] == 'auditor') {
	header('Location: auditor');
	exit;
}

include 'app/env.php';
include 'app/controllers/login/cek_session.php';
require_once 'views/page/admin/index.php';