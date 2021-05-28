<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2 notifBtn" href="./#" data-toggle="modal" data-target=".modal-notif">
                <span class="dot dot-md bg-success"></span>
                <span class="fe fe-bell fe-16"></span>
                <small class="notifCount"></small>
                <!-- <span class="badge badge-success text-light">2</span> -->
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="<?= $base_url; ?>assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                    <small class="text-dark ml-1"><strong><?= $_SESSION['nama']; ?></strong></small>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <!-- <a class="dropdown-item" href="#">Profil</a> -->
                <a class="dropdown-item" href="<?= $base_url; ?>app/logout.php" onclick="return confirm('Yakin keluar dari halaman ini ?')">Keluar</a>
            </div>
        </li>
    </ul>
</nav>

<div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow-y: auto;">
                <div class="list-group list-group-flush my-n3 notifContent">
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>