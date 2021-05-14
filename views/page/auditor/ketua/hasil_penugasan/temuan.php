<?php
                            $sql_baktl = "SELECT * FROM baktl WHERE id_penugasan = '{$_GET['id']}'";
                            $stmt_baktl = $mysqli->prepare($sql_baktl);
                            $stmt_baktl->execute();
                            $result_baktl = $stmt_baktl->get_result();
                        ?>

                        <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
                        <div id="temuan">
                            <div class="pb-3 timeline-item item-primary">
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
                                                                <h5><u>Temuan 1</u></h5>
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
                        </div>
                        <?php endif; ?>

