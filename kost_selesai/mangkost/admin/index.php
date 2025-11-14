<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['level'] != 1) {
    header("Location: logout.php");
    exit;
}
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Mangkost - Dashboard</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mangkost" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="../dist/images/logos/favicon.ico" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="../dist/css/style.min.css" />
</head>

<body style="background-color: #a8dadc;">

    <!-- Preloader -->
    <?php include "theme-preload.php" ?>
    <!-- Body Wrapper -->

    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Header Start -->
        <?php include "theme-header.php" ?>
        <!-- Header End -->

        <!-- Sidebar Start -->
        <?php include "theme-menu.php" ?>
        <!-- Sidebar End -->

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">
                <!--  Owl carousel -->
                <div class="owl-carousel counter-carousel owl-theme">
                    <div class="item">
                        <div class="card border-0 zoom-in bg-light-primary shadow-none">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="../dist/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="" />
                                    <p class="fw-semibold fs-3 text-primary mb-1"> Employees </p>
                                    <h5 class="fw-semibold text-primary mb-0">96</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 zoom-in bg-light-warning shadow-none">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="../dist/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="" />
                                    <p class="fw-semibold fs-3 text-warning mb-1">Clients</p>
                                    <h5 class="fw-semibold text-warning mb-0">3,650</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 zoom-in bg-light-info shadow-none">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="../dist/images/svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="" />
                                    <p class="fw-semibold fs-3 text-info mb-1">Projects</p>
                                    <h5 class="fw-semibold text-info mb-0">356</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 zoom-in bg-light-danger shadow-none">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="../dist/images/svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="" />
                                    <p class="fw-semibold fs-3 text-danger mb-1">Events</p>
                                    <h5 class="fw-semibold text-danger mb-0">696</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 zoom-in bg-light-success shadow-none">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="../dist/images/svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="" />
                                    <p class="fw-semibold fs-3 text-success mb-1">Payroll</p>
                                    <h5 class="fw-semibold text-success mb-0">$96k</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 zoom-in bg-light-info shadow-none">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="../dist/images/svgs/icon-connect.svg" width="50" height="50" class="mb-3" alt="" />
                                    <p class="fw-semibold fs-3 text-info mb-1">Reports</p>
                                    <h5 class="fw-semibold text-info mb-0">59</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Row 1 -->
                <div class="row">
                    <!-- Employee Salary -->
                    <div class="col-lg-4 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div>
                                    <h5 class="card-title fw-semibold mb-1">Employee Salary</h5>
                                    <p class="card-subtitle mb-0">Every month</p>
                                    <div id="salary" class="mb-7 pb-8"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light-primary rounded me-8 p-8 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-grid-dots text-primary fs-6"></i>
                                            </div>
                                            <div>
                                                <p class="fs-3 mb-0 fw-normal">Salary</p>
                                                <h6 class="fw-semibold text-dark fs-4 mb-0">$36,358</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded me-8 p-8 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-grid-dots text-muted fs-6"></i>
                                            </div>
                                            <div>
                                                <p class="fs-3 mb-0 fw-normal">Profit</p>
                                                <h6 class="fw-semibold text-dark fs-4 mb-0">$5,296</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top Performers -->
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Top Performers</h5>
                                        <p class="card-subtitle mb-0">Best Employees</p>
                                    </div>
                                    <div>
                                        <select class="form-select">
                                            <option value="1">March 2023</option>
                                            <option value="2">April 2023</option>
                                            <option value="3">May 2023</option>
                                            <option value="4">June 2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle text-nowrap mb-0">
                                        <thead>
                                            <tr class="text-muted fw-semibold">
                                                <th scope="col" class="ps-0">Assigned</th>
                                                <th scope="col">Project</th>
                                                <th scope="col">Priority</th>
                                                <th scope="col">Budget</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border-top">
                                            <tr>
                                                <td class="ps-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 pe-1">
                                                            <img src="../dist/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="" />
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                                            <p class="fs-2 mb-0 text-muted">Web Designer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 fs-3">Elite Admin</p>
                                                </td>
                                                <td>
                                                    <span class="badge fw-semibold py-1 w-85 bg-light-primary text-primary">Low</span>
                                                </td>
                                                <td>
                                                    <p class="fs-3 text-dark mb-0">$3.9K</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 pe-1">
                                                            <img src="../dist/images/profile/user-2.jpg" class="rounded-circle" width="40" height="40" alt="" />
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-1">John Deo</h6>
                                                            <p class="fs-2 mb-0 text-muted"> Web Developer </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 fs-3">Flexy Admin</p>
                                                </td>
                                                <td>
                                                    <span class="badge fw-semibold py-1 w-85 bg-light-warning text-warning">Medium</span>
                                                </td>
                                                <td>
                                                    <p class="fs-3 text-dark mb-0">$24.5K</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 pe-1">
                                                            <img src="../dist/images/profile/user-3.jpg" class="rounded-circle" width="40" height="40" alt="" />
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                                            <p class="fs-2 mb-0 text-muted">Web Manager</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 fs-3">Material Pro</p>
                                                </td>
                                                <td>
                                                    <span class="badge fw-semibold py-1 w-85 bg-light-info text-info">High</span>
                                                </td>
                                                <td>
                                                    <p class="fs-3 text-dark mb-0">$12.8K</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 pe-1">
                                                            <img src="../dist/images/profile/user-4.jpg" class="rounded-circle" width="40" height="40" alt="" />
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-1">Yuvraj Sheth</h6>
                                                            <p class="fs-2 mb-0 text-muted"> Project Manager </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 fs-3">Xtreme Admin</p>
                                                </td>
                                                <td>
                                                    <span class="badge fw-semibold py-1 w-85 bg-light-success text-success">Low</span>
                                                </td>
                                                <td>
                                                    <p class="fs-3 text-dark mb-0">$4.8K</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-0 ps-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 pe-1">
                                                            <img src="../dist/images/profile/user-5.jpg" class="rounded-circle" width="40" height="40" alt="" />
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-1">Micheal Doe</h6>
                                                            <p class="fs-2 mb-0 text-muted"> Content Writer </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-0">
                                                    <p class="mb-0 fs-3">Helping Hands WP Theme</p>
                                                </td>
                                                <td class="border-0">
                                                    <span class="badge fw-semibold py-1 w-85 bg-light-danger text-danger">High</span>
                                                </td>
                                                <td class="border-0">
                                                    <p class="fs-3 text-dark mb-0">$9.3K</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <!-- theme setting -->

    <!-- end theme setting -->
    <!-- Import Js Files -->
    <script src="../dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- core files -->
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.horizontal.init.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>

    <script src="../dist/js/custom.js"></script>
    <!-- current page js files -->
    <script src="../dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../dist/js/dashboard.js"></script>
</body>

</html>