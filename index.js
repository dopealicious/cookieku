// LOGIN JIKA TEKAN ADD TO CART
function addToCart() {
  alert("Silahkan Login Terlebih Dahulu!");
  window.location.href = "login.html";
}

// HEADER
let navbar = document.querySelector(".header .navbar");
let menu = document.querySelector("#menu-btn");

menu.onclick = () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
};

let cart = document.querySelector(".cart-items-container");

document.querySelector("#cart-btn").onclick = () => {
  cart.classList.add("active");
};

document.querySelector("#close-form").onclick = () => {
  cart.classList.remove("active");
};

// PROFILE
const profileIcon = document.getElementById("profile-icon");
const profileDropdown = document.getElementById("profile-dropdown");
const profilePopup = document.getElementById("profile-popup");
const profileBtn = document.getElementById("profile-btn");
const statusBtn = document.getElementById("status-btn");
const profileCloseButton = document.getElementById("profile-close-button");
const statusPopup = document.getElementById("status-popup");
const closeBtn = document.getElementById("status-close-button");

profileIcon.addEventListener("click", function () {
  profileDropdown.classList.toggle("hidden");
});

function closeStatusPopup() {
  statusPopup.classList.remove("transparent-bg");
  statusPopup.classList.add("hidden");
}

closeBtn.addEventListener("click", closeStatusPopup);

function closeProfilePopup() {
  profilePopup.classList.add("hidden");
  setTimeout(function () {
    document.body.classList.remove("transparent-bg");
  }, 200);
}

profileCloseButton.addEventListener("click", closeProfilePopup);

profileBtn.addEventListener("click", function () {
  profilePopup.classList.remove("hidden");
  statusPopup.classList.add("hidden"); // Menutup popup status jika sedang terbuka
  statusPopup.classList.remove("transparent-bg");
});

statusBtn.addEventListener("click", function () {
  statusPopup.classList.add("transparent-bg");
  statusPopup.classList.remove("hidden"); // Menutup popup profil jika sedang terbuka
});

const logoutButton = document.getElementById("logout-btn");
function handleLogout() {
  window.location.href = "login.html";
}
logoutButton.addEventListener("click", handleLogout);

document.querySelector(".save-btn").addEventListener("click", function () {
  var nameInput = document.getElementById("editName");
  var addressInput = document.getElementById("editAddress");
  var phoneInput = document.getElementById("editPhone");
  var profileName = document.getElementById("profileName");
  var profileAddress = document.getElementById("profileAddress");
  var profilePhone = document.getElementById("profilePhone");

  profileName.textContent = nameInput.value;
  profileAddress.textContent = addressInput.value;
  profilePhone.textContent = phoneInput.value;

  nameInput.style.display = "none";
  addressInput.style.display = "none";
  phoneInput.style.display = "none";
  profileName.style.display = "block";
  profileAddress.style.display = "block";
  profilePhone.style.display = "block";

  alert("Perubahan profil disimpan!");
});

document.getElementById("profileName").addEventListener("click", function () {
  var nameInput = document.getElementById("editName");
  var profileName = document.getElementById("profileName");

  nameInput.style.display = "block";
  profileName.style.display = "none";
});

document
  .getElementById("profileAddress")
  .addEventListener("click", function () {
    var addressInput = document.getElementById("editAddress");
    var profileAddress = document.getElementById("profileAddress");

    addressInput.style.display = "block";
    profileAddress.style.display = "none";
  });

document.getElementById("profilePhone").addEventListener("click", function () {
  var phoneInput = document.getElementById("editPhone");
  var profilePhone = document.getElementById("profilePhone");

  phoneInput.style.display = "block";
  profilePhone.style.display = "none";
});

// FORM ORDER
// Ambil nilai dari profil detail
const profileNameElement = document.getElementById("orderProfileName");
const profileAddressElement = document.getElementById("orderProfileAddress");
const profilePhoneElement = document.getElementById("orderProfilePhone");

// Mengisi nilai dari profil ke dalam elemen HTML
profileNameElement.textContent = profileName;
profileAddressElement.textContent = profileAddress;
profilePhoneElement.textContent = profilePhone;
logoutButton.addEventListener("click", function () {
  window.location.href = "login.html";
});

function openStatusPopup() {
  var statusPopup = document.getElementById("status-popup");
  statusPopup.classList.remove("hidden");
  statusPopup.classList.add("visible");
}

function handleStatusChange() {
  var statusSelect = document.getElementById("status");
  var reviewForm = document.getElementById("review-form");

  if (statusSelect.value === "telah-diterima") {
    reviewForm.classList.remove("hidden");
  } else {
    reviewForm.classList.add("hidden");
  }
}

function submitReview() {
  var reviewText = document.getElementById("review-text").value;
  alert("Review telah dikirim: " + reviewText);
}

// Tambahkan event listener ke elemen dengan id "review"
document.getElementById("review").addEventListener("click", swiper);

// Fungsi untuk membuka popup
function openPopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.style.visibility = "visible";
  popup.style.opacity = "1";
}

// Fungsi untuk menutup popup
function closePopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.style.visibility = "hidden";
  popup.style.opacity = "0";
}

function togglePaymentFields() {
  var paymentMethod = document.getElementById("paymentMethod").value;
  var paymentFields = document.getElementsByClassName("paymentFields");

  // Semua field pembayaran disembunyikan
  for (var i = 0; i < paymentFields.length; i++) {
    paymentFields[i].style.display = "none";
  }

  // Field pembayaran yang sesuai dengan metode dipilih ditampilkan
  if (paymentMethod === "BankTransfer") {
    document.getElementById("bankTransferFields").style.display = "block";
  } else if (paymentMethod === "Ewallet") {
    document.getElementById("ewalletFields").style.display = "block";
  }
}

// FORMULIR
function submitForm(event) {
  event.preventDefault(); // Menghentikan submit form

  // Mengambil nilai-nilai input dari form
  var name = document.getElementById("name").value;
  var alamat = document.getElementById("alamat").value;
  var catatan = document.getElementById("catatan").value;
  var flavor = document.getElementById("flavor").value;
  var deliveryDate = document.getElementById("deliveryDate").value;
  // var ProofOfPayment = document.getElementById("ProofOfPayment").value;
  var paymentMethod = document.getElementById("paymentMethod").value;
  var message = "Terima kasih, " + name + "! Pesanan Anda telah diterima.";

  if (paymentMethod === "BankTransfer") {
    var bankName = document.getElementById("bankName").value;
    var accountNumber = document.getElementById("accountNumber").value;

    // Proses pembayaran dengan transfer bank
    message +=
      "\nMetode Pembayaran: Transfer Bank\nBank: " +
      bankName +
      "\nNomor Rekening: " +
      accountNumber;
  } else if (paymentMethod === "Ewallet") {
    var ewalletName = document.getElementById("ewalletName").value;
    var ewalletId = document.getElementById("ewalletId").value;

    // Proses pembayaran dengan dompet elektronik
    message +=
      "\nMetode Pembayaran: Dompet Elektronik\nE-wallet: " +
      ewalletName +
      "\nID E-wallet: " +
      ewalletId;
  }

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        document.getElementById("preview").src = e.target.result;
        document.getElementById("preview").style.display = "block";
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  // Panggil fungsi readURL saat memilih file
  document
    .getElementById("ProofOfPayment")
    .addEventListener("change", function () {
      readURL(this);
    });
  // Ambil elemen tabel rincian pembayaran
  const paymentDetailsTable = document.getElementById("paymentDetailsTable");

  // Generate isi tabel rincian pembayaran
  const generatePaymentDetails = () => {
    // Kosongkan isi tabel sebelumnya
    paymentDetailsTable.innerHTML = "";

    // Buat baris untuk subtotal produk
    const subtotalRow = document.createElement("tr");
    const subtotalLabel = document.createElement("td");
    subtotalLabel.textContent = "Subtotal Produk";
    const subtotalValue = document.createElement("td");
    subtotalValue.textContent = `Rp. ${totalPrice}`;
    subtotalRow.appendChild(subtotalLabel);
    subtotalRow.appendChild(subtotalValue);

    // Buat baris untuk biaya layanan
    const serviceFeeRow = document.createElement("tr");
    const serviceFeeLabel = document.createElement("td");
    serviceFeeLabel.textContent = "Biaya Layanan";
    const serviceFeeValue = document.createElement("td");
    serviceFeeValue.textContent = "Rp. 4.000";
    serviceFeeRow.appendChild(serviceFeeLabel);
    serviceFeeRow.appendChild(serviceFeeValue);

    // Buat baris untuk total pembayaran
    const totalPaymentRow = document.createElement("tr");
    const totalPaymentLabel = document.createElement("td");
    totalPaymentLabel.textContent = "Total Pembayaran";
    const totalPaymentValue = document.createElement("td");
    const totalPaymentAmount = totalPrice + 4000; // Total pembayaran
    totalPaymentValue.textContent = `Rp. ${totalPaymentAmount}`;
    totalPaymentRow.appendChild(totalPaymentLabel);
    totalPaymentRow.appendChild(totalPaymentValue);

    // Tambahkan baris-baris ke tabel
    paymentDetailsTable.appendChild(subtotalRow);
    paymentDetailsTable.appendChild(serviceFeeRow);
    paymentDetailsTable.appendChild(totalPaymentRow);
  };

  // Panggil fungsi untuk menghasilkan isi tabel rincian pembayaran
  generatePaymentDetails();

  // STRUK
  var orderSummary = document.getElementById("orderSummary");
  orderSummary.innerHTML = `
  <div class="card">
    <h2>Rincian Pesanan</h2>
    <p><strong>Nama:</strong> ${name}</p>
    <p><strong>Alamat:</strong> ${alamat}</p>
    <p><strong>Catatan:</strong> ${catatan}</p>
    <p><strong>Rasa:</strong> ${flavor}</p>
    <p><strong>Tanggal Pengambilan:</strong> ${deliveryDate}</p>
    <p><strong>Metode Pembayaran:</strong> ${paymentMethod}</p>
    <p><strong>Total Pembayaran:</strong> Rp.154.000</p>
  </div>
`;

  alert(message);
  // Reset form
  document.getElementById("orderForm").reset();
}

// STRUK
function openPopupp() {
  var popup = document.getElementById("popupp");
  popup.style.display = "block";
}

function closePopupp() {
  var popup = document.getElementById("popupp");
  popup.style.display = "none";
}

// Data produk
const products = [
  {
    name: "bakery item 1",
    price: "$45.99/-",
    image: "assets/images/menu1.jpg",
  },
  {
    name: "bakery item 2",
    price: "$15.99/-",
    image: "assets/images/menu2.jpg",
  },
  {
    name: "bakery item 3",
    price: "$29.99/-",
    image: "assets/images/menu3.jpg",
  },
];

// CART
function addToCart(productName, productImage, price) {
  const cartItem = document.createElement("div");
  cartItem.classList.add("cart-item");

  const removeButton = document.createElement("span");
  removeButton.classList.add("fas", "fa-times");
  removeButton.addEventListener("click", removeFromCart);
  cartItem.appendChild(removeButton);

  const image = document.createElement("img");
  image.src = productImage;
  image.alt = productName;
  cartItem.appendChild(image);

  const content = document.createElement("div");
  content.classList.add("content");

  const name = document.createElement("h3");
  name.textContent = productName;
  content.appendChild(name);

  const productPrice = document.createElement("div");
  productPrice.classList.add("price");
  productPrice.textContent = price;
  content.appendChild(productPrice);

  cartItem.appendChild(content);

  const cartContainer = document.getElementById("cart-items");
  cartContainer.appendChild(cartItem);

  // Update total price
  updateTotalPrice(parseFloat(price));

  showNotification("Product added to cart");
}

// Function to remove a product from the cart
function removeFromCart(event) {
  const removeButton = event.target;
  const cartItem = removeButton.parentElement;
  const cartContainer = document.getElementById("cart-items");
  const priceElement = cartItem.querySelector(".price");
  const price = parseFloat(priceElement.textContent.replace(/[^\d.]/g, ""));
  cartContainer.removeChild(cartItem);

  // Deduct the price from the total
  updateTotalPrice(-price);
}

// Fungsi untuk memperbarui total harga
function updateTotalPrice(price) {
  const totalPriceElement = document.getElementById("total-price");
  const currentTotal = parseFloat(
    totalPriceElement.textContent.replace(/[^\d.]/g, "")
  );
  const newTotal = currentTotal + price;
  totalPriceElement.textContent = formatPrice(newTotal);
}

// Fungsi untuk memformat harga menjadi format yang diinginkan (misalnya: 100,000)
function formatPrice(price) {
  return price.toLocaleString("en-US", { style: "currency", currency: "USD" });
}

// Contoh penggunaan fungsi addToCart
addToCart("Product 1", "product1.jpg", 23.0);
addToCart("Product 2", "product2.jpg", 21.0);
addToCart("Product 3", "product3.jpg", 16.0);
addToCart("Product 4", "product4.jpg", 8.0);
addToCart("Product 5", "product5.jpg", 18.0);
addToCart("Product 6", "product6.jpg", 26.0);
addToCart("Product 7", "product7.jpg", 22.0);
addToCart("Product 8", "product8.jpg", 14.0);
addToCart("Product 9", "product9.jpg", 23.0);

// ...

// // Fungsi untuk memperbarui total harga di bagian Submit Order
// function updateSubmitOrderTotalPrice(price) {
//   const totalPriceElement = document.getElementById("total-price-submit");
//   const currentTotal = parseFloat(
//     totalPriceElement.textContent.replace(/[^\d.]/g, "")
//   );
//   const newTotal = currentTotal + price;
//   totalPriceElement.textContent = formatPrice(newTotal);
// }

// Fungsi untuk menampilkan pemberitahuan
function showNotification(message) {
  const notification = document.createElement("div");
  notification.classList.add("notification");
  notification.textContent = message;

  document.body.appendChild(notification);

  // Hilangkan pemberitahuan setelah beberapa detik
  setTimeout(function () {
    notification.remove();
  }, 3000);
}

// Fungsi untuk mengupdate total harga dan total produk
function updateTotalPrice() {
  const totalProductsElement = document.getElementById("total-products");
  const totalPriceElement = document.getElementById("total-price");

  const cartItems = document.getElementsByClassName("cart-item");
  let totalProducts = 0;
  let totalPrice = 0;

  for (let i = 0; i < cartItems.length; i++) {
    const priceElement = cartItems[i].querySelector(".price");
    const price = parseFloat(priceElement.textContent.replace(/[^\d.]/g, ""));
    totalProducts++;
    totalPrice += price;
  }

  totalProductsElement.textContent = totalProducts;
  totalPriceElement.textContent = "Rp. " + totalPrice.toFixed(3);
}
