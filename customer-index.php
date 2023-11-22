<?php
session_start();
include('functions.php');
$_SESSION['total_pesanan'] = 0;
$_SESSION['total_harga'] = 0;

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
$customer = $_SESSION['name_customer'];
$idcustomer = query("SELECT * FROM customer WHERE id_customer = '$customer' ");
$listmenu = "SELECT * FROM menu";
$cakes = $conn->query($listmenu);

$nama = $_SESSION['id_customer'];
$data = mysqli_query($conn,"SELECT * FROM pesanan WHERE id_customer = $nama ORDER BY tanggal_pesanan desc");
$no = 1;

// // Cek submit udah ditekan apa belum
// if (isset($_POST["simpan"])) {
    
//   // cek apakah data berhasil ditambahkan atau tidak
//   if (ubahprofil($_POST) > 0) {
//       echo " <script> alert('Data customer berhasil diubah!');
//       document.location.href = 'customer-index.php'
//       </script>
//       ";
//   } else {
//       echo "<script> 
//       alert('Data customer gagal diubah!');
//       document.location.href = 'customer-index.php'
//       </script>
//       ";
//   }
// }



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
  <style>
      .menu1 .box-container .box {
        margin: 10px;
        display: flex;
        padding: 3rem;
        /* flex-direction: column; */
        grid-template-columns: repeat(auto-fit, minmax(30rem, 4fr));
        gap: 2rem;
        align-items: center;
        /* width: 100%; */
        display: grid;
        background: rgb(255, 255, 255);
        border-radius: 0.5rem;
        box-shadow: var(--box-shadow);
      }
      .menu1 .box-container .box .image {
        width: 100%;
        padding: 1.1rem;
      }

      .menu1 .box-container .box .image img {
        margin-left: 35rem;
        height: 50%;
        width: 60%;
        object-fit: cover;
        border-radius: 50%;
        border-color: #ffffff;
      }

      .menu1 .box-container .box .content {
        padding: 2rem;
        padding-top: 0;
      }

      .menu1 .box-container .box .content h3 {
        color: var(--black);
        font-size: 2.5rem;
        padding-top: 10px;
      }
      .menu1 .box-container .box .content .price {
        font-size: 2.5rem;
        font-weight: bolder;
        color: var(--secondary);
        margin-right: 1rem;
      }

    </style>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3477ae541c.js" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Alex Brush"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Alegreya Sans SC"
      rel="stylesheet"
    />
    <title>CookieKu Website</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="header">
      <div class="logoContent">
        <a href="#" class="logo"><img src="assets/images/logo.png" alt="" /></a>
        <h1 class="logoName">CookieKu</h1>
      </div>

      <nav class="navbar">
        <a href="#home"> Home</a>
        <a href="#about"> About</a>
        <a href="#menu"> Menu</a>
        <a href="#contact"> Contact</a>
      </nav>

      <div class="profile-icon" id="profile-icon">
        <img src="assets/images/profile.png" alt="Profile Icon" />
        <div class="profile-dropdown hidden" id="profile-dropdown">
          <ul>
            <li><a id="profile-btn">Profil</a></li>
            <li><a id="status-btn" onclick="openStatusPopup()">History</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
      
      <!-- PROFILE -->
      <div class="profile-popup hidden" id="profile-popup">
      <button class="close-button" id="profile-close-button">&times;</button>
      <div class="profile-card">
        <div class="profile-header">
          <img src="assets/images/profile.png" alt="Profile Picture" />
          <h2 class="profile-name" id="name_customer"><span><?php echo $_SESSION["name_customer"]; ?></span></h2>
        </div>
        <div class="profile-details">
          <p>
            <strong>Username:<br /></strong>
            <span id="profileUsername"><?php echo $_SESSION["username_customer"]; ?></span>
          </p>
          <p>
            <strong>Email:<br /></strong>
            <span id="profileEmail"><?php echo $_SESSION["email_customer"]; ?></span>
          </p>
          <p>
            <strong>Alamat:<br /></strong>
            <span id="profileAddress"><?php echo $_SESSION["address_customer"]; ?></span>
          </p>
          <p>
            <strong>No. Telepon:<br /></strong>
            <span id="profilePhone"><?php echo $_SESSION["phone_customer"]; ?></span>
          </p>
          <form action="" method="post">
            <input type="text" name="editPhone" id="editPhone" class="edit-input" value="<?php echo $user["Phone"]; ?>" required />
            <input type="text" name="editName" id="editName" class="edit-input" value="<?php echo $user["Name"]; ?>" required />
            <input type="text" name="editAddress" id="editAddress" class="edit-input" value="<?php echo $user["Address"]; ?>" required />
            <div class="profile-actions">
              <button class="save-btn" type="submit" name="simpan">Simpan</button>
            </div>
          </form>
          <?php if (isset($successMessage)): ?>
            <p class="success-message"><?php echo $successMessage; ?></p>
          <?php endif; ?>
          <?php if (isset($errorMessage)): ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
          <?php endif; ?>
        </div>
      </div>
      </div>
  
      <!-- STATUS PESANAN -->
      <div class="status-popup hidden" id="status-popup">
        <button class="close-button" id="status-close-button">&times;</button>
        <div class="status-card">
          <h2>History <span>Pesanan</span></h2>
          <div class="status">
            <table id="history">
            <tr style="color: #1b4f86;">
                <th style="width: 1%;">No</th>
                <th>Pesanan</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Total Harga</th>
                <th>Status</th>
                </tr>
              <?php foreach ($data as $row ) : ?>
            <tr>
            <td><?= $no; ?></td>
            <td> <?= $row["id_pesanan"]; ?></td>
            <td> <?= $row["tanggal_pesanan"]; ?></td>
            <td> <?= $row["nama_kue"]; ?></td>
            <td> <?= "Rp. ".number_format($row['total_harga']) ." ,-"; ?></td>
            <td> <?= $row["status_pesanan"]; ?> </td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
                    </td>
                </tr>
              </table>
          </div>
          <!-- <div id="review-form" class="hidden">
            <h3>Review Produk</h3>
            <textarea id="review-text" placeholder="Tulis review Anda"></textarea>
            <div class="rating">
              <input type="radio" id="star5" name="rating" value="5" />
              <label for="star5" title="Sangat Bagus">&#9733;</label>
              <input type="radio" id="star4" name="rating" value="4" />
              <label for="star4" title="Bagus">&#9733;</label>
              <input type="radio" id="star3" name="rating" value="3" />
              <label for="star3" title="Cukup">&#9733;</label>
              <input type="radio" id="star2" name="rating" value="2" />
              <label for="star2" title="Buruk">&#9733;</label>
              <input type="radio" id="star1" name="rating" value="1" />
              <label for="star1" title="Sangat Buruk">&#9733;</label>
            </div>
            <button class="save-btn" onclick="submitReview()">Submit Review</button>
          </div> -->
        </div>
      </div>
      <div class="icons">
        <div id="cart-btn"> 
          <div class = cart-icons>
            <p>0</p>
            <i class ="fa fa-shopping-cart"></i>
          </div>
          </div>
          <div id="menu-btn" class="fas fa-bars"></div>
        </div>
      </header>

    <section class="home" id="home">
      <div class="homeContent">
        <h2>CookieKu<span> Shop</span></h2>
        <p>
          We are happy to invite you to visit our shop and enjoy the delicious
          dishes we provide. Please explore our menu and find your favorite
          dish. We hope to welcome you soon to our shop!!!
        </p>
        <div class="home-btn">
          <a href="#"><button class="btn">see more</button></a>
        </div>
      </div>
    </section>

    <!-- BLOGS
    <section class="blogs" id="about">
      <div class="swiper blogs-row">
        <div class="swiper-wrapper">
          <div class="swiper-slide box">
            <div class="img">
              <img src="assets/images/about1.jpg" alt="" />
            </div>
            <div class="content">
              <h3>Caramel Bourbon <span>Vanilla Cupcakes</span></h3>
              <p>
                Enjoy the delicacy of our enchanting Bourbon Vanilla Caramel Cupcakes. <br/>
                Every bite of these cupcakes will spoil your taste buds with the sweet <br/>
                caramel flavor that blends with an elegant touch of vanilla and a seductive <br/>
                hint of bourbon. 
              </p>
              <p>
                With their fluffy texture and beautiful decoration, these <br/>
                cupcakes are the perfect dessert to celebrate any special occasion or just <br/>
                to treat yourself to something special.
              </p>
              <a href="#blogs" class="btn">learn more</a>
            </div>
          </div>
          <div class="swiper-slide box">
            <div class="img">
              <img src="assets/images/about2.jpg" alt="" />
            </div>
            <div class="content">
              <h3>Caramel Bourbon Vanilla Cupcakes</h3>
              <p>
                Enjoy the delicacy of our enchanting Bourbon Vanilla Caramel Cupcakes. <br/>
                Every bite of these cupcakes will spoil your taste buds with the sweet <br/>
                caramel flavor that blends with an elegant touch of vanilla and a seductive <br/>
                hint of bourbon. 
              </p>
              <p>
                With their fluffy texture and beautiful decoration, these <br/>
                cupcakes are the perfect dessert to celebrate any special occasion or just <br/>
                to treat yourself to something special.
              </p>
              <a href="#blogs" class="btn">learn more</a>
            </div>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section> -->

    <!-- CART ITEM -->
    <div class="cart-items-container">
      <div id="close-form" class="fas fa-times"></div>
      <h3 class="title">Checkout</h3>
      <div id="cart-summary">
        <h3>Cart Summary</h3>
        <table id="hasil" style="display: none;">
        </table>
        <div class="summary-row">
          <span>Total Items:</span>
          <span id="total-items">0</span>
        </div>
        <div class="summary-row">
          <span>Total Price:</span>
          <span id="total-price">Rp. 0</span>
        </div>
      </div>      
      <a href="ordering.php" class="btn" id="submitOrder">Checkout</a>
    </div>

  <!-- MENU -->
  <section class="menu" id="menu">
  <h1 class="heading">our <span> products</span></h1>
      <?php
      while ($row = mysqli_fetch_assoc($cakes)) {
        if($row["stok_kue"] > 0){
      ?> 
      <div class="box-container">
        <div class="box" data-name="p-1">
          <div class="image">
            <img src="img/kue/<?php echo $row["gambar_kue"]; ?>" alt="">
          </div>
          <div class="content">
            <h3><?php echo $row['nama_kue']; ?></h3>
            <!-- <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div> -->
            <span class="price"> <b>Rp</b> <?php echo $row['harga_kue']; ?></span>
            <br>
            <p class="details"> <?php echo $row['detail_kue']; ?></p>
            <br>
            <p class="details"> <b>Stok: </b> <?php echo $row['stok_kue']; ?></p>
            <br>
            <button class="btn cart-nambah" data-cart='<?= json_encode($row); ?>'>Add To Cart</button>
          </div>
        </div>
        <?php
        }}
        ?>
    </section>


    <!--products-preview-->
    <?php
      while ($row = mysqli_fetch_assoc($cakes)) {
        ?> 
    <div id="popup1" class="popup">
      <div class="popup-content">
        <img src="img/kue/<?php echo $row["gambar_kue"]; ?>" alt="">
        <h2> <?php echo $row['harga_kue']; ?> </h2>
        <!-- <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i> -->
      </div>
        <p> <?php echo $row['detail_kue']; ?> </p>
        <p>Stok   :<?php echo $row['stok_kue']; ?></p>
        <p class="price"> <?php echo $row['harga_kue']; ?></p>
        <button class="btn" >Add To</button>
        <button class="close-btn" onclick="closePopup('popup1')">X</button>
        <?php
        }
        ?>
      </div>
    </div>

    <footer class="footer" id="contact">
      <div class="mainBox">
        <div class="logoContent">
          <h1 class="logoNamee"><span>CookieKu</span></h1>
        </div>
        <p>
          We are happy to invite you to visit our shop <br/>and enjoy the delicious
          dishes we provide. <br/>Please explore our menu and find your favorite
          dish. <br/>We hope to welcome you soon to our shop!!!
        </p>
      </div>
      <div class="box-container">
        <div class="box">
          <h3>Contact Info</h3>
          <a href="#"> <i class="fas fa-phone"></i>+62 812 345 6789</a>
          <a href="#"> <i class="fas fa-envelope"></i>psti@unram.ac.id</a>
        </div>
      </div>
      <div class="share">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
      </div>
    </footer>
    <script src = "cart.js"></script>
    <script src = "index.js"></script>
  </body>
</html>
