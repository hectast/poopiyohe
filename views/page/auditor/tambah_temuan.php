<main role="main" class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><a href="hasil_penugasan" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="timeline">

                    <div class="pb-3 timeline-item item-primary">
                        <div class="pl-5">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Upload BAKTL</strong>
                                        </div>
                                        <div class="card-body">
                                            <form action="">
                                                <div class="form-group">
                                                    <input type="file" name="" id="" class="form-control-file">
                                                </div>
                                                <button type="submit" name="simpan_data" class="btn btn-outline-primary btn-block"><i class="fe fe-save"></i> Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <fieldset>
                        <div class="pb-3 timeline-item item-danger">
                            <div class="pl-5">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Temuan</strong>
                                            </div>
                                            <div class="card-body">

                                                <form action="">
                                                    <div id="temuanArea">

                                                        <div id="temuanGroup">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label><strong>No. ST : </strong>BPKP/PROJEK/001/A1</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label><strong>Tgl. ST : </strong> 26 Maret 2021</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h5><u>Temuan 1</u></h5>
                                                            <div class="row">
                                                                <div class="col-md-6">
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
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" id="addTemuan" class="btn btn-outline-primary btn-block float-right"><i class="fe fe-plus-circle"></i> Tambah Temuan</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>

                </div>
            </div>
        </div>

    </div>
</main>