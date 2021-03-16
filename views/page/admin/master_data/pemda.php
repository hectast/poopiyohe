<?php
	include 'app/controllers/admin/master_data/post_pemda.php';
?>


<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>

        <?php
            if (isset($_SESSION['msg_sukses_data'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_sukses_data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>

         <?php
            if (isset($_SESSION['msg_ubah_data'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_ubah_data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>


        <?php
            if (isset($_SESSION['msg_hapus_data'])) {
        ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                       <form action="pemda" method="post">
                       		<div class="form-group mb-3">
                            <label for="idKemlem">ID Pemerintah Daerah</label>
                            <input type="text" id="idKemlem" name="idPemda" class="form-control" placeholder="Otomatis" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpleinput">Nama Pemerintah Daerah</label>
                            <input type="text" id="simpleinput" name="namaPemda" class="form-control">
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
                                    <th width="100%">Nama</th>
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