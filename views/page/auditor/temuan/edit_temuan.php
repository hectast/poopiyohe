<?php
?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title"><?= $page; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-12">
                    <div class="card-header">
                        <strong class="card-title">Form <?= $page; ?></strong>
                    </div>
                    <div class="card-body">
                    <form action="" method="post">
                       <div class="row">
                           <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>No. ST</label>
                                    <select class="form-control select1" me="nama_pemda" style="width: 100%;">
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
                                    <input type="date"  class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>No. Laporan</label>
                                    <input type="text" class="form-control" placeholder="Otomatis" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="instansi">Tgl. Laporan</label>
                                    <input type="date"  class="form-control">
                                </div>

                           </div>
                           <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="custom-money">Kondisi</label>
                                    <input class="form-control input-money" id="custom-money" type="text" name="money">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="instansi">Kriteria</label>
                                    <input type="text"  class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="instansi">Sebab</label>
                                    <input type="text"  class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="instansi">Akibat</label>
                                    <input type="text"  class="form-control">
                                </div>
                           </div>
                            
                       </div>

                       <div class="row">
                           <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="instansi">Rekomendasi/Saran/Atensi</label>
                                    <input type="number"  class="form-control">
                                </div>
                                <a href="temuan"  class="btn btn-secondary">Kembali</a> 
                                <button type="submit" name="simpan_data" class="btn btn-primary">Simpan Perubahan</button>
                           </div>
                       </div>
                       </form>


                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-4 -->

        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->


