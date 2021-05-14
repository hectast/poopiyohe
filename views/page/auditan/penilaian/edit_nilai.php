<?php
include 'app/controllers/auditan/daftar_temuan/post.php';
$id_penugasan = $_GET['id'];
?>

<main role="main" class="main-content">
    <div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <h2 class="page-title"><a href="<?= $base_url; ?>penilaian"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">

          

<div class="col-md-12">
    <div class="card shadow mb-12">
        <div class="card-header">
            <strong class="card-title"><?= $page; ?></strong>
        </div>
        <div class="card-body">
                                <?php
                                $query = $mysqli->query("SELECT * FROM penugasan WHERE id_penugasan = '$id_penugasan'");
                                $sql = $query->fetch_assoc();
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
           
       
    </div> <!--  .card -->
</div> <!-- .col-8 -->


            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
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
                                <form action="<?= $base_url ?>penilaian" method="POST">
                                <input type="hidden" value="<?= $id_penugasan; ?>" name="id_penugasan">
                                <table class="table">
                                    <tr>
                                        <td colspan="3" class="bg-primary text-white">Tahap Persiapan</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td width="5%">No</td>
                                        <td width="70%">Pertanyaan</td>
                                        <td>Nilai (1-100)</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dalam hal permintaan layanan (konsultasi, bimbingan teknis, pengawasan intern lainnya), Tim BPKP memberikan informasi persyaratan yang lengkap dan sesuai dengan ketentuan</td>
                                        <td>
                                        <input type="number" name="q1" class="form-control" value="<?= $r_nilai['q1']; ?>" max="100" min="1">              
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dalam hal pemenuhan data, Tim BPKP meminta data yang relevan dengan penugasanya (tidak menyimpang)</td>
                                        <td>
                                        <input type="number" name="q2" class="form-control" value="<?= $r_nilai['q2']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>BPKP merespon dengan cepat permintaan layanan dari unit kerja Bapak/Ibu (surat jawaban diterbitkan paling lambat 5 hari kerja setelah permintaan diterima)</td>
                                        <td>
                                        <input type="number" name="q3" class="form-control" value="<?= $r_nilai['q3']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Dalam pelaksanaan penugasan, tim BPKP mematuhi tarif perjalanan dinas sesuai MoU/KAK maupun StSaudarar Biaya Masukan (SBM)</td>
                                        <td>
                                        <input type="number" name="q4" class="form-control" value="<?= $r_nilai['q4']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-primary text-white">Tahap Pelaksanaan</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td width="5%">No</td>
                                        <td width="70%">Pertanyaan</td>
                                        <td>Nilai (1-100)</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dalam pelaksanaan tugasnya, Tim BPKP menggunakan metodologi yang tepat dan sesuai dengan jadwal penugasan</td>
                                        <td>
                                        <input type="number" name="q5" class="form-control" value="<?= $r_nilai['q5']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tiap permasalahan yang ditemukan, Tim BPKP dapat mengidentifikasi akar penyebab permasalahan yang hakiki dan/atau risiko paling besar yang dapat menghambat pencapaian tujuan program/kegiatan Saudara</td>
                                        <td>
                                        <input type="number" name="q6" class="form-control" value="<?= $r_nilai['q6']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Selama ditugaskan di unit kerja Bapak/Ibu, Tim BPKP hanya melakukan kegiatan yang relevan dan menjaga kerahasiaan informasi penting yang diperolehnya terkait dengan penugasannya</td>
                                        <td>
                                        <input type="number" name="q7" class="form-control" value="<?= $r_nilai['q7']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Tim BPKP memiliki kompetensi (skill & knowledge) terkait penugasannya serta pemahaman yang cukup tentang bisnis proses, tugas pokok dan fungsi, lingkup kegiatan unit kerja Saudara</td>
                                        <td>
                                        <input type="number" name="q8" class="form-control" value="<?= $r_nilai['q8']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Tim BPKP mampu berkomunikasi secara nyaman dan efektif, baik lisan maupun tertulis </td>
                                        <td>
                                        <input type="number" name="q9" class="form-control" value="<?= $r_nilai['q9']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Sarana prasarana yang digunakan dan penampilan Tim BPKP telah sesuai dengan ketentuan</td>
                                        <td>
                                        <input type="number" name="q10" class="form-control" value="<?= $r_nilai['q10']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Tim BPKP bersikap dan berperilaku sopan dalam berinteraksi dan memberikan kenyamanan dalam bermitra</td>
                                        <td>
                                        <input type="number" name="q11" class="form-control" value="<?= $r_nilai['q11']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Tim BPKP bersikap fair, independen dan objektif dalam mengungkapkan permasalahan dalam penugasasan</td>
                                        <td>
                                        <input type="number" name="q12" class="form-control" value="<?= $r_nilai['q12']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td> Tim BPKP secara kolektif maupun individu mampu menjaga independensi dan obyektifitas dalam pelaksanaan tugas serta tidak menerima pemberian lainnya yang tidak sesuai ketentuan (gratifikasi)</td>
                                        <td>
                                        <input type="number" name="q13" class="form-control" value="<?= $r_nilai['q13']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Dalam melakukan penugasan, Tim BPKP bekerja secara kompak dan terstruktur</td>
                                        <td>
                                        <input type="number" name="q14" class="form-control" value="<?= $r_nilai['q14']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white" colspan="3">Tahap Penyelesaian</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td width="5%">No</td>
                                        <td width="70%">Pertanyaan</td>
                                        <td>Nilai (1-100)</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td> Tim BPKP memberikan solusi atas permasalahan yang dihadapi unit kerja terkait penugasan </td>
                                        <td>
                                        <input type="number" name="q15" class="form-control" value="<?= $r_nilai['q15']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tim BPKP melakukan klarifikasi dan melakukan pembahasan hasil pengawasan untuk memperoleh tanggapan, masukan, dan saran dari unit kerja Saudara</td>
                                        <td>
                                        <input type="number" name="q16" class="form-control" value="<?= $r_nilai['q16']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Tim BPKP memiliki kemampuan untuk memberikan simpulan/solusi atas masalah yang dihadapi K/L atau unit kerja Bapak/Ibu terkait dengan penugasan dengan didukung dengan argumentasi dan bukti pendukung yang cukup, valid, dan akurat</td>
                                        <td>
                                        <input type="number" name="q17" class="form-control" value="<?= $r_nilai['q17']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Laporan yang diterbitkan BPKP menarik, ringkas, jelas, dan informatif</td>
                                        <td>
                                        <input type="number" name="q18" class="form-control" value="<?= $r_nilai['q18']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Hasil pengawasan Tim BPKP memberikan manfaat untuk perbaikan bagi unit kerja Saudara </td>
                                        <td>
                                        <input type="number" name="q19" class="form-control" value="<?= $r_nilai['q19']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kemudahan akses (kemudahan dihubungi lewat telepon, surat, email, kunjungan, atau media lainnya) untuk mendapatkan pelayanan (termasuk penanganan keluhan) dari Tim BPKP </td>
                                        <td>
                                        <input type="number" name="q20" class="form-control" value="<?= $r_nilai['q20']; ?>" max="100" min="1">
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" name="edit_nilai" class="btn-block btn btn-primary"><i class="fe fe-send"></i> Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</main> <!-- main -->   