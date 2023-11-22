<?php 
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
// Cek submit udah ditekan apa belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo " <script> alert('Data customer berhasil ditambahkan!');
        document.location.href = 'admin-customer-index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Data customer gagal ditambahkan!');
        document.location.href = 'tambah.php'
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }
          
          .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background: none;
            border: none;
            cursor: pointer;
          }
          
          body {
            font-family: "Alegreya Sans SC";
          }
          
          span {
            font-family: "Alex Brush";
            font-size: 42px;
            color: #c98d83;
          }
          
          header {
            background-color: hsla(53, 22%, 93%, 0.882);
            color: #000000;
            padding: 10px;
            text-align: center;
          }
          
          .container {
            filter: brightness(80%);
            min-height: 100vh;
            /* align-items: center; */
            background: url(assets/images/back.png) no-repeat;
            background-size: cover;
            background-position: center center;
          }
          
          aside {
            background-color: #f2f2f2;
            padding-bottom: 200px;
            width: 200px;
            padding: 20px;
            position: fixed;
            height: 100%;
          }
          
          .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
          }
          
          .menu li {
            margin-bottom: 10px;
          }
          
          .menu li a {
            color: #333;
            font-size: 24px;
            text-decoration: none;
          }
          
          .menu li a.active {
            font-weight: bold;
          }
          
          h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
          }
          .dashboard-image {
            width: 100px;
            height: 100px;
          }
          
          .admin-info {
            margin-top: 20px;
            margin-left: 20px;
            text-align: right;
            display: flex;
            align-items: center;
            cursor: pointer;
          }
          
          form {
            width: 80%;
            max-width: 200px;
            margin-left: 240px;
            margin-right: 200px;
            margin-top: 10px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #764e4e;
          }
        
        input[type="text"],
        input[type="password"],
        input[type="tel"],
        input[type="email"],
        textarea,
        input[type="number"] {
            margin-top: 10px;
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #764e4e;
            border-radius: 4px;
        }

        h2 {
            font-size: 30px;
            padding: 20px;
            width: 80rem;
            margin-left: 100px; 
            text-align: center; 
        }
          button.btn {
            color: #000000;
            display: inline-block;
            padding: 8px 16px;
            /* mgin-left: 210px; */
            margin-top: 10px;
            background: #c98d83;
            border: none;
            border-radius: 4px;
            cursor: pointer;
          }
          
          button.btn:hover {
            background-color: #dfb9b9;
            color: #ffffff;
          }

          @media (min-width: 768px) {
            form {
                max-width: 90%;
            }
          }
    </style>
    <title>Tambah data customer</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Alex Brush"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Alegreya Sans SC"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <button class="back-button" onclick="adminmainmenu()">
        <img
          src="assets/images/tombol-back.png"
          alt="Back"
          width="60"
          height="30"
        />
    </button>
    <h1>Daftar Data <span>Customer</span></h1>
    <div class="container">
    <aside>
        <ul class="menu">
          <li><a href="admin-index.php" class="active">Dashboard</a></li>
          <li><a href="admin-customer-index.php">Data Customer</a></li>
          <li><a href="admin-pemesanan.index.php">Data Pemesanan</a></li>
          <li><a href="admin-menu-index.php">Data Stok Kue</a></li>
          <!-- <li><a href="admin-review-index.php">Data Review</a></li> -->
          <li><a href="logout.php" class="active">Logout</a></li>
        </ul>
      </aside>
    <h2>Tambah data customer</h2>
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
                <button class="btn" type ="submit" name="submit">Tambah!</button>
            </li>
        </ul>
    </form>
    </div>
    <script src="admin.js"></script>
</body>
</html>