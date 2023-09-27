<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moda Textil</title>
    <link rel="stylesheet" href="../assets/styles/carrito.css">
    <link rel="icon" href="/assets/images/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/scripts/carrito.js"></script>
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

    //INCLUIR CODE PA MOSTRAR EL CARRITO
    // ME GENERA CHATGPT CUANDO LE DOY LA TABLA DE LA BASE DE DATOS Y ESTE php, que lo autocomplete y talves darle el boton de comprar

    include '../pages/auten.php'; ?>
    </br></br></br></br></br></br></br>
    <h1 class="carrito-h1">Carrito de Compras</h1>
    <h2 class="carrito-h2">Productos en el Carrito</h2>

    <table class="carrito-table">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
        </tr>
        <?php
        include 'procesoacarrito.php';
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                // Consulta para obtener detalles del producto
                $sql = "SELECT * FROM products WHERE id = $product_id";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $product = mysqli_fetch_assoc($result);
                    $subtotal = $product['unit_price'] * $quantity;

                    echo "<tr>";
                    echo "<td>" . $product['name'] . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>$" . $product['unit_price'] . "</td>";
                    echo "<td>$" . $subtotal . "</td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "</br></br>";
            echo "<tr><td colspan='4'>El carrito está vacío.</td></tr>";
        }
        ?>
    </table>
    <?php 
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo '<form method="post" action="">
        <button class="boton-carrito" type="submit" name="comprar">Comprar</button>
        </form>';
        }
    ?>
    <?php
        include '../pages/auten.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar'])) {
            // Crear una nueva orden en la tabla "orders"
            $ordered_date = date('Y-m-d H:i:s');
            $status = 'Pendiente'; // Puedes cambiar el estado según tus necesidades
            $customers_id = $_SESSION['customer_id']; // Asumo que tienes un valor de usuario almacenado en la sesión
            
            $insert_order_sql = "INSERT INTO orders (ordered_date, status, customers_id) VALUES (CURRENT_TIMESTAMP, 'Pendiente',$customers_id)";
            if ($conn->query($insert_order_sql)) {
                $order_id = $conn->insert_id; // Obtener el ID de la orden recién creada
                
                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                    // Consulta para obtener detalles del producto
                    $product_sql = "SELECT * FROM products WHERE id = $product_id";
                    $product_result = mysqli_query($conn, $product_sql);

                    if ($product_result && mysqli_num_rows($product_result) > 0) {
                        $product = mysqli_fetch_assoc($product_result);
                        $price = $product['unit_price'];
                        // Insertar detalles de la orden en la tabla "order_details"
                        $insert_details_sql = "INSERT INTO order_details (quantity, price, products_id, orders_id) VALUES ($quantity, $price, $product_id, $order_id)";
                        if($conn->query($insert_details_sql)){
                        echo "¡Compra realizada con éxito!";}
                    }
                }

                // Limpia el carrito después de la compra
                unset($_SESSION['cart']);

            } else {
                echo "Error al crear la orden: " . $conn->error;
            }
        }
    ?>

    <?php include('../includes/footer.php');?>
</body>
</html>
