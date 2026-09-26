<?php
session_start();

// Cek session
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit;
}

// Cek role
if ($_SESSION["role"] === "admin") {
    echo "Halo Admin!";
} elseif ($_SESSION["role"] === "user") {
    echo "Halo User!";
} else {
    echo "Role tidak dikenali.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIT Library</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #333333;
            margin: 0;
            padding-bottom: 60px;
        }

        a {
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #6c757d;
        }

        /* Navbar */
        .navbar-custom {
            background-color: #343a40;
            padding: 15px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10; 
        }

        .navbar-custom .navbar-brand {
            font-size: 1.8rem;
            font-weight: 600;
            color: #f8f9fa;
        }

        .navbar-custom .nav-link {
            color: #f8f9fa;
            font-size: 1rem;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #adb5bd;
        }

        .navbar-brand img {
            width: 65px;
            height: auto;
            margin-right: 8px;
        }

        /* CSS untuk header */
        .header {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(to bottom, #6c757d, #adb5bd);
            color: #f8f9fa;
            margin-top: 75px;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1rem;
        }

        /* CSS untuk tabelnya */
        .table-container {
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            max-width: 90%;
        }

        .table-container h2 {
            text-align: center;
            color: #495057;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .table {
            margin-top: 10px;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table thead th {
            background-color: #adb5bd;
            color: #ffffff;
            border: none;
            padding: 12px;
            text-align: center;
        }

        .table tbody tr {
            background-color: #f8f9fa;
            color: #333333;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table tbody tr td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #dee2e6;
            transition: background-color 0.3s ease;
        }

        .btn-edit {
            background-color: #6c757d;
            border: none;
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-edit:hover {
            background-color: #495057;
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-delete:hover {
            background-color: #b02a37;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        /* CSS untuk footer */
        footer {
            background-color: #343a40;
            padding: 20px 0;
            text-align: center;
            color: #f8f9fa;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        footer a {
            color: #adb5bd;
        }

        footer a:hover {
            color: #f8f9fa;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand text-white" href="#">
            <img src="Glogo.png" alt="Logo"> GIT L!BRARY
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php if ($_SESSION["role"] === "admin") : ?>
                        <a class="nav-link" href="tambah.php">Tambah Data Baru</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <?php if ($_SESSION["role"] === "admin") : ?>
                        <a class="nav-link" href="cetak_data_buku.php">Report</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chat.php">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Header -->
    <div class="header">
        <h1>Selamat Datang di GIT L!BRARY</h1>
        <p>Platform Perpustakaan Digital yang Modern dan Inovatif</p>
    </div>

    <!-- Table -->
    <div class="table-container">
        <h2>Daftar Buku</h2>
        <div class="search-bar">
            <input type="text" class="form-control" id="search" placeholder="Cari Buku...">
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                include_once("koneksi.php");

                $result = mysqli_query($con, "SELECT * FROM buku");

                while ($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id_buku'] . "</td>";
                    echo "<td>" . $user_data['judul'] . "</td>";
                    echo "<td>" . $user_data['penulis'] . "</td>";
                    echo "<td>" . $user_data['penerbit'] . "</td>";
                    echo "<td>" . $user_data['th_terbit'] . "</td>";

                    // Menambahkan kontrol akses berdasarkan role
                    if ($_SESSION["role"] == "admin") {
                        echo "<td><a href='edit.php?id=$user_data[id_buku]' class='btn btn-edit'>Edit</a> ";
                        echo "<a href='delete.php?id=$user_data[id_buku]' class='btn btn-delete'>Delete</a></td>";
                    } else {
                        echo "<td>
                        <button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#modalBaca$user_data[id_buku]'>
                            Baca
                        </button>
                      </td>";
            
                // teks lorem ipsum
                echo "
                <div class='modal fade' id='modalBaca$user_data[id_buku]' tabindex='-1' aria-labelledby='modalBacaLabel$user_data[id_buku]' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='modalBacaLabel$user_data[id_buku]'>Baca Buku</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dapibus justo. Nulla facilisi. Sed sit amet felis vehicula, tristique urna in, dignissim est. Donec sagittis, libero vitae consectetur varius, ligula libero dapibus lorem, nec tincidunt risus est eget massa. Proin placerat ligula ut eros volutpat, at convallis nulla congue. Nam convallis, eros id sollicitudin vulputate, sapien lacus aliquam neque, ut condimentum risus urna in leo. Ut ultrices arcu sit amet lacus dapibus, ac suscipit velit dictum. Nam a tincidunt eros. Aenean sit amet ultrices arcu. Ut sed tincidunt lorem, sed fermentum metus. Nullam tincidunt, nunc vel fringilla tincidunt, lorem neque gravida nisi, sed tempor sem lectus nec est. Aliquam erat volutpat.

                                    Vivamus sit amet dolor id sem vehicula tristique. Curabitur facilisis magna at sapien volutpat, non convallis risus luctus. Integer at facilisis lacus. Proin vel magna non justo laoreet aliquet at a odio. Etiam ornare, lacus sed dictum tempus, lorem libero auctor mi, in rhoncus sapien augue a ligula. Fusce dignissim metus id velit pharetra, a venenatis dolor ornare. Duis rutrum sagittis urna sit amet pulvinar. Donec a tellus vel mi tristique fringilla. Vivamus faucibus pretium elit, eget malesuada libero vehicula nec. Nulla a lectus in orci dapibus malesuada ac in justo. Curabitur ut hendrerit nibh. Vivamus feugiat, justo vel rhoncus ultricies, orci augue varius augue, ac suscipit elit libero eget nunc.

                                    Donec interdum dui et arcu hendrerit feugiat. In nec mauris id odio efficitur iaculis eget a augue. Pellentesque quis eros in ligula varius tincidunt in ut eros. Praesent id magna posuere, pharetra ex quis, venenatis purus. Sed interdum felis eget nisi hendrerit pellentesque. Phasellus volutpat mauris ut arcu sodales, at fermentum purus pretium. Suspendisse volutpat pellentesque leo vel aliquet. Nulla non metus fringilla, gravida ex non, dapibus lectus. Aenean a ultrices justo. Proin sed massa sed nulla viverra hendrerit. Ut ac nunc eros. Duis maximus turpis ut eros sollicitudin eleifend.

                                    Quisque non risus convallis, fermentum massa non, laoreet urna. Praesent lobortis dolor vel justo vestibulum, a dictum tortor tincidunt. Phasellus id sem at nisi tincidunt sollicitudin vel ac metus. Sed posuere quam sed nunc vehicula dignissim. Integer tincidunt nunc in urna tristique, at rutrum massa consequat. Suspendisse potenti. Ut interdum velit sed est malesuada pharetra. Integer malesuada ultrices ante, et vehicula arcu efficitur at. Vivamus id tincidunt ipsum, in luctus libero. Ut vestibulum felis vel diam pretium, vel accumsan eros accumsan. Vestibulum non tincidunt sem. Aliquam a tortor viverra, vehicula nunc a, tincidunt felis.

                                    Sed ut volutpat purus. Duis sollicitudin orci ac est fermentum congue. Nam vehicula convallis mi, ut blandit nunc fringilla vel. Suspendisse ac odio ultricies, vulputate mauris id, tincidunt mauris. Mauris id leo non neque gravida dapibus. Sed at interdum nulla. Suspendisse tincidunt vehicula convallis. Mauris sit amet felis est. Integer venenatis malesuada elit, quis gravida magna maximus sit amet. Ut pretium dui eget nisl tincidunt feugiat. Ut vestibulum risus et nisi fringilla, ac suscipit purus facilisis. Mauris tincidunt, mi eget tincidunt ultricies, odio sapien luctus ex, vitae malesuada arcu ligula vitae magna.</p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>";
                    }

                    echo "</tr>";
                }
                ?>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 GIT L!BRARY. All rights reserved. <a href="#">Privacy Policy</a></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Javascript untuk searching  -->
    <script>
        document.getElementById('search').addEventListener('input', function () {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(row => {
                let visible = false;
                row.querySelectorAll('td').forEach(cell => {
                    if (cell.innerText.toLowerCase().includes(searchValue)) {
                        visible = true;
                    }
                });
                row.style.display = visible ? '' : 'none';
            });
        });
    </script>

</body>

</html>
