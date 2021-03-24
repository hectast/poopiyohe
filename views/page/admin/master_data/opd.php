<?php
include 'app/controllers/admin/master_data/post_opd.php';
?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <?php
        if (isset($_SESSION['msg_simpan_data'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_simpan_data'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }

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
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                        <form action="opd" method="post">
                            <div class="form-group mb-3">
                                <label>ID Instansi</label>
                                <input type="text" class="form-control" placeholder="Otomatis" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="instansi">Nama Instansi</label>
                                <input type="text" id="instansi" name="instansi" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="pemda">Pemerintah Daerah</label>

                                <select class="form-control select1" id="pemda" name="nama_pemda" style="width: 100%;">
                                    <option>--Pilih Pemerintah Daerah--</option>
                                    <option>Provinsi Gorontalo</option>
                                    <option>Kota Gorontalo</option>
                                    <option>Kabupaten Gorontalo</option>
                                    <option>Kabupaten Boalemo</option>
                                    <option>Kabupaten Pohuwato</option>
                                    <option>Kabupaten Bone Bolango</option>
                                    <option>Kabupaten Gorontalo Utara</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
                            </div>
                            <button type="submit" name="simpan_data" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-4 -->

            <div class="col-md-8">
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3 justify-content-center" style="font-size:smaller;" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="provinsi-tab" data-toggle="tab" href="#provinsi" role="tab" aria-controls="provinsi" aria-selected="true">Provinsi Gorontalo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kota-tab" data-toggle="tab" href="#kota" role="tab" aria-controls="kota" aria-selected="false">Kota Gorontalo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kabgor-tab" data-toggle="tab" href="#kabgor" role="tab" aria-controls="kabgor" aria-selected="false">Kab. Gorontalo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gorut-tab" data-toggle="tab" href="#gorut" role="tab" aria-controls="gorut" aria-selected="false">Kab. Gorontalo Utara</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bonbol-tab" data-toggle="tab" href="#bonbol" role="tab" aria-controls="bonbol" aria-selected="false">Kab. Bone Bolango</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="boal-tab" data-toggle="tab" href="#boal" role="tab" aria-controls="boal" aria-selected="false">Kab. Boalemo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pohu-tab" data-toggle="tab" href="#pohu" role="tab" aria-controls="pohu" aria-selected="false">Kab. Pohuwato</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="provinsi" role="tabpanel" aria-labelledby="provinsi-tab">
                                <table class="table datatables" id="dataTable-provinsi">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Pemerintah Daerah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_provinsi($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="kota" role="tabpanel" aria-labelledby="kota-tab">
                                <table class="table datatables" id="dataTable-kota">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Pemerintah Daerah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_kota($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="kabgor" role="tabpanel" aria-labelledby="kabgor-tab">
                                <table class="table datatables" id="dataTable-kabgor">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Pemerintah Daerah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_kabgor($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="gorut" role="tabpanel" aria-labelledby="gorut-tab">
                                <table class="table datatables" id="dataTable-gorut">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Pemerintah Daerah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_gorut($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="bonbol" role="tabpanel" aria-labelledby="bonbol-tab">
                                <table class="table datatables" id="dataTable-bonbol">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Pemerintah Daerah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_bonbol($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="boal" role="tabpanel" aria-labelledby="boal-tab">
                                <table class="table datatables" id="dataTable-boal">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Pemerintah Daerah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_boal($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pohu" role="tabpanel" aria-labelledby="pohu-tab">
                                <table class="table datatables" id="dataTable-pohu">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Pemerintah Daerah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_pohu($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> <!--  .card -->
            </div> <!-- .col-8 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->