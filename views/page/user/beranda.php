<?php
include 'app/controllers/login/cek_login.php';
// include 'app/function_download.php';
// $random_karakter = random_karakter();
// setcookie(base64_encode('random_karakter'), base64_encode($random_karakter), time() + 3600);
?>
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
                    <div class="bold">
                        Belum tahu cara penggunaanya ?
                        <a href='https://drive.google.com/uc?export=download&id=1DUVV2PrBlyvuNq2Tu3Guxg1_hlIh_CZj'>Download Panduan</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>