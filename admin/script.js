var adminInfo = document.querySelector(".admin-info");
var dropdownMenu = document.querySelector(".dropdown-menu");

adminInfo.addEventListener("click", function () {
  dropdownMenu.classList.toggle("show");
});

function kembaliKeMenuUtama() {
  window.location.href = "admin.html";
}
