<?php include 'app/controllers/auditor/monitoring/hasil_panugasan/post.php'; ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <?php
            if (isset($_SESSION['msg_teruskan_data'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_teruskan_data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <!-- s -->
                    </button>
                </div>
            <?php
            }
        ?>
        <div class="row">
            <div class="col-12">
            <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Daftar <?= $page; ?></strong>
                    </div>
                    
                    <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="BelumDireview-tab" data-toggle="tab" href="#BelumDireview" role="tab" aria-controls="BelumDireview" aria-selected="true"><i class="fe fe-x"></i> Belum Direview</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="SudahDireview-tab" data-toggle="tab" href="#SudahDireview" role="tab" aria-controls="SudahDireview" aria-selected="false"><i class="fe fe-check"></i> Sudah Direview</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="BelumValidasi-tab" data-toggle="tab" href="#BelumValidasi" role="tab" aria-controls="BelumValidasi" aria-selected="false"><i class="fe fe-x-circle"></i> Belum Divalidasi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="SudahValidasi-tab" data-toggle="tab" href="#SudahValidasi" role="tab" aria-controls="SudahValidasi" aria-selected="false"><i class="fe fe-check-circle"></i> Sudah Divalidasi</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fadeshow active" id="BelumDireview" role="tabpanel" aria-labelledby="BelumDireview-tab"> 
                        <table class="table table-hover datatables" id="dataTable-1">
                            <thead class="thead-light">
                                <tr>
                                   <th>No.ST</th>
                                   <th>Tgl.ST</th>
                                   <th>Auditan</th>
                                   <th>Uraian Penugasan</th>
                                   <th>Jenis Penugasan</th>
                                   <th>Ket</th>
                                   <th>Status</th>
                                   <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    tampil_data_belumreview($mysqli);
                               ?>
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="SudahDireview" role="tabpanel" aria-labelledby="SudahDireview-tab"> 
                        <table class="table table-hover datatables" id="dataTable-2">
                            <thead class="thead-light">
                                <tr>
                                   <th>No.ST</th>
                                   <th>Tgl.ST</th>
                                   <th>Auditan</th>
                                   <th>Uraian Penugasan</th>
                                   <th>Jenis Penugasan</th>
                                   <th>Ket</th>
                                   <th>Status</th>
                                   <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    tampil_data_sudahreview($mysqli);
                               ?>
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="BelumValidasi" role="tabpanel" aria-labelledby="BelumValidasi-tab"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </div>
                        <div class="tab-pane fade" id="SudahValidasi" role="tabpanel" aria-labelledby="SudahValidasi-tab"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </div>
                      </div>

                      
                      
                      
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->