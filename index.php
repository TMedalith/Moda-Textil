

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moda Textil</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="icon" href="/assets/images/logo.png">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <main class="mujeres-hombres">

        <section class="selections">
            <ul class="select-h">
                <li><a href="/pages/mujeres.php">
                        <h5 class="c-mujeres">MUJERES</h5>
                    </a></li>
                <li><a href="/pages/hombres.php">
                        <h5 class="c-hombres">HOMBRES</h5>
                    </a></li>
            </ul>
        </section>

        <!-- Mujer -->
        <div class="im-con">
            <div class="image-container">
                <img src="/assets/images/mujerlt.png" class="mujeres-img">
            </div>
            <button class="comprar-button-m">Comprar ahora</button>
        </div>
        <!-- Hombre -->
        <div class="im-con">
            <div class="image-container">
                <img src="/assets/images/hombrelt.png" class="hombres-img">
            </div>
            <button class="comprar-button-h">Comprar ahora</button>
        </div>
    </main>

    
<?php include 'pages/auten.php'; 
include('includes/footer.php');
?>


    <script src="/assets/scripts/main.js"></script>
</body>

</html>





