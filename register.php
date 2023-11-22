<?php 

include('functions.php');

if (isset($_POST["register"]) ) {
    if (registration($_POST) > 0 ) {
        echo " <script> alert('Kamu berhasil mendaftar!');
        document.location.href = 'login.php'
        </script>
        "; 
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
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
                <label for="email_customer">Email</label>
                <input type="email" name="email_customer" id="email_customer" required>
            </li>
            <li>
                <label for="address_customer">Address</label>
                <input type="text" name="address_customer" id="address_customer" required>
            </li>
            <li>
                <label for="phone_customer">Phone Number</label>
                <input type="tel" name="phone_customer" id="phone_customer" required>
            </li>
            <li>
                <button type ="submit" name="register">Registrasi</button>
            </li>
        </ul>
    </form>
</body>
</html>