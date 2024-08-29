<?php 

include('functions.php');

if (isset($_POST["register"]) ) {
    if (registadmin($_POST) > 0 ) {
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
                <label for="nama_admin">Name</label>
                <input type="text" name="nama_admin" id="nama_admin" required>
            </li>
            <li>
                <label for="username_admin">Username</label>
                <input type="text" name="username_admin" id="username_admin" required>
            </li>
            <li>
                <label for="pass_admin">Password</label>
                <input type="password" name="pass_admin" id="pass_admin" required>
            </li>
            <li>
                <button type ="submit" name="register">Registrasi</button>
            </li>
        </ul>
    </form>
</body>
</html>