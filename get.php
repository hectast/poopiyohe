<?php
include 'app/env.php';

$id_kabkota = $_GET['id_kabkota'];
$query = $mysqli->query("SELECT * FROM opd WHERE id_pemda = $id_kabkota");
?>
<tr class="instansi_row">
    <td>Instansi</td>
    <td>
        <select id="id_instansi" name="id_instansi">
            <option>-- Pilih Instansi --</option>
            <?php
            while ($row = $query->fetch_assoc()) {
                echo "
                    <option value='$row[id]'>$row[nama_unit]</option>
                ";
            }
            ?>
        </select>
    </td>
</tr>