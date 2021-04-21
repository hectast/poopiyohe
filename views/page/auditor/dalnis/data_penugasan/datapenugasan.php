<?php
include 'app/controllers/auditor/dalnis/data_penugasan/post_penugasan.php';

?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <?php
            if (isset($_SESSION['msg_hapus_data'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_hapus_data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
            ?>
            <?php
        if (isset($_SESSION['msg_edit_data'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_edit_data'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <!-- s -->
                </button>
            </div>
        <?php
        }
        ?>
         <?php
        if (isset($_SESSION['msg_addpenugasan'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_addpenugasan'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <!-- s -->
                </button>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-12">
            <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Daftar <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                    <a href="dalnis_tambah_penugasan" class="btn btn-primary"><i class="fe fe-plus-circle"></i> Tambah Data</a> <br><br>
                        <table class="table table-hover datatables" id="dataTable-1">
                            <thead class="thead-light">
                                <tr>
                                   <th>No.ST</th>
                                   <th>Tgl.ST</th>
                                   <th>Auditan</th>
                                   <th>Uraian Penugasan</th>
                                   <th>Jenis Penugasan</th>
                                   <th>Ket</th>
                                   <th>Status</th>
                                   <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php tampil_data($mysqli) ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->