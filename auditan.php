<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['tipe_user'] != 'auditan') {
	header('Location: beranda');
	exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['tipe_user'] == 'auditor') {
	header('Location: auditor');
	exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['tipe_user'] == 'admin') {
	header('Location: admin');
	exit;
}

include 'app/env.php';
require_once 'views/page/auditan/index.php';