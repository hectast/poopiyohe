<?php
include 'app/controllers/admin/master_data/post_instansi.php';
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
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                        <form action="instansi_vertikal" method="post">
                            <div class="form-group mb-3">
                                <label>ID Instansi</label>
                                <input type="text" class="form-control" placeholder="Otomatis" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="instansi">Nama Instansi</label>
                                <input type="text" id="instansi" name="instansi" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="kmlm">Kementrian/Lembaga</label>
                                <select class="form-control select2" id="kmlm" name="id_kemlem">
                                    <option>--Pilih Kementrian/Lembaga--</option>
                                    <?php
                                        $query = "SELECT * FROM kemlem";
                                        $to = $mysqli->prepare($query);
                                        $to->execute();
                                        $result_kemlem = $to->get_result();
                                        while ($row_kemlem = $result_kemlem->fetch_object()) {
                                            echo"";
                                    ?>
                                            <option value="<?= $row_kemlem->id; ?>"><?= $row_kemlem->kemlem; ?></option>
                                    <?php
                                            echo"";
                                        }

                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="simpan_data" class="btn btn-primary float-right">Simpan</button>
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
                                    <th>Nama Instansi</th>
                                    <th>Kementrian/Lembaga</th>
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