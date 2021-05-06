<?php
$sql = "SELECT * FROM rekomendasi WHERE id_rekomendasi='{$_GET['id']}'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_object();

if (mysqli_num_rows($result) > 0) {

    $sql_data_rekomendasi = $mysqli->prepare("SELECT * FROM data_rekomendasi WHERE id_rekomendasi='$row->id_rekomendasi'");
    $sql_data_rekomendasi->execute();
    $result_data_rekomendasi = $sql_data_rekomendasi->get_result();
    $row_data_rekomendasi = $result_data_rekomendasi->fetch_object();

    $sql_temuan = $mysqli->prepare("SELECT * FROM temuan WHERE id_temuan='$row_data_rekomendasi->id_temuan'");
    $sql_temuan->execute();
    $result_data_temuan = $sql_temuan->get_result();
    $row_data_temuan = $result_data_temuan->fetch_object();

    include 'app/controllers/auditan/tindak_lanjut/post.php';
?>

    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><a href="<?= $base_url; ?>detail_temuan/<?= $row_data_temuan->id_penugasan; ?>" style="text-decoration: none;"><i class="fe fe-arrow-left-circle"></i></a> <?= $page; ?></h2>
                </div>
            </div>
            <div class="row justify-content-center mt-4">

                <div class="col-md-8">

                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_temuan" value="<?= $row_data_rekomendasi->id_temuan; ?>">
                                <input type="hidden" name="id_rekomendasi" value="<?= $row_data_rekomendasi->id_rekomendasi; ?>">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4>Temuan <?= $_GET['tm']; ?></h4>
                                    </div>
                                </div>
                                <div class="border-bottom mb-3"></div>
                                <?php
                                $query_cek = $mysqli->query("SELECT * FROM temuan WHERE id_temuan ='$row_data_temuan->id_temuan'");
                                $cek = $query_cek->fetch_assoc();
                                $nonrp = $cek['jenisnominal'];

                                if($nonrp == "Non Rupiah"){

                                }else{
                                ?>
                                <div class="row">
                                    <div class="col-md-6">                                    
                                        <div class="form-group">
                                            <label>Nilai Awal Temuan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" name="" value="<?= number_format($row_data_temuan->isirupiah); ?>" type="text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">                                    
                                        <div class="form-group">
                                            <label>Saldo</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control"  value="<?= number_format($row_data_temuan->saldo); ?>" type="text" disabled>
                                                <input type="hidden" name="saldo" value="<?= $row_data_temuan->saldo;?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label>Rekomendasi/Saran/Atensi</label>
                                    <input type="text" class="form-control mb-2" value="<?= $row->rekomendasi; ?>" disabled>
                                </div>
                                <div id="tindakArea">
                                    <div class="form-group">
                                        <label>Uraian TL</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" name="uraian_tl[]" type="text">
                                            <div class="input-group-append">
                                                <button type="button" id="TindakAdd" class="btn btn-link"><i class="fe fe-plus-circle fe-16"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if ($nonrp != "Non Rupiah") {
                                    ?>
                                        <div class="form-group">
                                            <label>Nominal TL</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" name="nominal_tl[]" oninvalid="this.setCustomValidity('Nominal Melebihi Saldo (Rp. <?= number_format($cek['saldo']) ?>)')" max="<?= $cek['saldo'] ?>" type="number">
                                                <small></small>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label>Upload Bukti</label>
                                        <input type="file" name="filebukti[]" class="form-control-file">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <button type="submit" name="tindak_lanjut" class="btn btn-primary btn-block">Kirim Tindak Lanjut</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <script src="<?= $base_url; ?>assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let i = 0;
            $('#TindakAdd').click(function(e) {
                e.preventDefault();
                // n++;
                const html = `<div id="appendTindak">
                                <div class="border-top mb-3"></div>
                                <div class="form-group">                                
                                    <label>Uraian TL</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" name="uraian_tl[]" type="text">
                                        <div class="input-group-append">
                                            <button type="button" id="TindakRemove" class="btn btn-link text-danger"><i class="fe fe-minus-circle fe-16"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($nonrp != "Non Rupiah") : ?>
                                <div class="form-group">                                
                                    <label>Nominal TL</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input class="form-control input-money" name="nominal_tl[]" type="text">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label>Upload Bukti</label>
                                    <input type="file" class="form-control-file" name="filebukti[]">
                                </div>
                            </div>`;
                $('#tindakArea').append(html);
                // console.log("test");
                // i++;
            });
            $('#tindakArea').on('click', '#TindakRemove', function(e) {
                e.preventDefault();
                // const kondisiGroup = $('#kondisiGroup');
                // $('#sebabGroup:last-child').remove();
                // $('#formArea'+(n-1)+'').remove();
                // $(this).remove();
                // i--;
                // console.log($(this).parent().parent());
                console.log($(this).parent().parent().parent().parent().remove());
            });
            // console.log(n++);
        });
    </script>
<?php
} else {
?>
    <script>
        alert("tidak ditemukan!");
    </script>
<?php
}
?>