<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pemrograman Internet</title>
</head>
<body>
    <h2>Penilaian Mata Kuliah Pemrograman Internet</h2>
    <form method="POST">
        <label for="nama">Nama Mahasiswa:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br><br>
        
        <label for="nilai">Nilai Mahasiswa (0-100):</label><br>
        <input type="number" id="nilai" name="nilai" min="0" max="100" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $nilai = $_POST['nilai'];

        // Membuat array yang berisi rentang nilai
        $grades = [
            ['min' => 85, 'max' => 100, 'grade' => 'A'],
            ['min' => 80, 'max' => 84, 'grade' => 'B+'],
            ['min' => 75, 'max' => 79, 'grade' => 'B'],
            ['min' => 70, 'max' => 74, 'grade' => 'C+'],
            ['min' => 65, 'max' => 69, 'grade' => 'C'],
            ['min' => 50, 'max' => 64, 'grade' => 'D'],
            ['min' => 0, 'max' => 49, 'grade' => 'E'],
        ];

        // Menemukan nilai huruf berdasarkan nilai yang diinput pengguna
        $grade = "Tidak Valid";
        foreach ($grades as $g) {
            if ($nilai >= $g['min'] && $nilai <= $g['max']) {
                $grade = $g['grade'];
                break;
            }
        }

        // Menampilkan hasil
        echo "<br>" . "Nama Mahasiswa: " . $nama . "<br>";
        echo "NIM: " . $nim . "<br>";
        echo "Nilai Mahasiswa: " . $nilai . " ". "($grade)". "<br>";
    }
    ?>

</body>
</html>
