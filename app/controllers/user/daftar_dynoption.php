<?php
include '../../env.php';
$id_pemda = $_GET['id_pemda'];
$query_instansi = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id_pemda = $id_pemda");
?>
<div class="form-group" style="margin-top: 15px;">
    <div class="instansi_row">
        <label for="id_instansi">Instansi</label>
        <select name="" id="id_instansi" class="custom-select select3">
            <option hidden>-Pilih Instansi-</option>
            <?php
            while ($row_instansi = $query_instansi->fetch_assoc()) {
                echo "
                    <option value='$row_instansi[id]'>$row_instansi[nama_instansi]</option>
                ";
            }
            ?>
        </select>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src='assets/js/select2.min.js'></script>
<script>
    $('.select3').select2({
        theme: 'bootstrap4',
    });
</script>