

<?php
$jp = $_POST['jenis_penugasan'];
$tw = $_POST['tgl_awal'];
$ta = $_POST['tgl_akhir'];
// Require composer autoload
require_once  'vendor/autoload.php';
// Create an instance of the class:
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
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'orientation' => 'L'
]);




$html = '
<div style="text-align:center;">
<h3>REKAPITULASI TPB BIDWAS IPP</h3>
</div>
<table border="1" style="border-collapse:collapse; width:100%;" cellpadding="8">
<thead>
<tr>
    <td rowspan="2">No</td>
    <td rowspan="2">Tahun</td>
    <td colspan="2">Rekomendasi</td>
    <td colspan="3">Tindak Lanjut</td>
    <td colspan="3">Saldo</td>
</tr>
<tr>
    <td>Kj</td>
    <td>Nilai (Rp. )</td>
    <td>Kj</td>
    <td>%</td>
    <td>Nilai (Rp. )</td>
    <td>Kj</td>
    <td>%</td>
    <td>Nilai (Rp. )</td>
</tr>
</thead>
    <tbody>
';
$nomor = 1;
if ($_POST['jenis_penugasan'] == 'Audit' || $_POST['jenis_penugasan'] == 'Verifikasi' || $_POST['jenis_penugasan'] == 'Evaluasi' || $_POST['jenis_penugasan'] == 'Review' || $_POST['jenis_penugasan'] == 'Monitoring' || $_POST['jenis_penugasan'] == 'Asistensi') {
    $query  = $mysqli->query("SELECT *, count(data_rekomendasi.id_rekomendasi) AS ttl FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan JOIN data_rekomendasi ON data_rekomendasi.id_temuan = temuan.id_temuan WHERE jenis_penugasan = '$_POST[jenis_penugasan]' AND jenisnominal = 'Rupiah' AND tgl_laporan BETWEEN '$_POST[tgl_awal]' and '$_POST[tgl_akhir]' GROUP BY YEAR(tgl_laporan)");
} else {
    $query  = $mysqli->query("SELECT *, count(data_rekomendasi.id_rekomendasi) AS ttl FROM penugasan JOIN temuan ON penugasan.id_penugasan = temuan.id_penugasan JOIN data_rekomendasi ON data_rekomendasi.id_temuan = temuan.id_temuan WHERE jenis_penugasan != 'Audit' AND jenis_penugasan != 'Verifikasi' AND jenis_penugasan != 'Evaluasi' AND jenis_penugasan != 'Review' AND jenis_penugasan != 'Monitoring' AND jenis_penugasan != 'Asistensi' AND jenisnominal = 'Rupiah' AND tgl_laporan BETWEEN '$_POST[tgl_awal]' and '$_POST[tgl_akhir]' GROUP BY YEAR(tgl_laporan)");
}
while ($row = $query->fetch_assoc()) {
    $thn =  date("Y", strtotime($row['tgl_laporan']));
    // batas td
    $kejadian_rekom = $row['ttl'];
    $k_rekom[] = $row['ttl'];
    // batas td
    $query_kg = $mysqli->query("SELECT sum(isirupiah) AS ttl FROM temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE year(tgl_laporan) = '$thn' AND penugasan.jenis_penugasan = '$row[jenis_penugasan]'");
    while ($rw_kg = $query_kg->fetch_assoc()) {
        $nilai_rekom = $rw_kg['ttl'];
        $n_rekom[] = $rw_kg['ttl'];
    }
    // batas td
    $query_kg_tl = $mysqli->query("SELECT *, count(data_rekomendasi.id_rekomendasi) AS ttl FROM data_rekomendasi JOIN temuan ON data_rekomendasi.id_temuan = temuan.id_temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.jenis_penugasan = '$row[jenis_penugasan]' AND data_rekomendasi.status ='Tuntas' AND year(tgl_laporan) = '$thn'");
    $rw_tl = $query_kg_tl->fetch_assoc();
    $kejadian_tl = $rw_tl['ttl'];
    $k_tl[] = $rw_tl['ttl'];
    // batas td
    $persen_tl = 0;
    $persen_tl = ($kejadian_tl / $kejadian_rekom) * 100;
    // batas td
    $query_tl = $mysqli->query("SELECT *, sum(tindak_lanjut.nominal_tl) AS ttl FROM tindak_lanjut JOIN data_rekomendasi ON tindak_lanjut.id_rekomendasi = data_rekomendasi.id_rekomendasi JOIN temuan ON data_rekomendasi.id_temuan = temuan.id_temuan JOIN penugasan ON penugasan.id_penugasan = temuan.id_penugasan WHERE penugasan.jenis_penugasan = '$row[jenis_penugasan]' AND data_rekomendasi.status = 'Tuntas' AND year(tgl_laporan) = '$thn'");
    $rw_tln = $query_tl->fetch_assoc();
    $nilai_tl = $rw_tln['ttl'];
    $n_tl[] = $rw_tln['ttl'];
    // batas td
    $kejadian_saldo = 0;
    $kejadian_saldo = $kejadian_rekom - $kejadian_tl;
    $k_saldo[] = $kejadian_saldo;
    // batas td
    $persen_saldo = 0;
    $persen_saldo = ($kejadian_saldo / $kejadian_rekom) * 100;
    // batas td
    $nilai_saldo = 0;
    $nilai_saldo = $nilai_rekom - $nilai_tl;
    $n_saldo[] = $nilai_saldo;
    // batas td

    $html .= '
    <tr>
        <td>' . $nomor++ . '</td>
        <td>' . $thn . '</td>
        <td>' . $kejadian_rekom . '</td>
        <td>Rp. ' . number_format($nilai_rekom) . '</td>
        <td>' . $kejadian_tl . '</td>
        <td>' . round($persen_tl, 2) . ' %</td>
        <td>Rp. ' . number_format($nilai_tl) . '</td>
        <td>' . $kejadian_saldo . '</td>
        <td>' .  round($persen_saldo, 2) . ' %</td>
        <td>Rp. '. number_format($nilai_saldo) . '</td>

    </tr>
';
}
// batas td
$jmlh_k_rekom = array_sum($k_rekom);
// batas td
$jmlh_n_rekom = array_sum($n_rekom);
// batas td
$jmlh_k_tl = array_sum($k_tl);
// batas td
$jmlh_n_tl = array_sum($n_tl);
// batas td
$jmlh_k_saldo = array_sum($k_saldo);
// batas td
$jmlh_n_saldo = array_sum($n_saldo);
$html .= '
<tr>
    <td colspan="2">Total</td>
    <td>'.$jmlh_k_rekom.'</td>
    <td>Rp. '.number_format($jmlh_n_rekom).'</td>
    <td>'.$jmlh_k_tl.'</td>
    <td>'. round(($jmlh_k_tl / $jmlh_k_rekom)*100,2) .' %</td>
    <td>Rp. '.number_format($jmlh_n_tl).'</td>
    <td>'.$jmlh_k_saldo.'</td>
    <td>'. round(($jmlh_k_saldo / $jmlh_k_rekom)*100,2) .' %</td>
    <td>Rp. '.number_format($jmlh_n_saldo).'</td>
</tr>
</tbody>
</table>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
