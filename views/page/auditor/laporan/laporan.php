<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Daftar <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                        <a href="input_laporan" class="btn btn-primary"><i class="fe fe-plus-circle"></i> Tambah Data</a>
                        <br><br>
                        <table class="table datatables" id="dataTable-1">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="8%">No. ST</th>
                                    <th width="10%">Tanggal ST</th>
                                    <th>Nama Penugasan</th>
                                    <th width="12%">No. Laporan</th>
                                    <th width="15%">Tanggal Laporan</th>
                                    <th width="15%">File Laporan</th>
                                    <th width="6%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div> <!--  .card -->
            </div>
        </div>
    </div>
</main>