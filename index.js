// LOGIN JIKA TEKAN ADD TO CART
function addToCart() {
  alert("Silahkan Login Terlebih Dahulu!");
  window.location.href = "login.html";
}

var cartBtn = document.getElementById("cart-btn");
cartBtn.addEventListener("click", function () {
  alert("Silahkan Login Terlebih Dahulu!");
  window.location.href = "login.html";
});

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
const closeBtn = document.createElement("span");

closeBtn.innerHTML = "&times;";
closeBtn.classList.add("close-btn");
profilePopup.appendChild(closeBtn);

profileIcon.addEventListener("click", function () {
  profileDropdown.classList.toggle("hidden");
});

profileBtn.addEventListener("click", function () {
  profilePopup.classList.remove("hidden");
});

closeBtn.addEventListener("click", function () {
  profilePopup.classList.add("hidden");
});

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

// LOGOUT
logoutButton.addEventListener("click", function () {
  // Lakukan aksi logout di sini

  // Redirect ke halaman login atau halaman lain setelah logout
  window.location.href = "login.html";
});

var swiper = new Swiper(".blogs-row", {
  spaceBetween: 30,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextE1: ".swiper-button-next",
    prevE1: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 1,
    },
    1024: {
      slidesPerView: 1,
    },
  },
});

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
  var paymentMethod = document.getElementById("paymentMethod").value;

  // Mengirimkan data ke server atau melakukan tindakan lainnya
  // Contoh: Memproses pesanan dan pembayaran

  // Menampilkan pesan konfirmasi
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
