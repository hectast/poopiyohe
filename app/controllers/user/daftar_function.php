<?php
function tampil_data_pemda($mysqli)
{
    $query = "SELECT * FROM pemda";
    $result = $mysqli->query($query);
    while ($d = mysqli_fetch_assoc($result)) {
?>
        <option value="<?= $d['id'] ?>"><?= $d['pemda']; ?></option>
<?php
    }
}
?>