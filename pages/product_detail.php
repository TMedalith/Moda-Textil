<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moda Textil</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="icon" href="/assets/images/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <?php
    // Conexión a la base de datos
    $servername = "localhost"; // Cambia esto según la configuración de tu servidor MySQL
    $username = "administrador";
    $password = "administrador";
    $database = "ModaTextil";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Obtener el ID del producto de la URL (asumiendo que se pasa como parámetro GET)
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Consulta para obtener los detalles del producto
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los detalles del producto
            $row = $result->fetch_assoc();
            echo "<div class='container'>";
            echo "<div class=\"product\">";
            echo "<div class=\"product-details\">";
            echo "<h1>{$row['name']}</h1>";
            echo "<p>{$row['description']}</p>";
            echo "<p>Categoría: {$row['category']}</p>";
            echo "<p>Precio: $" . number_format($row['unit_price'], 2) . "</p>";
            echo "<p>Género: {$row['gender']}</p>";
            echo "<button class='add-to-cart' data-product-id='{$row['id']}'>Agregar al carrito</button>";
            echo "</div>";
            echo "<img class=\"p-images\" src='{$row['image_url']}' alt='{$row['name']}'/>";
            echo "</div>";
             echo "</div>";

        } else {
            die("Producto no encontrado.");
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        die("ID de producto no especificado en la URL.");
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var product_id = $(this).data("product-id");

            // Realizar una solicitud AJAX para agregar el producto al carrito
            $.ajax({
                type: "POST",
                url: "procesoacarrito.php",
                data: { product_id: product_id },
                success: function (response) {
                    alert(response);
                }
            });
        });
    });
</script>


    <?php include '../pages/auten.php'; ?>
    <?php include('../includes/footer.php'); ?>
    <script src="../assets/scripts/product_detail.js"></script>
</body>
</html>
