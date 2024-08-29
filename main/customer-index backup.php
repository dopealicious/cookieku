<?php
session_start();
include('functions.php');
$_SESSION['total_pesanan'] = 0;
$_SESSION['total_harga'] = 0;

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$idcustomer = query("SELECT * FROM customer");
$listmenu = "SELECT * FROM menu";
$cakes = $conn->query($listmenu);

// Cek submit udah ditekan apa belum
if (isset($_POST["simpan"])) {
    
  // cek apakah data berhasil ditambahkan atau tidak
  if (ubahprofil($_POST) > 0) {
      echo " <script> alert('Data customer berhasil diubah!');
      document.location.href = 'customer-index.php'
      </script>
      ";
  } else {
      echo "<script> 
      alert('Data customer gagal diubah!');
      document.location.href = 'customer-index.php'
      </script>
      ";
  }
}

if (isset($_POST["addcart"])) {
  $sum = $_POST["str1"] + $_POST["str2"];
  echo "The sum = ". $sum;
  echo "<script> alert('Data customer berhasil diubah!');
      </script>
      ";
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
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
            <li><a id="status-btn" onclick="openStatusPopup()">Status</a></li>
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
          <h2>Status <span>Pesanan</span></h2>
          <div class="status">
            <label for="status">Status:</label>
            <select id="status" onchange="handleStatusChange()">
              <option value="belum-diterima">Belum Diterima</option>
              <option value="telah-diterima">Telah Diterima</option>
            </select>
          </div>
          <div id="review-form" class="hidden">
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
          </div>
        </div>
      </div>

      <div class="icons">
        <div id="cart-btn" class="fas fa-shopping-cart"></div>
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

    <!-- BLOGS -->
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
    </section>

    <!-- CART ITEM -->
    <div class="cart-items-container">
      <div id="close-form" class="fas fa-times"></div>
      <h3 class="title">Checkout</h3>
      <div id="cart-items"></div>
      <div id="cart-summary">
        <h3>Cart Summary</h3>
        <div class="summary-row">
          <span>Total Products:</span>
          <span id="total_pesanan"> <?php echo $_SESSION["total_pesanan"]; ?> </span>
        </div>
        <div class="summary-row">
          <span>Total Price:</span>
          <span id="total_harga">Rp <?php echo $_SESSION["total_harga"]; ?></span>
        </div>
      </div>      
      <a href="ordering.php" class="btn" id="submitOrder">Checkout</a>
    </div>

  <!-- MENU -->
  <section class="menu" id="menu">
  <h1 class="heading">our <span> products</span></h1>
      <?php
      while ($row = mysqli_fetch_assoc($cakes)) {
      ?> 
      <div class="box-container">
        <div class="box" data-name="p-1">
          <div class="image">
            <img src="img/kue/<?php echo $row["gambar_kue"]; ?>" alt="">
          </div>
          <div class="content">
            <h3><?php echo $row['nama_kue']; ?></h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="price"> <b>Rp</b> <?php echo $row['harga_kue']; ?></span>
            <br>
            <span class="details"> <?php echo $row['detail_kue']; ?></span>
            <br>
            <button class="btn" type = "submit" name="addcart">Add To Carts</button>
          </div>
        </div>
        <?php
        }
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
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p> <?php echo $row['detail_kue']; ?> </p>
        <p>Stok   :<?php echo $row['stok_kue']; ?></p>
        <p class="price"> <?php echo $row['harga_kue']; ?></p>
        <button class="btn" onclick="keranjang('Cerry Pie', 'assets/images/menu1.jpg', '23.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup1')">X</button>
        <?php
        }
        ?>
      </div>
    </div>

    <!-- review section start here  -->
    <section class="review" id="review">
      <div class="heading">
          <h2>client <span>review</span></h2>
      </div>
      <div class=" swiper review-row">
          <div class="swiper-wrapper">
              <div class="swiper-slide box">
                  <div class="client-review">
                      <p>"The cookies are absolutely scrumptious, with a perfect blend of sweetness and a delightful crunch. very tasty!!!"
                      </p>
                      <div class="stars" style="text-align: center;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </div>
                  </div>
                  <div class="client-info">
                      <div class="img">
                          <img src="assets/images/costumer1.jpg" alt="">
                      </div>
                      <div class="clientDetailed">
                          <h3>Clarysa</h3>
                          <p>Chocolate Crepe Cake</p>
                      </div>
                  </div>
              </div>
              <div class="swiper-slide box">
                  <div class="client-review">
                      <p>"The waffles are heavenly, fluffy on the inside and crispy on the outside, making for a delightful breakfast treat."</p>
                      <div class="stars" style="text-align: center;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </div>
                  </div>
                  <div class="client-info">
                      <div class="img">
                          <img src="assets/images/costumer2.jpg" alt="">
                      </div>
                      <div class="clientDetailed">
                          <h3>Hardy Devid</h3>
                          <p>Waffless</p>
                      </div>
                  </div>
              </div>
              <div class="swiper-slide box">
                  <div class="client-review">
                      <p>"The pancakes are simply divine, fluffy and light, making every bite a breakfast delight. very tasty!!!"<br/>....</p>
                      <div class="stars" style="text-align: center;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </div>
                  </div>
                  <div class="client-info">
                      <div class="img">
                          <img src="assets/images/costumer3.jpg" alt="">
                      </div>
                      <div class="clientDetailed">
                          <h3>Boy William</h3>
                          <p>Pancakes</p>
                      </div>
                  </div>
              </div>
              <div class="swiper-slide box">
                  <div class="client-review">
                      <p>"The cherry pie is a burst of fruity goodness, with a flaky crust and a sweet-tart filling that is pure bliss.</br>......"</p>
                      <div class="stars" style="text-align: center;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </div>
                  </div>
                  <div class="client-info">
                      <div class="img">
                          <img src="assets/images/costumer4.jpg" alt="">
                      </div>
                      <div class="clientDetailed">
                          <h3>Angel Delina</h3>
                          <p>Cookies</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- review section ends here  -->

    <!-- newsletter -->
    <section class="newsletter">
      <form action="">
        <h3>subscribe for latest update</h3>
        <input
          type="email"
          name=""
          placeholder="enter your email"
          id=""
          class="box"
        />
        <input type="button" value="subscribe" class="box2" />
      </form>
    </section>

    <footer class="footer" id="contact">
      <div class="box-container">
        <div class="mainBox">
          <div class="logoContent">
            <h1 class="logoNamee"><span>CookieKu</span></h1>
          </div>
          <p>
            Satisfy your cookie cravings at Cokieku! Discover irresistible recipes, 
            baking secrets, and inspiration. Join our cookie-loving community and indulge in delicious delights. 
          </p>
        </div>
        <div class="box">
          <h3>Quick link</h3>
          <a href="#"> <i class="fas fa-arrow-right"></i>Home</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>about</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>menu</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>review</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>contact</a>
        </div>
        <div class="box">
          <h3>Extra link</h3>
          <a href="#"> <i class="fas fa-arrow-right"></i>Account info</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>order item</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>privacy policy</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>payment method</a>
          <a href="#"> <i class="fas fa-arrow-right"></i>our services</a>
        </div>
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

    <script src="./index.js"></script>
  </body>
</html>
