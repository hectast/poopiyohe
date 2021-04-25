<?php
include 'app/controllers/auditan/daftar_temuan/post.php';
?>

<main role="main" class="main-content">
    <div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
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
                    <?php tampil_daftar_tugas($mysqli) ?>
               </tbody>
            </table>
           
        </div>
    </div> <!--  .card -->
</div> <!-- .col-8 -->


            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->   