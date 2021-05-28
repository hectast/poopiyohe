<?php
include 'app/controllers/login/cek_login.php';
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modalheader">
                <div class="w-100">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <img src="assets/img/SiKepo.svg" alt="" style="width: 20%;"> | Login
                    </h5>
                </div>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" class="text-primer"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-primer"><i class="fa fa-lock"></i> Password</label>
                        <input type="password" name="password" class="form-control">
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

<div class="container-fluid con-a">
    <div class="row vh-100">
        <div class="col-md-bos auth-bg-section text-white kiri">
            <img src="assets/new_assets/assts/sikepo.png" width="220" alt="" class="mb-3 head">
            <img src="assets/new_assets/assts/sikepo.png" width="100" alt="" class="mb-3 head2">
            <p><i>"No single actor has all knowledge and information required to solve complex dynamics and diversified"</i></p>
            <div class="quote">-Kooiman, J</div>
        </div>
        <div class="col-6 kanan">
            <img src="assets/new_assets/assts/bulat kanan atas full.png" class="bulat-kanan" height="120" alt="">
            <h1>Selamat Datang di</h1>
            <img src="assets/new_assets/assts/sikepo.png" width="220" alt="" class="mb-3 logo">
            <img src="assets/new_assets/assts/sikepo.png" width="100" alt="" class="mb-3 logo2">
            <p class="font-grey">Badan Pengawasan Keuangan dan Pembangunan <br class="non">Perwakilan Provinsi Gorontalo</p>
            <form action="" method="post" class="mt-4">
                <div class="form-group mb-4">
                    <label for="" class="mb-2">E-Mail</label>
                    <input type="text" name="email" placeholder="Masukan email yang telah diberikan oleh admin" class="">
                </div>
                <div class="form-group mb-5">
                    <label class="mb-2" for="">Password</label>
                    <input type="password" name="password" placeholder="Masukan password yang telah diberikan oleh admin" class="">
                </div>
                <div class="form-group mb-5 text-center">
                    <button type="submit" name="login" class="btn btn-primer">Masuk</button>
                </div>
                <div class="text-center foot">
                    <div class="bold">Belum tahu cara penggunaanya ? <a href="">Donwload Panduan</a></div>
                </div>
            </form>
        </div>
    </div>
</div>