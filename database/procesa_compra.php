<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['customer_id'])) {
    echo "error"; // Otra respuesta para manejar la falta de autenticación
    exit();
}

// Recuperar el customer_id desde la sesión
$customer_id = $_SESSION['customer_id'];

// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    echo "error"; // Manejar el error de conexión
    exit();
}

// Insertar la compra en la tabla 'orders' y obtener el ID de la orden
$sql_insert_order = "INSERT INTO orders (ordered_date,status, customers_id) VALUES (NOW(),'pendiente', '$customer_id')";

if ($conn->query($sql_insert_order) === TRUE) {
    $order_id = $conn->id; // Obtener el ID de la orden recién creada

    // Iterar a través de los productos en el carrito y guardarlos en 'order_items'
    foreach ($_POST['productIds'] as $product_id) {
        $quantity = $_POST['quantity'][$product_id];
        $price = $_POST['price'][$product_id];
        // Insertar el producto en 'order_items'
        $sql_insert_item = "INSERT INTO order_details ( quantity, price,products_id,orders_id) VALUES ( '$quantity', '$price','$product_id', '$order_id')";
        $conn->query($sql_insert_item); // Ejecutar la inserción
    }

    echo "success"; // Éxito al registrar la compra
} else {
    echo "error"; // Error al registrar la orden
}

// Cerrar la conexión
$conn->close();
?>
