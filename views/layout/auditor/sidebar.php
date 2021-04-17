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
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>beranda_monitoring">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">Beranda</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="<?= $base_url; ?>monitoring_hasil_penugasan">
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
                
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Menu</span>
                </p>
        
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#ketuaTim" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-circle fe-16"></i>
                            <span class="ml-3 item-text">Ketua Tim</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ketuaTim">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url; ?>hasil_penugasan">
                                    <span class="ml-3 item-text">Hasil Penugasan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#anggotaTim" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-circle fe-16"></i>
                            <span class="ml-3 item-text">Anggota Tim</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="anggotaTim">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url; ?>hasil_penugasan">
                                    <span class="ml-3 item-text">Hasil Penugasan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#dalnis" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-circle fe-16"></i>
                            <span class="ml-3 item-text">Dalnis</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="dalnis">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url; ?>hasil_penugasan">
                                    <span class="ml-3 item-text">Hasil Penugasan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        <?php
            }
        ?>

    </nav>
</aside>