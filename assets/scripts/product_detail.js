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
loginLink.addEventListener('click', showLoginPopup);

// Event listener to open login popup when the "Iniciar Sesión" link inside the registration popup is clicked
loginLink1.addEventListener('click', showLoginPopup);

// Event listener to open the registration popup when the "Registrarse" link is clicked
registerLink.addEventListener('click', () => {
    loginPopup.style.display = 'none';
    registerPopup.style.display = 'flex';
});

$(document).ready(function() {
    // Agregar evento de clic al botón "Agregar al carrito"
    $('.add-to-cart').on('click', function() {
        // Obtener el ID del producto desde el atributo data-product-id
        var productId = $(this).data('product-id');
        console.log('ID del producto:', productId);
        
        $.ajax({
            url: '../pages/cart.php', // URL de tu script de agregar al carrito
            type: 'POST',
            data: { product_id: productId }, // Datos que deseas enviar al servidor
            success: function(response) {
                window.location.href = '../pages/cart.php';
            },
            error: function() { 
                alert('Error al agregar el producto al carrito.');
            }
        });
    });
});

// Function to close the popups when clicking outside
document.addEventListener('click', (event) => {
    if (event.target === loginPopup || event.target === registerPopup) {
        loginPopup.style.display = 'none';
        registerPopup.style.display = 'none';
    }
});
