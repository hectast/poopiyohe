<?php
error_reporting(0);
    include 'app/controllers/auditor/anggota/hasil_penugasan/function.php';
    include 'app/flash_message.php';
    if(isset($_POST['simpan_data'])){
        
        
        $id_penugasan = $_POST['id_penugasan'];
        $no_laporan = $_POST['no_laporan'];
        $tgl_laporan = $_POST['tgl_laporan'];   
        $kondisi = $_POST['kondisi'];
        $cekrpnonrp = $_POST['cekrpnonrp'];
        $hal = $_POST['hal'];
        $isianrupiah = $_POST['isianrupiah'];


        $kriteria = $_POST['kriteria'];
        $uraian = $_POST['uraian'];
        $sebab = $_POST['sebab'];
        $akibat = $_POST['akibat'];
        $rekomendasi = $_POST['rekomendasi'];
       
       

        $total = count($kondisi);
      
        for($i=0; $i<$total; $i++){
            // countData
            $total_uraian = count($uraian[$i]);
            $total_kriteria = count($kriteria[$i]);
            $total_sebab = count($sebab[$i]);
            $total_akibat = count($akibat[$i]);
            $total_rekomendasi = count($rekomendasi[$i]);

            //tambahTemuan
            $insert = "INSERT INTO temuan VALUES ('','$id_penugasan','$no_laporan','$tgl_laporan','$kondisi[$i]','$cekrpnonrp[$i]','$isianrupiah[$i]','$hal[$i]')";
            $mysqli->query($insert);
            $id_akhir = $mysqli->insert_id;

                //perulanganUraian
                for($urr = 0; $urr<$total_uraian; $urr++){
                    $uraianx = mysqli_real_escape_string($mysqli,$uraian[$i][$urr]);
                    $sql_urr = "INSERT INTO uraian (uraian) VALUES ('$uraianx')";
                    $mysqli->query($sql_urr);
                    $id_uraian = $mysqli->insert_id;

                    $input_urr = "INSERT INTO data_uraian VALUES('$id_akhir','$id_uraian')";
                    $mysqli->query($input_urr);
                }

                //perulanganKriteria
                for($kri = 0; $kri<$total_kriteria; $kri++){
                    $kriteriax = mysqli_real_escape_string($mysqli,$kriteria[$i][$kri]);
                    $sql_kri = "INSERT INTO kriteria (kriteria) VALUES ('$kriteriax')";
                    $mysqli->query($sql_kri);
                    $id_kriteria = $mysqli->insert_id;

                    $input_kri = "INSERT INTO data_kriteria VALUES('$id_akhir','$id_kriteria')";
                    $mysqli->query($input_kri);
                }

                //perulanganSebab
                for($sb = 0; $sb<$total_sebab; $sb++){
                    $sebabx = mysqli_real_escape_string($mysqli,$sebab[$i][$sb]);
                    $sql_sb = "INSERT INTO sebab (sebab) VALUES ('$sebabx')";
                    $mysqli->query($sql_sb);
                    $id_sebab = $mysqli->insert_id;

                    $input_sb = "INSERT INTO data_sebab VALUES('$id_akhir','$id_sebab')";
                    $mysqli->query($input_sb);
                }

                //perulanganAkibat
                for($akb = 0; $akb<$total_akibat; $akb++){
                    $akibatx = mysqli_real_escape_string($mysqli,$akibat[$i][$akb]);
                    $sql_akb = "INSERT INTO akibat (akibat) VALUES ('$akibatx')";
                    $mysqli->query($sql_akb);
                    $id_akibat = $mysqli->insert_id;

                    $input_sb = "INSERT INTO data_akibat VALUES('$id_akhir','$id_akibat')";
                    $mysqli->query($input_sb);
                }

                //perulanganRekomendasi
                for($r = 0; $r<$total_rekomendasi; $r++){
                    $rekomendasix = mysqli_real_escape_string($mysqli,$rekomendasi[$i][$r]);
                    $sql_r = "INSERT INTO rekomendasi (rekomendasi) VALUES ('$rekomendasix')";
                    $mysqli->query($sql_r);
                    $id_rekomendasi = $mysqli->insert_id;

                    $input_sb = "INSERT INTO data_rekomendasi VALUES('$id_akhir','$id_rekomendasi')";
                    $mysqli->query($input_sb);
                }


          
        }
        flash("msg_temuan", "Data Berhasil Disimpan");
        
    



    }
?>