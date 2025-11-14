
<header class="app-header" style="background-color: #a8dadc;">
    <nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-xl-block">
                <a href="index.php" class="text-nowrap nav-link">
                    <img src="../dist/images/logos/logo.png" class="dark-logo" width="180" alt="logo" />
                    <img src="../dist/images/logos/logo.png" class="light-logo" width="180" alt="logo" />
                </a>
            </li>
        </ul>
        <div class="d-block d-xl-none">
            <a href="index.php" class="text-nowrap nav-link">
                <img src="../dist/images/logos/logo.png" width="180" alt="logo" />
            </a>
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)"
                    class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="../dist/images/profile/user-1.jpg" class="rounded-circle" width="35"
                                        height="35" alt="user" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="../dist/images/profile/user-1.jpg" class="rounded-circle" width="80"
                                        height="80" alt="user" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">
                                            <?php echo isset($_SESSION["nm_user"]) ? $_SESSION["nm_user"] : 'Guest'; ?>
                                        </h5>
                                        <span class="mb-1 d-block text-dark">
                                            Admin
                                        </span>
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i>
                                            <?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : 'email not set'; ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-grid py-4 px-7 pt-8">
                                    <a href="profile.php" class="btn btn-outline-primary mb-2">Profile</a>
                                    <a href="logout.php" class="btn btn-outline-danger">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>