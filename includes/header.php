<?php
session_start();
?>
<header>
    <a href="/index.php"><img class="logo" src="/assets/images/logo.png" alt="Moda Textil Logo"></a>
    <nav>
        <ul class="user-links">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<li><a class="auth-link">' . $_SESSION['username'] . '</a></li>';
                echo '<li><a href="/pages/logout.php">Cerrar Sesión</a></li>';
            } else {
                echo '<li><a href="#" id="login-link" class="auth-link">Iniciar Sesión</a></li>';
            }
            ?>
            <li><a href="../pages/cart.php" id="cart-link" class="">Carrito</a></li>
        </ul>
    </nav>
</header>
