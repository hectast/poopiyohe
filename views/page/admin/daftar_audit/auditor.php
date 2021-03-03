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
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="idKemlem">ID Auditor</label>
                            <input type="text" id="idKemlem" class="form-control" placeholder="Otomatis" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput">Nama Auditor</label>
                            <input type="text" id="simpleinput" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
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