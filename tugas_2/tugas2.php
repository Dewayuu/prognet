<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Penilaian Siswa</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #6B4D57;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .result {
            text-align: center;
            margin-top: 20px;
        }

        .result span {
            font-weight: bold;
            color: #6B4D57;
        }

        .failed {
            color: red;
        }

        .passed {
            color: green;
        }

     </style>
</head>
<body>
    <h1>Tabel Data Penilaian Siswa</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Rata-rata</th>
                <th>Kelulusan</th>
                <th>Mata pelajaran yang perlu diperbaiki</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $siswa = [
                ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
                ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
                ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
                ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
                ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
            ];

            $lulus = 0;
            $tidak_lulus = 0;

            foreach ($siswa as $s) {
                // Menghitung rata-rata nilai
                $average = ($s["matematika"] + $s["bahasa_inggris"] + $s["ipa"]) / 3;

                // Array nilai mata pelajaran
                $nilai = [
                    'Matematika' => $s['matematika'],
                    'Bahasa Inggris' => $s['bahasa_inggris'],
                    'IPA' => $s['ipa']
                ];

                // Hitung jumlah nilai mapel di bawah 75
                $low_grades = array_filter($nilai, function($grade) {
                    return $grade < 75;
                });

                echo "<tr>";
                echo "<td>" . $s["nama"] . "</td>";
                echo "<td>" . number_format($average, 2) . "</td>";

                if ($average >= 75) {
                    $lulus++;
                    echo "<td class='passed'>Lulus</td><td>-</td>";
                } else {
                    $tidak_lulus++;
                    $nama_mapel = array_search(min($nilai), $nilai);
                    echo "<td class='failed'>Tidak Lulus</td><td>" . $nama_mapel . " (" . min($nilai) . ")</td>";
                }

                echo "</tr>";
            }
        ?>

        </tbody>
    </table>

    <div class="result">
        <p><span>Jumlah Siswa Lulus: <?php echo $lulus; ?></span> | <span>Jumlah Siswa Tidak Lulus: <?php echo $tidak_lulus; ?></span></p>
    </div>
</body>
</html>
