const signUpButton = document.getElementById("signup");
const signInButton = document.getElementById("signin");
const container = document.getElementById('container');
// const logInButton = document.getElementById("login");

// let userEmail = '';
// let userPassword = '';

// var email = document.getElementById('email-logIn');
// email.addEventListener("input", (e) => {
//   userEmail = e.target.value;
// })

// var password = document.getElementById('password-logIn');
// password.addEventListener('input', (e) => {
//   userPassword = e.target.value;
// })

// var password = document.getElementById("password").value;

// function login() {
//   if (userEmail == '') {
//     alert('input email first!');
//   } else if (userPassword == ''){
//     alert('input password!');
//   } else {
//     // compare database with user credential logic is here
//     alert('login success!');
//     window.location.href = 'index.php';
//     exit;
//   }
// }

// function sign() {
//   var name = document.getElementById('name').value;
//   var email = document.getElementById('email').value;
//   var password = document.getElementById('password').value;
//   if (name == '' || email == '' || password == '') {
//     console.log('Hello world!');
//     alert('Your account has been created!')
    
//   } else {
//     alert('Please enter the correct information!')
//   }
// }

// logInButton.addEventListener("click", () => {
//   login();
// }); 

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
