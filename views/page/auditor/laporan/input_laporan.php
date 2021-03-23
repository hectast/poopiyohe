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
                        <strong class="card-title">Form <?= $page; ?></strong>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">No. ST</label>
                                    <input type="text" id="simpleinput" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-date">Tanggal ST</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Nama Penugasan</label>
                                    <input type="text" id="simpleinput" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">No. Laporan</label>
                                    <input type="text" id="simpleinput" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-date">Tanggal Laporan</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-fileinput">Upload File</label>
                                    <input type="file" id="example-fileinput" class="form-control-file">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="laporan" class="btn btn-secondary"><i class="fe fe-arrow-left-circle"></i> Kembali</a>
                        <button type="submit" name="simpan_data" class="btn btn-primary">Simpan</button>
                    </div>
                </div> <!--  .card -->
            </div>
        </div>
    </div>
</main>