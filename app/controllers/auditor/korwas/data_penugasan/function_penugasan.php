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
function tampil_data($mysqli)
{
    $querx = "SELECT * FROM penugasan ORDER BY id_penugasan DESC";
    $result = $mysqli->query($querx);
    while ($row = mysqli_fetch_assoc($result)) {
        $tkn = 'sam_san_tech)';
        $id = $row['id_penugasan'];
        $token = md5("$tkn:$id");
?>
        <tr>
            <td><?= $row['no_st'] ?></td>
            <td><?= tgl_indo($row['tgl_st']); ?></td>
            <td>
                <?php
                $instansi_vertikal = $row['auditan_in'];
                $opede             = $row['auditan_opd'];

                if (empty($instansi_vertikal)) {
                    $result_opede = $mysqli->query("SELECT * FROM opd WHERE id = '$opede'");
                    $row_opede = mysqli_fetch_assoc($result_opede);
                    echo $row_opede['nama_instansi'];
                    echo " - ";
                    echo $row_opede['nama_pemda'];
                }
                if (empty($opede)) {
                    $result_vertikal = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id = '$instansi_vertikal'");
                    $row_vertikal = mysqli_fetch_assoc($result_vertikal);
                    echo $row_vertikal['nama_instansi'];
                }


                ?>
            </td>
            <td><?= $row['uraian_penugasan']; ?></td>
            <td><?= $row['jenis_penugasan'] ?></td>
            <td><?= $row['pkpt'] ?> , <?= $row['kf1'] ?> , <?= $row['d1'] ?></td>
            <td>
                <?php
                if ($row['status'] == 'Tuntas') {
                ?>
                    <small class="badge badge-success text-light"><?= $row['status']; ?></small>
                <?php
                } else if ($row['status'] == 'Tuntas Sebagian') {
                ?>
                    <small class="badge badge-warning text-light"><?= $row['status']; ?></small>
                <?php
                } else if ($row['status'] == 'Belum Tuntas') {
                ?>
                    <small class="badge badge-danger text-light"><?= $row['status']; ?></small>
                <?php
                } else {
                ?>
                    <small class="badge badge-danger text-light">Belum TL</small>
                <?php
                }
                ?>
            </td>
            <td>
                <button class="btn btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-settings"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <form action="korwas_lihat_penugasan" method="post">
                        <input type="hidden" name="id_lihat" value="<?= $row['id_penugasan']; ?>">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <button name="lihat_data" class="dropdown-item"> <i class="fe fe-search"></i> Lihat Detail</button>

                    </form>
                    <form action="korwas_edit_penugasan" method="post">
                        <input type="hidden" name="id_lihat" value="<?= $row['id_penugasan']; ?>">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <button name="edit_data" class="dropdown-item"><i class="fe fe-edit"></i> Ubah</button>
                    </form>
                    <form action="korwas_data_penugasan" method="post">
                        <input type="hidden" name="id_lihat" value="<?= $row['id_penugasan']; ?>">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <button name="hapus_data" class="dropdown-item" onclick="return confirm('Anda Yakin Menghapus Data Ini?')"><i class="fe fe-trash"></i> Hapus</button>
                    </form>

                </div>
            </td>
        </tr>
    <?php
    }
}
function tampil_data_auditor($mysqli)
{
    $r_auditor = $mysqli->query("SELECT * FROM auditor");
    while ($auditor = mysqli_fetch_assoc($r_auditor)) {
    ?>
        <option value="<?= $auditor['id'] ?>"><?= $auditor['nama'] ?></option>
    <?php
    }
}
function detail($id_tampil, $mysqli)
{

    $query = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan = '$id_tampil'");
    $row = mysqli_fetch_assoc($query);
    ?>
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
                        <td><?= $row['no_st'] ?></td>
                    </tr>
                    <tr>
                        <td>Tgl.ST</td>
                        <td>:</td>
                        <td><?= tgl_indo($row['tgl_st']) ?></td>
                    </tr>
                    <tr>
                        <td>Uraian Penugasan</td>
                        <td>:</td>
                        <td><?= $row['uraian_penugasan'] ?></td>
                    </tr>

                    <tr>
                        <td>Jenis Penugasan</td>
                        <td>:</td>
                        <td><?= $row['jenis_penugasan'] ?></td>
                    </tr>
                    <tr>
                        <td>Auditan</td>
                        <td>:</td>
                        <td>
                            <?php
                            if (empty($row['auditan_in'])) {
                                $au2 = $row['auditan_opd'];
                                $opd2 = $mysqli->query("SELECT * FROM opd WHERE id='$au2'");
                                $r_opd = mysqli_fetch_assoc($opd2);
                                echo $r_opd['nama_instansi'];
                                echo ' - ';
                                echo $r_opd['nama_pemda'];
                            } else {
                                $au = $row['auditan_in'];
                                $iv = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id='$au'");
                                $r_iv = mysqli_fetch_assoc($iv);
                                echo $r_iv['nama_instansi'];
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?= $row['pkpt'] ?> , <?= $row['kf1'] ?> , <?= $row['d1'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                        <?php
                        if ($row['status'] == 'Tuntas') {
                        ?>
                            <small class="badge badge-success text-light"><?= $row['status']; ?></small>
                        <?php
                        } else if ($row['status'] == 'Tuntas Sebagian') {
                        ?>
                            <small class="badge badge-warning text-light"><?= $row['status']; ?></small>
                        <?php
                        } else if ($row['status'] == 'Belum Tuntas') {
                        ?>
                            <small class="badge badge-danger text-light"><?= $row['status']; ?></small>
                        <?php
                        } else {
                        ?>
                            <small class="badge badge-danger text-light">Belum TL</small>
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
                        $query2 = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id_penugasan = '$row[id_penugasan]'");
                        while ($row2 = mysqli_fetch_assoc($query2)) {
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    $nama_auditor = $row2['id'];
                                    $query3 = $mysqli->query("SELECT * FROM auditor WHERE id = '$nama_auditor'");
                                    $row_auditor = mysqli_fetch_assoc($query3);
                                    echo $row_auditor['nama'];
                                    ?>
                                </td>
                                <td><?= $row2['peran']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php
}
function hapus_data($id, $mysqli)
{
    $delete = $mysqli->prepare("DELETE FROM penugasan WHERE id_penugasan ='{$id}'");
    $delete->execute();

    $delete2 = $mysqli->prepare("DELETE FROM penugasan_auditor WHERE id_penugasan ='{$id}'");
    $delete2->execute();

    $stmt_baktl = $mysqli->prepare("SELECT * FROM baktl WHERE id_penugasan='{$id}'");
    $stmt_baktl->execute();
    $rslt_baktl = $stmt_baktl->get_result();
    $rws_baktl = $rslt_baktl->fetch_object();

    $delete3 = $mysqli->prepare("DELETE FROM baktl WHERE id_baktl='{$rws_baktl->id_baktl}'");
    $delete3->execute();
    unlink("assets/uploads/baktl/$rws_baktl->file_upload");

    $stmt_temuan = $mysqli->prepare("SELECT * FROM temuan WHERE id_penugasan = '{$id}'");
    $stmt_temuan->execute();
    $rslt_temuan = $stmt_temuan->get_result();
    $rws_temuan = $rslt_temuan->fetch_object();

        // // uraian
        // $stmt_dt_uraian = $mysqli->prepare("SELECT * FROM data_uraian WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $stmt_dt_uraian->execute();
        // $rslt_dt_uraian = $stmt_dt_uraian->get_result();
        // $rws_dt_uraian = $rslt_dt_uraian->fetch_object();
        // while ($rws_dt_uraian = $rslt_dt_uraian->fetch_object()) {
        //     $delete_uraian = $mysqli->prepare("DELETE FROM uraian WHERE id_uraian='{$rws_dt_uraian->id_uraian}'");
        //     $delete_uraian->execute();
        // }
        // $delete_dt_uraian = $mysqli->prepare("DELETE FROM data_uraian WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $delete_dt_uraian->execute();

        // // sebab
        // $stmt_dt_sebab = $mysqli->prepare("SELECT * FROM data_sebab WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $stmt_dt_sebab->execute();
        // $rslt_dt_sebab = $stmt_dt_sebab->get_result();
        // while ($rws_dt_sebab = $rslt_dt_sebab->fetch_object()) {
        //     $delete_sebab = $mysqli->prepare("DELETE FROM sebab WHERE id_sebab='{$rws_dt_sebab->id_sebab}'");
        //     $delete_sebab->execute();
        // }
        // $delete_dt_sebab = $mysqli->prepare("DELETE FROM data_sebab WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $delete_dt_sebab->execute();

        // // kriteria
        // $stmt_dt_kriteria = $mysqli->prepare("SELECT * FROM data_kriteria WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $stmt_dt_kriteria->execute();
        // $rslt_dt_kriteria = $stmt_dt_kriteria->get_result();
        // while ($rws_dt_kriteria = $rslt_dt_kriteria->fetch_object()) {
        //     $delete_kriteria = $mysqli->prepare("DELETE FROM kriteria WHERE id_kriteria='{$rws_dt_kriteria->id_kriteria}'");
        //     $delete_kriteria->execute();
        // }
        // $delete_dt_kriteria = $mysqli->prepare("DELETE FROM data_kriteria WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $delete_dt_kriteria->execute();

        // // akibat
        // $stmt_dt_akibat = $mysqli->prepare("SELECT * FROM data_akibat WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $stmt_dt_akibat->execute();
        // $rslt_dt_akibat = $stmt_dt_akibat->get_result();
        // while ($rws_dt_akibat = $rslt_dt_akibat->fetch_object()) {
        //     $delete_akibat = $mysqli->prepare("DELETE FROM akibat WHERE id_akibat='{$rws_dt_akibat->id_akibat}'");
        //     $delete_akibat->execute();
        // }
        // $delete_dt_akibat = $mysqli->prepare("DELETE FROM data_akibat WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $delete_dt_akibat->execute();

        // // rekomendasi
        // $stmt_dt_rekomendasi = $mysqli->prepare("SELECT * FROM data_rekomendasi WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $stmt_dt_rekomendasi->execute();
        // $rslt_dt_rekomendasi = $stmt_dt_rekomendasi->get_result();
        // while ($rws_dt_rekomendasi = $rslt_dt_rekomendasi->fetch_object()) {
        //     $delete_rekomendasi = $mysqli->prepare("DELETE FROM rekomendasi WHERE id_rekomendasi='{$rws_dt_rekomendasi->id_rekomendasi}'");
        //     $delete_rekomendasi->execute();
        // }
        // $delete_dt_rekomendasi = $mysqli->prepare("DELETE FROM data_rekomendasi WHERE id_temuan='{$rws_temuan->id_temuan}'");
        // $delete_dt_rekomendasi->execute();

        // tindak lanjut
        $stmt_tl = $mysqli->prepare("SELECT * FROM tindak_lanjut WHERE id_temuan='{$rws_temuan->id_temuan}'");
        $stmt_tl->execute();
        $rslt_tl = $stmt_tl->get_result();
        $rws_tl = $rslt_tl->fetch_object();

        $delete3 = $mysqli->prepare("DELETE FROM tindak_lanjut WHERE id_temuan='{$rws_tl->id_temuan}'");
        $delete3->execute();
        unlink("assets/uploads/tindak_lanjut/$rws_tl->file_tl");

    $delete4 = $mysqli->prepare("DELETE FROM temuan WHERE id_penugasan='{$id}'");
    $delete4->execute();
}
?>