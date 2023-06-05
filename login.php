<?php
session_start();

if (isset($_POST["signup"])) {
  $email = $_POST["Email"];
  $password = $_POST["Password"];
  $username = $_POST["Username"];
  $id_admin = $_POST["Id_admin"];

  $servername = "localhost";
  $db_username = "root";
  $db_password = "";
  $dbname = "cookieku";
  
  // Membuat koneksi ke database
  $conn = new mysqli($servername, $db_username, $db_password, $dbname);

  // Memeriksa koneksi
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO login (Email, Password, Username, Id_admin) VALUES ('$email', '$password', '$username', '$id_admin')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["login"] = true;
    header("Location: index1.php");
    exit;
  } else {
    $error = "Failed to create an account!";
  }
}
if (isset($_POST["login"])) {
  $email = $_POST["Email"];
  $password = $_POST["Password"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cookieku";

  // Membuat koneksi ke database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Memeriksa koneksi
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM login WHERE Email = '$email' AND Password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION["login"] = true;
    header("Location: index1.php");
    exit;
  } else {
    $error = "Invalid email or password!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log in || Sign up</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="login.css" />
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
      <div class="form-container sign-up-container">
      <form action="index1.php" method="post" name="signup">
  <!-- Other form elements -->
        <h1>Sign Up!</h1>
        <input type="text" placeholder="Username" name="Username" id="user-signUp" required />
        <input type="email" placeholder="Email" name="Email" id="email-signUp" required />
        <input type="password" placeholder="Password" name="Password" id="pass-signUp" required />
        <button id="signup" type="submit" name="signup">Sign Up</button>
      </form>

      </div>
      <div class="form-container log-in-container">
        <form action="index1.php" method="post" name="login">
          <h1>Welcome back!</h1>
          <input id="email-logIn" type="email" placeholder="Email" name="Email" required />
          <input id="password-logIn" type="password" placeholder="Password" name="Password" required />
          <a href="admin/adminlogin.html" >Forgot your password?</a>
          <button id="login" type="submit" name="login">Log In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Already have an account?</h1>
            <p>Try to log in by pressing the button below!</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Don't have an account?</h1>
            <p>Create your personal account and start your journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script src="./login.js"></script>
  </body>
</html>