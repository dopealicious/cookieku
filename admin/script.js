// Ambil semua tautan navigasi
var navLinks = document.querySelectorAll("nav ul li a");

// Tambahkan event listener untuk setiap tautan navigasi
navLinks.forEach(function (link) {
  link.addEventListener("click", function (event) {
    event.preventDefault(); // Mencegah perilaku default tautan

    var target = this.getAttribute("href"); // Ambil target bagian terkait

    // Semua bagian terkait diubah menjadi display "none" secara default
    var sections = document.querySelectorAll("section");
    sections.forEach(function (section) {
      section.style.display = "none";
    });

    // Tampilkan bagian terkait yang sesuai dengan tautan navigasi yang diklik
    var targetSection = document.querySelector(target);
    targetSection.style.display = "block";
  });
});
