<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['tipe_user'] != 'admin') {
	header('Location: login');
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
include 'app/controllers/user/cek_session.php';
require_once 'views/page/admin/index.php';