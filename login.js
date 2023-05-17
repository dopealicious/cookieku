const signUpButton = document.getElementById('signUp');
const logInButton = document.getElementById('logIn');
const container = document.getElementById("container");

function login() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  if (email == '' || password == '') {
    console.log("Hello world!");
    alert('Login berhasil!');
  } else {
    alert('Harap isi username dan password.');
  }
}

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

logInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
