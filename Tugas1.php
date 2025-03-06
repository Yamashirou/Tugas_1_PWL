<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'] ?? '';
    $nama = $_POST['nama'] ?? '';
    
    if (!empty($nim) && !empty($nama)) {
        $_SESSION['student'] = [
            'nim' => htmlspecialchars($nim),
            'nama' => htmlspecialchars($nama)
        ];
    }
}

$student = $_SESSION['student'] ?? null;
session_destroy(); 
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        .form-container {
            border: 1px solid black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 5px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .welcome-message {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Form Mahasiswa</h2>
            <form method="post">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required>
                <br>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
                <br>
                <button type="submit">Submit</button>
            </form>
        </div>
        
        <?php if ($student): ?>
            <div class="welcome-message">
                Halo! <?= $student['nama'] ?> - <?= $student['nim'] ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
