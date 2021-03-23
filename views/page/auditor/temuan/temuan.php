
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

            <div class="col-md-12">
                <div class="card shadow mb-12">
                    <div class="card-header">
                        <strong class="card-title">Daftar <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                        <form>
                            <a href="input_temuan" class="btn  btn-primary"><i class="fe fe-plus-circle"></i> Tambah Temuan</a>
                        </form>
                        <br>
                        <table class="table datatables table-responsive" id="dataTable-1">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>No.ST</th>
                                    <th>Tgl. ST</th>
                                    <th>No. Laporan</th>
                                    <th>Tgl. Laporan</th>
                                    <th>Kondisi (Rp)</th>
                                    <th>Kriteria</th>
                                    <th>Sebab</th>
                                    <th>Akibat</th>
                                    <th>Rekomendasi/Saran/Atensi (Rp)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ST/01/2021/03/23</td>
                                    <td>23 Maret 2021</td>
                                    <td>LP/01/2021/03/23td>
                                    <td>23 Maret 2021</td>
                                    <td>Rp. 1.500.000</td>
                                    <td>Baik</td>
                                    <td>Apa Aja</td>
                                    <td>Yoiiii</td>
                                    <td>Rp. 2.000.000</td>
                                    <td>
                                        <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="fe fe-settings"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="edit_temuan" class="dropdown-item">Ubah</a>
                                            <form action="instansi_vertikal" method="post">
                                                <button type="submit" name="hapus_data" onclick="return confirm('Yakin menghapus data ini?')" class="dropdown-item">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>                           
                            </tbody>
                        </table>
                    </div>
                </div> <!--  .card -->
            </div> <!-- .col-8 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->