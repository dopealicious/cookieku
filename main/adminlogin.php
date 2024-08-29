<?php
session_start();
if (isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

include('functions.php');

if (isset($_POST["login"])) {
    $usernameadmin = $_POST["username_admin"];
    $passadmin = $_POST["pass_admin"];
    $result = mysqli_query($conn, "SELECT * FROM administrator WHERE
                username_admin = '$usernameadmin'");
    // cek username
    if (mysqli_num_rows($result) === 1){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($passadmin, $row["pass_admin"]) ){
            // set session
            $_SESSION["login"] = true;
            $_SESSION["name_admin"] = $row['name_admin'];
            $_SESSION["username_admin"] = $row['username_admin'];
            $_SESSION["pass_admin"] = $row['pass_admin'];
            header("Location: admin-index.php");
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log in Admin</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="login.css"/>
    <link
      href="https://fonts.googleapis.com/css?family=Alex Brush"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Alegreya Sans SC"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container log-in-container">
        <form action="" method="post" name="Input">
          <h1>Welcome Admin</h1>
          <input type="text" placeholder="Username" name="username_admin" id="username_admin"> 
          <input type="password" placeholder="Password" name="pass_admin" id="pass_admin">
          <a href="login.php">Not an Admin?</a>
          <button type="submit" name= "login">Login</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay"></div>
      </div>
    </div>
    <script src="login.js"></script>
  </body>
</html>