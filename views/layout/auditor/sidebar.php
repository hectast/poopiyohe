<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                    </g>
                </svg>
            </a>
        </div>

        <?php
            if ($akses === 1 && isset($_GET['views_monitoring'])) {
        ?>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <div class="nav-heading text-center mb-1">
                    <div class="avatar avatar-lg mb-3">
                        <img src="<?= $base_url ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <span><?= $_SESSION['nama']; ?></span>
                </div>
                <div class="nav-heading text-center mb-1 badge badge-secondary">
                    <span>Monitoring</span>
                </div>
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>beranda_monitoring">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">Beranda</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>monitoring_data_penugasan">
                        <i class="fe fe-briefcase fe-16"></i>
                        <span class="ml-3 item-text">Data Penugasan</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>monitoring_tindak_lanjut">
                        <i class="fe fe-corner-down-right fe-16"></i>
                        <span class="ml-3 item-text">Tindak Lanjut</span>
                    </a>
                </li>
            </ul>
        <?php
            } else if ($akses === 2) {
        ?>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <div class="nav-heading text-center mb-1">
                    <div class="avatar avatar-lg mb-3">
                        <img src="<?= $base_url ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <span><?= $_SESSION['nama']; ?></span>
                </div>
                <div class="nav-heading text-center mb-1 badge badge-secondary">
                    <span>Koordinator Pengawas</span>
                </div>
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>beranda_korwas">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">Beranda</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>korwas_data_penugasan">
                        <i class="fe fe-briefcase fe-16"></i>
                        <span class="ml-3 item-text">Data Penugasan</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>korwas_hasil_penugasan">
                        <i class="fe fe-file-text fe-16"></i>
                        <span class="ml-3 item-text">Hasil Penugasan</span>
                    </a>
                </li>
            </ul>
        <?php
            } else if (mysqli_num_rows($rslt_getDataKetua) > 0 && isset($_GET['views_ketua'])) {
                $peranKetua = $rowKetua['peran'];
        ?>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <div class="nav-heading text-center mb-1">
                        <div class="avatar avatar-lg mb-3">
                            <img src="<?= $base_url ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <span><?= $_SESSION['nama']; ?></span>
                    </div>
                    <div class="nav-heading text-center mb-1 badge badge-secondary">
                        <span><?= $peranKetua; ?></span>
                    </div>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>beranda_ketua">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>ketua_data_penugasan">
                            <i class="fe fe-briefcase fe-16"></i>
                            <span class="ml-3 item-text">Data Penugasan</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>ketua_hasil_penugasan">
                            <i class="fe fe-file-text fe-16"></i>
                            <span class="ml-3 item-text">Hasil Penugasan</span>
                        </a>
                    </li>
                </ul>
        <?php            
            } else if (mysqli_num_rows($rslt_getDataAnggota) > 0 && isset($_GET['views_anggota'])) {
                $peranAnggota = $rowAnggota['peran'];
        ?>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <div class="nav-heading text-center mb-1">
                        <div class="avatar avatar-lg mb-3">
                            <img src="<?= $base_url ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <span><?= $_SESSION['nama']; ?></span>
                    </div>
                    <div class="nav-heading text-center mb-1 badge badge-secondary">
                        <span><?= $peranAnggota; ?></span>
                    </div>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>beranda_anggota">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>anggota_data_penugasan">
                            <i class="fe fe-briefcase fe-16"></i>
                            <span class="ml-3 item-text">Data Penugasan</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>anggota_hasil_penugasan">
                            <i class="fe fe-file-text fe-16"></i>
                            <span class="ml-3 item-text">Hasil Penugasan</span>
                        </a>
                    </li>
                </ul>
        <?php
            } else if (mysqli_num_rows($rslt_getDataDalnis) > 0 && isset($_GET['views_dalnis'])) {
                $peranDalnis = $rowDalnis['peran'];
        ?>

                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <div class="nav-heading text-center mb-1">
                        <div class="avatar avatar-lg mb-3">
                            <img src="<?= $base_url ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <span><?= $_SESSION['nama']; ?></span>
                    </div>
                    <div class="nav-heading text-center mb-1 badge badge-secondary">
                        <span><?= $peranDalnis; ?></span>
                    </div>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>beranda_dalnis">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>dalnis_data_penugasan">
                            <i class="fe fe-briefcase fe-16"></i>
                            <span class="ml-3 item-text">Data Penugasan</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>dalnis_hasil_penugasan">
                            <i class="fe fe-file-text fe-16"></i>
                            <span class="ml-3 item-text">Hasil Penugasan</span>
                        </a>
                    </li>
                </ul>
        <?php
            } else {
        ?>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= $base_url; ?>beranda_auditor">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Beranda</span>
                        </a>
                    </li>
                </ul>
        <?php
            }
        ?>

    </nav>
</aside>