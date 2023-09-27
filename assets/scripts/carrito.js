const loginPopup = document.getElementById('login-popup');
const registerPopup = document.getElementById('register-popup');
const loginLink = document.getElementById('login-link');
const loginLink1 = document.getElementById('login-link1');
const registerLink = document.getElementById('register-link');
// Function to show the login popup
const showLoginPopup = () => {
    loginPopup.style.display = 'flex';
    registerPopup.style.display = 'none';
};
// Event listener to open login popup when the "Iniciar Sesión" link is clicked
//loginLink.addEventListener('click', showLoginPopup);

// Event listener to open login popup when the "Iniciar Sesión" link inside the registration popup is clicked
//loginLink1.addEventListener('click', showLoginPopup);

// Event listener to open the registration popup when the "Registrarse" link is clicked
/*registerLink.addEventListener('click', () => {
    loginPopup.style.display = 'none';
    registerPopup.style.display = 'flex';
});*/

// Function to close the popups when clicking outside
document.addEventListener('click', (event) => {
    if (event.target === loginPopup || event.target === registerPopup) {
        loginPopup.style.display = 'none';
        registerPopup.style.display = 'none';
    }
});

