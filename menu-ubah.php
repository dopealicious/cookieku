<?php 
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
// ambil data di URL
$id = $_GET["id_kue"];
// query data kue berdasarkan id
$idkue = query("SELECT * FROM menu WHERE id_kue = $id")[0];

// Cek submit udah ditekan apa belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo " <script> alert('Data kue berhasil diubah!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Data kue gagal diubah!');
        document.location.href = 'menu-ubah.php'
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah Data Kue</title>
</head>
<body>
    <h1>Ubah Data Kue</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kue" value="<?= $idkue["id_kue"]; ?>">
        <input type="hidden" name="oldpic" value="<?= $idkue["gambar_kue"]; ?>">
        <ul>
            <li>
                <label for="nama_kue">Nama Kue</label>
                <input type="text" name="nama_kue" id="nama_kue" required value="<?= $idkue["nama_kue"]; ?>">
            </li>
            <li>
                <label for="stok_kue">Stoke Kue</label>
                <input type="number" name="stok_kue" id="stok_kue" required value="<?= $idkue["stok_kue"]; ?>">
            </li>
            <li>
                <label for="harga_kue">Harga Kue</label>
                <input type="number" name="harga_kue" id="harga_kue" required value="<?= $idkue["harga_kue"]; ?>">
            </li>
            <li>
                <label for="detail_kue">Detail Kue</label>
                <input type="text" name="detail_kue" id="detail_kue" required value="<?= $idkue["detail_kue"]; ?>">
            </li>
            <li>
                <label for="gambar_kue">Gambar Kue</label> <br>
                <img src="img/<?= $idkue['gambar_kue']; ?>"><br>
                <input type="file" name="gambar_kue" id="gambar_kue" required >
            </li>
            <li>
                <button type ="submit" name="submit">Ubah!</button>
            </li>
        </ul>
    </form>
</body>
</html>