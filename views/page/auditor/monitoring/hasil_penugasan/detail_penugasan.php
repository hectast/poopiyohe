<?php
$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {

    $row_penugasan = $result->fetch_assoc();

    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><?= $page; ?></h2>
                </div>
            </div>
            <div class="row">

                <div class="col-7">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Data Penugasan</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>No.ST</td>
                                    <td>:</td>
                                    <td><?= $row_penugasan['no_st'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl.ST</td>
                                    <td>:</td>
                                    <td><?= tgl_indo($row_penugasan['tgl_st']) ?></td>
                                </tr>
                                <tr>
                                    <td>Uraian Penugasan</td>
                                    <td>:</td>
                                    <td><?= $row_penugasan['uraian_penugasan'] ?></td>
                                </tr>

                                <tr>
                                    <td>Jenis Penugasan</td>
                                    <td>:</td>
                                    <td><?= $row_penugasan['jenis_penugasan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Auditan</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if (empty($row_penugasan['auditan_in'])) {
                                            $au2 = $row_penugasan['auditan_opd'];
                                            $opd = "SELECT * FROM opd WHERE id='$au2'";
                                            $stmt_opd = $mysqli->prepare($opd);
                                            $stmt_opd->execute();
                                            $result_opd = $stmt_opd->get_result();
                                            $row_opd = $result_opd->fetch_assoc();
                                            echo $row_opd['nama_instansi'];
                                            echo ' - ';
                                            echo $row_opd['nama_pemda'];
                                        } else {
                                            $au = $row_penugasan['auditan_in'];
                                            $inve = "SELECT * FROM instansi_vertikal WHERE id='$au'";
                                            $stmt_inve = $mysqli->prepare($inve);
                                            $stmt_inve->execute();
                                            $result_inve = $stmt_inve->get_result();
                                            $row_inve = $result_inve->fetch_assoc();
                                            echo $row_inve['nama_instansi'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?= $row_penugasan['pkpt'] ?> , <?= $row_penugasan['kf1'] ?> , <?= $row_penugasan['d1'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td> <?php
                                            if ($row_penugasan['status'] == 'Belum Direview') {
                                            ?>
                                            <small class="badge badge-danger"><?= $row_penugasan['status']; ?></small>
                                        <?php
                                            } else {
                                        ?>
                                            <small class="badge badge-warning"><?= $row_penugasan['status']; ?></small>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Data Auditor (Personel)</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Peran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql2 = "SELECT * FROM penugasan_auditor WHERE id_penugasan = '$row_penugasan[id_penugasan]'";
                                    $stmt2 = $mysqli->prepare($sql2);
                                    $stmt2->execute();
                                    $result2 = $stmt2->get_result();
                                    while ($row_penugasan2 =$result2->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $nama_auditor = $row_penugasan2['id'];
                                                $sql3 = "SELECT * FROM auditor WHERE id = '$nama_auditor'";
                                                $stmt3 = $mysqli->prepare($sql3);
                                                $stmt3->execute();
                                                $result3 = $stmt3->get_result();
                                                $row_auditor = mysqli_fetch_assoc($result3);
                                                echo $row_auditor['nama'];
                                                ?>
                                            </td>
                                            <td><?= $row_penugasan2['peran']; ?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
            <a href="<?= $base_url; ?>monitoring_hasil_penugasan" class="btn btn-secondary">Kembali</a>
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
<?php
} else {
?>
    <script>
        alert("Maaf data tidak diketahui !");
        document.location.href = '<?= $base_url; ?>monitoring_hasil_penugasan';
    </script>
<?php
}
?>