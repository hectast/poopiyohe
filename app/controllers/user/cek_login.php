<?php

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
            document.location.href = 'beranda';
        </script>
        <?php
        return false;
    }

    if ($_POST['tipe_user'] == "auditan") {
        if ($stmt = $mysqli->prepare('SELECT id, password FROM auditan WHERE email = ?')) {
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $password);
                $stmt->fetch();
                if (password_verify($_POST['password'], $password)) {
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['tipe_user'] = $_POST['tipe_user'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['id'] = $id;
                    header('Location: auditan');
                } else {
        ?>
                    <script>
                        alert('Password yang anda masukkan salah !');
                        document.location.href = 'beranda';
                    </script>
                <?php
                    return false;
                }
            } else {
                ?>
                <script>
                    alert('Email yang anda masukkan salah !');
                    document.location.href = 'beranda';
                </script>
                <?php
                return false;
            }

            $stmt->close();
        }
    } else if ($_POST['tipe_user'] === "auditor") {
        if ($stmt = $mysqli->prepare('SELECT id, password FROM auditor WHERE email = ?')) {
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $password);
                $stmt->fetch();
                if (password_verify($_POST['password'], $password)) {
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['tipe_user'] = $_POST['tipe_user'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['id'] = $id;
                    header('Location: auditor');
                } else {
                    ?>
                    <script>
                        alert('Password yang anda masukkan salah !');
                        document.location.href = 'beranda';
                    </script>
                    <?php
                    return false;
                }
            } else {
                ?>
                <script>
                    alert('Email yang anda masukkan salah !');
                    document.location.href = 'beranda';
                </script>
                <?php
                return false;
            }

            $stmt->close();
        }
    }
}
