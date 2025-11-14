<?php
session_start();

// Redirect if not logged in or user level is not 1 (admin)
if (!isset($_SESSION['login']) || $_SESSION['level'] != 1) {
    header("Location: logout.php");
    exit;
}

include '../koneksi.php';

// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $id_user = $_POST['id_user'];
    $nm_user = $_POST['nm_user'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = date('level');


    // Upload photo
    move_uploaded_file($tmp_foto, '../dist/images/images/' . $foto);

    // Insert data into database
    $simpan = mysqli_query($conn, "INSERT INTO tbl_user VALUES(NULL, '$id_user', '$nm_user', '$alamat', '$fasilitas', '$foto', '$status', '$tgl')");

    // Check if insertion is successful
    if ($simpan) {
        echo "<script>
                alert('Data user berhasil disimpan!');
                window.location.href = 'user.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal disimpan');
                window.location.href = 'user_tambah.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Manguser - Tambah Data user</title>

    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Manguser" />
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
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Header Start -->
        <?php include "theme-header.php" ?>
        <!-- Header End -->

        <!-- Sidebar Start -->
        <?php include "theme-menu.php" ?>
        <!-- Sidebar End -->

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">

                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-1">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Tambah Data User</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="index.php">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a class="text-muted" href="user.php">Data user</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Tambah Data user</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <section class="datatables">
                    <!-- basic table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-subtitle mb-3">Silahkan menambahkan Data User Baru pada form dibawah
                                        ini...!</p>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="nm_user" class="form-label">Nama :</label>
                                            <input type="text" class="form-control" name="nm_user" id="nm_user"
                                                placeholder="Nama Lengkap dengan Gelar" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email :</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email Aktif Anda" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telp" class="form-label">Telpon :</label>
                                            <input type="text" class="form-control" name="telp" id="telp"
                                                placeholder="Telpon Aktif Whatsapp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username :</label>
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="Username Anda" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password :</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Password Anda" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Level :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="level" id="level03"
                                                    value="3" checked>
                                                <label class="form-check-label" for="level03">User</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="level" id="level02"
                                                    value="2">
                                                <label class="form-check-label" for="level02">Kost</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="level" id="level01"
                                                    value="1">
                                                <label class="form-check-label" for="level01">Admin</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary me-1" name="submit"><i
                                                    class="ti ti-device-floppy"></i> Simpan</button>
                                            <a href="user.php" class="btn btn-secondary"><i
                                                    class="ti ti-arrow-left"></i> Cancel</a><br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Sidebar Toggle -->
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <!-- Theme Setting -->
    <!-- end theme setting -->

    <!-- Import Js Files -->
    <script src="../dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.horizontal.init.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.js"></script>

</body>

</html>