<?php
session_start();

// Cek jika pengguna belum login
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit;
}

// Simpan pesan yang dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    $message = htmlspecialchars($_POST["message"]);
    $username = $_SESSION["username"] ?? "Anonymous";

    // Simpan pesan ke file (bisa diganti dengan database jika diperlukan)
    $file = "chat_log.txt";
    $currentData = file_exists($file) ? file_get_contents($file) : "";
    $currentData .= date("Y-m-d H:i:s") . " - $username: $message\n";
    file_put_contents($file, $currentData);
}

// Ambil log chat
$chatLog = file_exists("chat_log.txt") ? file("chat_log.txt") : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - GIT L!BRARY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F4F6F9;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .chat-box {
            height: 400px;
            overflow-y: auto;
            border: 1px solid #CED4DA;
            padding: 15px;
            background-color: #FFFFFF;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .chat-message {
            margin-bottom: 12px;
        }

        .chat-message strong {
            color: #495057;
        }

        .form-control {
            background-color: #FFFFFF;
            border: 1px solid #CED4DA;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
            color: #495057;
        }

        .form-control:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6C757D;
            border-color: #6C757D;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .text-muted {
            color: #6C757D !important;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Chat Room</h1>

        <!-- Chat Log -->
        <div class="chat-box">
            <?php if (!empty($chatLog)): ?>
                <?php foreach ($chatLog as $line): ?>
                    <div class="chat-message">
                        <?php echo htmlspecialchars($line); ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted text-center">Belum ada pesan di ruang chat.</p>
            <?php endif; ?>
        </div>

        <!-- Form Kirim Pesan -->
        <form action="" method="post" class="d-flex">
            <input type="text" name="message" class="form-control me-2" placeholder="Tulis pesan Anda di sini..." required>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <div class="text-center mt-3">
            <br><br><br><br><br><br><br><br>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>
