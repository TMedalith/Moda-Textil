<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Conecta a la base de datos (reemplaza con tus propios datos de conexión)
    $servername = "localhost"; // Cambia esto según la configuración de tu servidor MySQL
    $username = "administrador";
    $password = "administrador";
    $database = "ModaTextil";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verifica si se proporciona un parámetro "categoria" en la solicitud GET
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $gender = $_GET['gender'];
        // Consulta para obtener los productos de la categoría especificada
        $sql = "SELECT id, image_url, name, unit_price FROM products WHERE category = '$category' AND gender = '$gender' LIMIT 4";
        $result = $conn->query($sql);
        $products = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row; // Agrega cada producto al array
            }
            echo json_encode($products);
        } else {
            echo "No se encontraron productos en la categoría $category. Error: " . mysqli_error($conn);
        }
    } else {
        echo "No se especificó una categoría en la solicitud.";
    }

    $conn->close();
?>
