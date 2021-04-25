<?php
include 'app/controllers/auditan/daftar_temuan/post.php';
$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    $row_penugasan = $result->fetch_assoc();


?>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><?= $page; ?></h2>
                </div>
            </div>
            <?php
            if (isset($_SESSION['msg_persiapan'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_persiapan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION['msg_pelaksanaan'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_pelaksanaan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION['msg_selesai'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_selesai'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-12">
                                <div class="card-header">
                                    <strong class="card-title">Data Penugasan</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table ">
                                        <tr>
                                            <td>No. ST</td>
                                            <td>:</td>
                                            <td><?= $row_penugasan['no_st'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal ST</td>
                                            <td>:</td>
                                            <td><?= tgl_indo($row_penugasan['tgl_st']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penugasan</td>
                                            <td>:</td>
                                            <td><?= $row_penugasan['uraian_penugasan'] ?></td>
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
                                                        $query2 = $mysqli->query("SELECT * FROM penugasan_auditor WHERE id_penugasan = '$row_penugasan[id_penugasan]'");
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
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header">
                            <strong>Form Penilaian</strong>
                        </div>
                        <div class="card-body">
                            <?php
                            $query = $mysqli->query("SELECT * FROM penilaian WHERE id_penugasan = '$_GET[id]'");
                            $row_jawaban = mysqli_fetch_assoc($query);
                            $jpersiapan = $row_jawaban['q1'];
                            $jpelaksanaan = $row_jawaban['q5'];
                            $jpenyelesaian = $row_jawaban['q15'];


                            //percabangan ketika tahap persiapan
                            if (empty($jpersiapan)) {
                            ?>
                                <!-- batas head -->
                                <div class="row p-2">
                                    <div class="col-3 mr-2 rounded p-3 bg-primary" style="color: #fff;">
                                        Tahap Persiapan
                                    </div>
                                    <div class="col-3 p-3 mr-2 rounded bg-secondary" style="color: #fff;">
                                        Tahap Pelaksanaan
                                    </div>
                                    <div class="col-3 mr-2 rounded p-3 bg-secondary" style="color: #fff;">
                                        Tahap Penyelesaian
                                    </div>
                                </div>
                                <!-- batas head -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_penugasan" value="<?= $_GET['id'] ?>">
                                            <table class="table table-hover">
                                                <tr class="thead-light">
                                                    <th>No</th>
                                                    <th width="65%">Pertanyaan</th>
                                                    <th>Nilai (1-100)</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Dalam hal permintaan layanan (konsultasi, bimbingan teknis, pengawasan intern lainnya), Tim BPKP memberikan informasi persyaratan yang lengkap dan sesuai dengan ketentuan</td>
                                                    <td><input type="number" max="100" min="1" name="q1" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Dalam hal pemenuhan data, Tim BPKP meminta data yang relevan dengan penugasanya (tidak menyimpang)</td>
                                                    <td><input type="number" max="100" min="1" name="q2" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>BPKP merespon dengan cepat permintaan layanan dari unit kerja Bapak/Ibu (surat jawaban diterbitkan paling lambat 5 hari kerja setelah permintaan diterima)</td>
                                                    <td><input type="number" max="100" min="1" name="q3" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Dalam pelaksanaan penugasan, tim BPKP mematuhi tarif perjalanan dinas sesuai MoU/KAK maupun StSaudarar Biaya Masukan (SBM)</td>
                                                    <td><input type="number" max="100" min="1" name="q4" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                            </table>

                                            <button type="submit" name="persiapan" onclick="return confirm('Anda Yakin?')" class="btn btn-primary btn-block"><i class="fe fe-send"></i> Kirim</button>

                                        </form>
                                    </div>
                                </div>
                            <?php
                            }
                            //batas percabangan ketika tahap persiapan

                            //percabangan ketika tahap pelaksanaan
                            else if (empty($jpelaksanaan) && !empty($jpersiapan)) {
                            ?>
                                <!-- batas head -->
                                <div class="row p-2">
                                    <div class="col-3 mr-2 rounded p-3 bg-success" style="color: #fff;">
                                        Tahap Persiapan
                                    </div>
                                    <div class="col-3 p-3 mr-2 rounded bg-primary" style="color: #fff;">
                                        Tahap Pelaksanaan
                                    </div>
                                    <div class="col-3 mr-2 rounded p-3 bg-secondary" style="color: #fff;">
                                        Tahap Penyelesaian
                                    </div>
                                </div>
                                <!-- batas head -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_penugasan" value="<?= $_GET['id'] ?>">
                                            <table class="table table-hover">
                                                <tr class="thead-light">
                                                    <th>No</th>
                                                    <th width="65%">Pertanyaan</th>
                                                    <th>Nilai (1-100)</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Dalam pelaksanaan tugasnya, Tim BPKP menggunakan metodologi yang tepat dan sesuai dengan jadwal penugasan</td>
                                                    <td><input type="number" max="100" min="1" name="q5" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tiap permasalahan yang ditemukan, Tim BPKP dapat mengidentifikasi akar penyebab permasalahan yang hakiki dan/atau risiko paling besar yang dapat menghambat pencapaian tujuan program/kegiatan Saudara</td>
                                                    <td><input type="number" max="100" min="1" name="q6" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Selama ditugaskan di unit kerja Bapak/Ibu, Tim BPKP hanya melakukan kegiatan yang relevan dan menjaga kerahasiaan informasi penting yang diperolehnya terkait dengan penugasannya</td>
                                                    <td><input type="number" max="100" min="1" name="q7" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Tim BPKP memiliki kompetensi (skill & knowledge) terkait penugasannya serta pemahaman yang cukup tentang bisnis proses, tugas pokok dan fungsi, lingkup kegiatan unit kerja Saudara</td>
                                                    <td><input type="number" max="100" min="1" name="q8" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Tim BPKP mampu berkomunikasi secara nyaman dan efektif, baik lisan maupun tertulis </td>
                                                    <td><input type="number" max="100" min="1" name="q9" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Sarana prasarana yang digunakan dan penampilan Tim BPKP telah sesuai dengan ketentuan </td>
                                                    <td><input type="number" max="100" min="1" name="q10" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Tim BPKP bersikap dan berperilaku sopan dalam berinteraksi dan memberikan kenyamanan dalam bermitra </td>
                                                    <td><input type="number" max="100" min="1" name="q11" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Tim BPKP bersikap fair, independen dan objektif dalam mengungkapkan permasalahan dalam penugasasan </td>
                                                    <td><input type="number" max="100" min="1" name="q12" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Tim BPKP secara kolektif maupun individu mampu menjaga independensi dan obyektifitas dalam pelaksanaan tugas serta tidak menerima pemberian lainnya yang tidak sesuai ketentuan (gratifikasi) </td>
                                                    <td><input type="number" max="100" min="1" name="q13" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Dalam melakukan penugasan, Tim BPKP bekerja secara kompak dan terstruktur </td>
                                                    <td><input type="number" max="100" min="1" name="q14" placeholder="Nilai" class="form-control" required></td>
                                                </tr>                                                                                                                                
                                            </table>

                                            <button type="submit" name="pelaksanaan" onclick="return confirm('Anda Yakin?')" class="btn btn-primary btn-block"><i class="fe fe-send"></i> Kirim</button>

                                        </form>
                                    </div>
                                </div>
                            <?php
                            }
                            //batas percabganan ketika tahap persiapan

                            //percabangan ketika tahap penyelesaian
                            else if (empty($jpenyelesaian) && !empty($jpelaksanaan) && !empty($jpersiapan)) {
                            ?>
                                <!-- batas head -->
                                <div class="row p-2">
                                    <div class="col-3 mr-2 rounded p-3 bg-success" style="color: #fff;">
                                        Tahap Persiapan
                                    </div>
                                    <div class="col-3 p-3 mr-2 rounded bg-success" style="color: #fff;">
                                        Tahap Pelaksanaan
                                    </div>
                                    <div class="col-3 mr-2 rounded p-3 bg-primary" style="color: #fff;">
                                        Tahap Penyelesaian
                                    </div>
                                </div>
                                <!-- batas head -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_penugasan" value="<?= $_GET['id'] ?>">
                                            <table class="table table-hover">
                                                <tr class="thead-light">
                                                    <th>No</th>
                                                    <th width="65%">Pertanyaan</th>
                                                    <th>Nilai (1-100)</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Tim BPKP memberikan solusi atas permasalahan yang dihadapi unit kerja terkait penugasan </td>
                                                    <td><input type="number" max="100" min="1" name="q15" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tim BPKP melakukan klarifikasi dan melakukan pembahasan hasil pengawasan untuk memperoleh tanggapan, masukan, dan saran dari unit kerja Saudara </td>
                                                    <td><input type="number" max="100" min="1" name="q16" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Tim BPKP memiliki kemampuan untuk memberikan simpulan/solusi atas masalah yang dihadapi K/L atau unit kerja Bapak/Ibu terkait dengan penugasan dengan didukung dengan argumentasi dan bukti pendukung yang cukup, valid, dan akurat</td>
                                                    <td><input type="number" max="100" min="1" name="q17" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Laporan yang diterbitkan BPKP menarik, ringkas, jelas, dan informatif</td>
                                                    <td><input type="number" max="100" min="1" name="q18" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Hasil pengawasan Tim BPKP memberikan manfaat untuk perbaikan bagi unit kerja Saudara</td>
                                                    <td><input type="number" max="100" min="1" name="q19" placeholder="Nilai" class="form-control" required></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Kemudahan akses (kemudahan dihubungi lewat telepon, surat, email, kunjungan, atau media lainnya) untuk mendapatkan pelayanan (termasuk penanganan keluhan) dari Tim BPKP </td>
                                                    <td><input type="number" max="100" min="1" name="q20" placeholder="Nilai" class="form-control" required></td>
                                                </tr>                                               
                                            </table>
                                            <button type="submit" name="penyelesaian" onclick="return confirm('Anda Yakin?')" class="btn btn-primary btn-block"><i class="fe fe-send"></i> Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            <?php
                            }
                            //batas percabangan ketika tahap penyelesaian

                            //percabangan ketika penilaian telah selesai
                            else if (!empty($jpenyelesaian) && !empty($jpelaksanaan) && !empty($jpersiapan)) {
                            ?>
                                <div class="row p-2 justify-content-center">
                                    <div class="col-3 mr-2 rounded p-3 bg-success" style="color: #fff;">
                                        Tahap Persiapan
                                    </div>
                                    <div class="col-3 p-3 mr-2 rounded bg-success" style="color: #fff;">
                                        Tahap Pelaksanaan
                                    </div>
                                    <div class="col-3 mr-2 rounded p-3 bg-success" style="color: #fff;">
                                        Tahap Penyelesaian
                                    </div>
                                </div>
                                <div class="row m-5 justify-content-center">
                                    <div class="col-9 text-center">
                                        <h1 class="text-success"><i class="fe fe-check-circle"></i> Penilaian Sudah Dilakukan</h1>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
<?php
} else {
?>
    <script>
        alert("Maaf data tidak diketahui !");
        document.location.href = '<?= $base_url; ?>penilaian';
    </script>

<?php
}
?>