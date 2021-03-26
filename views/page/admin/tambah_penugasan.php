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

        <?php
        if (isset($_SESSION['msg_addpenugasan'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_addpenugasan'); ?>
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
                <form action="tambah_penugasan" method="POST">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Form Data Penugasan</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>No. ST</label>
                                        <input name="no_st" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Uraian Penugasan</label>
                                        <input name="nama_penugasan" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pkpt" id="inlineRadio1" value="PKPT">
                                            <label class="form-check-label" for="inlineRadio1">PKPT</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pkpt" id="inlineRadio2" value="Non PKPT">
                                            <label class="form-check-label" for="inlineRadio2">Non PKPT</label>
                                        </div>

                                        <div class="form-check form-check-inline" style="margin-left: 50px;">
                                            <input class="form-check-input" type="radio" name="kf1" id="inlineRadio3" value="KF1">
                                            <label class="form-check-label" for="inlineRadio3">KF1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kf1" id="inlineRadio4" value="KF3">
                                            <label class="form-check-label" for="inlineRadio4">KF3</label>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tgl. ST</label>
                                        <input name="tgl_st" type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="row_jp">
                                            <label>Jenis Penugasan</label>
                                            <select class="form-control" name="jenis_penugasan" id="jp">
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
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Auditan</strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row_auditan">
                                            <label>Auditan</label>
                                            <select name="jauditan" class="form-control" id="auditan">
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


                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Daftar Auditor (Personel)</strong>
                                </div>
                                <div class="card-body">
                                    <div class="control-group after-add-more">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <select name="auditor[]" id="" class="select-auditor custom-select">
                                                        <option value="" hidden>-Pilih Auditor-</option>
                                                        <?php tampil_data_auditor($mysqli);  ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <select name="peran[]" id="" class="select-peran custom-select">
                                                        <option value="" hidden>-Pilih Peran-</option>
                                                        <option value="Ketua Tim">Ketua Tim</option>
                                                        <option value="Pengendali Teknis">Pengendali Teknis</option>
                                                        <option value="Pembantu Penanggung Jawab">Pembantu Penanggung Jawab</option>
                                                        <option value="Anggota Tim">Anggota Tim</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group ">
                                                    <button type="button" class="btn btn-primary form-control add-more">Tambah Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                        <div class="copy" style="display: none;">
                                            <div class="control-group">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">

                                                            <select name="auditor[]" id="" class="select-auditor custom-select">
                                                                <option value="" hidden>-Pilih Auditor-</option>
                                                                <?php tampil_data_auditor($mysqli);  ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <select name="peran[]" id="" class="select-peran custom-select">
                                                                <option value="" hidden>-Pilih Peran-</option>
                                                                <option value="Ketua Tim">Ketua Tim</option>
                                                                <option value="Pengendali Teknis">Pengendali Teknis</option>
                                                                <option value="Pembantu Penanggung Jawab">Pembantu Penanggung Jawab</option>
                                                                <option value="Anggota Tim">Anggota Tim</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group ">
                                                            <button class="btn btn-danger form-control remove">Hapus Data</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <button name="addpenugasan" class="btn btn-primary">Simpan</button>
                    <a href="data_penugasan" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src='assets/js/select2.min.js'></script>
<!-- <script>
    $('.select-auditor').select2({
        theme: 'bootstrap4',
    });
    $('.select-peran').select2({
        theme: 'bootstrap4',
    });
</script> -->
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

<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);

            
        });


        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>