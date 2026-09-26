<?php
session_start();

// Cek jika pengguna sudah login, arahkan ke halaman index.php
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    header("Location: index.php"); // Arahkan ke halaman home jika sudah login
    exit;
}

require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GIT Library</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Reset margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling with background image and overlay */
        body {
            font-family: 'Poppins', sans-serif;
            background: url('library.avif') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            height: 100vh;
            color: #333333;
        }

        /* Overlay to darken the background image */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(52, 58, 64, 0.7); /* Dark overlay */
            z-index: 1;
        }

        /* container */
        .login-wrapper {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Card styling */
        .login-card {
            background-color: #f2f2f2;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        /* Logo styling */
        .login-card .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .login-card .logo img {
            width: 80px;
            height: auto;
        }

        /* Form elements */
        .login-card .form-control {
            border-radius: 50px;
            padding-left: 20px;
            padding-right: 20px;
            height: 50px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .login-card .form-control:focus {
            border-color: #343a40;
            box-shadow: none;
        }

        /* Submit button */
        .login-card .btn-primary {
            border-radius: 50px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .login-card .btn-primary:hover {
            background-color: #495057;
            border-color: #495057;
        }

        /* Registration link */
        .login-card .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .login-card .register-link a {
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-card .register-link a:hover {
            color: #ffffff;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .login-card {
                padding: 20px;
            }

            .login-card .logo img {
                width: 60px;
            }
        }
    </style>

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <!-- Overlay Background -->
    <div class="overlay"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <!-- Logo -->
            <div class="logo">
                <img src="Glogo.png" alt="GIT Library Logo">
            </div>
            <!-- Form Title -->
            <h2 class="text-center mb-4" style="color: #343a40;">Login</h2>
            <!-- Login Form -->
            <form method="POST" action="login_check.php">
                <div class="mb-3">
                    <label for="uname" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-user"></i>
                        </span>
                        <input name="uname" type="text" class="form-control border-start-0" id="uname" placeholder="Enter your username" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input name="password" type="password" class="form-control border-start-0" id="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <!-- reCAPTCHA -->
                <div class="g-recaptcha mb-3" data-sitekey="6Ldu8acqAAAAAG0ORloKko1ebLZdZf2LYhHBbq1m"></div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <!-- Registration Link -->
            <div class="register-link">
                <p>Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
