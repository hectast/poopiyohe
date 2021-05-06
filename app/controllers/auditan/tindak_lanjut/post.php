<?php
include 'app/controllers/auditan/tindak_lanjut/function.php';
include 'app/flash_message.php';
    if (isset($_POST['tindak_lanjut']) and $_SERVER['REQUEST_METHOD'] == "POST") {
        $id_temuan = $_POST['id_temuan'];
        $tgl = date('Y-m-d');
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


           
            
            $stmt_tindak_lanjut = $mysqli->prepare("INSERT INTO tindak_lanjut (id_temuan, id_rekomendasi, uraian_tl, file_tl, nominal_tl) VALUES ('$id_temuan', '$id_rekomendasi', '$uraian_tl[$i]', '$namaFileBaru','$nominal[$i]')");
            $stmt_tindak_lanjut->execute(); 
            $id_tindaklanjut = $mysqli->insert_id;
            $history = $mysqli->query("INSERT INTO history_tl (id_tl, id_rekomendasi, uraian_tl, nominal_tl, file_tl, tgl_kirim) VALUES ('$id_tindaklanjut','$id_rekomendasi','$uraian_tl[$i]','$nominal[$i]','$namaFileBaru','$tgl')");
        }   
?>
    <script>
        document.location.href = '<?= $base_url ?>detail_temuan/<?= $row_data_temuan->id_penugasan ?>';
        alert('Rekomendasi berhasil diusulkan');
        document.location.href = '<?= $base_url ?>detail_temuan/<?= $row_data_temuan->id_penugasan ?>';
    </script>
<?php
    }

if(isset($_POST['edit_tl'])){
    $uraian = $_POST['uraian_tl'];
    $nominal = $_POST['nominal_tl'];
    $id_tl = $_POST['id_tl'];
    $tgl = date('Y-m-d');
    $id_rekomen = $_POST['id_rekomendasi'];
    $file_sebelumnya = $_POST['file_sebelumnya'];
    if ($_FILES['file']['error'] === 4) {
        $dokumen_baru = $file_sebelumnya;
    } else {
        $dokumen_baru = upload_dokumen();
        // unlink("assets/uploads/tindak_lanjut/$file_sebelumnya");
    }
    
    $update = $mysqli->query("UPDATE tindak_lanjut SET uraian_tl = '$uraian', nominal_tl = '$nominal', file_tl = '$dokumen_baru', status = '' WHERE id_tl = '$id_tl'");
    $history = $mysqli->query("INSERT INTO history_tl (id_tl, id_rekomendasi, uraian_tl, nominal_tl, file_tl, tgl_kirim) VALUES('$id_tl','$id_rekomen','$uraian','$nominal','$dokumen_baru','$tgl')");
    flash("msg_edit","Tindak Lanjut Berhasil Diperbarui");
    
}
?>