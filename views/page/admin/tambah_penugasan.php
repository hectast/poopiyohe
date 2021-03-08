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
        if (isset($_SESSION['msg_sukses_hapus_data'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_sukses_hapus_data'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
       
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Tambah Auditor</strong>
                    </div>
                    <div class="card-body">
                        <table id="dataTable-1" class="table datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Auditor</th>
                                    <th>Nama Auditor</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php tampil_data_auditor($mysqli); ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Data Penugasan</strong>
                    </div>

                    <div class="card-body">
                        <form action="tambah_penugasan" method="post">
                        <div class="form-group mb-3">
                            <label for="">ID Tugas</label>
                            <input type="text" class="form-control" name="idtugas" placeholder="Otomatis">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Tujuan Tugas :</label><br>
                            <div class="pemda_row">
                                <label for="">Pemerintah Daerah</label>
                                <select name="id_pemda" id="id_pemda" class="custom-select select1">
                                    <option hidden>-Pilih Pemerintah Daerah-</option>
                                    <?php tampil_data_pemda($mysqli) ?>
                                </select>
                            </div>

                        </div>


                        <div class="form-group mb-3">
                            <label for="instansi">Auditor :</label><br>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Auditor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php tampil_data_auditor_selek($mysqli); ?>
                                </tbody>
                            </table>
                            <button name="addpenugasan" class="btn btn-primary"><i class="fe fe-save"></i> Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
