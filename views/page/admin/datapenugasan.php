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
            <div class="col-12">
            <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Daftar <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                    <a href="tambah_penugasan" class="btn btn-primary"><i class="fe fe-plus-circle"></i> Tambah Data</a> <br><br>
                        <table class="table table-hover table-responsive datatables" id="dataTable-1">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>No. ST</th>
                                    <th>Tgl. ST</th>
                                    <th>Nama Penugasan</th>
                                    <th>Jenis Penugasan</th>
                                    <th>Auditan</th>
                                    <th>Auditor</th> 
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