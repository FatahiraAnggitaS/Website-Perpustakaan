<?php
session_start(); // Mulai sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

header("Location: login.php"); // Arahkan ke halaman login setelah logout
exit;
?>
