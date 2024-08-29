<?php
session_start();
if (isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

include('functions.php');

if (isset($_POST["login"])) {
        $username = $_POST["username_customer"];
        $pass = $_POST["pass_customer"];
        $result = mysqli_query($conn, "SELECT * FROM customer WHERE
                    username_customer = '$username'");
        // cek username
        if (mysqli_num_rows($result) === 1){
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row["pass_customer"]) ){
                // set session
                $_SESSION["login"] = true;
                $_SESSION["id_customer"] = $row['id_customer'];
                $_SESSION["name_customer"] = $row['name_customer'];
                $_SESSION["username_customer"] = $row['username_customer'];
                $_SESSION["pass_customer"] = $row['pass_customer'];
                $_SESSION["email_customer"] = $row['email_customer'];
                $_SESSION["address_customer"] = $row['address_customer'];        
                $_SESSION["phone_customer"] = $row['phone_customer'];        
                header("Location: customer-index.php");
                exit;
            }
        }
}

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
        <form action="" method="post">
          <h1>Create Account</h1>
          <div class="social-container"></div>
          <input
            type="text"
            placeholder="Nama"
            name="name_customer"
            id="name_customer" required
          />
          <input
            type="text"
            placeholder="Username"
            name="username_customer"
            id="username_customer" required
          />
          <input
            type="password"
            placeholder="Password"
            name="pass_customer"
            id="pass_customer" required
          />
          <input
            type="email"
            placeholder="Email"
            name="email_customer"
            id="email_customer" required
          />
          <input
            type="text"
            placeholder="Address"
            name="address_customer"
            id="address_customer" required
          />
          <input
            type="number"
            placeholder="Phone Number"
            name="phone_customer"
            id="phone_customer" required
          />
          <button type ="submit" name="register">Register!</button>
          <!-- <button onclick="sign()">Sign Up</button> -->
        </form>
      </div>
      <div class="form-container log-in-container">
        <form action="" method="post">
          <h1>Welcome back!</h1>
          <input type="text" placeholder="Username" name="username_customer" id="username_customer"> 
          <input type="password" placeholder="Password" name="pass_customer" id="pass_customer">
          <a href="adminlogin.php">Administrator</a>
          <button type="submit" name= "login">Login</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Already have an account?</h1>
            <p>Try to log-in by pressing button below!</p>
            <button class="ghost" id="signin">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Don't have an account?!</h1>
            <p>Create your personal account and start your journey with us</p>
            <button class="ghost" id="signup">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script src="login.js"></script>
  </body>
</html>
