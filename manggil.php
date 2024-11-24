<?php
// Konfigurasi koneksi database
$host = 'localhost';  // Ganti dengan host Anda
$user = 'root';       // Ganti dengan username Anda
$password = '';       // Ganti dengan password Anda
$database = 'sweetbook';  // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel foods
$sql = "SELECT nama_buku, harga FROM buku";
$result = $conn->query($sql);

// Menyimpan hasil query dalam array $foods
$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;  // Menambahkan hasil query ke dalam array $foods
    }
}

// Menutup koneksi
$conn->close();
?>
