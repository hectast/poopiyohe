<?php
function tampil_data($mysqli){
   
}
function tampil_data_auditor($mysqli){
 $r_auditor = $mysqli->query("SELECT * FROM auditor");
 while($auditor = mysqli_fetch_assoc($r_auditor)){
 ?>
 <option value="<?= $auditor['id'] ?>"><?= $auditor['nama'] ?></option>
 <?php   
 }
}
function tampil_data_auditor_selek($mysqli){
   
}
?>