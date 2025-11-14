<?php
session_start();

// Redirect if not logged in or user level is not 1 (admin)
if (!isset($_SESSION['login']) || $_SESSION['level'] != 1) {
    header("Location: logout.php");
    exit;
}

include '../koneksi.php';

// Fetch kost data and associated user information
$result_kost = mysqli_query($conn, "SELECT K.*, U.nm_user FROM tbl_kost K, tbl_user U WHERE K.id_user = U.id_user");
$jml_kost = mysqli_num_rows($result_kost);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Mangkost - Data Kost</title>
    
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
    
    <!-- Data Table -->
    <link rel="stylesheet" href="../dist/js/datatable/css/dataTables.bootstrap5.min.css">
    
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
                
                <!-- Card for Data Kost Header -->
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-1">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Data Kost</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Data Kost</li>
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
                
                <!-- Table Section -->
                <section class="datatables">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-subtitle mb-3">Silahkan mengelola data Kost dibawah ini...!</p>
                                    <div class="mb-3">
                                        <a href="kost_tambah.php" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah Data</a>
                                    </div>
                                    
                                    <?php if ($jml_kost < 1) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            Data masih kosong, silahkan menambahkan data pada tombol <b>Tambah Data</b> diatas...!
                                        </div>
                                    <?php } else { ?>
                                        <div class="table-responsive">
                                            <table id="example2" class="table border table-bordered text-nowrap table-hover" style="width: 100%">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Nama Kost</th>
                                                        <th>Alamat</th>
                                                        <th>Fasilitas</th>
                                                        <th>Foto</th>
                                                        <th>User</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row_kost = mysqli_fetch_assoc($result_kost)) { ?>
                                                        <tr>
                                                            <td>
                                                                <a href="kos_edit.php?id=<?php echo $row_kost["id_kost"] ?>" class="btn btn-sm btn-success"><i class="ti ti-pencil"></i> Edit</a>
                                                                <a href="kos_hapus.php?id=<?php echo $row_kost["id_kost"] ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini...?')"><i class="ti ti-trash"></i> Hapus</a>
                                                            </td>
                                                            <td>
                                                                <?php if ($row_kost["status"] == 1) { ?>
                                                                    <span class="badge bg-light-primary text-primary">Aktif</span>
                                                                <?php } else if ($row_kost["status"] == 0) { ?>
                                                                    <span class="badge bg-light-danger text-danger">Tidak Aktif</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo $row_kost["nm_kost"] ?></td>
                                                            <td><?php echo $row_kost["alamat"] ?></td>
                                                            <td><?php echo $row_kost["fasilitas"] ?></td>
                                                            <td>
                                                                <img src="../dist/images/images/<?php echo $row_kost["foto"] ?>" alt="kost" width="50">
                                                            </td>
                                                            <td><?php echo $row_kost["nm_user"] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot class="table-success">
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Nama Kost</th>
                                                        <th>Alamat</th>
                                                        <th>Fasilitas</th>
                                                        <th>Foto</th>
                                                        <th>User</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    <?php } ?>
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

    <!-- Data Table Js Files -->
    <script src="../dist/js/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/datatable/js/dataTables.bootstrap5.min.js"></script>

    <!-- Data Table Initialization -->
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                pageLength: 20,
                buttons: ['copy', 'excel', 'pdf', 'print'],
                order: [5, 'asc'],
                scrollX: true
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

</body>

</html>
