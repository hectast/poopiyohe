<?php 
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['tipe_user'] == 'auditan') {
	header('Location: auditan');
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
include 'app/controllers/admin/cek_login.php'; 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Login Admin | PO'OPIYOHE</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="assets/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="assets/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="assets/css/app-light.css" id="lightTheme">
    <!-- <link rel="stylesheet" href="assets/css/app-dark.css" id="darkTheme" disabled> -->
</head>

<body class="light">
    <div class="container">
        <div class="row align-items-center vh-100">
            <form action="" method="post" class="col-lg-4 col-md-4 col-10 mx-auto text-center">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="beranda">
                    <img src="assets/img/images/logosolid.png" alt="logo" width="50%">
                </a>
                <h1 class="h6 mb-3">Login Administrator</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control " placeholder="Email address" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control " placeholder="Password" required="">
                </div>
                <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                <a href="beranda" class="btn btn-link mt-2">Kembali ke beranda</a>
                <p class="mt-5 mb-3 text-muted">© 2021</p>
            </form>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/apps.js"></script>
</body>

</html>
</body>

</html>