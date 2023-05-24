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
// RIVIEW CUSTOMER
function swiper() {
  var swiper = new Swiper(".review-row", {
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
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
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
