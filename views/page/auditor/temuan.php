<main role="main" class="main-content">
    <div class="container-fluid">

        <!-- start hak akses untuk ketua tim -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Upload BAKTL</strong>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <input type="file" name="" id="" class="form-control-file">
                            </div>
                            <button type="submit" name="simpan_data" class="btn btn-outline-primary btn-block"><i class="fe fe-save"></i> Upload</button>
                        </form>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div>
        </div>
        <!-- end hak akses untuk ketua tim -->

        <fieldset>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Temuan</strong> <i style="font-size: smaller;" class="text-danger"><b>*</b> BAKTL belum di upload!</i>
                        </div>
                        <div class="card-body">
                            <form action="">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>No. ST</label>
                                            <select class="form-control select1" me="nama_pemda" style="width: 100%;" disabled>
                                                <option>--Pilih No ST--</option>
                                                <option>ST/01/2021/03/23</option>
                                                <option>ST/02/2021/03/23</option>
                                                <option>ST/03/2021/03/23</option>
                                                <option>ST/04/2021/03/23</option>
                                                <option>ST/05/2021/03/23</option>
                                            </select>

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="instansi">Tgl. ST</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>No. Laporan</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="instansi">Tgl. Laporan</label>
                                            <input type="date" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div id="kondisiArea">
                                            <div class="form-group mb-3" id="kondisiGroup">
                                                <label>Kondisi</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" id="kondisiText">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <input type="checkbox" id="kondisiCek">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kriteriaArea">
                                            <div class="form-group mb-3">
                                                <label>Kriteria</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text">
                                                    <div class="input-group-append">
                                                        <button type="button" id="buttonKriteriaAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="sebabArea">
                                            <div class="form-group mb-3">
                                                <label>Sebab</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text">
                                                    <div class="input-group-append">
                                                        <button type="button" id="buttonSebabAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="akibatArea">
                                            <div class="form-group mb-3">
                                                <label>Akibat</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text">
                                                    <div class="input-group-append">
                                                        <button type="button" id="buttonAkibatAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="uraianArea">
                                            <div class="form-group mb-3">
                                                <label>Uraian</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text">
                                                    <div class="input-group-append">
                                                        <button type="button" id="buttonUraianAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="simpan_data" class="btn btn-outline-primary btn-block float-right"><i class="fe fe-save"></i> Simpan</button>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>
            </div>
        </fieldset>

        <fieldset disabled>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Laporan</strong> <i style="font-size: smaller;" class="text-danger"><b>*</b> Temuan belum di input!</i>
                        </div>
                        <div class="card-body">
                            <form action="">

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
                                            <input type="file" id="example-fileinput" class="form-control-file" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="simpan_data" class="btn btn-outline-primary btn-block float-right"><i class="fe fe-save"></i> Simpan</button>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>
            </div>
        </fieldset>

    </div>
</main>