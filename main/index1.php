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
          <h2 class="profile-name" id="profileName"><span><?php echo $user["Name"]; ?></span></h2>
        </div>
        <div class="profile-details">
          <p>
            <strong>Alamat:<br /></strong>
            <span id="profileAddress"><?php echo $user["Address"]; ?></span>
          </p>
          <p>
            <strong>No. Telepon:<br /></strong>
            <span id="profilePhone"><?php echo $user["Phone"]; ?></span>
          </p>
          <form action="profile.php" method="post">
            <input type="text" name="editPhone" id="editPhone" class="edit-input" value="<?php echo $user["Phone"]; ?>" required />
            <input type="text" name="editName" id="editName" class="edit-input" value="<?php echo $user["Name"]; ?>" required />
            <input type="text" name="editAddress" id="editAddress" class="edit-input" value="<?php echo $user["Address"]; ?>" required />
            <div class="profile-actions">
              <button class="save-btn" type="submit" name="save">Simpan</button>
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
          <span id="total-products">0</span>
        </div>
        <div class="summary-row">
          <span>Total Price:</span>
          <span id="total-price">Rp. 0</span>
        </div>
      </div>      
      <a href="ordering.html" class="btn" id="submitOrder">Checkout</a>
    </div>

  <!-- MENU -->
    <section class="menu" id="menu">
      <h1 class="heading">our <span> products</span></h1>
      <div class="box-container">
        <div class="box" data-name="p-1">
          <div class="image">
            <img src="assets/images/menu1.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Cerry Pie</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="price">Rp. 23.000/slice</span>
            <button class="btn" onclick="openPopup('popup1')">View Details</button>
          </div>
        </div>

        <div class="box">
          <div class="image">
            <img src="assets/images/menu2.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Cheese Cake</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="price">Rp. 21.000/slice</span>
            <button class="btn" onclick="openPopup('popup2')">View Details</button>
          </div>
        </div>

        <div class="box">
          <div class="image">
            <img src="assets/images/menu3.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Chocolate Crepe Cake</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <span class="price">Rp. 16.000/slice</span>
            <button class="btn" onclick="openPopup('popup3')">View Details</button>
          </div>
        </div>

        <div class="box">
          <div class="image">
            <img src="assets/images/menu4.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Cookies</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="price">Rp. 8.000/pcs</span>
            <button class="btn" onclick="openPopup('popup4')">View Details</button>
          </div>
        </div>

        <div class="box">
          <div class="image">
            <img src="assets/images/menu5.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Cream Jam Donat</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <span class="price">Rp. 18.000/pcs</span>
            <button class="btn" onclick="openPopup('popup5')">View Details</button>
          </div>
        </div>

        <div class="box">
          <div class="image">
            <img src="assets/images/menu6.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Croissant</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="price">Rp. 26.000/pcs</span>
            <button class="btn" onclick="openPopup('popup6')">View Details</button>
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="assets/images/menu7.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Pancakes</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="price">Rp. 22.000/pcs</span>
            <button class="btn" onclick="openPopup('popup7')">View Details</button>
          </div>
        </div>

        <div class="box">
          <div class="image">
            <img src="assets/images/menu8.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Strawberry Sandwich</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <span class="price">Rp. 14.000/slice</span>
            <button class="btn" onclick="openPopup('popup8')">View Details</button>
          </div>
        </div>

        <div class="box" data-name="p-1">
          <div class="image">
            <img src="assets/images/menu9.jpg" alt="" />
          </div>
          <div class="content">
            <h3>Waffles</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="price">Rp. 23.000/pcs</span>
            <button class="btn" onclick="openPopup('popup9')">View Details</button>
          </div>
        </div>
        </div>
      </div>
    </section>

    <!--products-preview-->
    <div id="popup1" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu1.jpg" alt="Product 1" />
        <h2>Cerry Pie</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Cerry Pie kami terdiri dari kulit pie renyah yang diisi dengan <br/> 
          ceri segar, memberikan rasa manis dan sedikit keasaman. <br/>
          Pie ini mengandung gizi dari buah ceri yang kaya akan serat, <br/>
          vitamin C, dan antioksidan.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 23.000</p>
        <button class="btn" onclick="addToCart('Cerry Pie', 'assets/images/menu1.jpg', '23.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup1')">X</button>
      </div>
    </div>

    <div id="popup2" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu2.jpg" alt="Product 2" />
        <h2>Cheese Cake</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Cheese Cake kami mengandung kelembutan dan keharuman <br/>
          keju yang memikat. Dibuat dengan bahan-bahan berkualitas tinggi, <br/>
          cheesecake ini adalah sumber kalsium, protein, dan vitamin A <br/>
          yang baik untuk kesehatan tulang dan pertumbuhan.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 21.000</p>
        <button class="btn" onclick="addToCart('Cheese Cake', 'assets/images/menu2.jpg','21.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup2')">X</button>
      </div>
    </div>

    <div id="popup3" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu3.jpg" alt="Product 3" />
        <h2>Chocolate Crepe Cake</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Chocolate Crepe Cake kami terdiri dari lapisan crepe tipis yang <br/>
          lembut dan lezat, serta lapisan krim cokelat yang memanjakan lidah. <br/>
          Kue ini mengandung cokelat yang kaya akan antioksidan dan zat besi <br/>
          yang penting untuk kesehatan dan energi.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 16.000</p>
        <button class="btn" onclick="addToCart('Chocolate Crepe Cake', 'assets/images/menu3.jpg','16.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup3')">X</button>
      </div>
    </div>

    <div id="popup4" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu4.jpg" alt="Product 4" />
        <h2>Cookies</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Cookies kami mengandung bahan-bahan premium seperti cokelat chip, <br/>
          kacang, atau cranberry. Camilan ini mengandung energi dari karbohidrat <br/>
          kompleks dan sedikit serat, menjadikannya pilihan yang baik untuk <br/>
          mengisi kebutuhan camilan.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 8.000</p>
        <button class="btn" onclick="addToCart('Cookies', 'assets/images/menu4.jpg','8.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup4')">X</button>
      </div>
    </div>

    <div id="popup5" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu5.jpg" alt="Product 5" />
        <h2>Cream Jam Donat</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Cream Jam Donat kami mengandung donat yang lembut dengan <br/>
          isian selai buah seperti strawberry, blueberry, atau <br/>
          raspberry. Donat ini mengandung karbohidrat, protein, <br/>
          dan lemak sehat yang memberikan energi dan nutrisi.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 18.000</p>
        <button class="btn" onclick="addToCart('Cream Jam Donat', 'assets/images/menu5.jpg','18.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup5')">X</button>
      </div>
    </div>

    <div id="popup6" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu6.jpg" alt="Product 6" />
        <h2>Croissant</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Croissant kami terbuat dari bahan berkualitas tinggi dan <br/>
          mengandung mentega yang memberikan tekstur lembut dan rasa <br/>
          khas. Croissant ini adalah sumber energi dari karbohidrat <br/>
          dan lemak sehat.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 26.000</p>
        <button class="btn" onclick="addToCart('Croissant', 'assets/images/menu6.jpg','26.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup6')">X</button>
      </div>
    </div>

    <div id="popup7" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu7.jpg" alt="Product 7" />
        <h2>Pancakes</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Pancakes kami terbuat dari adonan yang lembut dan <br/>
          mengandung tepung, telur, dan susu. Pancake ini <br/>
          mengandung karbohidrat, protein, dan kalsium yang <br/>
          penting untuk energi dan kesehatan tulang.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 22.000</p>
        <button class="btn" onclick="addToCart('Pancakes', 'assets/images/menu7.jpg','22.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup7')">X</button>
      </div>
    </div>

    <div id="popup8" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu8.jpg" alt="Product 8" />
        <h2>Strawberry Sandwich</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
      </div>
        <p>Strawberry Sandwich kami terdiri dari potongan roti lembut <br/>
          yang diisi dengan selai strawberry segar dan potongan buah-<br/>
          buahan. Sandwich ini mengandung serat, vitamin C, dan <br/>
          antioksidan dari buah strawberry yang menyehatkan.</p>
        <p>Stok   : 12</p>
        <p class="price">Rp. 14.000</p>
        <button class="btn" onclick="addToCart('Strawberry Sandwich', 'assets/images/menu8.jpg','14.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup8')">X</button>
      </div>
    </div>

    <div id="popup9" class="popup">
      <div class="popup-content">
        <img src="assets/images/menu9.jpg" alt="Product 9" />
        <h2>Waffles</h2>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p>Waffles kami terbuat dari adonan gurih dengan tekstur renyah <br/>
          di luar dan lembut di dalam. Waffle ini mengandung karbohidrat, <br/>
          protein, dan serat yang memberikan energi dan rasa kenyang. <br/>
          Dapat dinikmati dengan sirup dan buah-buahan segar sebagai <br/>
          tambahan nutrisi.</p>
        <p class="stok">Stok   : 12</p>
        <p class="price">Rp. 23.000</p>
        <button class="btn" onclick="addToCart('Waffles', 'assets/images/menu9.jpg','23.000')">Add To Cart</button>
        <button class="close-btn" onclick="closePopup('popup9')">X</button>
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
