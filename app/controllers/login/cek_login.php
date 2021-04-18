<?php

include 'app/token.php';

if (isset($_POST['login'])) {
    // $cek_password = password_hash('admin123', PASSWORD_DEFAULT);
    // var_dump($cek_password);

    if (empty($_POST['email']) && empty($_POST['password'])) {
?>
        <script>
            alert('Maaf masukkan email dan password terlebih dahulu !');
            document.location.href = 'beranda';
        </script>
        <?php
        return false;
    }

    $stmt_auditan = $mysqli->prepare('SELECT id, nama, password FROM auditan WHERE email = ?');
    $stmt_auditor = $mysqli->prepare('SELECT id, nama, password, akses FROM auditor WHERE email = ?');
    $stmt_admin = $mysqli->prepare('SELECT id, password FROM admin WHERE email = ?');

    if ($stmt_auditan || $stmt_auditor || $stmt_admin) {

        $stmt_auditan->bind_param('s', $_POST['email']);
        $stmt_auditan->execute();
        $stmt_auditan->store_result();

        $stmt_auditor->bind_param('s', $_POST['email']);
        $stmt_auditor->execute();
        $stmt_auditor->store_result();

        $stmt_admin->bind_param('s', $_POST['email']);
        $stmt_admin->execute();
        $stmt_admin->store_result();

        if ($stmt_auditan->num_rows > 0) {
            $stmt_auditan->bind_result($id_auditan, $nama_auditan, $password_auditan);
            $stmt_auditan->fetch();
            if (password_verify($_POST['password'], $password_auditan)) {
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
                $_SESSION['id'] = $id_auditan;
                $_SESSION['nama'] = $nama_auditan;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['tipe_user'] = 'auditan';
                $_SESSION['token'] = $token;
                ?>
                <script>
                    document.location.href = 'auditan';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = 'beranda';
                </script>
                <?php
            }
        } else if ($stmt_auditor->num_rows > 0) {
            $stmt_auditor->bind_result($id_auditor, $nama_auditor, $password_auditor, $akses_auditor);
            $stmt_auditor->fetch();
            if (password_verify($_POST['password'], $password_auditor)) {
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
                $_SESSION['id'] = $id_auditor;
                $_SESSION['nama'] = $nama_auditor;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['tipe_user'] = 'auditor';
                $_SESSION['token'] = $token;
                ?>
                <script>
                    document.location.href = 'auditor';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = 'beranda';
                </script>
                <?php
            }
        } else if ($stmt_admin->num_rows > 0) {
            $stmt_admin->bind_result($id, $password);
            $stmt_admin->fetch();

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
            }
        } else {
            ?>
            <script>
                alert('Email yang anda masukkan salah !');
                document.location.href = 'beranda';
            </script>
            <?php
        }
        $stmt_auditan->close();
        $stmt_auditor->close();
    }
}
?>