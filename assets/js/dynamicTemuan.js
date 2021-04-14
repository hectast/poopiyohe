$(document).ready(function () {
    let nomor = 2;
    let nomorAppend = 2;
    $('#addTemuan').click(function (e) {
        e.preventDefault();

        const rowTemuan = `<div id="temuanGroup">
                            <h5><u>Temuan ` + (nomor) + `</u><button type="button" class="btn btn-link buttonTemuanRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button></h5>
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
                                        <div class="form-group mb-3" id="kondisiGroup` + (nomor) + `">
                                            <label>Kondisi</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="kondisiText` + (nomor) + `">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" id="kondisiCek` + (nomor) + `">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kriteriaArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Kriteria</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonKriteriaAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sebabArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Sebab</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text">
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
                                                <input class="form-control" type="text">
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
                                    <div class="uraianArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Uraian</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonUraianAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-3" id="cekRpNonRp` + (nomor) + `">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" id="cekRupiah` + (nomor) + `" name="cekrpnonrp" class="form-check-input" value="Rupiah">
                                            <label class="form-check-label" for="cekRupiah` + (nomor) + `">Rupiah</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" id="cekNonRupiah` + (nomor) + `" name="cekrpnonrp" class="form-check-input" value="Non Rupiah">
                                            <label class="form-check-label" for="cekNonRupiah` + (nomor) + `">Non Rupiah</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Hal-hal yang perlu di perhatikan <small class="text-danger">* tidak wajib</small></label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                          </div>`;


        $('#temuanArea').append(rowTemuan);


        $('#kondisiCek' + (nomorAppend)).change(function (e) {
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
        cRNR.change(function (e) {
            e.preventDefault();
            let nmrapd = nomorAppend;

            // console.log(this);
            let isianRupiah = $('.isian-rupiah'+ (nmrapd));

            if (cR.is(":checked") && cNR.is(":checked")) {
                alert('Maaf, anda tidak bisa mencentang keduanya. Pilih salah satu !');
                isianRupiah.remove();
                cR.prop("checked", false);
                cNR.prop("checked", false);
            } else if (cR.is(":checked")) {
                let html = '<div class="form-group mb-3 mt-2 isian-rupiah' + (nmrapd) + '">' +
                                '<div class="input-group">' +
                                    '<div class="input-group-prepend">' +
                                        '<span class="input-group-text">Rp.</span>' +
                                    '</div>' +
                                    '<input class="form-control" type="number" name="isianrupiah">' +
                                '</div>' +
                            '</div>';
                            cRNR.append(html);
            } else {
                isianRupiah.remove();
                
            }
            nmrapd--;
        });


        // kriteria
        $('.buttonKriteriaAdd' + (nomorAppend)).click(function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="kriteriaGroup' + (nomorAppend) + '"> ' +
                '<div class="input-group"> ' +
                '<input class="form-control" type="text" name="input"> ' +
                '<div class="input-group-append"> ' +
                '<button type="button" class="btn btn-link buttonKriteriaRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                '</div> ' +
                '</div> ' +
                '</div>');
            // let kriteriaArea = $('.kriteriaArea2');
            // console.log($(this).parents("div."+ kriteriaArea));
            // console.log($(this).parent().parent().parent().parent());
            $('.buttonKriteriaRemove' + (nomorAppend)).click(function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
                // console.log($(this).parent().parent().parent().parent());
            });
        });

        // sebab
        $('.buttonSebabAdd' + (nomorAppend)).click(function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="sebabGroup' + (nomorAppend) + '"> ' +
                '<div class="input-group"> ' +
                '<input class="form-control" type="text" name="input"> ' +
                '<div class="input-group-append"> ' +
                '<button type="button" class="btn btn-link buttonSebabRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                '</div> ' +
                '</div> ' +
                '</div>');
            // let kriteriaArea = $('.kriteriaArea2');
            // console.log($(this).parents("div."+ kriteriaArea));
            // console.log($(this).parent().parent().parent().parent());
            $('.buttonSebabRemove' + (nomorAppend)).click(function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
                // console.log($(this).parent().parent().parent().parent());
            });
        });

        // akibat
        $('.buttonAkibatAdd' + (nomorAppend)).click(function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="akibatGroup' + (nomorAppend) + '"> ' +
                '<div class="input-group"> ' +
                '<input class="form-control" type="text" name="input"> ' +
                '<div class="input-group-append"> ' +
                '<button type="button" class="btn btn-link buttonAkibatRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                '</div> ' +
                '</div> ' +
                '</div>');
            // let kriteriaArea = $('.kriteriaArea2');
            // console.log($(this).parents("div."+ kriteriaArea));
            // console.log($(this).parent().parent().parent().parent());
            $('.buttonAkibatRemove' + (nomorAppend)).click(function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
                // console.log($(this).parent().parent().parent().parent());
            });
        });

        // uraian
        $('.buttonUraianAdd' + (nomorAppend)).click(function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="uraianGroup' + (nomorAppend) + '"> ' +
                '<div class="input-group"> ' +
                '<input class="form-control" type="text" name="input"> ' +
                '<div class="input-group-append"> ' +
                '<button type="button" class="btn btn-link buttonUraianRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
                '</div> ' +
                '</div> ' +
                '</div>');
            // let kriteriaArea = $('.kriteriaArea2');
            // console.log($(this).parents("div."+ kriteriaArea));
            // console.log($(this).parent().parent().parent().parent());
            $('.buttonUraianRemove' + (nomorAppend)).click(function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
                // console.log($(this).parent().parent().parent().parent());
            });
        });

        nomor++;
        nomorAppend++;

        console.log(nomor);
        console.log(nomorAppend);
    });
    $('#temuanArea').on('click', '.buttonTemuanRemove', function (e) {
        e.preventDefault();
        // const kondisiGroup = $('#kondisiGroup');
        $('#temuanGroup:last-child').remove();
        // $('#formArea'+(n-1)+'').remove();
        // $(this).remove();
        // console.log(n);
        nomor--;
        nomorAppend--;
    });
    // console.log(n++);
});

$(document).ready(function () {

    $('#buttonKriteriaAdd').click(function (e) {
        e.preventDefault();
        // n++;
        $('#kriteriaArea').append('<div class="form-group mb-3" id="kriteriaGroup"> ' +
            '<div class="input-group"> ' +
            '<input class="form-control" type="text" name="input"> ' +
            '<div class="input-group-append"> ' +
            '<button type="button" class="btn btn-link buttonKriteriaRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
            '</div> ' +
            '</div> ' +
            '</div>');
    });
    $('#kriteriaArea').on('click', '.buttonKriteriaRemove', function (e) {
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

$(document).ready(function () {

    $('#buttonSebabAdd').click(function (e) {
        e.preventDefault();
        // n++;
        $('#sebabArea').append('<div class="form-group mb-3" id="sebabGroup"> ' +
            '<div class="input-group"> ' +
            '<input class="form-control" type="text" name="input"> ' +
            '<div class="input-group-append"> ' +
            '<button type="button" class="btn btn-link buttonSebabRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
            '</div> ' +
            '</div> ' +
            '</div>');
    });
    $('#sebabArea').on('click', '.buttonSebabRemove', function (e) {
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

$(document).ready(function () {

    $('#buttonAkibatAdd').click(function (e) {
        e.preventDefault();
        // n++;
        $('#akibatArea').append('<div class="form-group mb-3" id="akibatGroup"> ' +
            '<div class="input-group"> ' +
            '<input class="form-control" type="text" name="input"> ' +
            '<div class="input-group-append"> ' +
            '<button type="button" class="btn btn-link buttonAkibatRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
            '</div> ' +
            '</div> ' +
            '</div>');
    });
    $('#akibatArea').on('click', '.buttonAkibatRemove', function (e) {
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

$(document).ready(function () {
    $('#kondisiCek').change(function () {
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

$(document).ready(function () {
    $('#buttonUraianAdd').click(function (e) {
        e.preventDefault();
        // n++;
        $('#uraianArea').append('<div class="form-group mb-3" id="uraianGroup"> ' +
            '<div class="input-group"> ' +
            '<input class="form-control" type="text" name="input"> ' +
            '<div class="input-group-append"> ' +
            '<button type="button" class="btn btn-link buttonUraianRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
            '</div> ' +
            '</div> ' +
            '</div>');
    });
    $('#uraianArea').on('click', '.buttonUraianRemove', function (e) {
        e.preventDefault();
        // const kondisiGroup = $('#kondisiGroup');
        $('#uraianGroup:last-child').remove();
        // $('#formArea'+(n-1)+'').remove();
        // $(this).remove();
        // console.log(n);
        // n--;
    });
    // console.log(n++);
});

$(document).ready(function() {
    $('#cekRpNonRp').change(function () {
        if ($("#cekRupiah").is(":checked") && $("#cekNonRupiah").is(":checked")) {
            alert('Maaf, anda tidak bisa mencentang keduanya. Pilih salah satu !');
            $('#cekRpNonRp .isian-rupiah').remove();
            $("#cekRupiah").prop("checked", false);
            $("#cekNonRupiah").prop("checked", false);
        } else if ($("#cekRupiah").is(":checked")) {
            let html = '<div class="form-group mb-3 mt-2 isian-rupiah">' +
                            '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                    '<span class="input-group-text">Rp.</span>' +
                                '</div>' +
                                '<input class="form-control" type="number" name="isianrupiah">' +
                            '</div>' +
                        '</div>';
            $('#cekRpNonRp').append(html);
            // console.log("napa dia");
        } else {
            $('#cekRpNonRp .isian-rupiah').remove();
        }
    });
});