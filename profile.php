<?php
// Kode untuk koneksi ke database

$successMessage = '';
$errorMessage = '';

// Fungsi untuk mendapatkan koneksi ke database
function getDatabaseConnection()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'database_name';

    // Membuat koneksi ke database
    $connection = new mysqli($host, $username, $password, $database);

    // Check koneksi
    if ($connection->connect_error) {
        die("Koneksi ke database gagal: " . $connection->connect_error);
    }

    return $connection;
}

// Fungsi untuk mendapatkan data pengguna berdasarkan ID (contoh implementasi saja)
function getUserById($userId)
{
    // Query database untuk mendapatkan data pengguna berdasarkan ID
    // Gantikan dengan kode query yang sesuai dengan struktur tabel dan skema database Anda

    $connection = getDatabaseConnection();
    $query = "SELECT * FROM users WHERE id = $userId";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user;
    } else {
        return null;
    }
}

// Fungsi untuk memperbarui data pengguna
function updateUser($userId, $name, $address, $phone)
{
    // Query database untuk memperbarui data pengguna
    // Gantikan dengan kode query yang sesuai dengan struktur tabel dan skema database Anda

    $connection = getDatabaseConnection();
    $query = "UPDATE users SET name = '$name', address = '$address', phone = '$phone' WHERE id = $userId";

    if ($connection->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Cek apakah ada permintaan untuk menyimpan perubahan data
if (isset($_POST['save'])) {
    // Mendapatkan data yang diubah dari form
    $newName = $_POST['editName'];
    $newAddress = $_POST['editAddress'];
    $newPhone = $_POST['editPhone'];

    // Simpan perubahan ke database
    $userId = 1; // Ganti dengan ID pengguna yang sesuai
    $result = updateUser($userId, $newName, $newAddress, $newPhone);

    if ($result) {
        $successMessage = 'Profil berhasil diperbarui!';
    } else {
        $errorMessage = 'Gagal memperbarui profil.';
    }
}

// Mendapatkan data pengguna dari database berdasarkan ID (contoh implementasi saja)
$userId = 1; // Ganti dengan ID pengguna yang sesuai
$user = getUserById($userId);

// Tampilkan halaman index1.php
include 'index1.php';
?>
