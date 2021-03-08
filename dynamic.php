<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Populate Select Boxes using jQuery</title>
</head>
<body>

<h1>Populate Select Option Boxes using jQuery</h1>

<table border="0" cellpadding="1" cellspacing="1" id="kabkota">
    <?php
        include 'app/env.php';
        $query_pemda = $mysqli->query("SELECT * FROM pemda");
    ?>
    <tr class="kabkota_row">
        <td>Kabupaten/Kota:</td>
        <td>
            <select id="id_kabkota">
                <option hidden>-- Pilih Kabupaten/Kota --</option>
                <?php
                    while($row_pemda = $query_pemda->fetch_assoc()) {
                        echo "
                            <option value='$row_pemda[id]'>$row_pemda[pemda]</option>
                        ";
                    }
                ?>
            </select>
        </td>
    </tr>
    
</table>

<script src="assets/js/jquery.min.js"></script>
<script>
    $(function() {

        $('#id_kabkota').change(function() {
            $('.instansi_row').remove();
            if($('#id_kabkota').val() != '-- Select Kabupaten/Kota --') {
                $.get('get.php', {id_kabkota: $('#id_kabkota').val()})
                    .done(function( data ) {
                        $('tr.kabkota_row').after(data);
                    })
            }
        });

    });
</script>

</body>
</html>