document.addEventListener('DOMContentLoaded', function () {
    var productos = document.querySelectorAll(".h-polos, .h-bottoms, .h-abrigos, .h-accesorios");
    productos.forEach(function (producto) {
        producto.style.display = "none";
    });

    // Agregar un evento a un botón (por ejemplo, un botón con la clase .m-polotops)
    var togglepolotops = document.querySelector(".h-polotops");
    var togglebottoms = document.querySelector(".hbottoms");
    var toggleabrigosca = document.querySelector(".h-abrigosca");
    var togglehaccesorios = document.querySelector(".haccesorios");

    // Tu código JavaScript aquí
    const polohElement = document.querySelector(".h-polos");
    const bottomhElement = document.querySelector(".h-bottoms");
    const abrigohElement = document.querySelector(".h-abrigos");
    const accesoriohElement = document.querySelector(".h-accesorios");

    function togglepolotoph() {
        polohElement.style.display = "block"; // Mostrar el elemento
        bottomhElement.style.display = "none";
        abrigohElement.style.display = "none";
        accesoriohElement.style.display = "none";
        $('.h-polos').empty();

        // Después de cambiar a la sección de polotops, ejecuta la solicitud AJAX
        var category = ' polo'; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'hombre';
        $.ajax({
            url: '../database/cargar_data.php?category=' + category+'&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Crea elementos HTML y agrega los datos del producto
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.h-polos').append(listItem);}
            },
            error: function () {
                console.error('Error al cargar los datos del producto desde la base de datos.');
            }
        });
    }

    function togglebottomh() {
        polohElement.style.display = "none"; // Mostrar el elemento
        bottomhElement.style.display = "block";
        abrigohElement.style.display = "none";
        accesoriohElement.style.display = "none";
        $('.h-bottoms').empty();

        // Después de cambiar a la sección de vestidos, ejecuta la solicitud AJAX
        var category = ' jean'; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'hombre';
        $.ajax({
            url: '../database/cargar_data.php?category=' + category+'&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Crea elementos HTML y agrega los datos del producto
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.h-bottoms').append(listItem);}
            },
            error: function () {
                console.error('Error al cargar los datos del producto desde la base de datos.');
            }
        });
    }

    function toggleabrigos() {
        polohElement.style.display = "none";  // Mostrar el elemento
        bottomhElement.style.display = "none";
        abrigohElement.style.display = "block";
        accesoriohElement.style.display = "none";
        $('.h-abrigos').empty();

        // Después de cambiar a la sección de abrigos, ejecuta la solicitud AJAX
        var category = ' abrigo'; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'hombre';
        $.ajax({
            url: '../database/cargar_data.php?category=' + category+'&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Crea elementos HTML y agrega los datos del producto
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.h-abrigos').append(listItem);}
            },
            error: function () {
                console.error('Error al cargar los datos del producto desde la base de datos.');
            }
        });
    }

    function toggleaccesoriosm() {
        polohElement.style.display = "none"; // Mostrar el elemento
        bottomhElement.style.display = "none";
        abrigohElement.style.display = "none";
        accesoriohElement.style.display = "block";
        $('.h-accesorios').empty();

        // Después de cambiar a la sección de accesorios, ejecuta la solicitud AJAX
        var category = 'accesorio'; // Cambia esto para obtener productos de diferentes categorías
        var gender = 'hombre';
        $.ajax({
            url: '../database/cargar_data.php?category=' + category+'&gender=' + gender,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Crea elementos HTML y agrega los datos del producto
                for (var i = 0; i < data.length; i++) {
                    var img = $('<img>').attr('src', data[i].image_url);
                    var nombre = $('<p>').text(data[i].name);
                    var precio = $('<p>').text('$' + data[i].unit_price);
                    var enlaceDetalle = $('<a class="img-links">').attr('href', '../pages/product_detail.php?id=' + data[i].id);
                    enlaceDetalle.append(img).append(nombre).append(precio);
                    var listItem = $('<li>').append(enlaceDetalle);
                    $('.h-accesorios').append(listItem);
                }
            },
            error: function () {
                console.error('Error al cargar los datos del producto desde la base de datos.');
            }
        });
    }

    togglepolotops.addEventListener("click", togglepolotoph);
    togglebottoms.addEventListener("click", togglebottomh);
    toggleabrigosca.addEventListener("click", toggleabrigos);
    togglehaccesorios.addEventListener("click", toggleaccesoriosm);


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