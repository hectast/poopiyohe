<?php
include 'app/controllers/admin/daftar_audit/post_auditor.php';
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
            }else if(isset($_SESSION['msg_gagal_data'])){
        ?>
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_gagal_data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>        
        <?php
            }else if(isset($_SESSION['msg_simpan_data'])){
        ?>
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_simpan_data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }else if(isset($_SESSION['msg_edit_data'])){
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_edit_data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php

            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                    <form action="data_auditor" method="POST">
                        <div class="form-group mb-3">
                            <label>ID Auditor</label>
                            <input type="text" class="form-control" placeholder="Otomatis" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput">Nama Auditor</label>
                            <input type="text" name="namaauditor" id="simpleinput" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput1">Email Auditor</label>
                            <input type="email" name="email_auditor" id="simpleinput1" class="form-control" autocomplete="off">
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary float-right">Simpan</button>
                    </form>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-4 -->

            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Daftar <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                        <table class="table datatables" id="dataTable-1">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Auditor</th>
                                    <th>Email Auditor</th>
                                    <th>Akses Khusus</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php tampil_data($mysqli); ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-8 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->