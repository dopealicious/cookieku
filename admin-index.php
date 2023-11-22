<?php
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
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
    <link rel="stylesheet" href="admin.css" />
    <title>Admin Dashboard</title>
  </head>
  <body>
    <header>
      <div class="logoContent">
        <a href="#" class="logo"
          ><img src="assets/images/logo.png" alt=""
        /></a>
        <h1 class="logoName">CookieKu</h1>
      </div>
      <h1>Admin Dashboard</h1>
    </header>

    <div class="container">
      <aside>
        <ul class="menu">
          <li><a href="admin-index.php" class="active">Dashboard</a></li>
          <li><a href="admin-customer-index.php">Data Customer</a></li>
          <li><a href="admin-pesanan-index.php">Data Pemesanan</a></li>
          <li><a href="admin-menu-index.php">Data Stok Kue</a></li>
          <!-- <li><a href="admin-review-index.php">Data Review</a></li> -->
          <li><a href="logout.php" class="active">Logout</a></li>
        </ul>
      </aside>

      <main>
        <div class="dashboard-grid">
          <div class="dashboard-item">
            <a href="admin-customer-index.php" class="dashboard-link">
              <img
                src="assets/images/admin-customer.png"
                alt="Content 2"
                class="dashboard-image"
              />
              <h2>Data Customer</h2>
            </a>
          </div>
          <div class="dashboard-item">
            <a href="admin-pesanan-index.php" class="dashboard-link">
              <img
                src="assets/images/admin-pemesanan.png"
                alt="Content 3"
                class="dashboard-image"
              />
              <h2>Data Pemesanan</h2>
            </a>
          </div>
          <div class="dashboard-item">
            <a href="admin-menu-index.php" class="dashboard-link">
              <img
                src="assets/images/admin-stok.png"
                alt="Content 4"
                class="dashboard-image"
              />
              <h2>Data Stok Kue</h2>
            </a>
          </div>
          <!-- <div class="dashboard-item">
            <a href="admin-review-index.php" class="dashboard-link">
              <img
                src="assets/images/admin-review.png"
                alt="Content 4"
                class="dashboard-image"
              />
              <h2>Data Review</h2>
            </a>
          </div> -->
        </div>
      </main>
    </div>
    <script src="admin.js"></script>
  </body>
</html>
