<?php 

session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
// Cek submit udah ditekan apa belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo " <script> alert('Data kue berhasil ditambahkan!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Data kue gagal ditambahkan!');
        document.location.href = 'menu-tambah.php'
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah data kue</title>
</head>
<body>
    <h1>Tambah data kue</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama_kue">Nama Kue</label>
                <input type="text" name="nama_kue" id="nama_kue" required>
            </li>
            <li>
                <label for="stok_kue">Stok Kue</label>
                <input type="number" name="stok_kue" id="stok_kue" required>
            </li>
            <li>
                <label for="harga_kue">Harga Kue</label>
                <input type="number" name="harga_kue" id="harga_kue" required>
            </li>
            <li>
                <label for="detail_kue">Detail Kue</label>
                <input type="text" name="detail_kue" id="detail_kue" required>
            </li>
            <li>
                <label for="gambar_kue">Gambar Kue</label>
                <input type="file" name="gambar_kue" id="gambar_kue" required>
            </li>
            <li>
                <button type ="submit" name="submit">Tambah!</button>
            </li>
        </ul>

    </form>
</body>
</html>