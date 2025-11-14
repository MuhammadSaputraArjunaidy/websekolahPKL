<?php
session_start();

// Redirect if not logged in or user level is not 1 (admin)
if (!isset($_SESSION['login']) || $_SESSION['level'] != 1) {
    header("Location: logout.php");
    exit;
}

include '../koneksi.php';

// Get the ID from the query string
$id_user = $_GET["id"];
$result_user = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user = '$id_user'");
$row_user = mysqli_fetch_assoc($result_user);

// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $nm_user = $_POST['nm_user'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];  // Getting the level from the form submission

    // Update data in database
    $edit = mysqli_query($conn, "UPDATE tbl_user SET nm_user = '$nm_user', telp = '$telp', email = '$email', password = '$password', level = '$level' WHERE id_user = '$id_user'");

    // Check if the update was successful
    if ($edit) {
        echo "<script>
                alert('Data user berhasil diedit!');
                window.location.href = 'user.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal diedit');
                window.location.href = 'user-edit.php?id=$id_user';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manguser - Edit Data User</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Manguser" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" type="image/png" href="../dist/images/logos/favicon.ico" />
    <link rel="stylesheet" href="../dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
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
                
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-1">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Edit Data User</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a class="text-muted" href="user.php">Data User</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Edit Data User</li>
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
                
                <section class="datatables">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-subtitle mb-3">Silahkan Edit Data User pada form dibawah ini...!</p>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="nm_user" class="form-label">Nama :</label>
                                            <input type="text" class="form-control" name="nm_user" id="nm_user"
                                                value="<?php echo $row_user['nm_user']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email :</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="<?php echo $row_user['email']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telp" class="form-label">Telpon :</label>
                                            <input type="text" class="form-control" name="telp" id="telp"
                                                value="<?php echo $row_user['telp']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password :</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="<?php echo $row_user['password']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Level :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="level" id="level03"
                                                    value="3" <?php if ($row_user['level'] == 3) { echo "checked"; } ?>>
                                                <label class="form-check-label" for="level03">User</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="level" id="level02"
                                                    value="2" <?php if ($row_user['level'] == 2) { echo "checked"; } ?>>
                                                <label class="form-check-label" for="level02">Kost</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="level" id="level01"
                                                    value="1" <?php if ($row_user['level'] == 1) { echo "checked"; } ?>>
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
        
        <div class="dark-transparent sidebartoggler"></div>
    </div>

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
