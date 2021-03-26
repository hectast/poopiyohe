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
            <div class="col-12">
                <!-- <form action=""> -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form Data Penugasan</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>No. ST</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Penugasan</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tgl. ST</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="row_jp">
                                        <label>Jenis Penugasan</label>
                                        <select class="form-control" id="jp">
                                            <option hidden>-Jenis Penugasan-</option>
                                            <option value="Audit">Audit</option>
                                            <option value="Verifikasi">Verifikasi</option>
                                            <option value="Evaluasi">Evaluasi</option>
                                            <option value="Review">Review</option>
                                            <option value="Monitoring">Monitoring</option>
                                            <option value="Asistensi">Asistensi</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">


                    <div class="col-6">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Daftar Auditor Auditor</strong>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn mb-2 btn-primary" name="modal" data-toggle="modal" data-target="#defaultModal"><i class="fe fe-plus-circle"></i> Tambah Auditor (Personel)</button><br><br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <!--------------------------------------- modal --------------------------------------->
                    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-lg modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-hover" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------------------------- end modal --------------------------------------->

                    <div class="col-6">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Auditan</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row_auditan">
                                        <label>Auditan</label>
                                        <select name="" class="form-control" id="auditan">
                                            <option hidden>-Pilih Jenis Auditan-</option>
                                            <option value="OPD">OPD</option>
                                            <option value="Instansi Vertikal">Instansi Vertikal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary">Simpan</button>
                <a href="data_penugasan" class="btn btn-secondary">Kembali</a>
                <!-- </form> -->
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<script>
    $(function() {
        $('#jp').change(function() {
            $('.input_lainnya').remove();
            if ($('#jp').val() == 'Lainnya') {
                $.get('app/controllers/admin/dynamic_auditan.php', {
                        jp: $('#jp').val()
                    })
                    .done(function(data) {
                        $('div.row_jp').after(data);
                    })
            }
        });

    });
</script>
<script>
    $(function() {
        $('#auditan').change(function() {
            $('.input_vertikal').remove();
            if ($('#auditan').val() == 'Instansi Vertikal') {
                $('.input_opd2').remove();
                $.get('app/controllers/admin/dynamic_auditan2.php', {
                        auditan: $('#auditan').val()
                    })
                    .done(function(data) {
                        $('div.row_auditan').after(data);
                    })
            }
        });

    });
</script>
<script>
    $(function() {
        $('#auditan').change(function() {
            $('.input_opd').remove();
            if ($('#auditan').val() == 'OPD') {
                $.get('app/controllers/admin/dynamic_auditan3.php', {
                        auditan: $('#auditan').val()
                    })
                    .done(function(data) {
                        $('div.row_auditan').after(data);
                    })
            }
        });

    });
</script>