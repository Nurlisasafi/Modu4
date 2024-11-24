<?php
// Memanggil file PHP untuk mendapatkan data buku
require 'manggil.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daftarbuku.css">
    <title>Daftar Buku</title>
</head>
<body>
    <header><h1>Daftar Buku</h1></header>
    <main>
        <div id="product-list" class="product-container">
            <?php
            // Pastikan $buku_data berisi array
            if (isset($books) && is_array($books)) {
                // Menampilkan data menggunakan foreach
                foreach ($books as $buku) {
                    echo "<div class='product-item'>";
                    echo "<h3>" . htmlspecialchars($buku['nama_buku']) . "</h3>";
                    echo "<p>Harga: Rp " . number_format($buku['harga'], 2, ',', '.') . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada data buku yang ditemukan.</p>";
            }
            ?>
        </div>
    </main>
</body>
</html>