<?php
include 'app/controllers/user/daftar_function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POOPIYOHE | Home</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/select2.css">
    <link rel="stylesheet" href="assets/css/select2-bootstrap4.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="headerlogin">
        <div class="hd">
            <img src="assets/img/images/logosolid.png" width="200" alt="">
            <h2 class="head_title_login text-primer">Daftar Auditan</h2>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="form-group" id="#divdiv">
                <div class="pemda_row">
                    <label for="">Pemerintah Daerah</label>
                    <select name="" id="id_pemda" class="custom-select select2">
                        <option hidden>-Pilih Pemerintah Daerah-</option>
                        <?php tampil_data_pemda($mysqli) ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="" id="" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primer col-12">Daftar</button>
            </div>
            <div class="form-group">
                <a href="index" class="btn btn-danger col-12">Kembali</a>
            </div>


        </div>
    </header>
    <!---------------------------------------- header ---------------------------------------->

    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
    </script>
    <script>
        $(function() {

            $('#id_pemda').change(function() {
                $('.instansi_row').remove();
                if ($('#id_pemda').val() != '-- Pilih Pemerintah Daerah --') {
                    $.get('app/controllers/user/daftar_dynoption.php', {
                            id_pemda: $('#id_pemda').val()
                        })
                        .done(function(data) {
                            $('div.pemda_row').after(data);
                        })
                }
            });

        });
    </script>
</body>

</html>