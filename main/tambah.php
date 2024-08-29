<?php 
require 'function.php';




// Cek submit udah ditekan apa belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo " <script> alert('data berhasil ditambahkan!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('data gagal ditambahkan!');
        document.location.href = 'tambah.php'
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah data customer</title>
</head>
<body>
    <h1>Tambah data customer</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="name_customer">Name</label>
                <input type="text" name="name_customer" id="name_customer" required>
            </li>
            <li>
                <label for="username_customer">Username</label>
                <input type="text" name="username_customer" id="username_customer" required>
            </li>
            <li>
                <label for="pass_customer">Password</label>
                <input type="password" name="pass_customer" id="pass_customer" required>
            </li>
            <li>
                <label for="email_customer">Email  </label>
                <input type="email" name="email_customer" id="email_customer" required>
            </li>
            <li>
                <label for="address_customer">Address</label>
                <input type="text" name="address_customer" id="address_customer" required>
            </li>
            <li>
                <label for="phone_customer">Phone Number</label>
                <input type="text" name="phone_customer" id="phone_customer" required>
            </li>
            <li>
                <button type ="submit" name="submit">Tambah!</button>
            </li>
        </ul>

    </form>
</body>
</html>