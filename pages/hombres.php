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
    <script src="../assets/scripts/hombres.js"></script>
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

    <section class="prod-hombres">
        <div class="bot-titu">
            <button class="h-polotops">Polos</button>
            <button class="hbottoms">Jeans</button>
            <button class="h-abrigosca">Abrigos y Casacas</button>
            <button class="haccesorios">Accesorios</button>
        </div>
        <div class="h-polos">
            <div><img src="/assets/images/poloh.png" class="poloh"><h5>PoloH</h5></div>
            <div><img src="/assets/images/poloh.png" class="poloh"><h5>Polo</h5></div>
            <div><img src="/assets/images/poloh.png" class="poloh"><h5>Polo</h5></div>
            <div><img src="/assets/images/poloh.png" class="poloh"><h5>Polo</h5></div>
            <div><img src="/assets/images/poloh.png" class="poloh"><h5>Polo</h5></div>
            <div><img src="/assets/images/poloh.png" class="poloh"><h5>Polo</h5></div>
        </div>      
        
        <div class="h-bottoms">
            <div><img src="/assets/images/bottom.png" class="bottomh">
                <h5>Bottom</h5>
            </div>
            <div><img src="/assets/images/bottom.png" class="bottomh">
                <h5>Bottom</h5>
            </div>
            <div><img src="/assets/images/bottom.png" class="bottomh">
                <h5>Bottom</h5>
            </div>
            <div><img src="/assets/images/bottom.png" class="bottomh">
                <h5>Bottom</h5>
            </div>
            <div><img src="/assets/images/bottom.png" class="bottomh">
                <h5>Bottom</h5>
            </div>
            <div><img src="/assets/images/bottom.png" class="bottomh">
                <h5>Bottom</h5>
            </div>
        </div>
        <div class="h-abrigos">
            <div><img src="/assets/images/abrigos.png" class="abrigoh">
                <h5>Abrigo</h5>
            </div>
            <div><img src="/assets/images/abrigos.png" class="abrigoh">
                <h5>Abrigo</h5>
            </div>
            <div><img src="/assets/images/abrigos.png" class="abrigoh">
                <h5>Abrigo</h5>
            </div>
            <div><img src="/assets/images/abrigos.png" class="abrigoh">
                <h5>Abrigo</h5>
            </div>
            <div><img src="/assets/images/abrigos.png" class="abrigoh">
                <h5>Abrigo</h5>
            </div>
            <div><img src="/assets/images/abrigos.png" class="abrigoh">
                <h5>Abrigo</h5>
            </div>
        </div>
        <div class="h-accesorios">
            <div><img src="/assets/images/gorroh.png" class="accesorioh">
                <h5>Accesorio</h5>
            </div>
            <div><img src="/assets/images/gorroh.png" class="accesorioh">
                <h5>Accesorio</h5>
            </div>
            <div><img src="/assets/images/gorroh.png" class="accesorioh">
                <h5>Accesorio</h5>
            </div>
            <div><img src="/assets/images/gorroh.png" class="accesorioh">
                <h5>Accesorio</h5>
            </div>
            <div><img src="/assets/images/gorroh.png" class="accesorioh">
                <h5>Accesorio</h5>
            </div>
            <div><img src="/assets/images/gorroh.png" class="accesorioh">
                <h5>Accesorio</h5>
            </div>
        </div>
        

    </section>

    
    
    <div class="form-popup" id="login-popup">
        <div class="form-content">
            <h3>Iniciar Sesión</h3>
            <form action="#" method="post">
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
                <input type="text" id="name" name="name" placeholder="Nombres" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="new-password" name="new-password" placeholder="Contraseña" required>
                <button type="submit" id="register-button" class="form-button">Registrarse</button>
                <a class="auth-link" id="login-link1">Iniciar Sesión</a>
            </form>
        </div>
    </div>
    
</body>
</html>


<?php
include('../includes/footer.php');
?>
