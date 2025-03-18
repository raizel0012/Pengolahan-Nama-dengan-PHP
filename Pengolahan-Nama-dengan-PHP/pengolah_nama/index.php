<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengolah Nama Keluarga</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Pengolah Nama Anggota Keluarga</h1>
        <form method="POST">
            <input type="text" name="nama" placeholder="Masukkan Nama">
            <button type="submit" name="proses">Proses</button>
        </form>

        <?php
        function hitungVokalKonsonan($nama)
        {
            $vokal = preg_match_all('/[aeiouAEIOU]/', $nama);
            $konsonan = preg_match_all('/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/', $nama);
            return [$vokal, $konsonan];
        }

        if (isset($_POST["proses"])) {
            $nama = trim($_POST["nama"]);

            if (empty($nama)) {
                echo "<p style='color:red;'>⚠ Nama tidak boleh kosong!</p>";
            } else {
                $jumlahKata = str_word_count($nama);
                $jumlahHuruf = strlen(str_replace(' ', '', $nama));
                $namaTerbalik = strrev($nama);
                list($jumlahVokal, $jumlahKonsonan) = hitungVokalKonsonan($nama);

                echo "<div class='hasil'>";
                echo "<p><strong>Nama:</strong> $nama</p>";
                echo "<p><strong>Jumlah Kata:</strong> $jumlahKata</p>";
                echo "<p><strong>Jumlah Huruf:</strong> $jumlahHuruf</p>";
                echo "<p><strong>Nama Terbalik:</strong> $namaTerbalik</p>";
                echo "<p><strong>Jumlah Vokal:</strong> $jumlahVokal</p>";
                echo "<p><strong>Jumlah Konsonan:</strong> $jumlahKonsonan</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>