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

// Delete the record from the database
$hapus = mysqli_query($conn, "DELETE FROM tbl_user WHERE id_user = '$id_user'");

if ($hapus) {
    echo "<script>
            alert('Data User berhasil dihapus!');
            window.location.href = 'user.php';
          </script>";
} else {
    echo "<script>
            alert('Data Gagal dihapus');
            window.location.href = 'user.php';
          </script>";
}
?>
