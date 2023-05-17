const signUpButton = document.getElementById('signUp');
const logInButton = document.getElementById('logIn');
const container = document.getElementById("container");

function login() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  if (email == '' || password == '') {
    console.log("Hello world!");
    alert('Login success!');
  } else {
    alert('Please enter the correct information!');
  }
}

function sign() {
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  if (name == '' || email == '' || password == '') {
    console.log('Hello world!');
    alert('Your account has been created!')
    
  } else {
    alert('Please enter the correct information!')
  }
}

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

logInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
