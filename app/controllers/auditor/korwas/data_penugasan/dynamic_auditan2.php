<?php
include '../../env.php';
$query = "SELECT * FROM instansi_vertikal";
$result = $mysqli->query($query);
?>
<div class="form-group mt-3">
    <div class="input_vertikal">
        <div class="form-group">
            <label>Instansi Vertikal</label>
            <select name="vertikal" id="" class="selek_vertikal form-control">
                <option hidden>-Instansi Vertikal-</option>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama_instansi'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</div>

<!-- <script src="../../../assets/js/jquery.min.js"></script>
<script src='../../../assets/js/select2.min.js'></script> -->
<script>
    $('.selek_vertikal').select2({
        theme: 'bootstrap4' 
    });
</script>