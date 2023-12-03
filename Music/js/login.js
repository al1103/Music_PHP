const showPassword = document.querySelector('#eye-off');
const inputPassword = document.querySelector('#password');
const hiddenPassword = document.querySelector('#eye');

hiddenPassword.style.display = 'none';  
const togglePassword = () => {
    if (inputPassword.type === 'password') {
        inputPassword.type = 'text';
        hiddenPassword.style.display = 'block';
        showPassword.style.display = 'none';
    } else {
        inputPassword.type = 'password';
        hiddenPassword.style.display = 'none';
        showPassword.style.display = 'block';
    }
};

showPassword.addEventListener('click', () => {
    togglePassword();
});
hiddenPassword.addEventListener('click', () => {
    togglePassword();
    });