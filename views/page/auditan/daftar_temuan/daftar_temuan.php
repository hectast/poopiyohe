<?php 
// error_reporting(0);
include 'app/controllers/auditan/daftar_temuan/post.php'; 
$id_instansi = $_SESSION['id'];
?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title">Daftar Penugasan BPKP</h2>
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
                        <strong class="card-title">Daftar Penugasan BPKP </strong>
                    </div>
                    <div class="card-body">
                        <table class="table datatables" id="dataTable-1" >
                            <thead class="thead-light">
                                <tr>
                                    <th width="2%">No</th>     
                                    <th>No. ST</th>               
                                    <th>Nomor Laporan</th>                    
                                    <th>Tanggal Laporan</th>                    
                                    <th>Uraian Penugasan</th>
                                    <th>Jumlah Temuan</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    tampil_data($id_instansi, $base_url, $mysqli);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!--  .card -->
            </div> <!-- .col-8 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
<!-- komen -->