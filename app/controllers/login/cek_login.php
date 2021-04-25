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

    $stmt_auditan_iv = $mysqli->prepare("SELECT id, nama_instansi, pass FROM instansi_vertikal WHERE email = ?");
    $stmt_auditan_opd = $mysqli->prepare("SELECT id, nama_instansi, pass FROM opd WHERE email = ?");
    $stmt_auditor = $mysqli->prepare('SELECT id, nama, password, akses FROM auditor WHERE email = ?');
    $stmt_admin = $mysqli->prepare('SELECT id, password FROM admin WHERE email = ?');

    if ($stmt_auditan_iv || $stmt_auditan_opd || $stmt_auditor || $stmt_admin) {
        $stmt_auditan_iv->bind_param('s', $_POST['email']);
        $stmt_auditan_iv->execute();
        $stmt_auditan_iv->store_result();

        $stmt_auditan_opd->bind_param('s', $_POST['email']);
        $stmt_auditan_opd->execute();
        $stmt_auditan_opd->store_result();

        $stmt_auditor->bind_param('s', $_POST['email']);
        $stmt_auditor->execute();
        $stmt_auditor->store_result();

        $stmt_admin->bind_param('s', $_POST['email']);
        $stmt_admin->execute();
        $stmt_admin->store_result();

        if ($stmt_auditan_iv->num_rows > 0) {
            $stmt_auditan_iv->bind_result($id_auditan_iv, $nama_auditan_iv, $pass_auditan_iv);
            $stmt_auditan_iv->fetch();
            if (md5($_POST['password']) == $pass_auditan_iv) {
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
                $_SESSION['id'] = $id_auditan_iv;
                $_SESSION['nama'] = $nama_auditan_iv;
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
        } else if ($stmt_auditan_opd->num_rows > 0) {
            $stmt_auditan_opd->bind_result($id_auditan_opd, $nama_auditan_opd, $pass_auditan_opd);
            $stmt_auditan_opd->fetch();
            if (md5($_POST['password']) == $pass_auditan_opd) {
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
                $_SESSION['id'] = $id_auditan_opd;
                $_SESSION['nama'] = $nama_auditan_opd;
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

                // ketua
                $stmt_getDataKetua = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Ketua Tim'");
                                    $stmt_getDataKetua->execute();
                                    $rslt_getDataKetua = $stmt_getDataKetua->get_result();
                $stmt_getDataKetua->close();

                // anggota
                $stmt_getDataAnggota = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Anggota Tim'");
                                    $stmt_getDataAnggota->execute();
                                    $rslt_getDataAnggota = $stmt_getDataAnggota->get_result();
                $stmt_getDataAnggota->close();

                // dalnis
                $stmt_getDataDalnis = $mysqli->prepare("SELECT * FROM penugasan_auditor WHERE id = {$id_auditor} AND peran = 'Pengendali Teknis'");
                                    $stmt_getDataDalnis->execute();
                                    $rslt_getDataDalnis = $stmt_getDataDalnis->get_result();
                $stmt_getDataDalnis->close();

                $stmt_getData = $mysqli->prepare("SELECT * FROM auditor WHERE id = {$id_auditor}");
                                $stmt_getData->execute();
                                $rslt_getData = $stmt_getData->get_result();
                                $rowToken = $rslt_getData->fetch_assoc();
                                $akses = $rowToken['akses'];
                $stmt_getData->close();    

                if ($akses === 2) {
                    ?>
                        <script>
                            document.location.href = 'beranda_korwas';
                        </script>
                    <?php
                }else if (mysqli_num_rows($rslt_getDataKetua) > 0) {
                    ?>
                        <script>
                            document.location.href = 'beranda_ketua';
                        </script>
                    <?php
                } else if (mysqli_num_rows($rslt_getDataAnggota) > 0) {
                    ?>
                        <script>
                            document.location.href = 'beranda_anggota';
                        </script>
                    <?php
                } else if (mysqli_num_rows($rslt_getDataDalnis) > 0) {
                    ?>
                        <script>
                            document.location.href = 'beranda_dalnis';
                        </script>
                    <?php
                } else if ($akses === 1) {
                    ?>
                        <script>
                            document.location.href = 'beranda_monitoring';
                        </script>
                    <?php
                } else {
                    $_SESSION['auditornopngsn'] = 3;
                    ?>
                        <script>
                            // alert('Anda belum memiliki penugasan !');
                            document.location.href = 'beranda_auditor';
                        </script>
                    <?php
                }
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