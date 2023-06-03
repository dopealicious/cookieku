<?php 
require 'function.php';


// ambil data di URL
$customer = $_GET["id_customer"];
// query data customer berdasarkan id
$datacustomer = query("SELECT * FROM customer WHERE id_customer = $customer")[0];


// Cek submit udah ditekan apa belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo " <script> alert('data berhasil diubah!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('data gagal diubah!');
        document.location.href = 'tambah.php'
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah data customer</title>
</head>
<body>
    <h1>Ubah data customer</h1>
    <form action="" method="post">
        <input type="hidden" name="id_customer" value="<?= $daatacustomer["id_customer"]; ?>">
        <ul>
            <li>
                <label for="name_customer">Name</label>
                <input type="text" name="name_customer" id="name_customer" required value="<?= $datacustomer["name_customer"]; ?>">
            </li>
            <li>
                <label for="username_customer">Username</label>
                <input type="text" name="username_customer" id="username_customer" required value="<?= $datacustomer["username_customer"]; ?>">
            </li>
            <li>
                <label for="pass_customer">Password</label>
                <input type="password" name="pass_customer" id="pass_customer" required value="<?= $datacustomer["pass_customer"]; ?>">
            </li>
            <li>
                <label for="email_customer">Email  </label>
                <input type="email" name="email_customer" id="email_customer" required value="<?= $datacustomer["email_customer"]; ?>">
            </li>
            <li>
                <label for="address_customer">Address</label>
                <input type="text" name="address_customer" id="address_customer" required value="<?= $datacustomer["address_customer"]; ?>">
            </li>
            <li>
                <label for="phone_customer">Phone Number</label>
                <input type="text" name="phone_customer" id="phone_customer" required value="<?= $datacustomer["phone_customer"]; ?>">
            </li>
            <li>
                <button type ="submit" name="submit">Ubah!</button>
            </li>
        </ul>

    </form>
</body>
</html>