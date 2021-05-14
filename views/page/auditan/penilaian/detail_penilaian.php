<?php
include 'app/controllers/auditan/daftar_temuan/post.php';
$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    $row_penugasan = $result->fetch_assoc();
?>
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #ffffff;
            background-color: #1b68ff;
        }

        .nav-pills .nav-link {
            border-radius: 0.25rem;
        }

        .nav-link {
            display: block;
            padding: 0.5rem 1rem;
            padding: 25px;
        }
    </style>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url?>penilaian"<i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>
          
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
                            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tahap Persiapan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tahap Pelaksanaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tahap Penyelesaian</a>
                                </li>
                            </ul>
                            <?php
                            $cek_nilai = $mysqli->query("SELECT * FROM penilaian WHERE id_penugasan = '{$_GET['id']}'");
                            if(mysqli_num_rows($cek_nilai) <= 0){
                            ?>
                            <form action="" method="POST">
                                <div class="tab-content mb-1" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <table class="table table-hover table-bordered">
                                            <tr class="thead-light">
                                                <th width="1%">No</th>
                                                <th width="65%">Pertanyaan</th>
                                                <th>Nilai (1-100)</th>
                                            </tr>
                                            <tr>
                                                <input type="hidden" value="<?= $_GET['id'] ?>" name="id_penugasan">
                                                <td>1</td>
                                                <td>Dalam hal permintaan layanan (konsultasi, bimbingan teknis, pengawasan intern lainnya), Tim BPKP memberikan informasi persyaratan yang lengkap dan sesuai dengan ketentuan</td>
                                                <td><input type="number" max="100" min="1" name="q1" placeholder="Nilai" class="form-control" id="q1"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Dalam hal pemenuhan data, Tim BPKP meminta data yang relevan dengan penugasanya (tidak menyimpang)</td>
                                                <td><input type="number" max="100" min="1" name="q2" placeholder="Nilai" class="form-control" id="q2"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>BPKP merespon dengan cepat permintaan layanan dari unit kerja Bapak/Ibu (surat jawaban diterbitkan paling lambat 5 hari kerja setelah permintaan diterima)</td>
                                                <td><input type="number" max="100" min="1" name="q3" placeholder="Nilai" class="form-control" id="q3"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Dalam pelaksanaan penugasan, tim BPKP mematuhi tarif perjalanan dinas sesuai MoU/KAK maupun StSaudarar Biaya Masukan (SBM)</td>
                                                <td><input type="number" max="100" min="1" name="q4" placeholder="Nilai" class="form-control" id="q4"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <table class="table table-hover table-bordered">
                                            <tr class="thead-light">
                                                <th width="1%">No</th>
                                                <th width="65%">Pertanyaan</th>
                                                <th>Nilai (1-100)</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Dalam pelaksanaan tugasnya, Tim BPKP menggunakan metodologi yang tepat dan sesuai dengan jadwal penugasan</td>
                                                <td><input type="number" max="100" min="1" name="q5" placeholder="Nilai" class="form-control" id="q5"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tiap permasalahan yang ditemukan, Tim BPKP dapat mengidentifikasi akar penyebab permasalahan yang hakiki dan/atau risiko paling besar yang dapat menghambat pencapaian tujuan program/kegiatan Saudara</td>
                                                <td><input type="number" max="100" min="1" name="q6" placeholder="Nilai" class="form-control" id="q6"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Selama ditugaskan di unit kerja Bapak/Ibu, Tim BPKP hanya melakukan kegiatan yang relevan dan menjaga kerahasiaan informasi penting yang diperolehnya terkait dengan penugasannya</td>
                                                <td><input type="number" max="100" min="1" name="q7" placeholder="Nilai" class="form-control" id="q7"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tim BPKP memiliki kompetensi (skill & knowledge) terkait penugasannya serta pemahaman yang cukup tentang bisnis proses, tugas pokok dan fungsi, lingkup kegiatan unit kerja Saudara</td>
                                                <td><input type="number" max="100" min="1" name="q8" placeholder="Nilai" class="form-control" id="q8"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Tim BPKP mampu berkomunikasi secara nyaman dan efektif, baik lisan maupun tertulis </td>
                                                <td><input type="number" max="100" min="1" name="q9" placeholder="Nilai" class="form-control" id="q9"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Sarana prasarana yang digunakan dan penampilan Tim BPKP telah sesuai dengan ketentuan </td>
                                                <td><input type="number" max="100" min="1" name="q10" placeholder="Nilai" class="form-control" id="q10"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Tim BPKP bersikap dan berperilaku sopan dalam berinteraksi dan memberikan kenyamanan dalam bermitra </td>
                                                <td><input type="number" max="100" min="1" name="q11" placeholder="Nilai" class="form-control" id="q11"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Tim BPKP bersikap fair, independen dan objektif dalam mengungkapkan permasalahan dalam penugasasan </td>
                                                <td><input type="number" max="100" min="1" name="q12" placeholder="Nilai" class="form-control" id="q12"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Tim BPKP secara kolektif maupun individu mampu menjaga independensi dan obyektifitas dalam pelaksanaan tugas serta tidak menerima pemberian lainnya yang tidak sesuai ketentuan (gratifikasi) </td>
                                                <td><input type="number" max="100" min="1" name="q13" placeholder="Nilai" class="form-control" id="q13"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Dalam melakukan penugasan, Tim BPKP bekerja secara kompak dan terstruktur </td>
                                                <td><input type="number" max="100" min="1" name="q14" placeholder="Nilai" class="form-control" id="q14"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <table class="table table-hover table-bordered">
                                            <tr class="thead-light">
                                                <th width="1%">No</th>
                                                <th width="65%">Pertanyaan</th>
                                                <th>Nilai (1-100)</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Tim BPKP memberikan solusi atas permasalahan yang dihadapi unit kerja terkait penugasan </td>
                                                <td><input type="number" max="100" min="1" name="q15" placeholder="Nilai" class="form-control" id="q15"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tim BPKP melakukan klarifikasi dan melakukan pembahasan hasil pengawasan untuk memperoleh tanggapan, masukan, dan saran dari unit kerja Saudara </td>
                                                <td><input type="number" max="100" min="1" name="q16" placeholder="Nilai" class="form-control" id="q16"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tim BPKP memiliki kemampuan untuk memberikan simpulan/solusi atas masalah yang dihadapi K/L atau unit kerja Bapak/Ibu terkait dengan penugasan dengan didukung dengan argumentasi dan bukti pendukung yang cukup, valid, dan akurat</td>
                                                <td><input type="number" max="100" min="1" name="q17" placeholder="Nilai" class="form-control" id="q17"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Laporan yang diterbitkan BPKP menarik, ringkas, jelas, dan informatif</td>
                                                <td><input type="number" max="100" min="1" name="q18" placeholder="Nilai" class="form-control" id="q18"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Hasil pengawasan Tim BPKP memberikan manfaat untuk perbaikan bagi unit kerja Saudara</td>
                                                <td><input type="number" max="100" min="1" name="q19" placeholder="Nilai" class="form-control" id="q19"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Kemudahan akses (kemudahan dihubungi lewat telepon, surat, email, kunjungan, atau media lainnya) untuk mendapatkan pelayanan (termasuk penanganan keluhan) dari Tim BPKP </td>
                                                <td><input type="number" max="100" min="1" name="q20" placeholder="Nilai" class="form-control" id="q20"></td>
                                            </tr>
                                        </table>
                                        <button onclick="return cek_nilai()" type="submit" name="submit_nilai" class="btn btn-block btn-primary"><i class="fe fe-send"></i> Kirim</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            }else{
                                ?>
                                <div class="tab-content mb-1" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> <h1 class="text-center text-white bg-primary p-5"><i class="fe fe-check-circle"></i> Penilaian Sudah Dilakukan</h1></div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> <h1 class="text-center text-white bg-primary p-5"><i class="fe fe-check-circle"></i> Penilaian Sudah Dilakukan</h1></div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> <h1 class="text-center text-white bg-primary p-5"><i class="fe fe-check-circle"></i> Penilaian Sudah Dilakukan</h1></div>
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
    <script>
        function cek_nilai() {
            var q1 = document.getElementById("q1").value;
            var q2 = document.getElementById("q2").value;
            var q3 = document.getElementById("q3").value;
            var q4 = document.getElementById("q4").value;
            var q5 = document.getElementById("q5").value;
            var q6 = document.getElementById("q6").value;
            var q7 = document.getElementById("q7").value;
            var q8 = document.getElementById("q8").value;
            var q8 = document.getElementById("q8").value;
            var q9 = document.getElementById("q9").value;
            var q10 = document.getElementById("q10").value;
            var q11 = document.getElementById("q11").value;
            var q12 = document.getElementById("q12").value;
            var q13 = document.getElementById("q13").value;
            var q14 = document.getElementById("q14").value;
            var q15 = document.getElementById("q15").value;
            var q16 = document.getElementById("q16").value;
            var q17 = document.getElementById("q17").value;
            var q18 = document.getElementById("q18").value;
            var q19 = document.getElementById("q19").value;
            var q20 = document.getElementById("q20").value;
            
            if (q1 == "" || q2 == "" || q3 == "" || q4 == "" || q5 == "" || q6 == "" || q7 == "" || q8 == "" || q9 == "" || q10 == "" || q11 == "" || q12 == "" || q13 == "" || q14 == "" || q15 == "" || q16 == "" || q17 == "" || q18 == "" || q19 == "" || q20 == "") {
                alert("Ada Nilai Yang Belum Diinput");
                return false;
            }
        }
    </script>
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