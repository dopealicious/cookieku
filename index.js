// LOGIN JIKA TEKAN ADD TO CART
function addToCart() {
  window.location.href = "login.php";
}

function redirectToLogin() {
  window.location.href= "login.php";
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

