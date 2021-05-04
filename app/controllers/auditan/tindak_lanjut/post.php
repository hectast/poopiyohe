<?php
include 'app/controllers/auditan/tindak_lanjut/function.php';
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
    $file_sebelumnya = $_POST['file_sebelumnya'];
    if ($_FILES['file']['error'] === 4) {
        $dokumen_baru = $file_sebelumnya;
    } else {
        $dokumen_baru = upload_dokumen();
        unlink("assets/uploads/tindak_lanjut/$file_sebelumnya");
    }

    $update = $mysqli->query("UPDATE tindak_lanjut SET uraian_tl = '$uraian', nominal_tl = '$nominal', file_tl = '$dokumen_baru', status = '' WHERE id_tl = '$id_tl'");
    $saldo_temuan = $mysqli->query("SELECT * FROM tindak_lanjut WHERE id_tl = '$id_tl'");
    $row_tl2 = $saldo_temuan->fetch_assoc();
    $temuan = $row_tl2['id_temuan'];

    $get_temuan = $mysqli->query("SELECT * FROM temuan WHERE id_temuan = '$temuan'");
    $row_temuan2 = $get_temuan->fetch_assoc();
    $isi_saldo = $row_temuan2['saldo'];

    @$hasil_saldo = $isi_saldo - $nominal;
 
   $update = $mysqli->query("UPDATE temuan SET saldo = '$hasil_saldo' WHERE id_temuan = '$temuan'");

    
    flash("msg_edit","Tindak Lanjut Berhasil Diperbarui");
    
}
?>