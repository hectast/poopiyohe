<?php
include 'app/flash_message.php';
    if (isset($_POST['tindak_lanjut']) and $_SERVER['REQUEST_METHOD'] == "POST") {
        $id_temuan = $_POST['id_temuan'];
        $id_rekomendasi = $_POST['id_rekomendasi'];
        $uraian_tl = $_POST['uraian_tl'];
        $nominal = $_POST['nominal_tl'];
        $filebukti = $_FILES['filebukti']['name'];
        $error = $_FILES['filebukti']['error'];
        $ukuranFile = $_FILES['filebukti']['size'];
        $tmpName = $_FILES['filebukti']['tmp_name'];


        $count = count($filebukti);
        if (isset($_POST['saldo'])) {
            $saldo = $_POST['saldo'];
        }
        for ($i=0;$i<$count;$i++) {

            // cek apakah tidak ada dokumen yang di upload
            if($error[$i] === 4) {
                echo "
                    <script>
                        alert('pilih dokumen terlebih dahulu');
                    </script>
                ";
                return false;
            }

            // cek apakah yang di upload dokumen
            $extensidokumenValid = ['pdf', 'png'];
            $extensidokumen = explode('.', $filebukti[$i]);
            $extensidokumen = strtolower(end($extensidokumen));
            if(!in_array($extensidokumen, $extensidokumenValid)) {
                echo "
                    <script>
                        alert('yang anda upload bukan dokumen berbentuk pdf');
                    </script>
                ";
                return false;
            }

            // cek ukuran file dokumen
            if($ukuranFile[$i] >= 2000000) {
                echo "
                    <script>
                        alert('ukuran dokumen terlalu besar!');
                    </script>
                ";
                return false;
            }

            // generate nama gambar baru
            $cakacakacak = uniqid(microtime(true));
            $namaFileBaru = $cakacakacak;
            $namaFileBaru .= '.';
            $namaFileBaru .= $extensidokumen;

            // echo $extensidokumen . "<br>";

            // jika lolos pengecekan
            move_uploaded_file($tmpName[$i], 'assets/uploads/tindak_lanjut/' . $namaFileBaru);


            @$jumlah_nominal += $nominal[$i];
            
            $stmt_tindak_lanjut = $mysqli->prepare("INSERT INTO tindak_lanjut (id_temuan, id_rekomendasi, uraian_tl, file_tl, nominal_tl) VALUES ('$id_temuan', '$id_rekomendasi', '$uraian_tl[$i]', '$namaFileBaru','$nominal[$i]')");
            $stmt_tindak_lanjut->execute(); 
        }
    @$hasil_saldo = ($saldo) - ($jumlah_nominal);
    
    $stmt_update_saldo = $mysqli->prepare("UPDATE temuan SET saldo = '$hasil_saldo' WHERE id_temuan = '$id_temuan'");
    $stmt_update_saldo->execute();
    flash("msg_tl","Rekomendasi Sudah Ditindak Lanjuti");
    }
?>