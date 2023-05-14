const closeButton = document.getElementById('close-register-button');
const registerButton = document.getElementById('create-acc-button');
console.log(1111, closeButton);


closeButton.addEventListener('click', (e) => {
    console.log(22222222, e);
    
    document.getElementsByClassName('register-form')[0].classList.add('hide');

});

registerButton.addEventListener('click', () => {
    document.getElementsByClassName('register-form')[0].classList.remove('hide');
});