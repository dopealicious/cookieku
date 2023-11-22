<?php
include('functions.php');
$idmenu = query("SELECT * FROM menu");


// tombol cari ditekan
if (isset($_POST["cari"])) {
    $idmenu = carikue($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
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
            margin-top: 50px;
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
            max-width: 400px;
            margin-left: 210px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #764e4e;
          }
          
          input[type="text"],
          input[type="email"],
          textarea,
          input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #764e4e;
            border-radius: 4px;
          }
          
          button.btn, 
          a.btn {
            color: #000000;
            display: inline-block;
            padding: 8px 16px;
            margin-left: 210px;
            margin-top: 10px;
            background: #c98d83;
            border: none;
            border-radius: 4px;
            cursor: pointer;
          }
          
          button.btn:hover,
          a.btn:hover {
            background-color: #dfb9b9;
            color: #ffffff;
          }
          
          th {
            background-color: #ecd0d0c7;
            text-align: left;
            padding: 8px;
          }
          
          table {
            margin-left: 200px;
            margin-right: 200px;
            width: 87%;
            border-bottom: 1px solid #764e4e;
            padding: 8px;
            border-collapse: collapse;
            background-color: #ffffff;
            color: #333;
          }
          
          td {
            padding: 8px;
            border-bottom: 2px solid #ffffff;
          }
          
          tr:nth-child(even) {
            border-bottom: 1px solid #ffffff;
          }
          
          tr:hover {
            background-color: #dfb9b9;
          }
    </style>
    <title>Halaman Data Kue</title>
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
    <h1>Daftar Data <span>Kue</span></h1>
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
        <a class="btn" href="admin-menu-tambah.php">Tambah Data Kue </a>
    <br><br>
    <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
    <button class="btn" type="submit" name="cari">Cari</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="10">
        <tr>
            <th>No.</th>
            <th>ID Kue</th>
            <th>Nama Kue</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Detail</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($idmenu as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td> <?= $row["id_kue"]; ?></td>
            <td> <?= $row["nama_kue"]; ?></td>
            <td> <?= $row["stok_kue"]; ?></td>
            <td> <strong>Rp</strong><?= $row["harga_kue"]; ?></td>
            <td> <?= $row["detail_kue"]; ?></td> 
            <td> <img src="img/kue/<?= $row["gambar_kue"]; ?>" width="150" height="150"></td>
            <td>
                <a href="admin-menu-ubah.php?id_kue=<?= $row["id_kue"]; ?>"><i class="fas fa-edit"></i></a>
                <a href="admin-menu-hapus.php?id_kue=<?= $row["id_kue"]; ?>" onclick="return confirm('Yakin menghapus data?');"><i class="fas fa-trash-alt"></a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
    <script src="admin.js"></script>
</body>
</html>
