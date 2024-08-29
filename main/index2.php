<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "cookieku");

// Ambil data dari tabel customer
$result = mysqli_query($conn, "SELECT * FROM customer");


// Cek tabel dari db kalo ada
if (!$result) {
    echo mysqli_error($conn);
}

//  Ambil data (fetch) customer dari object result
// mysqli_fetch_row(), mengembalikan array numerik (indexnya angka)
// mysqli_fetch_assoc(), mengembalikan array associative
// mysqli_fetch_array(), mengembalikan keduanya


// while ($cus = mysqli_fetch_row($result));
// var_dump($cus);





?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>


    <h1>Daftar Customer</h1>
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
        <?php while( $row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a>
                <a href="">hapus</a>
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
        <?php endwhile; ?>
    </table>
</body>
</html>