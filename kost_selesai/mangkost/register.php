<?php
include "koneksi.php";
if (isset($_POST["submit"])) {
    $nm_user = $_POST["nm_user"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $konfirmasi_password = $_POST["konfirmasi_password"];
    $level = $_POST["level"];
    if ($password != $konfirmasi_password) {
        echo "<script>alert('Konfirmasi Password Tidak Sama...!');
        document.location.href = 'register.php';</script>";
        return false;
    }
    $simpan = mysqli_query($conn, "INSERT INTO tbl_user VALUES(NULL, '$nm_user', '$telp', '$email',
'$password', '$level')");
    if ($simpan) {
        echo "<script>
                alert('Data berhasil disimpan...!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'register.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Mangkost - Register</title>
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
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.php" class="text-nowrap logo-img text-center mb-2 d-block w-100">
                                    <img src="dist/images/logos/logo.png" width="180" alt="logo">
                                </a>
                                <hr>
                                <h5 class="mb-4 text-center">Register Akun Baru</h5>
                                <form target="" method="post">
                                    <div class="mb-3">
                                        <label for="nm_user" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nm_user" name="nm_user"
                                            placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email Aktif Anda" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telp" class="form-label">Telpon</label>
                                        <input type="text" class="form-control" id="telp" name="telp"
                                            placeholder="Telpon Aktif Whatsapp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Username Anda" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password Anda" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="konfirmasi_password" class="form-control"
                                            id="konfirmasi_password" placeholder="Masukkan Password Anda Lagi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Anda Sebagai :</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="level03"
                                                value="3" checked>
                                            <label class="form-check-label" for="level03">Pencari Kost</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="level02"
                                                value="2">
                                            <label class="form-check-label" for="level02">Pemilik Kost</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div>&nbsp;</div>
                                        <a class="text-primary fw-medium" href="index.php">Log In</a>
                                    </div>
                                    <button type="submit" name="submit"
                                        class="btn btn-primary w-100 py-8 mb-4 rounded-2">Register</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">Copyright &copy; Mangkost | 2024</p>
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