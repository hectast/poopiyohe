<?php
    include 'app/controllers/login/cek_login.php';
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modalheader">
                <h5 class="modal-title" id="exampleModalLabel">
                    <img src="assets/img/images/logowhite.png" alt="" style="width: 30%;"> | Login
                </h5>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" class="text-primer"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="" class="text-primer"><i class="fa fa-lock"></i> Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary col-12"> <i class="fa fa-door-open"></i>Masuk</button>
                        <!-- <a href="login" class="btn btn-link mt-2 col-12"><small>Login sebagai admin</small></a> -->
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------- header ---------------------------------------->
<header>
    <div class="logo"><img src="assets/img/images/logo.svg" alt="" width="200"></div>
    <nav>
        <a href="">Beranda</a>
        <a href="">Fungsi</a>
        <a href="">Tentang</a>
        <a href="">Kontak</a>
        <a class="login" data-toggle="modal" data-target="#exampleModal" href="">Login</a>
    </nav>
    <div id="nv">
        <a class="nav-link navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </a>
    </div>
    <div class="collapse navbar-collapse " id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active list-menu">
                <a class="nav-link" href="">Beranda</a>
            </li>
            <li class="nav-item list-menu">
                <a class="nav-link" href="">Fungsi</a>
            </li>
            <li class="nav-item list-menu">
                <a class="nav-link" href="">Tentang</a>
            </li>
            <li class="nav-item list-menu">
                <a href="" class="nav-link">Kontak</a>
            </li>
            <li class="nav-item lists">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">Login</a>
            </li>
        </ul>


    </div>
    <div class="center">
        <h1 class="head_title">Keamanan Terjamin!!</h1>
        <h1 class="head_subtitle">Audit Menjadi Lebih Aman Dengan Aplikasi</h1>
        <img src="assets/img/logo.svg" width="200" alt="">
        <p>Badan Pengawasan Keuangan dan Pembangunan Perwakilan Provinsi Gorontalo </p>
        <a href="" class="tombol btn btn-bkp" data-toggle="modal" data-target="#exampleModal">Masuk</a>
    </div>

</header>
<!---------------------------------------- header ---------------------------------------->
<div class="break">
    <h2>
        <div class="upper"><img src="assets/img/images/logosolid.png" width="200" alt=""></div>
    </h2>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-centered">
                <img src="assets/img/images/appraisal-form.png" width="90" alt="">
                <h1>Lorem</h1>
                <p>Lorem ipsum sit amet dolor lorem ipsum sit amet dolor site amet</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-centered">
                <img src="assets/img/images/shield.png" width="90" alt="">
                <h1>Lorem</h1>
                <p>Lorem ipsum sit amet dolor lorem ipsum sit amet dolor site amet</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-centered">
                <img src="assets/img/images/feedback.png" width="90" alt="">
                <h1>Lorem </h1>
                <p>Lorem ipsum sit amet dolor lorem ipsum sit amet dolor site amet</p>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------- section --------------------------------------->
<div id="section">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <img src="assets/img/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
        <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
            <div class="left-heading">
                <img src="assets/img/images/logosolid.png" width="200" alt="">
            </div>
            <div class="left-text">
                <p>
                    Po'opiyohe adalah aplikasi Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam recusandae
                    corrupti veniam optio consequatur itaque harum dolorum similique officiis non! Voluptatem labore
                    doloremque enim ut harum quam rem deleniti cumque?
                </p>

            </div>
        </div>
    </div>
</div>
<!--------------------------------------- section --------------------------------------->