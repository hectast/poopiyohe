<?php
$sql = "SELECT * FROM penugasan WHERE id_penugasan='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
?>
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url; ?>hasil_penugasan" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="timeline">

                        <?php
                        $sql_baktl = "SELECT * FROM baktl WHERE id_penugasan = '{$_GET['id']}'";
                        $stmt_baktl = $mysqli->prepare($sql_baktl);
                        $stmt_baktl->execute();
                        $result_baktl = $stmt_baktl->get_result();

                        $row_baktl = $result_baktl->fetch_assoc();
                        if (mysqli_num_rows($result_baktl) > 0) {
                            $fileBaktl = $row_baktl['file_upload'];
                        }

                        ?>

                        <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
                            <div id="baktl">
                                <div class="pb-3 timeline-item item-success">
                                    <div class="pl-5">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row d-flex align-items-center justify-content-between">
                                                            <div class="col-md-10">
                                                                <strong class="card-title">BAKTL<span class="badge badge-success ml-2">Berhasil di upload</span></strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#modalBaktl" title="Lihat Dokumen"><i class="fe fe-book-open fe-16"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalBaktl" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                    <!-- <div class="modal-header">
                                                    <h5 class="modal-title" id="verticalModalTitle">BAKTL</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div> -->
                                                    <div class="modal-body">
                                                        <div id="contentModalBaktl">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div id="temuan">
                                <div class="pb-3 timeline-item item-primary">
                                    <div class="pl-5">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Temuan</strong>
                                                    </div>
                                                    <div class="card-body">

                                                        <form action="" method="POST">
                                                            <div id="temuanArea">

                                                                <div id="temuanGroup">
                                                                    <h5><u>Temuan 1</u></h5>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-3">
                                                                                <label>No. ST</label>
                                                                                <select class="form-control select1" me="nama_pemda" style="width: 100%;" disabled>
                                                                                    <option>--Pilih No ST--</option>
                                                                                    <option>ST/01/2021/03/23</option>
                                                                                    <option>ST/02/2021/03/23</option>
                                                                                    <option>ST/03/2021/03/23</option>
                                                                                    <option>ST/04/2021/03/23</option>
                                                                                    <option>ST/05/2021/03/23</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="instansi">Tgl. ST</label>
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label>No. Laporan</label>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="instansi">Tgl. Laporan</label>
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div id="kondisiArea">
                                                                                <div class="form-group mb-3" id="kondisiGroup">
                                                                                    <label>Kondisi</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="kondisi" type="text" id="kondisiText">
                                                                                        <div class="input-group-append">
                                                                                            <div class="input-group-text">
                                                                                                <input type="checkbox" id="kondisiCek">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="kriteriaArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Kriteria</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="kriteria[0][]" type="text">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" id="buttonKriteriaAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="sebabArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Sebab</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="sebab[0][]" type="text">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" id="buttonSebabAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="akibatArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Akibat</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="akibat[0][]" type="text">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" id="buttonAkibatAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div id="uraianArea">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Uraian</label>
                                                                                    <div class="input-group">
                                                                                        <input class="form-control" name="uraian[0][]" type="text">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" id="buttonUraianAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group mb-3" id="cekRpNonRp">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="checkbox" id="cekRupiah" name="cekrpnonrp" class="form-check-input" value="Rupiah">
                                                                                    <label class="form-check-label" for="cekRupiah">Rupiah</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="checkbox" id="cekNonRupiah" name="cekrpnonrp" class="form-check-input" value="Non Rupiah">
                                                                                    <label class="form-check-label" for="cekNonRupiah">Non Rupiah</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label>Hal-hal yang perlu di perhatikan <small class="text-danger">* tidak wajib</small></label>
                                                                                <textarea class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" id="addTemuan" class="btn btn-outline-secondary btn-block"><i class="fe fe-plus-circle"></i> Tambah Temuan</button>
                                                                    <button type="submit" name="simpan_data" class="btn btn-outline-primary btn-block"><i class="fe fe-save"></i> Simpan</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div id="baktl">
                                <div class="pb-3 timeline-item item-primary">
                                    <div class="pl-5">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong class="card-title">Upload BAKTL</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <form id="fupForm" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" id="id_penugasan" name="id_penugasan" value="<?= $_GET['id']; ?>">
                                                            <div class="form-group">
                                                                <input type="file" id="file" name="file" class="form-control-file" required>
                                                            </div>
                                                            <button type="submit" name="submit_baktl" class="btn btn-outline-primary btn-block submitBtn"><i class="fe fe-save"></i> Upload</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="<?= $base_url; ?>assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function(e) {

            // Kirim data formulir melalui Ajax 
            $("#fupForm").on('submit', function(e) {
                e.preventDefault()
                $.ajax({
                    url: '<?= $base_url; ?>views/page/auditor/hasil_penugasan/action/submit_baktl.php',
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        document.location.href = '';
                    }
                });
            });

            <?php if (mysqli_num_rows($result_baktl) > 0) : ?>
                const options = {
                    height: "600px",
                    pdfOpenParams: {
                        view: 'Fit'
                    }
                };
                PDFObject.embed("<?= $base_url; ?>assets/uploads/baktl/<?= $fileBaktl; ?>", "#contentModalBaktl", options);
            <?php endif; ?>
        });


        // File type validation
        $("#file").change(function() {
            var file = this.files[0];
            var fileType = file.type;
            var match = ['application/pdf', 'application/msword'];
            if (!((fileType == match[0]) || (fileType == match[1]))) {
                alert('Sorry, only PDF & DOC files are allowed to upload.');
                $("#file").val('');
                return false;
            }
        });
    </script>
<?php
} else {
?>
    <script>
        alert("Maaf data tidak diketahui !");
        document.location.href = '<?= $base_url; ?>hasil_penugasan';
    </script>
<?php
}
?>