<?php
include 'app/controllers/admin/post_penugasan.php';

?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <div class="row">

                    <?php detail($id_tampil,$mysqli); ?>
        </div> <!-- .row -->
        <a href="data_penugasan" class="btn btn-secondary">Kembali</a>
    </div> <!-- .container-fluid -->
</main> <!-- main -->