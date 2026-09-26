<?php
include_once("koneksi.php");

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    // Query hapus data
    $result = mysqli_query($con, "DELETE FROM buku WHERE id_buku='$id_buku'");

    // Redirect ke halaman utama setelah data dihapus
    if ($result) {
        header("Location: index.php?message=deleted");
    } else {
        header("Location: index.php?message=error");
    }
} else {
    // Nantinya jika ID tidak ada, redirect ke halaman utama (home)
    header("Location: index.php");
}
?>
