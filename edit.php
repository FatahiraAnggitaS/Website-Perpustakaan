<?php
// Memanggil file koneksi
include_once("koneksi.php");

// Periksa apakah tombol "update" sudah diklik
if (isset($_POST['update'])) {
    $id_buku = $_POST['id_buku'];
    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);
    $penerbit = trim($_POST['penerbit']);
    $th_terbit = trim($_POST['th_terbit']);
    $errors = [];

    // Validasi data yg masuk
    if (empty($judul)) {
        $errors[] = "Judul tidak boleh kosong.";
    }
    if (empty($penulis)) {
        $errors[] = "Penulis tidak boleh kosong.";
    }
    if (empty($penerbit)) {
        $errors[] = "Penerbit tidak boleh kosong.";
    }
    if (empty($th_terbit)) {
        $errors[] = "Tahun terbit tidak boleh kosong.";
    } elseif (!is_numeric($th_terbit) || $th_terbit <= 0) {
        $errors[] = "Tahun terbit harus berupa angka positif.";
    }

    // Jika tidak ada error, maka update
    if (empty($errors)) {
        $result = mysqli_query($con, "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', th_terbit='$th_terbit' WHERE id_buku='$id_buku'");

        // Redirect ke halaman index setelah update
        header("Location: index.php");
    }
}

// Mendapatkan data buku berdasarkan ID yang dikirim melalui URL
$id_buku = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM buku WHERE id_buku='$id_buku'");

while ($data_buku = mysqli_fetch_array($result)) {
    $judul = $data_buku['judul'];
    $penulis = $data_buku['penulis'];
    $penerbit = $data_buku['penerbit'];
    $th_terbit = $data_buku['th_terbit'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-label i {
            margin-right: 8px;
            color: #007bff;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-secondary {
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                margin-bottom: 10px;
            }

            .d-flex {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Data Buku</h1>

        <!-- Menampilkan error jika ada -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="edit.php">
            <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">

            <div class="mb-3">
                <label for="judul" class="form-label">
                    <i class="bi bi-book-fill"></i> Judul
                </label>
                <input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">
                    <i class="bi bi-person-fill"></i> Penulis
                </label>
                <input type="text" class="form-control" name="penulis" value="<?php echo $penulis; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">
                    <i class="bi bi-building"></i> Penerbit
                </label>
                <input type="text" class="form-control" name="penerbit" value="<?php echo $penerbit; ?>" required>
            </div>
            <div class="mb-3">
                <label for="th_terbit" class="form-label">
                    <i class="bi bi-calendar"></i> Tahun Terbit
                </label>
                <input type="number" class="form-control" name="th_terbit" value="<?php echo $th_terbit; ?>" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
