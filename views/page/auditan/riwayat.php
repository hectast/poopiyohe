<?php
function tgl_indo($tanggal)
{
    $bulan = array(
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

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
$sql_rekomendasi = "SELECT * FROM rekomendasi WHERE id_rekomendasi='{$_GET['id']}'";
$stmt_rekomendasi = $mysqli->prepare($sql_rekomendasi);
$stmt_rekomendasi->execute();
$result_rekomendasi = $stmt_rekomendasi->get_result();
$row_rekomendasi = $result_rekomendasi->fetch_object();

if (mysqli_num_rows($result_rekomendasi) > 0) {

?>
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url; ?>auditan_cek_tl/<?= $_GET['tm'] ?>/<?= $_GET['id'] ?>" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-12">
                                <div class="card-header">
                                    <strong class="card-title">Riwayat Tindak Lanjut </strong>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="dataTable-1">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Uraian TL</th>
                                                <th>Nominal TL</th>
                                                <th>File</th>
                                                <th>Tanggal Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $x = 1;
                                            $y = 1;
                                            $query = $mysqli->query("SELECT * FROM history_tl WHERE id_rekomendasi = '$_GET[id]' AND id_tl='$_GET[tl]'");
                                            while ($row_tl = $query->fetch_assoc()) {
                                            ?>

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row_tl['uraian_tl'] ?></td>
                                                    <td>Rp. <?= number_format($row_tl['nominal_tl']) ?></td>
                                                    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#file<?=$x++?>"><i class="fe fe-file-text"></i> File Bukti</button></td>
                                                    <td><?= tgl_indo($row_tl['tgl_kirim']) ?></td>
                                                </tr>
                                                <div class="modal fade" id="file<?=$y++?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-12 text-center">
                                                                        <h5><i class="fe fe-file-text"></i> Bukti Tindak Lanjut</h5>
                                                                    </div>
                                                                </div>
                                                                <?php

                                                                ?>
                                                                <object data="<?= $base_url ?>assets/uploads/tindak_lanjut/<?= $row_tl['file_tl']; ?>" width="100%" height="600"></object>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
}
?>