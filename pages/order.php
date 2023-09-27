<?php include '../includes/header.php'; ?>
<?php include '../pages/auten.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moda Textil</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="icon" href="/assets/images/logo.png">
    <script src="../assets/scripts/mujeres.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <section class="selections">
        <ul class="select-h">
            <li><a href="mujeres.php">
                    <h5 class="c-mujeres">MUJERES</h5>
                </a></li>
            <li><a href="hombres.php">
                    <h5 class="c-hombres">HOMBRES</h5>
                </a></li>
        </ul>
    </section>

    <section class="prod-mujeres">
        <div class="bot-titu">
            <button class="mvestidos">Vestidos</button>
            <button class="m-polotops">Polos y tops</button>
            <button class="m-abrigosca">Abrigos y Casacas</button>
            <button class="maccesorios">Accesorios</button>
        </div>
        <ul class="vestidos">
            <li class="vestido">
                <a href="#"><img src="/assets/images/dress01.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
            <li class="vestido">
                <a href="#"><img src="/assets/images/dress02.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
        </ul>
        <ul class="polotops">
            <li class="polotop">
                <a href="#"><img src="/assets/images/dress01.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
            <li class="polotop">
                <a href="#"><img src="/assets/images/dress02.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
        </ul>
        <ul class="abrigosca">
            <li class="abrigom">
                <a href="#"><img src="/assets/images/dress01.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
            <li class="abrigom">
                <a href="#"><img src="/assets/images/dress02.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
        </ul>
        <ul class="accesoriosm">
            <li class="accesoriom">
                <a href="#"><img src="/assets/images/dress01.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
            <li class="accesoriom">
                <a href="#"><img src="/assets/images/dress02.jpg" alt=""></a>
                <p class="nombre-producto">Vestido</p>
                <p class="precio">Precio: S/200.00</p>
            </li>
        </ul>
    </section>

    
    <footer class="nav-bottom">
        <div class="b-info-display">
            <div class="colecciones">
                <h5 class="info-title">COLECCIONES</h5>
                <ul>
                    <h5 class="co-m">Mujer</h5>
                </ul>
                <ul>
                    <h5 class="co-h">Hombre</h5>
                </ul>
            </div>
            <div class="ayuda">
                <h5 class="info-title">AYUDA</h5>
                <ul>
                    <h5 class="a-cuenta">Mi cuenta</h5>
                </ul>
                <ul>
                    <h5 class="a-contacto">Contacto</h5>
                </ul>
            </div>
        </div>
        <div class="copyr">
            <br>
            <h5 class="t-copyr">El contenido de esta página web está protegido por copyright y es propiedad de Moda
                Textil.</h5><br><br><br>
        </div>
    </footer>
    
    <div class="form-popup" id="login-popup">
        <div class="form-content">
            <h3>Iniciar Sesión</h3>
            <form action="" method="post">
                <input type="text" id="username" name="username" placeholder="Usuario" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <button type="submit" id="auth-button" class="form-button">Iniciar Sesión</button>
                <a class="auth-link" id="register-link">Registrarse</a>
            </form>
        </div>
    </div>
    
    <div class="form-popup" id="register-popup" style="display: none;">
        <div class="form-content">
            <h3>Registrarse</h3>
            <form action="#" method="post">
                <input type="text" id="name" name="name" placeholder="username" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="new-password" name="new-password" placeholder="Contraseña" required>
                <button type="submit" id="register-button" class="form-button">Registrarse</button>
                <a class="auth-link" id="login-link1">Iniciar Sesión</a>
            </form>
        </div>
    </div>
    
</body>

</html>