<?php 

session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}


// hapus pembayaran customer
$id = $_GET["id_pembayaran"];
if (hapus($id) > 0) {
        echo " <script> 
        alert('data pembayaran berhasil dihapus!');
        document.location.href = 'pembayaran.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('data pembayaran gagal dihapus!');
        document.location.href = 'pembayaran.php'
        </script>
    ";
}

// Cek submit udah ditekan apa belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo " <script> alert('Pembayaran berhasil dilakukan!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Pembayaran gagal dilakukan!');
        document.location.href = 'menu-tambah.php'
        </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Customer</h1>
    <a href="customer-tambah.php">Tambah data customer</a>
    <br><br>
    <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
    <button type="submit" name="cari">Cari</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="10">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>ID Pembayaran</th>
            <th>ID Pembayaran</th>
            <th>ID Pembayaran</th>
            <th>Nama Customer</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($customer as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="customer-ubah.php?id_customer=<?= $row["id_customer"]; ?>">ubah</a>
                <a href="customer-hapus.php?id_customer=<?= $row["id_customer"]; ?>" onclick="return confirm('Yakin menghapus data?');">hapus</a>
            </td>
            <td> <?= $row["id_customer"]; ?></td>
            <td> <?= $row["name_customer"]; ?></td>
            <td> <?= $row["username_customer"]; ?></td>
            <td> <?= $row["pass_customer"]; ?></td>
            <td> <?= $row["email_customer"]; ?></td>
            <td> <?= $row["address_customer"]; ?></td>
            <td> <?= $row["phone_customer"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>