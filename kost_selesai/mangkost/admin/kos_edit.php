<?php
session_start();

// Redirect if not logged in or user level is not 1 (admin)
if (!isset($_SESSION['login']) || $_SESSION['level'] != 1) {
    header("Location: logout.php");
    exit;
}

include '../koneksi.php';

// Get the ID from the query string
$id_kost = $_GET["id"];
$result_kost = mysqli_query($conn, "SELECT * FROM tbl_kost WHERE id_kost = '$id_kost'");
$row_kost = mysqli_fetch_assoc($result_kost);

// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $id_user = $_POST['id_user'];
    $nm_kost = $_POST['nm_kost'];
    $alamat = $_POST['alamat'];
    $fasilitas = $_POST['fasilitas'];
    $status = $_POST['status'];
    $tgl = date('Y-m-d');
    
    // Handle photo upload
    $foto_lama = $row_kost["foto"];
    if ($_FILES["foto"]["error"] === 4) {
        $foto = $foto_lama; // Use existing photo if no new photo uploaded
    } else {
        $foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp_foto, '../dist/images/images/' . $foto);
    }

    // Update the database
    $edit = mysqli_query($conn, "UPDATE tbl_kost SET id_user = '$id_user', nm_kost = '$nm_kost', alamat = '$alamat', fasilitas = '$fasilitas', foto = '$foto', status = '$status' WHERE id_kost = '$id_kost'");

    // Check if the update was successful
    if ($edit) {
        echo "<script>
                alert('Data kost berhasil diedit!');
                window.location.href = 'kost.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal diedit');
                window.location.href = 'kost-edit.php?id=$id_kost';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Mangkost - Edit Data Kost</title>

    <!-- Required Meta Tags -->
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
                
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-1">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Edit Data Kost</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a class="text-muted" href="kost.php">Data Kost</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Edit Data Kost</li>
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
                                    <p class="card-subtitle mb-3">Silahkan Edit Data Kost Baru pada form dibawah ini...!</p>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <!-- Pemilik Kost -->
                                        <div class="mb-3">
                                            <label for="id_user" class="form-label">Pemilik Kost :</label>
                                            <select class="form-select" name="id_user" id="id_user">
                                                <?php
                                                $result_user = mysqli_query($conn, "SELECT * FROM tbl_user ORDER BY nm_user ASC");
                                                while ($row_user = mysqli_fetch_assoc($result_user)) {
                                                ?>
                                                    <option value="<?php echo $row_user["id_user"] ?>" <?php if ($row_user["id_user"] == $row_kost["id_user"]) { echo "SELECTED"; } ?>>
                                                        <?php echo $row_user["nm_user"] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Nama Kost -->
                                        <div class="mb-3">
                                            <label for="nm_kost" class="form-label">Nama Kost :</label>
                                            <input type="text" value="<?php echo $row_kost["nm_kost"] ?>" class="form-control" name="nm_kost" id="nm_kost" placeholder="Nama Kost" required>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat :</label>
                                            <textarea name="alamat" id="alamat" class="form-control"><?php echo $row_kost["alamat"] ?></textarea>
                                        </div>

                                        <!-- Fasilitas -->
                                        <div class="mb-3">
                                            <label for="fasilitas" class="form-label">Fasilitas :</label>
                                            <textarea name="fasilitas" id="fasilitas" class="form-control"><?php echo $row_kost["fasilitas"] ?></textarea>
                                        </div>

                                        <!-- File Lama -->
                                        <div class="mb-3">
                                            File Lama : <img src="../dist/images/images/<?php echo $row_kost["foto"] ?>" alt="foto" width="100">
                                        </div>

                                        <!-- Upload Foto -->
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Upload Foto :</label>
                                            <input class="form-control" type="file" name="foto" id="foto">
                                            <small class="text-warning">Foto dengan format JPG, JPEG, PNG, dan GIF dengan ukuran maksimal 1 MB</small>
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-3">
                                            <label class="mb-2">Status :</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="status1" value="1" <?php if ($row_kost["status"] == 1) { echo "checked"; } ?>>
                                                <label class="form-check-label" for="status1">Aktif</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="status0" value="0" <?php if ($row_kost["status"] == 0) { echo "checked"; } ?>>
                                                <label class="form-check-label" for="status0">Tidak Aktif</label>
                                            </div>
                                        </div>

                                        <!-- Submit and Cancel -->
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary me-1" name="submit"><i class="ti ti-device-floppy"></i> Simpan</button>
                                            <a href="kost.php" class="btn btn-secondary"><i class="ti ti-arrow-left"></i> Cancel</a><br>
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
