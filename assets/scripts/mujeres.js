document.addEventListener('DOMContentLoaded', function () {
    var productos = document.querySelectorAll(".vestidos, .polotops, .abrigosca, .accesoriosm");
    productos.forEach(function (producto) {
        producto.style.display = "none";
    });
    // Agregar un evento a un botón (por ejemplo, un botón con la clase .m-polotops)
    var toggleButton = document.querySelector(".m-polotops");
    var toggleVesButton = document.querySelector(".mvestidos");
    var toggleAbriButton = document.querySelector(".m-abrigosca");
    var toggleAccButton = document.querySelector(".maccesorios");
    // Tu código JavaScript aquí
    const polotopsElement = document.querySelector(".polotops");
    const vestidosElement = document.querySelector(".vestidos");
    const abrigosElement = document.querySelector(".abrigosca");
    const accesoriosmElement = document.querySelector(".accesoriosm");

    // Función para mostrar u ocultar .polotops
    function togglePolotops() {
        console.log("Función togglePolotops ejecutada");
        console.log("Valor actual de display:", polotopsElement.style.display);
        polotopsElement.style.display = "block"; // Mostrar el elemento
        vestidosElement.style.display ="none";
        abrigosElement.style.display ="none";
        accesoriosmElement.style.display ="none";
        $('.polotops').empty();
        // Después de cambiar a la sección de polotops, ejecuta la solicitud AJAX
        var category = ' polo '; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'mujer';
        $.ajax({
            url: '../database/cargar_data.php?category=' + category+ '&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Crea elementos HTML y agrega los datos del producto
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.polotops').append(listItem);
                }
            },
            error: function() {
                console.error('Error al cargar los datos del producto desde la base de datos.');
            }
        });
    };
        


    function togglevestidos() {
        console.log("Función toggleVestidos ejecutada");
        console.log("Valor actual de display:", vestidosElement.style.display);
        vestidosElement.style.display = "block"; // Mostrar el elemento
        polotopsElement.style.display = "none";
        abrigosElement.style.display = "none";
        accesoriosmElement.style.display = "none";
        $('.vestidos').empty();
        
        // Después de cambiar a la sección de vestidos, ejecuta la solicitud AJAX
        var category = ' vestido'; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'mujer';
        $.ajax({
            url: '../database/cargar_data.php?category=' + category + '&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('Datos recibidos:', data);
                // Crea elementos HTML y agrega los datos de los productos
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.vestidos').append(listItem);
                }
            },
            error: function() {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    }
    

    function toggleabrigos() {
        console.log("Función togglePolotops ejecutada");
        console.log("Valor actual de display:", polotopsElement.style.display);
        polotopsElement.style.display = "none"; // Mostrar el elemento
        vestidosElement.style.display ="none";
        abrigosElement.style.display ="block";
        accesoriosmElement.style.display ="none";
        $('.abrigosca').empty();
        // Después de cambiar a la sección de polotops, ejecuta la solicitud AJAX
        var category = ' abrigo '; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'mujer';
         $.ajax({
            url: '../database/cargar_data.php?category=' + category +'&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Crea elementos HTML y agrega los datos del producto
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.abrigosca').append(listItem);
                }
            },
            error: function() {
                console.error('Error al cargar los datos del producto desde la base de datos.');
            }
        });
    }

    function toggleaccesoriosm() {
        console.log("Función togglePolotops ejecutada");
        console.log("Valor actual de display:", polotopsElement.style.display);
        polotopsElement.style.display = "none"; // Mostrar el elemento
        vestidosElement.style.display ="none";
        abrigosElement.style.display ="none";
        accesoriosmElement.style.display ="block";

        $('.accesoriosm').empty();
        // Después de cambiar a la sección de polotops, ejecuta la solicitud AJAX
        var category = 'accesorio '; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'mujer';
         $.ajax({
            url: '../database/cargar_data.php?category=' + category +'&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Crea elementos HTML y agrega los datos del producto
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.accesoriosm').append(listItem);}
            },
            error: function() {
                console.error('Error al cargar los datos del producto desde la base de datos.');
            }
        });
    }

    toggleButton.addEventListener("click", togglePolotops);
    toggleVesButton.addEventListener("click", togglevestidos);
    toggleAbriButton.addEventListener("click", toggleabrigos);
    toggleAccButton.addEventListener("click", toggleaccesoriosm);


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
    document.addEventListener('click', (event) => {
        if (event.target === loginPopup || event.target === registerPopup) {
            loginPopup.style.display = 'none';
            registerPopup.style.display = 'none';
        }
    });
});


