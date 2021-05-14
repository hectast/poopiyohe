<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <?php
        if ($akses !== 2) {
    ?>
    <ul class="nav mr-auto">
        <li class="nav-item dropdown mt-1">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" title="Ganti Peran" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fe fe-refresh-cw"></i><span class="d-none d-md-inline"> Ganti Peran</span>
            </a>
            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdownMenuLink">
                <?php
                    if ($akses === 1) {
                        if (!isset($_GET['views_monitoring'])) {
                        ?>
                            <a class="dropdown-item" href="<?= $base_url ;?>beranda_monitoring">Ke Monitoring</a>
                        <?php 
                        }
                    }

                    if (mysqli_num_rows($rslt_getDataKetua) > 0) {
                        if (!isset($_GET['views_ketua'])) {
                        ?>
                            <a class="dropdown-item" href="<?= $base_url ;?>beranda_ketua">Ke Ketua</a>
                        <?php 
                        }
                    }

                    if (mysqli_num_rows($rslt_getDataAnggota) > 0) {
                        if (!isset($_GET['views_anggota'])) {
                        ?>
                            <a class="dropdown-item" href="<?= $base_url ;?>beranda_anggota">Ke Anggota</a>
                        <?php 
                        }
                    }

                    if (mysqli_num_rows($rslt_getDataDalnis) > 0) {
                        if (!isset($_GET['views_dalnis'])) {
                        ?>
                            <a class="dropdown-item" href="<?= $base_url ;?>beranda_dalnis">Ke Dalnis</a>
                        <?php 
                        }
                    }
                    
                    if (!mysqli_num_rows($rslt_getDataKetua) > 0 && !mysqli_num_rows($rslt_getDataAnggota) && !mysqli_num_rows($rslt_getDataDalnis)) { // monitoring
                        ?>
                            <button class="dropdown-item" disabled>--Tidak ada peran lain--</button>
                        <?php 
                    } else if (!mysqli_num_rows($rslt_getDataAnggota) && !mysqli_num_rows($rslt_getDataDalnis) && $akses !== 2) { // ketua
                        ?>
                            <button class="dropdown-item" disabled>--Tidak ada peran lain--</button>
                        <?php 
                    } else if (!mysqli_num_rows($rslt_getDataDalnis) && $akses !== 2 && !mysqli_num_rows($rslt_getDataKetua) > 0) { // anggota
                        ?>
                            <button class="dropdown-item" disabled>--Tidak ada peran lain--</button>
                        <?php 
                    } else if ($akses !== 2 && !mysqli_num_rows($rslt_getDataKetua) > 0 && !mysqli_num_rows($rslt_getDataAnggota)) { // dalnis
                        ?>
                            <button class="dropdown-item" disabled>--Tidak ada peran lain--</button>
                        <?php 
                    }
                ?>
            </div>
          </li>
    </ul>
    <?php
        }
    ?>
    <ul class="nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="<?= $base_url ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                    <small class="text-dark ml-1 d-none d-md-inline"><strong><?= $_SESSION['nama'] ?></strong></small>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?= $base_url; ?>app/logout.php" onclick="return confirm('Yakin keluar dari halaman ini ?')">Keluar</a>
            </div>
        </li>
    </ul>
</nav>