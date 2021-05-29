<?php
if (isset($_REQUEST["file"])) {
    $file = base64_decode(base64_decode($_REQUEST["file"]));
    // echo"<br>" . $info = $_REQUEST["info"];
    $cek = crypt(base64_encode(base64_encode($file)), "heCTast");
    // echo $file . "<br>";
    // echo $_REQUEST['info'] . "<br>";
    // echo $cek;
    if ($_REQUEST['info'] == $cek) {
        $filepath = "../assets/uploads/" . $file;

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header("Content-Type: application/pdf");
            header("Content-Disposition: attachment; filename=" . basename($filepath));
            header('Content-Transfer-Encoding: binary');
            header("Content-Length: " . filesize($filepath));
            ob_clean();
            flush();
            readfile($filepath);
        } else {
            http_response_code(404);
            die();
        }
    } else {
        die("Nama file tidak valid !");
    }
} else {
    header("Location: ../beranda");
}
exit;
