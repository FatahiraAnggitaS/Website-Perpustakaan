<?php
// Memanggil file koneksi
include_once("koneksi.php");

// Proses form disubmit
if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $th_terbit = $_POST['th_terbit'];

    // Validasi input kosong
    if (empty($id_buku) || empty($judul) || empty($penulis) || empty($penerbit) || empty($th_terbit)) {
        $error = "Semua kolom wajib diisi!";
    } else {
        // Query untuk menambahkan data ke tabel buku
        $result = mysqli_query($con, "INSERT INTO buku(id_buku, judul, penulis, penerbit, th_terbit) 
                                      VALUES('$id_buku', '$judul', '$penulis', '$penerbit', '$th_terbit')");

        // Redirect ke index.php jika berhasil
        if ($result) {
            header("Location: index.php?message=added");
        } else {
            $error = "Terjadi kesalahan saat menambahkan data!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <!-- Bootstrap CSS -->
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

        h2 {
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

            h2 {
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
        <h2>Tambah Data Buku</h2>

        <!-- Menampilkan error jika ada -->
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form action="tambah.php" method="post">
            <div class="mb-3">
                <label for="id_buku" class="form-label">
                    <i class="bi bi-bookmark-fill"></i> ID Buku
                </label>
                <input type="text" name="id_buku" class="form-control" id="id_buku" placeholder="Masukkan ID buku" required>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">
                    <i class="bi bi-book-fill"></i> Judul Buku
                </label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul buku" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">
                    <i class="bi bi-person-fill"></i> Penulis
                </label>
                <input type="text" name="penulis" class="form-control" id="penulis" placeholder="Masukkan nama penulis" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">
                    <i class="bi bi-building"></i> Penerbit
                </label>
                <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Masukkan nama penerbit" required>
            </div>
            <div class="mb-3">
                <label for="th_terbit" class="form-label">
                    <i class="bi bi-calendar"></i> Tahun Terbit
                </label>
                <input type="number" name="th_terbit" class="form-control" id="th_terbit" placeholder="Masukkan tahun terbit" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Tambah Buku</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
