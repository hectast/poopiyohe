<?php
include '../../../../../app/env.php';

$query = "SELECT * FROM instansi_vertikal";
$result = $mysqli->query($query);
?>
<div class="form-group mt-3">
    <div class="input_opd">
        <div class="form-group">
            <label>Pemerintahan</label>
            <select name="" id="pemerintah" class="selek_opd2 custom-select">
               <option hidden>-Pilih OPD-</option>
               <option>Provinsi Gorontalo</option>
               <option>Kota Gorontalo</option>
               <option>Kabupaten Gorontalo</option>
               <option>Kabupaten Boalemo</option>
               <option>Kabupaten Pohuwato</option>
               <option>Kabupaten Bone Bolango</option>
               <option>Kabupaten Gorontalo Utara</option>
            </select>
        </div>
    </div>
</div>

<!-- <script src="../../../assets/js/jquery.min.js"></script>
<script src='../../../assets/js/select2.min.js'></script> -->
<script>
    // $('.selek_opd2').select2({
    //     theme: 'bootstrap4',
    //     placeholder:'-Pilih OPD-'
    // });
        $(function() {
            $('#pemerintah').change(function() {
                $('.input_opd2').remove();
                if ($('#pemerintah').val() != '-Pilih Pemerintahan-') {
                    $.get('app/controllers/auditor/ketua/data_penugasan/dynamic_auditan4.php', {
                            opd: $('#pemerintah').val()
                        })
                        .done(function(data) {
                            $('div.input_opd').after(data);
                        })
                }
            });

        });
    </script>