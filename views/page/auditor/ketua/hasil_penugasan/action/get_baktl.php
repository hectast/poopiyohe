<?php
$base_url = "http://localhost/poopiyohe/";

include '../../../../../app/env.php';

$sql_baktl = "SELECT * FROM baktl WHERE id_penugasan = '{$_GET['id']}'";
$stmt_baktl = $mysqli->prepare($sql_baktl);
$stmt_baktl->execute();
$result_baktl = $stmt_baktl->get_result();

if (mysqli_num_rows($result_baktl) > 0) {
    echo "";
?>
    <div class="pb-3 timeline-item item-success">
        <div class="pl-5">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Upload BAKTL</strong>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-success btn-block"><i class="fe fe-check"></i> Berhasil di upload</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
    echo"";
} else {
    echo "";
?>
        <div class="pb-3 timeline-item item-primary">
            <div class="pl-5">
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Upload BAKTL</strong>
                            </div>
                            <div class="card-body">
                                <form id="fupForm" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="id_penugasan" name="id_penugasan" value="<?= $_GET['id']; ?>">
                                    <div class="form-group">
                                        <input type="file" id="file" name="file" class="form-control-file">
                                    </div>
                                    <button type="submit" name="submit_baktl" class="btn btn-outline-primary btn-block submitBtn"><i class="fe fe-save"></i> Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
<?php
    echo"";
}
?>

<?php
?>