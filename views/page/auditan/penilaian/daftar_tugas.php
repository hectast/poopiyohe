<?php
include 'app/controllers/auditan/daftar_temuan/post.php';
$id_instansi = $_SESSION['id'];
?>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <?php
            if (isset($_SESSION['msg_edit_nilai'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_edit_nilai'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-12">
                            <div class="card-header">
                                <strong class="card-title">Daftar Penugasan BPKP </strong>
                            </div>
                            <div class="card-body">
                                <table class="table" id="dataTable-1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penugasan</th>
                                            <th>No. ST</th>
                                            <th>Tgl. ST</th>
                                            <th>Status Penugasan</th>
                                            <th>Status Penilaian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_daftar_tugas($id_instansi, $mysqli) ?>
                                    </tbody>
                                </table>

                            </div>
                        </div> <!--  .card -->
                    </div> <!-- .col-8 -->


                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main> <!-- main -->