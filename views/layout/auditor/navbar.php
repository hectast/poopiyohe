<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="<?= $base_url ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                    <small class="text-dark ml-1"><strong><?= $_SESSION['nama'] ?></strong></small>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?php
                    if ($akses === 1) {
                ?>
                        <a class="dropdown-item" href="<?= isset($_GET['views_monitoring']) ? $base_url.'beranda_auditor' : $base_url.'beranda_monitoring'; ?>"><?= isset($_GET['views_monitoring']) ? 'Ke Halaman Utama' : 'Ke Monitoring'; ?></a>
                <?php
                    }
                ?>
                <a class="dropdown-item" href="<?= $base_url; ?>app/logout.php">Keluar</a>
            </div>
        </li>
    </ul>
</nav>