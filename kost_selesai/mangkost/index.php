<?php
session_start();
include "koneksi.php";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $login = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email' AND password =
'$password'");
    $jml_login = mysqli_num_rows($login);
    if ($jml_login === 1) {
        $row_login = mysqli_fetch_assoc($login);
        $_SESSION["login"] = true;
        $_SESSION["nm_user"] = $row_login["nm_user"];
        $_SESSION["telp"] = $row_login["telp"];
        $_SESSION["email"] = $row_login["email"];
        $_SESSION["level"] = $row_login["level"];
        if ($row_login["level"] == 1) {
            header("Location: admin/index.php");
        } else if ($row_login["level"] == 2) {
            header("Location: kost/index.php");
        } else if ($row_login["level"] == 3) {
            header("Location: user/index.php");
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Mangkost | Login</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mangkost" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="dist/images/logos/favicon.ico" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="dist/css/style.min.css" />
</head>

<body style="background-color: #a8dadc;">
    <!-- Preloader -->
    <div class="preloader">
        <img src="dist/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->

    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data- sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-
center justify-content-center">

            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">

                                <a href="index.php" class="text-nowrap logo-img text-center mb-2 d-
block w-100">

                                    <img src="dist/images/logos/logo.png" width="180" alt="logo">
                                </a>
                                <hr>
                                <h5 class="mb-4 text-center">Login Aplikasi</h5>
                                <form target="" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>

                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            required>

                                    </div>
                                    <?php if (isset($error)) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Warning...!</strong> Username atau Password SALAH.
                                        </div>
                                    <?php } ?>

                                    <div class="d-flex align-items-center justify-content-between mb-4">

                                        <a class="fw-medium" href="#"></a>
                                        <a class="text-primary fw-medium" href="register.php">Register</a>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Log In</button>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">Copyright &copy; Mangkost |

                                            2024</p>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Import Js Files -->
    <script src="dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- core files -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.horizontal.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.js"></script>
    <!-- current page js files -->
    <script src="dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
</body>

</html>