<?php
function tampil_data_opd($mysqli){
 $query = "SELECT * FROM opd";
 $result = $mysqli->query($query);
 while($d = mysqli_fetch_assoc($result)){
     ?>
     <option value="<?= $d['id']?>"><?= $d['nama_unit'];?></option>
     <?php
 }
}
function tampil_data_instansi($mysqli){
    $query = "SELECT * FROM instansi_vertikal";
    $result = $mysqli->query($query);
    while($d = mysqli_fetch_assoc($result)){
        ?>
        <option value="<?= $d['id']?>"><?= $d['nama_instansi'];?></option>
        <?php
    }
   }
?>