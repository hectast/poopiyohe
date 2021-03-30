<?php

include 'app/token.php';

if (isset($_POST['login'])) {
    // $cek_password = password_hash('admin123', PASSWORD_DEFAULT);
    // var_dump($cek_password);
    // bpkp123
    // auditan123
    // admin123
    // var_dump($_POST['email'],$_POST['password'],$_POST['tipe_user']);

    if (empty($_POST['email']) && empty($_POST['password'])) {
?>
        <script>
            alert('Maaf masukkan email dan password terlebih dahulu !');
            document.location.href = 'login';
        </script>
        <?php
        return false;
    }


    if ($stmt = $mysqli->prepare('SELECT id, password FROM admin WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            if (password_verify($_POST['password'], $password)) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM log_token WHERE email='{$_POST['email']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $upToken = "UPDATE log_token SET token='$token' WHERE email='{$_POST['email']}'";
                    $toUpToken = $mysqli->prepare($upToken);
                    $toUpToken->execute();
                } else {
                    $inToken = "INSERT INTO log_token (email,token) VALUES ('{$_POST['email']}', '$token')";
                    $toInToken = $mysqli->prepare($inToken);
                    $toInToken->execute();
                }

                $_SESSION['loggedin'] = TRUE;
                $_SESSION['tipe_user'] = 'admin';
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['id'] = $id;
                $_SESSION['token'] = $token;
                ?>
                    <script>
                        document.location.href = 'admin';
                    </script>
                <?php
            } else {
        ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = 'login';
                </script>
            <?php
                return false;
            }
        } else {
            ?>
            <script>
                alert('Email yang anda masukkan salah !');
                document.location.href = 'login';
            </script>
<?php
            return false;
        }

        $stmt->close();
    }
}


?>