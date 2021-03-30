<?php

if (isset($_SESSION['email'])) {
    $checkToken = "SELECT * FROM log_token WHERE email='{$_SESSION['email']}'";
    $toCheckToken = $mysqli->prepare($checkToken);
    $toCheckToken->execute();
    $resultCheckToken = $toCheckToken->get_result();
    $rowCheckToken = $resultCheckToken->fetch_array();
    
    if ($rowCheckToken['token'] != $_SESSION['token']) {
    ?>
        <script>
            alert('Akun anda telah digunakan diperangkat lain !');
            document.location.href = 'app/logout_admin.php';
        </script>
    <?php
    }
}
    ?>