<?php

include 'app/controllers/auditor/ketua/hasil_penugasan/post.php';

$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_object();
$no_st = $row->no_st;
$tgl_st = $row->tgl_st;

if (mysqli_num_rows($result) > 0) {
?>
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url; ?>ketua_hasil_penugasan" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="timeline">

                        <?php
                        $sql_baktl = "SELECT * FROM baktl WHERE id_penugasan = '{$_GET['id']}'";
                        $stmt_baktl = $mysqli->prepare($sql_baktl);
                        $stmt_baktl->execute();
                        $result_baktl = $stmt_baktl->get_result();

                        $row_baktl = $result_baktl->fetch_assoc();
                        if (mysqli_num_rows($result_baktl) > 0) {
                            $fileBaktl = $row_baktl['file_upload'];
                        }

                        ?>

                        <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
                            <div id="baktl">
                                <div class="pb-3 timeline-item item-success">
                                    <div class="pl-5">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row d-flex align-items-center justify-content-between">
                                                            <div class="col-md-10">
                                                                <strong class="card-title">BAKTL<span class="badge badge-success ml-2">Berhasil di upload</span></strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#modalBaktl" title="Lihat Dokumen"><i class="fe fe-book-open fe-16"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalBaktl" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                    <!-- <div class="modal-header">
                                                    <h5 class="modal-title" id="verticalModalTitle">BAKTL</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div> -->
                                                    <div class="modal-body">
                                                        <div id="contentModalBaktl">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div id="temuan">
                                <div class="pb-3 timeline-item item-primary">
                                    <div class="pl-5">

                                        <form action="<?= $base_url ?>ketua_hasil_penugasan" method="POST">
                                            <input type="hidden" name="id_penugasan" value="<?= $_GET['id'] ?>">

                                            <div class="row pb-3">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Input Temuan Berdasarkan Laporan</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>No. ST</label>
                                                                        <input type="text" name="no_st[]" class="form-control" value="<?= $no_st  ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="instansi">Tgl. ST</label>
                                                                        <input name="tgl_st[]" type="text" value="<?= $tgl_st; ?>" class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>No. Laporan</label>
                                                                        <input type="text" name="no_laporan" class="form-control">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="instansi">Tgl. Laporan</label>
                                                                        <input type="date" name="tgl_laporan" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div id="temuanArea">

                                                                <div id="temuanGroup">
                                                                    <h5><u>Temuan 1</u></h5>
                                                                    <div class="row">
                                                                        <div class="col-md-12">

                                                                            <div class="form-group mb-3" id="cekRpNonRp">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="checkbox" id="cekRupiah" name="cekrpnonrp[]" class="form-check-input" value="Rupiah">
                                                                                    <label class="form-check-label" for="cekRupiah">Rupiah</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="checkbox" id="cekNonRupiah" name="cekrpnonrp[]" class="form-check-input" value="Non Rupiah">
                                                                                    <label class="form-check-label" for="cekNonRupiah">Non Rupiah</label>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div id="uraianArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Uraian</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="uraian[0][]" type="text">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" id="buttonUraianAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">

                                                                            <div id="kondisiArea">
                                                                                <div class="form-group mb-3" id="kondisiGroup">
                                                                                    <label>Kondisi</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="kondisi[]" type="text" id="kondisiText">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="kriteriaArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Kriteria</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="kriteria[0][]" type="text">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" id="buttonKriteriaAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div id="sebabArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Sebab</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="sebab[0][]" type="text">
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
                                                                                        <input class="form-control" name="akibat[0][]" type="text">
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
                                                                            <div id="rekomArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Rekomendasi</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="rekomendasi[0][]" type="text">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" id="buttonRekomAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label>Hal-hal yang perlu di perhatikan <small class="text-danger">* tidak wajib</small></label>
                                                                                <textarea class="form-control" name="hal[]"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" id="addTemuan" class="btn btn-outline-secondary btn-block"><i class="fe fe-plus-circle"></i> Tambah Temuan</button>
                                                                    <button type="submit" name="simpan_data" class="btn btn-outline-primary btn-block"><i class="fe fe-save"></i> Simpan</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div id="baktl">
                                <div class="pb-3 timeline-item item-primary">
                                    <div class="pl-5">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong class="card-title">Upload BAKTL</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <form id="fupForm" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" id="id_penugasan" name="id_penugasan" value="<?= $_GET['id']; ?>">
                                                            <div class="form-group">
                                                                <input type="file" id="file" name="file" class="form-control-file" required>
                                                            </div>
                                                            <button type="submit" name="submit_baktl" class="btn btn-outline-primary btn-block submitBtn"><i class="fe fe-save"></i> Upload</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="<?= $base_url; ?>assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var i = '<?php echo $no_st ?>';
            var j = '<?php echo $tgl_st ?>';
            let nomor = 1;
            let nomorAppend = 1;
            let nomorTemuan = 2;
            let nomorArray = 0;
            $('#addTemuan').click(function(e) {
                e.preventDefault();

                const rowTemuan = `<div id="temuanGroup">
                            <h5><u>Temuan ` + (nomorTemuan) + `</u><button type="button" class="btn btn-link buttonTemuanRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button></h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3" id="cekRpNonRp` + (nomor) + `">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" id="cekRupiah` + (nomor) + `" name="cekrpnonrp[]" class="form-check-input" value="Rupiah">
                                            <label class="form-check-label" for="cekRupiah` + (nomor) + `">Rupiah</label>
                                        </div>
                                        <div class="form-check form-check-inline">  
                                            <input type="checkbox" id="cekNonRupiah` + (nomor) + `" name="cekrpnonrp[]" class="form-check-input" value="Non Rupiah">
                                            <label class="form-check-label" for="cekNonRupiah` + (nomor) + `">Non Rupiah</label>
                                        </div>
                                    </div>
                                    <div class="uraianArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Uraian</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="uraian[` + (nomor) + `][]">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonUraianAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="kondisiArea">
                                        <div class="form-group mb-3" id="kondisiGroup` + (nomor) + `">
                                            <label>Kondisi</label>
                                            <div class="input-group">
                                                <input class="form-control" name="kondisi[]" type="text" id="kondisiText` + (nomor) + `">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kriteriaArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Kriteria</label>
                                            <div class="input-group">
                                                <input class="form-control" name="kriteria[` + (nomor) + `][]"  type="text">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonKriteriaAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="sebabArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Sebab</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="sebab[` + (nomor) + `][]">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonSebabAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="akibatArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Akibat</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="akibat[` + (nomor) + `][]">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonAkibatAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rekomArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Rekomendasi</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="rekomendasi[` + (nomor) + `][]">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonRekomAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-3">
                                        <label>Hal-hal yang perlu di perhatikan <small class="text-danger">* tidak wajib</small></label>
                                        <textarea name="hal[]" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                          </div>`;


                $('#temuanArea').append(rowTemuan);


                $('#kondisiCek' + (nomorAppend)).change(function(e) {
                    e.preventDefault();
                    if ($(this).is(":checked")) {
                        let prepend = '<div class="input-group-prepend' + (nomorAppend) + '"> ' +
                            '<span class="input-group-text">Rp.</span>' +
                            '</div>';
                        $(this).parent().parent().parent().prepend(prepend);
                        $('#kondisiText' + (nomorAppend)).attr("type", "number");
                    } else {
                        $('.input-group-prepend' + (nomorAppend)).remove();
                        $('#kondisiText' + (nomorAppend)).attr("type", "text");
                    }
                    // console.log($(this).parent().parent().parent().parent());
                });

                let cR = $('#cekRupiah' + (nomorAppend));
                let cNR = $('#cekNonRupiah' + (nomorAppend));
                let cRNR = $('#cekRpNonRp' + (nomorAppend));
                cR.change(function(e) {
                    e.preventDefault();
                    let nmrapd = nomorAppend;

                    // console.log(this);
                    let isianRupiah = $('.isian-rupiah' + (nmrapd));
                    let isianRupiahHidden = $('.rupiahHidden' + (nmrapd));

                    if ($(this).is(":checked")) {
                        cNR.prop("checked", false);
                        isianRupiahHidden.remove();
                        let html = '<div class="form-group mb-3 mt-2 isian-rupiah' + (nmrapd) + '">' +
                            '<div class="input-group">' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text">Rp.</span>' +
                            '</div>' +
                            '<input class="form-control" type="number" name="isianrupiah[]">' +
                            '</div>' +
                            '</div>';
                        cRNR.append(html);
                    } else {
                        isianRupiah.remove();
                    }
                    nmrapd--;
                });

                cNR.change(function(e) {
                    e.preventDefault();
                    let nmrapd = nomorAppend;

                    // console.log(this);
                    let isianRupiah = $('.isian-rupiah' + (nmrapd));

                    if ($(this).is(":checked")) {
                        cR.prop("checked", false);
                        isianRupiah.remove();
                        let html = '<div class="form-group d-none mb-3 mt-2 rupiahHidden' + (nmrapd) + '">' +
                            '<div class="input-group">' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text">Rp.</span>' +
                            '</div>' +
                            '<input class="form-control" type="text" name="isianrupiah[]">' +
                            '</div>' +
                            '</div>';
                        cRNR.append(html);
                    } else {
                        isianRupiahHidden.remove();
                    }
                    nmrapd--;
                });


                // kriteria
                $('.buttonKriteriaAdd' + (nomorAppend)).click(function(e) {
                    e.preventDefault();
                    $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="kriteriaGroup' + (nomorAppend) + '"> ' +
                        '<div class="input-group"> ' +
                        '<input class="form-control" type="text" name="kriteria[' + (nomorArray) + '][]">' +
                        '<div class="input-group-append"> ' +
                        '<button type="button" class="btn btn-link buttonKriteriaRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div>');
                    // let kriteriaArea = $('.kriteriaArea2');
                    // console.log($(this).parents("div."+ kriteriaArea));
                    // console.log($(this).parent().parent().parent().parent());
                    $('.buttonKriteriaRemove' + (nomorAppend)).click(function(e) {
                        e.preventDefault();
                        $(this).parent().parent().parent().remove();
                        // console.log($(this).parent().parent().parent().parent());
                    });
                });

                // sebab
                $('.buttonSebabAdd' + (nomorAppend)).click(function(e) {
                    e.preventDefault();
                    $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="sebabGroup' + (nomorAppend) + '"> ' +
                        '<div class="input-group"> ' +
                        '<input class="form-control" type="text" name="sebab[' + (nomorArray) + '][]"> ' +
                        '<div class="input-group-append"> ' +
                        '<button type="button" class="btn btn-link buttonSebabRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div>');
                    // let kriteriaArea = $('.kriteriaArea2');
                    // console.log($(this).parents("div."+ kriteriaArea));
                    // console.log($(this).parent().parent().parent().parent());
                    $('.buttonSebabRemove' + (nomorAppend)).click(function(e) {
                        e.preventDefault();
                        $(this).parent().parent().parent().remove();
                        // console.log($(this).parent().parent().parent().parent());
                    });
                });

                // akibat
                $('.buttonAkibatAdd' + (nomorAppend)).click(function(e) {
                    e.preventDefault();
                    $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="akibatGroup' + (nomorAppend) + '"> ' +
                        '<div class="input-group"> ' +
                        '<input class="form-control" type="text" name="akibat[' + (nomorArray) + '][]"> ' +
                        '<div class="input-group-append"> ' +
                        '<button type="button" class="btn btn-link buttonAkibatRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div>');
                    // let kriteriaArea = $('.kriteriaArea2');
                    // console.log($(this).parents("div."+ kriteriaArea));
                    // console.log($(this).parent().parent().parent().parent());
                    $('.buttonAkibatRemove' + (nomorAppend)).click(function(e) {
                        e.preventDefault();
                        $(this).parent().parent().parent().remove();
                        // console.log($(this).parent().parent().parent().parent());
                    });
                });

                // uraian
                $('.buttonUraianAdd' + (nomorAppend)).click(function(e) {
                    e.preventDefault();
                    $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="uraianGroup' + (nomorAppend) + '"> ' +
                        '<div class="input-group"> ' +
                        '<input class="form-control" type="text" name="uraian[' + (nomorArray) + '][]"> ' +
                        '<div class="input-group-append"> ' +
                        '<button type="button" class="btn btn-link buttonUraianRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div>');
                    // let kriteriaArea = $('.kriteriaArea2');
                    // console.log($(this).parents("div."+ kriteriaArea));
                    // console.log($(this).parent().parent().parent().parent());
                    $('.buttonUraianRemove' + (nomorAppend)).click(function(e) {
                        e.preventDefault();
                        $(this).parent().parent().parent().remove();
                        // console.log($(this).parent().parent().parent().parent());
                    });
                });

                // rekomendasi
                $('.buttonRekomAdd' + (nomorAppend)).click(function(e) {
                    e.preventDefault();
                    $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="rekomGroup' + (nomorAppend) + '"> ' +
                        '<div class="input-group"> ' +
                        '<input class="form-control" type="text" name="rekomendasi[' + (nomorArray) + '][]"> ' +
                        '<div class="input-group-append"> ' +
                        '<button type="button" class="btn btn-link buttonRekomRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div>');
                    // let kriteriaArea = $('.kriteriaArea2');
                    // console.log($(this).parents("div."+ kriteriaArea));
                    // console.log($(this).parent().parent().parent().parent());
                    $('.buttonRekomRemove' + (nomorAppend)).click(function(e) {
                        e.preventDefault();
                        $(this).parent().parent().parent().remove();
                        // console.log($(this).parent().parent().parent().parent());
                    });
                });

                nomorTemuan++;
                nomorArray++;
                nomor++;
                nomorAppend++;

                console.log(nomor);
                console.log(nomorAppend);
            });
            $('#temuanArea').on('click', '.buttonTemuanRemove', function(e) {
                e.preventDefault();
                // const kondisiGroup = $('#kondisiGroup');
                $('#temuanGroup:last-child').remove();
                // $('#formArea'+(n-1)+'').remove();
                // $(this).remove();
                // console.log(n);
                nomorTemuan--;
                nomorArray--;
                nomor--;
                nomorAppend--;
            });
            // console.log(n++);
        });

        $(document).ready(function() {

            $('#buttonKriteriaAdd').click(function(e) {
                e.preventDefault();
                // n++;
                $('#kriteriaArea').append('<div class="form-group mb-3" id="kriteriaGroup"> ' +
                    '<div class="input-group"> ' +
                    '<input class="form-control" type="text" name="kriteria[0][]"> ' +
                    '<div class="input-group-append"> ' +
                    '<button type="button" class="btn btn-link buttonKriteriaRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div>');
            });
            $('#kriteriaArea').on('click', '.buttonKriteriaRemove', function(e) {
                e.preventDefault();
                // const kondisiGroup = $('#kondisiGroup');
                $('#kriteriaGroup:last-child').remove();
                // $('#formArea'+(n-1)+'').remove();
                // $(this).remove();
                // console.log(n);
                // n--;
            });
            // console.log(n++);
        });

        $(document).ready(function() {

            $('#buttonSebabAdd').click(function(e) {
                e.preventDefault();
                // n++;
                $('#sebabArea').append('<div class="form-group mb-3" id="sebabGroup"> ' +
                    '<div class="input-group"> ' +
                    '<input class="form-control" type="text" name="sebab[0][]"> ' +
                    '<div class="input-group-append"> ' +
                    '<button type="button" class="btn btn-link buttonSebabRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div>');
            });
            $('#sebabArea').on('click', '.buttonSebabRemove', function(e) {
                e.preventDefault();
                // const kondisiGroup = $('#kondisiGroup');
                $('#sebabGroup:last-child').remove();
                // $('#formArea'+(n-1)+'').remove();
                // $(this).remove();
                // console.log(n);
                // n--;
            });
            // console.log(n++);
        });

        $(document).ready(function() {

            $('#buttonAkibatAdd').click(function(e) {
                e.preventDefault();
                // n++;
                $('#akibatArea').append('<div class="form-group mb-3" id="akibatGroup"> ' +
                    '<div class="input-group"> ' +
                    '<input class="form-control" type="text" name="akibat[0][]"> ' +
                    '<div class="input-group-append"> ' +
                    '<button type="button" class="btn btn-link buttonAkibatRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div>');
            });
            $('#akibatArea').on('click', '.buttonAkibatRemove', function(e) {
                e.preventDefault();
                // const kondisiGroup = $('#kondisiGroup');
                $('#akibatGroup:last-child').remove();
                // $('#formArea'+(n-1)+'').remove();
                // $(this).remove();
                // console.log(n);
                // n--;
            });
            // console.log(n++);
        });

        $(document).ready(function() {
            $('#kondisiCek').change(function() {
                if ($(this).is(":checked")) {
                    let prepend = '<div class="input-group-prepend">' +
                        '<span class="input-group-text">Rp.</span>' +
                        '</div>';
                    $('#kondisiGroup .input-group').prepend(prepend);
                    $('#kondisiText').attr("type", "number");
                } else {
                    $('#kondisiGroup .input-group .input-group-prepend').remove();
                    $('#kondisiText').attr("type", "text");
                }
            });
        });

        $(document).ready(function() {
            $('#buttonUraianAdd').click(function(e) {
                e.preventDefault();
                // n++;
                $('#uraianArea').append('<div class="form-group mb-3" id="uraianGroup"> ' +
                    '<div class="input-group"> ' +
                    '<input class="form-control" type="text" name="uraian[0][]"> ' +
                    '<div class="input-group-append"> ' +
                    '<button type="button" class="btn btn-link buttonUraianRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div>');
            });
            $('#uraianArea').on('click', '.buttonUraianRemove', function(e) {
                e.preventDefault();
                $('#uraianGroup:last-child').remove();
            });
        });

        $(document).ready(function() {
            $('#buttonRekomAdd').click(function(e) {
                e.preventDefault();
                // n++;
                $('#rekomArea').append('<div class="form-group mb-3" id="rekomGroup"> ' +
                    '<div class="input-group"> ' +
                    '<input class="form-control" type="text" name="rekomendasi[0][]"> ' +
                    '<div class="input-group-append"> ' +
                    '<button type="button" class="btn btn-link buttonRekomRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div>');
            });
            $('#rekomArea').on('click', '.buttonRekomRemove', function(e) {
                e.preventDefault();
                $('#rekomGroup:last-child').remove();
            });
        });

        $(document).ready(function() {
            $('#cekRupiah').change(function(e) {
                e.preventDefault();
                if ($(this).is(":checked")) {
                    $("#cekNonRupiah").prop("checked", false);
                    $('#cekRpNonRp .isianrupiah-hidden').remove();
                    let html = '<div class="form-group mb-3 mt-2 isian-rupiah">' +
                        '<div class="input-group">' +
                        '<div class="input-group-prepend">' +
                        '<span class="input-group-text">Rp.</span>' +
                        '</div>' +
                        '<input class="form-control" type="number" name="isianrupiah[]">' +
                        '</div>' +
                        '</div>';
                    $('#cekRpNonRp').append(html);
                } else {
                    $('#cekRpNonRp .isian-rupiah').remove();
                }
            });

            $('#cekNonRupiah').change(function(e) {
                e.preventDefault();
                if ($(this).is(":checked")) {
                    $("#cekRupiah").prop("checked", false);
                    $('#cekRpNonRp .isian-rupiah').remove();
                    let html = '<div class="form-group mb-3 mt-2 d-none isianrupiah-hidden">' +
                        '<div class="input-group">' +
                        '<div class="input-group-prepend">' +
                        '<span class="input-group-text">Rp.</span>' +
                        '</div>' +
                        '<input class="form-control" type="text" name="isianrupiah[]">' +
                        '</div>' +
                        '</div>';
                    $('#cekRpNonRp').append(html);
                } else {
                    $('#cekRpNonRp .isianrupiah-hidden').remove();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(e) {

            // Kirim data formulir melalui Ajax 
            $("#fupForm").on('submit', function(e) {
                e.preventDefault()
                $.ajax({
                    url: '<?= $base_url; ?>views/page/auditor/ketua/hasil_penugasan/action/submit_baktl.php',
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        document.location.href = '';
                    }
                });
            });

            <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
                const options = {
                    height: "600px",
                    pdfOpenParams: {
                        view: 'Fit'
                    }
                };
                PDFObject.embed("<?= $base_url; ?>assets/uploads/baktl/<?= $fileBaktl; ?>", "#contentModalBaktl", options);
            <?php endif; ?>
        });


        // File type validation
        $("#file").change(function() {
            var file = this.files[0];
            var fileType = file.type;
            var match = ['application/pdf', 'application/msword'];
            if (!((fileType == match[0]) || (fileType == match[1]))) {
                alert('Sorry, only PDF & DOC files are allowed to upload.');
                $("#file").val('');
                return false;
            }
        });
    </script>
<?php
} else {
?>
    <script>
        alert("Maaf data tidak diketahui !");
        document.location.href = '<?= $base_url; ?>ketua_hasil_penugasan';
    </script>
<?php
}
?>