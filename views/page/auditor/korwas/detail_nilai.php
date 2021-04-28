<?php
include 'app/controllers/auditor/korwas/hasil_penugasan/post.php';
$id_penugasan = $_GET['id'];
?>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><a href="<?= $base_url ?>beranda_korwas"><i class="fe fe-arrow-left-circle"></i> </a><?= $page; ?></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-12">
                            <div class="card-header">
                                <strong class="card-title"><?= $page ?></strong>
                            </div>
                            <div class="card-body">
                                <?php
                                $query = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan = '$id_penugasan'");
                                $sql = $query->fetch_assoc();
                                $in = $sql['auditan_in'];
                                $opd =  $sql['auditan_opd'];
                                if (isset($in)) {
                                    $instansi = $sql['auditan_in'];
                                    $query_in = $mysqli->query("SELECT * FROM instansi_vertikal WHERE id ='$instansi'");
                                    $row_in = $query_in->fetch_assoc();
                                ?>
                                    <h4><?= $row_in['nama_instansi']; ?></h4>
                            

                                <?php
                                }
                                if (isset($opd)) {
                                    $instansi = $sql['auditan_opd'];
                                    $query_opd = $mysqli->query("SELECT * FROM opd WHERE id ='$instansi'");
                                    $row_opd = $query_opd->fetch_assoc();
                                ?>
                                    <h4><?= $row_opd['nama_instansi'] ?></h4>
                                    <h5><?= $row_opd['nama_pemda'] ?></h5><br>
                                    
                                <?php

                                }

                                ?>

                                <table class="table">
                                    <tr>
                                        <td>No. ST</td>
                                        <td>:</td>
                                        <td><?= $sql['no_st']; ?></td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td>Tanggal ST</td>
                                        <td>:</td>
                                        <td><?= tgl_indo($sql['tgl_st']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Penugasan</td>
                                        <td>:</td>
                                        <td><?= $sql['uraian_penugasan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>TIM BPKP</td>
                                        <td>:</td>
                                        <td> <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#defaultModal"><i class="fe fe-users"></i> </button></td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="defaultModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row border-top border-bottom p-2 bg-light ">
                                                        <div class="col-6">
                                                            Nama
                                                        </div>
                                                        <div class="col-6">
                                                            Peran
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $query2 = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id_penugasan = '$id_penugasan'");
                                                    while ($row2 = mysqli_fetch_assoc($query2)) {
                                                    ?>
                                                        <div class="row mt-2 p-2 border-bottom">
                                                            <div class="col-6">
                                                                <?php
                                                                $nama_auditor = $row2['id'];
                                                                $query3 = $mysqli->query("SELECT * FROM auditor WHERE id = '$nama_auditor'");
                                                                $row_auditor = mysqli_fetch_assoc($query3);
                                                                echo $row_auditor['nama'];
                                                                ?>
                                                            </div>
                                                            <div class="col-6">
                                                                <?= $row2['peran']; ?>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-12">
                            <div class="card-header">
                                <strong class="card-title">Jawaban</strong>
                            </div>
                            <div class="card-body">
                                <?php
                                $query_nilai = $mysqli->query("SELECT * FROM penilaian WHERE id_penugasan = '$id_penugasan'");
                                $r_nilai = $query_nilai->fetch_assoc();
                                ?>
                                <table class="table">
                                    <tr>
                                        <td colspan="3" class="bg-primary text-white">Tahap Persiapan</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td width="5%">No</td>
                                        <td width="70%">Pertanyaan</td>
                                        <td>Jawaban</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dalam hal permintaan layanan (konsultasi, bimbingan teknis, pengawasan intern lainnya), Tim BPKP memberikan informasi persyaratan yang lengkap dan sesuai dengan ketentuan</td>
                                        <td><?= $r_nilai['q1']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dalam hal pemenuhan data, Tim BPKP meminta data yang relevan dengan penugasanya (tidak menyimpang)</td>
                                        <td><?= $r_nilai['q2']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>BPKP merespon dengan cepat permintaan layanan dari unit kerja Bapak/Ibu (surat jawaban diterbitkan paling lambat 5 hari kerja setelah permintaan diterima)</td>
                                        <td><?= $r_nilai['q3']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Dalam pelaksanaan penugasan, tim BPKP mematuhi tarif perjalanan dinas sesuai MoU/KAK maupun StSaudarar Biaya Masukan (SBM)</td>
                                        <td><?= $r_nilai['q4']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-primary text-white">Tahap Pelaksanaan</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td width="5%">No</td>
                                        <td width="70%">Pertanyaan</td>
                                        <td>Jawaban</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dalam pelaksanaan tugasnya, Tim BPKP menggunakan metodologi yang tepat dan sesuai dengan jadwal penugasan</td>
                                        <td><?= $r_nilai['q5'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tiap permasalahan yang ditemukan, Tim BPKP dapat mengidentifikasi akar penyebab permasalahan yang hakiki dan/atau risiko paling besar yang dapat menghambat pencapaian tujuan program/kegiatan Saudara</td>
                                        <td><?= $r_nilai['q6'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Selama ditugaskan di unit kerja Bapak/Ibu, Tim BPKP hanya melakukan kegiatan yang relevan dan menjaga kerahasiaan informasi penting yang diperolehnya terkait dengan penugasannya</td>
                                        <td><?= $r_nilai['q7'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Tim BPKP memiliki kompetensi (skill & knowledge) terkait penugasannya serta pemahaman yang cukup tentang bisnis proses, tugas pokok dan fungsi, lingkup kegiatan unit kerja Saudara</td>
                                        <td><?= $r_nilai['q8'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Tim BPKP mampu berkomunikasi secara nyaman dan efektif, baik lisan maupun tertulis </td>
                                        <td><?= $r_nilai['q9'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Sarana prasarana yang digunakan dan penampilan Tim BPKP telah sesuai dengan ketentuan</td>
                                        <td><?= $r_nilai['q10'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Tim BPKP bersikap dan berperilaku sopan dalam berinteraksi dan memberikan kenyamanan dalam bermitra</td>
                                        <td><?= $r_nilai['q11'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Tim BPKP bersikap fair, independen dan objektif dalam mengungkapkan permasalahan dalam penugasasan</td>
                                        <td><?= $r_nilai['q12'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td> Tim BPKP secara kolektif maupun individu mampu menjaga independensi dan obyektifitas dalam pelaksanaan tugas serta tidak menerima pemberian lainnya yang tidak sesuai ketentuan (gratifikasi)</td>
                                        <td><?= $r_nilai['q13'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Dalam melakukan penugasan, Tim BPKP bekerja secara kompak dan terstruktur</td>
                                        <td><?= $r_nilai['q14'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white" colspan="3">Tahap Penyelesaian</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td width="5%">No</td>
                                        <td width="70%">Pertanyaan</td>
                                        <td>Jawaban</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td> Tim BPKP memberikan solusi atas permasalahan yang dihadapi unit kerja terkait penugasan </td>
                                        <td><?= $r_nilai['q15'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tim BPKP melakukan klarifikasi dan melakukan pembahasan hasil pengawasan untuk memperoleh tanggapan, masukan, dan saran dari unit kerja Saudara</td>
                                        <td><?= $r_nilai['q16'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Tim BPKP memiliki kemampuan untuk memberikan simpulan/solusi atas masalah yang dihadapi K/L atau unit kerja Bapak/Ibu terkait dengan penugasan dengan didukung dengan argumentasi dan bukti pendukung yang cukup, valid, dan akurat</td>
                                        <td><?= $r_nilai['q17'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Laporan yang diterbitkan BPKP menarik, ringkas, jelas, dan informatif</td>
                                        <td><?= $r_nilai['q18'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Hasil pengawasan Tim BPKP memberikan manfaat untuk perbaikan bagi unit kerja Saudara </td>
                                        <td><?= $r_nilai['q19'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kemudahan akses (kemudahan dihubungi lewat telepon, surat, email, kunjungan, atau media lainnya) untuk mendapatkan pelayanan (termasuk penanganan keluhan) dari Tim BPKP </td>
                                        <td><?= $r_nilai['q20'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</main> <!-- main -->