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
                    <div class="form-group mb-3">
                                <label for="">Tujuan Tugas :</label><br>
                                <label for="instansi">Nama Instansi</label>
                                <input type="text" id="instansi" name="instansi" class="form-control">
                            </div>
                    <div class="form-group mb-3">
                                <label for="instansi">Nama Instansi</label>
                                <input type="text" id="instansi" name="instansi" class="form-control">
                    </div>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->