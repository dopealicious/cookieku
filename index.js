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

var swiper = new Swiper(".blogs", {
  grabCursor: true,
  loop: true,
  cnteredSlides: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

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

// let previewMenu = document.querySelector(".menu-preview");
// let previewBox = previewMenu.querySelectorAll(".preview");

// document.querySelectorAll(".btn").forEach((product) => {
//   product.onclick = () => {
//     previewMenu.style.display = "flex";
//     let name = product.getAttribute("data-name");
//     previewBox.forEach((preview) => {
//       let target = preview.getAttribute("data-target");
//       if (name == target) {
//         preview.classList.add("active");
//       }
//     });
//   };
// });

// previewBox.forEach((close) => {
//   close.querySelector(".fa-xmark").onclick = () => {
//     close.classList.remove("active");
//     previewMenu.style.display = "none";
//   };
// });
