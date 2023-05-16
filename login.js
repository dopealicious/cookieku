const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

function login() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  if (email !== "" && password !== "") {
    alert("Login berhasil!");
  } else {
    alert("Harap isi username dan password.");
  }
}

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
