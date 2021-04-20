<?php
$sql = "SELECT * FROM temuan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_object();

if (mysqli_num_rows($result) > 0) {
?>

<?php
}
?>