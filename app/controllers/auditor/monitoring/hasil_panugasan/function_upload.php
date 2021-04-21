<?php
function upload_surat()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4) {
        echo "
            <script>
                alert('pilih dokumen terlebih dahulu');
            </script>
        ";
        return false;
    }

    // cek apakah yang di upload gambar
    $extensidokumenValid = ['pdf'];
    $extensidokumen = explode('.', $namaFile);
    $extensidokumen = strtolower(end($extensidokumen));
    if(!in_array($extensidokumen, $extensidokumenValid)) {
        echo "
            <script>
                alert('yang anda upload bukan dokumen berbentuk pdf');
            </script>
        ";
        return false;
    }

    // cek ukuran file gambar
    if($ukuranFile > 20943040) {
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

    // jika lolos pengecekan
    move_uploaded_file($tmpName, 'assets/uploads/surat_tuntas/' . $namaFileBaru);
    return $namaFileBaru;
}
?>