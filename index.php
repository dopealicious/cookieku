<?php
require 'function.php';
$customer = query("SELECT * FROM customer");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Customer</h1>
    <a href="tambah.php">Tambah data customer</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="10">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>ID Customer</th>
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
                <a href="">ubah</a>
                <a href="hapus.php?id=<?= $row["id_customer"]; ?>" onclick="return confirm('yakin menghapus data?')">hapus</a>
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