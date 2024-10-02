<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol AC Otomatis</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            text-align: left;
            display: block;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 15px;
            background-color: #6B4D57;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
        }

        .result p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kontrol AC Otomatis</h1>
        <form method="POST">
            <label for="suhu">Suhu (°C):</label>
            <input type="number" id="suhu" name="suhu" step="0.1" required>

            <label for="kelembapan">Kelembapan (%):</label>
            <input type="number" id="kelembapan" name="kelembapan" step="0.1" required>

            <button type="submit">Cek Status</button>
        </form>

        <?php
        // Fungsi untuk menentukan status AC berdasarkan suhu dan kelembapan
        function statusAC($suhu, $kelembapan) {
            // Batas rentang suhu dan kelembapan
            $suhuRendah = 20;
            $suhuSedang = 27;
            $kelembapanRendah = 40;
            $kelembapanSedang = 60;

            // Kondisi AC
            if ($suhu > $suhuSedang && $kelembapan > $kelembapanSedang) {
                return "AC menyala (kerja berat)";
            } elseif ($suhu > $suhuSedang && $kelembapan >= $kelembapanRendah && $kelembapan <= $kelembapanSedang) {
                return "AC menyala (kerja sedang - suhu tinggi, kelembapan sedang)";
            } elseif ($suhu >= $suhuRendah && $suhu <= $suhuSedang && $kelembapan > $kelembapanSedang) {
                return "AC menyala (kerja sedang - suhu normal, kelembapan tinggi)";
            } elseif ($suhu >= $suhuRendah && $kelembapan >= $kelembapanRendah && $kelembapan <= $kelembapanSedang) {
                return "AC menyala (kerja ringan)";
            } else {
                return "AC mati";
            }
        }

        // Proses form jika ada input suhu dan kelembapan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $suhu = $_POST['suhu'];
            $kelembapan = $_POST['kelembapan'];

            // Dapatkan status AC
            $status = statusAC($suhu, $kelembapan);

            // Tampilkan hasil
            echo '<div class="result">';
            echo '<p>Status AC: <strong>' . htmlspecialchars($status) . '</strong></p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
