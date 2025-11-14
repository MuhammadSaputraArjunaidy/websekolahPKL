<?php
// Make sure to include your database connection file.
// Assuming your koneksi.php is in the parent directory (e.g., if this file is in 'admin/user-data.php')
include "../koneksi.php"; // Adjust path if necessary
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mangkost - Data User</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mangkost" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="../dist/images/logos/favicon.ico" />
    <link rel="stylesheet" href="../dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../dist/js/datatable/css/dataTables.bootstrap5.min.css">
    <link id="themeColors" rel="stylesheet" href="../dist/css/style.min.css" />
</head>

<body style="background-color: #a8dadc;">

    <?php include "theme-preload.php"; ?>
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <?php include "theme-header.php"; ?>
        <?php include "theme-menu.php"; ?>
        <div class="body-wrapper">
            <div class="container-fluid">

                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-1">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Data User</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted " href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Data User</li>
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
                                    <p class="card-subtitle mb-3">Silahkan mengelola data User dibawah ini...!</p>
                                    <div class="mb-3">
                                        <a href="user-tambah.php" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah Data</a>
                                    </div>
                                    <?php
                                    // Fetch data from tbl_user
                                    $query_user = mysqli_query($conn, "SELECT * FROM tbl_user");
                                    $num_rows = mysqli_num_rows($query_user);

                                    if ($num_rows == 0) {
                                    ?>
                                        <div class="alert alert-warning" role="alert">
                                            Data masih kosong, silahkan menambahkan data pada tombol <b>Tambah Data</b> diatas...!
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table id="example2" class="table border table-bordered text-nowrap table-hover" style="width: 100%">
                                            <thead class="table-success">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Telp</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($num_rows > 0) {
                                                    while ($data_user = mysqli_fetch_array($query_user)) {
                                                        // Determine username display (assuming nm_user might also be used as username)
                                                        // Based on your table schema, there's no explicit 'username' field,
                                                        // so I'll use 'nm_user' or you might adapt if 'email' serves as username.
                                                        // For now, I'll use nm_user as 'Username'.
                                                        $username_display = $data_user['nm_user'];

                                                        // Determine status display (assuming 1 is active, 0 is inactive, or similar)
                                                        // Your tbl_user schema doesn't have a 'status' field.
                                                        // I'll add a placeholder for 'Status' but you might need to adjust this
                                                        // if you plan to add a 'status' column to tbl_user later.
                                                        // For now, I'll display a static 'Active' or adapt based on a 'level' if it implies status.
                                                        // Let's assume for now, all fetched users are 'Active' or based on 'level'.
                                                        // If level 1 is Admin, 2 is Pemilik Kost, 3 is Pencari Kost, let's map 'Level' and a placeholder 'Status'
                                                        $level_text = '';
                                                        switch ($data_user['level']) {
                                                            case 1:
                                                                $level_text = 'Admin';
                                                                break;
                                                            case 2:
                                                                $level_text = 'Pemilik Kost';
                                                                break;
                                                            case 3:
                                                                $level_text = 'Pencari Kost';
                                                                break;
                                                            default:
                                                                $level_text = 'Unknown';
                                                                break;
                                                        }
                                                        // Since 'status' is not in tbl_user, I will hardcode "Active" for demonstration.
                                                        // If you add a 'status' column to tbl_user, you'll need to fetch and display it here.
                                                        $status_display = "Active"; // Placeholder, adjust if you add a 'status' column

                                                ?>
                                                        <tr>
                                                            <td>
                                                                <a href="user-edit.php?id=<?php echo $data_user['id_user']; ?>" class="btn btn-sm btn-success"><i class="ti ti-pencil"></i> Edit</a>
                                                                <a href="user-reset.php?id=<?php echo $data_user['id_user']; ?>" class="btn btn-sm btn-warning" onClick="return confirm('Password default adalah bungkost...?')"><i class="ti ti-lock"></i> Reset Password</a>
                                                                <a href="user-hapus.php?id=<?php echo $data_user['id_user']; ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini...?')"><i class="ti ti-trash"></i> Hapus</a>
                                                            </td>
                                                            <td><?php echo $data_user['nm_user']; ?></td>
                                                            <td><?php echo $data_user['email']; ?></td>
                                                            <td><?php echo $data_user['telp']; ?></td>
                                                            <td><?php echo $username_display; ?></td>
                                                            <td><?php echo $level_text; ?></td>
                                                            <td><?php echo $status_display; ?></td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot class="table-success">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Telp</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <script src="../dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.horizontal.init.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.js"></script>
    <script src="../dist/js/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/datatable/js/dataTables.bootstrap5.min.js"></script>

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