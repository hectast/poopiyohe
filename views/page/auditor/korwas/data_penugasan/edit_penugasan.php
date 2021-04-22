<?php
include 'app/controllers/auditor/korwas/data_penugasan/post_penugasan.php';

$id = $_POST['id_lihat'];
$query = "SELECT * FROM penugasan WHERE id_penugasan = '$id'";
$result = $mysqli->query($query);
$row = mysqli_fetch_assoc($result);
?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title">
                    <a href="<?= $base_url; ?>korwas_data_penugasan" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a>
                    <?= $page; ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="korwas_data_penugasan" method="POST">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Form Data Penugasan</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>No. ST</label>
                                        <input name="no_st" value="<?= $row['no_st'] ?>" type="text" class="form-control">
                                        <input type="hidden" name="status" value="<?= $row['status'] ?>">
                                        <input type="hidden" name="idid" value="<?= $id ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Uraian Penugasan</label>
                                        <input name="nama_penugasan" value="<?= $row['uraian_penugasan'] ?>" type="text" class="form-control">
                                    </div>
                                    <div class="row_jp mt-4">
                                        <select class="form-control jenpen" name="d1">
                                            <option hidden value="<?= $row['d1']; ?>"><?= $row['d1']; ?></option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="D5">D5</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tgl. ST</label>
                                        <input name="tgl_st" type="date" class="form-control" value="<?= $row['tgl_st'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="row_jp">
                                            <label>Jenis Penugasan</label>
                                            <select class="form-control" name="jenis_penugasan" id="jp">
                                                <option value="<?= $row['jenis_penugasan'] ?>" hidden><?= $row['jenis_penugasan'] ?></option>
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
                                    <div class="form-group">
                                        <div class="boks">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pkpt" id="inlineRadio1" value="PKPT" <?php if ($row['pkpt'] == 'PKPT') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="inlineRadio1">PKPT</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pkpt" id="inlineRadio2" value="Non PKPT" <?php if ($row['pkpt'] == 'Non PKPT') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio2">Non PKPT</label>
                                            </div>
                                        </div>
                                        <div class="boks">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kf1" id="inlineRadio3" value="KF1" <?php if ($row['kf1'] == 'KF1') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="inlineRadio3">KF1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kf1" id="inlineRadio4" value="KF3" <?php if ($row['kf1'] == 'KF3') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="inlineRadio4">KF3</label>
                                            </div>
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
                                    <strong class="card-title">Auditan <button type="button" class="tbl btn btn-primary btn-sm"><i class="fe fe-edit"></i>Edit</button> <button type="button" class="tblhps btn btn-danger btn-sm"><i class="fe fe-x-circle"></i>Batal</button></strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-group auditan-not">
                                        <label for="">Auditan</label>
                                        <?php
                                        $vertikal = $row['auditan_in'];
                                        $opd      = $row['auditan_opd'];
                                        if (empty($opd)) {
                                            $result_vertikal = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id ='$vertikal'");
                                            $row_vertikal = mysqli_fetch_assoc($result_vertikal);
                                            $isi_vertikal = $row_vertikal['nama_instansi'];
                                        ?>
                                            <input type="text" class="form-control" value="<?= $isi_vertikal; ?>" disabled>
                                            <input type="hidden" name="vertikaledit" value="<?= $vertikal; ?>">
                                        <?php
                                        } else if (empty($vertikal)) {
                                            $result_opd = $mysqli->query("SELECT * FROM opd WHERE id = '$opd'");
                                            $row_opd = mysqli_fetch_assoc($result_opd);
                                            $isi_opd = $row_opd['nama_instansi'];
                                        ?>
                                            <input type="text" class="form-control" value="<?= $isi_opd; ?>" disabled>
                                            <input type="hidden" name="opdedit" value="<?= $opd; ?>">

                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group auditan-edit">
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
                                    <strong class="card-title">Daftar Auditor (Personel) <button type="button" class="tombol btn btn-primary btn-sm"><i class="fe fe-edit"></i>Edit</button> <button type="button" class="tombolhps btn btn-danger btn-sm"><i class="fe fe-x-circle"></i>Batal</button></strong>
                                </div>
                                <div class="card-body">
                                    <div class="control-group-tbl">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Auditor</th>
                                                    <th>Peran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nmr = 1;
                                                $result_auditor = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id_penugasan ='$id'");
                                                while ($d = mysqli_fetch_assoc($result_auditor)) {
                                                    $id_auditor = $d['id'];
                                                    $nmaudit = $mysqli->query("SELECT * FROM auditor WHERE id ='$id_auditor'");
                                                    $r = mysqli_fetch_assoc($nmaudit);
                                                ?>
                                                    <tr>
                                                        <td><?= $nmr++ ?></td>
                                                        <td><?= $r['nama'] ?></td>
                                                        <td><?= $d['peran'] ?></td>
                                                    </tr>
                                                <?php
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="control-group after-add-more">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <select name="auditor[]" id="" class="select-auditor custom-select">
                                                        <option value="0" hidden>-Pilih Auditor-</option>
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
                    <button name="editpenugasan" class="btn btn-primary">Simpan</button>
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
    $(document).ready(function() {
        $('.auditan-edit').hide();
        $('.tblhps').hide();
        $(".tbl").click(function() {
            $('.auditan-not').hide();
            $('.auditan-edit').show();
            $('.tblhps').show();
            $('.tbl').hide();
        });
        $(".tblhps").click(function() {
            $('.auditan-edit').hide();
            $('.auditan-not').show();
            $('.tbl').show();
            $('.tblhps').hide();
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('.control-group').hide();
        $('.tombolhps').hide();
        $(".tombol").click(function() {
            $('.control-group-tbl').hide();
            $('.control-group').show();
            $('.tombolhps').show();
            $('.tombol').hide();
        });
        $(".tombolhps").click(function() {
            $('.control-group').hide();
            $('.control-group-tbl').show();
            $('.tombol').show();
            $('.tombolhps').hide();
        });


    });
</script>
<script>
    $(function() {
        $('#jp').change(function() {
            $('.input_lainnya').remove();
            if ($('#jp').val() == 'Lainnya') {
                $.get('app/controllers/auditor/korwas/data_penugasan/dynamic_auditan.php', {
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
                $.get('app/controllers/auditor/korwas/data_penugasan/dynamic_auditan2.php', {
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
                $.get('app/controllers/auditor/korwas/data_penugasan/dynamic_auditan3.php', {
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