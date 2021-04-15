<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Daftar <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
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
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->