<?php
include '../../../../env.php';
$pem = $_GET['opd'];
$query = "SELECT * FROM opd WHERE nama_pemda = '$pem'";
$result = $mysqli->query($query);
?>
<div class="form-group mt-3">
    <div class="input_opd2">
        <div class="form-group">
            <glabel>OPD</glabel>
            <select name="opd" id="pemerintah" class="selek_opd custom-select">
                <option hidden>-Pilih OPD-</option>
               <?php
                while($row = mysqli_fetch_assoc($result)){
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
    $('.selek_opd').select2({
        theme: 'bootstrap4',
        placeholder:'-Pilih OPD-'
    });
</script>   
