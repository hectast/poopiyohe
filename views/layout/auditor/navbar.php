<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="assets/img/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                    <small class="text-dark ml-1"><strong><?= $_SESSION['email']; ?></strong></small>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <!-- <a class="dropdown-item" href="#">Profil</a> -->
                <a class="dropdown-item" href="app/logout.php">Keluar</a>
            </div>
        </li>
    </ul>
</nav>