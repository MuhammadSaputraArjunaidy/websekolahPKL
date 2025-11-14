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

// Delete the record from the database
$hapus = mysqli_query($conn, "DELETE FROM tbl_kost WHERE id_kost = '$id_kost'");

if ($hapus) {
    echo "<script>
            alert('Data kost berhasil dihapus!');
            window.location.href = 'kost.php';
          </script>";
} else {
    echo "<script>
            alert('Data Gagal dihapus');
            window.location.href = 'kost.php';
          </script>";
}
?>
