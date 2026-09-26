<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    $password = md5($_POST['password']); // Simpan password dengan hashing
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO user (uname, email, password, nama) VALUES ('$uname', '$email', '$password', '$nama')";
    if (mysqli_query($con, $sql)) {
        header('Location: login.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
