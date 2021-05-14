<?php 
$base_url = "http://localhost/poopiyohe/";

include '../../../../../../app/env.php';

$uploadDir = $base_url . 'assets/uploads/baktl/';

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
);

$id_penugasan = $_POST['id_penugasan'];
$fileName = $_FILES["file"]["name"];
$tmpName = $_FILES["file"]["tmp_name"];

$extensiFileValid = ['pdf','docx'];
$extensiFile = explode('.', $fileName);
$extensiFile = strtolower(end($extensiFile));
if (in_array($extensiFile, $extensiFileValid)) {

    $encryption_filename = microtime(crypt($fileName, "Hectast2k21"));
    $namaFileBaru = $encryption_filename;
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiFile;

    if (move_uploaded_file($tmpName, '../../../../../../assets/uploads/baktl/' . $namaFileBaru)) {

        $insert = $mysqli->prepare("INSERT INTO baktl (id_penugasan,file_upload) VALUES ('{$id_penugasan}', '{$namaFileBaru}')");
        $insert->execute();

        if ($insert) {
            $response['status'] = 1;
            $response['message'] = "Form data submitted successfully!";
        } else {
            $response['status'] = 0;
            $response['message'] = "Form data failed to send!";
        }
    } else {
        $uploadStatus = 0;
        $response['message'] = 'Sorry, there was an error uploading your file.';
    }
} else {
    $uploadStatus = 0;
    $response['message'] = 'Sorry, only PDF file are allowed to upload.';
}

echo json_encode($response);