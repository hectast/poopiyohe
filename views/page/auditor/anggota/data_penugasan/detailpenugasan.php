<?php
include 'app/controllers/auditor/anggota/data_penugasan/post_penugasan.php';

?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title">
                    <a href="<?= $base_url; ?>anggota_data_penugasan" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a>
                    <?= $page; ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <?php detail($id_tampil,$mysqli); ?>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->