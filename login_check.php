<?php
session_start(); // Mulai sesi
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    $password = md5($_POST['password']); // Proses hash password dengan md5

    // Query untuk memeriksa username dan password
    $sql = "SELECT * FROM user WHERE uname = '$uname' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Simpan informasi login ke sesi
        $_SESSION["login"] = true;
        $_SESSION["uname"] = $user["uname"]; // Username
        $_SESSION["nama"] = $user["nama"];  // Nama lengkap
        $_SESSION["role"] = $user["role"];  // Role (admin/user)

        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
