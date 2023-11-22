var adminInfo = document.querySelector(".admin-info");
var dropdownMenu = document.querySelector(".dropdown-menu");

adminInfo.addEventListener("click", function () {
  dropdownMenu.classList.toggle("show");
});

function adminmainmenu() {
  window.location.href = "admin-index.php";
}

const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");
const logInButton = document.getElementById("login");

let username = "";
let userPassword = "";

var email = document.getElementById("email-logIn");
email.addEventListener("input", (e) => {
  username = e.target.value;
});

var password = document.getElementById("password-logIn");
password.addEventListener("input", (e) => {
  userPassword = e.target.value;
});

// var password = document.getElementById("password").value;

function login() {
  if (username == "") {
    alert("input email first!");
  } else if (userPassword == "") {
    alert("input password!");
  } else {
    alert("login success!");
    window.location.href = "admin.html";
    exit;
  }
}

logInButton.addEventListener("click", () => {
  login();
});
