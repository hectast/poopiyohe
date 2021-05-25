<?php

if (isset($_GET['id_penugasan'])) {
    include '../../../env.php';

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

    $id_penugasan = $_GET['id_penugasan'];

    $stmt_penugasan = $mysqli->prepare("SELECT * FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan 
                                    JOIN laporan ON penugasan.id_penugasan = laporan.id_penugasan 
                                    WHERE penugasan.id_penugasan = '$id_penugasan'");
    $stmt_penugasan->execute();
    $result_penugasan = $stmt_penugasan->get_result();
    $row_penugasan = $result_penugasan->fetch_object();

    $stmt_iv = $mysqli->prepare("SELECT * FROM instansi_vertikal WHERE id='$row_penugasan->auditan_in'");
    $stmt_iv->execute();
    $result_iv = $stmt_iv->get_result();

    $stmt_opd = $mysqli->prepare("SELECT * FROM opd WHERE id='$row_penugasan->auditan_opd'");
    $stmt_opd->execute();
    $result_opd = $stmt_opd->get_result();
?>
    <html>

    <head>
        <title>Print SP2</title>
        <style>
            body {
                font-family: 'Times New Roman', sans-serif;
            }

            .container {
                width: 80%;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <table border="0" width="100%" style="border-bottom: 2px solid #000;">
                <tr>
                    <td rowspan="2" align="center"><img src="../../../../assets/img/BPKP_Logo.png" alt="logo BPKP" width="100" height="50"></td>
                    <td align="center">
                        <b>
                            BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN
                            PERWAKILAN PROVINSI GORONTALO
                        </b>
                <tr>
                    <td align="center">
                        <small>
                            Jalan By Pass, Kelurahan Tamalate, Kecamatan Kota Timur, Gorontalo 96163 <br>
                            Telepon (0435) 8525999, Faksimile (0435) 8525888 <br>
                            Email: gorontalo@bpkp.go.id
                        </small>
                    </td>
                </tr>
                </td>
                </tr>
            </table>
            <br>
            <table border="0" width="100%">
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>S-/PW31/2/2021</td>
                    <td align="right"><?= tgl_indo(date("Y-m-d")); ?></td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>......</td>
                </tr>
                <tr>
                    <td valign="top">Hal</td>
                    <td valign="top">:</td>
                    <td>
                        Penegasan Kedua atas Temuan Hasil <br>
                        Pengawasan yang Belum Ditindaklanjuti
                    </td>
                </tr>
            </table>
            <br>
            <table border="0" width="100%">
                <tr align="left">
                    <td><b>Kepada Yth.:</b></td>
                </tr>
                <?php
                if (mysqli_num_rows($result_iv) > 0) {
                    $row_iv = $result_iv->fetch_object();
                ?>
                    <tr align="left">
                        <td><b>Pimpinan/Kepala <?= $row_iv->nama_instansi; ?></b></td>
                    </tr>
                    <tr align="left">
                        <td><b>di Gorontalo</b></td>
                    </tr>
                <?php
                } else if (mysqli_num_rows($result_opd) > 0) {
                    $row_opd = $result_opd->fetch_object();
                ?>
                    <tr align="left">
                        <td><b>Pimpinan/Kepala <?= $row_opd->nama_instansi; ?></b></td>
                    </tr>
                    <tr align="left">
                        <td><b>di <?= $row_opd->nama_pemda; ?></b></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <table border="0" width="100%">
                <tr>
                    <td align="justify">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Menunjuk surat kami nomor …. tanggal <?= tgl_indo(date("Y-m-d")); ?> Tentang LHA Nomor: <?= $row_penugasan->no_laporan; ?>
                        tanggal <?= tgl_indo($row_penugasan->tgl_laporan); ?> dan berdasarkan basis data hasil pengawasan Perwakilan BPKP Provinsi Gorontalo, masih terdapat rekomendasi atas temuan pemeriksaan yang belum kami terima tindak lanjutnya sebagaimana terlampir.
                    </td>
                </tr>
                <tr>
                    <td align="justify">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Kami mengharapkan sekiranya Saudara dapat melakukan upaya percepatan pelaksanaan tindak lanjut terkait.
                    </td>
                </tr>
                <tr>
                    <td align="justify">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Apabila terdapat kendala dalam pelaksanaan tindak lanjut tersebut, diharapkan untuk menyampaikannya kepada kami.
                    </td>
                </tr>
                <tr>
                    <td align="justify">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Atas perhatian dan kerjasama yang baik, kami ucapkan terima kasih.
                    </td>
                </tr>
            </table>
            <br>
            <table border="0" width="100%">
                <tr>
                    <td width="67%"></td>
                    <td>
                        <b>Kepala Perwakilan</b><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>Raden Murwantara</b>
                        <br>
                        <b>NIP 19710114 199103 1 011</b>
                    </td>
                </tr>
            </table>
        </div>
        <script>
            window.print();
        </script>
    </body>

    </html>
<?php
}
?>