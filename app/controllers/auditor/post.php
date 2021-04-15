<?php
    include 'app/controllers/auditor/function.php';

    if(isset($_POST['simpan_data'])){
        
        
        $id_penugasan = $_POST['id_penugasan'];
        $no_laporan = $_POST['no_laporan'];
        $tgl_laporan = $_POST['tgl_laporan'];   
        $kondisi = $_POST['kondisi'];
        $cekrpnonrp = $_POST['cekrpnonrp'];
        $hal = $_POST['hal'];

        $uraian = $_POST['uraian'];
        echo "<pre style='margin-left:1000px;'>";
        print_r($uraian);
        echo "</pre>";
        $isianrupiah = $_POST['isianrupiah'];

        $total = count($kondisi);
      
        for($i=0; $i<$total; $i++){
            
            // $insert = "INSERT INTO temuan VALUES ('','$id_penugasan','$no_laporan','$tgl_laporan','$kondisi[$i]','$cekrpnonrp[$i]','$isianrupiah[$i]','$hal[$i]')";
            // $mysqli->query($insert);

            // $id_akhir = $mysqli->insert_id;
            // for($j=0; $j<$total2; $j++){	
            //     $hobix = mysqli_real_escape_string($mysqli,$hobi[$i][$j]);
            //     $sql = "INSERT INTO hobi (hobiii) VALUES ('$hobix')";
            //     $mysqli->query($sql);
            //     $id_hobi = $mysqli->insert_id;
                
            //     $input = "INSERT INTO data_hobi VALUES ('$id_akhir','$id_hobi')";
            //     $mysqli->query($input);
            // }
        }
        
    



    }
?>