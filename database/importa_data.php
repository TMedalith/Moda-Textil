<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto según la configuración de tu servidor MySQL
$username = "administrador";
$password = "administrador";
$database = "ModaTextil";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$data = 'data.csv';
$fileHandle = fopen($data, 'r');

if ($fileHandle !== false) {
    // Iterar sobre cada línea del archivo CSV
    fgetcsv($fileHandle);
    while (($row = fgetcsv($fileHandle, 1000, ',')) !== false) {
        // Preparar los datos para la inserción en la base de datos
        $name = $row[2];  // product_name
        $description = $row[6];  // description
        $category = $row[1];  // Category
        $gender = $row[0];  // gender

        $imagenesJson = $row[4]; // Obtener la cadena JSON completa
        // Eliminar comillas simples (') de la cadena JSON
        $imagenesJson = str_replace("'", "\"", $imagenesJson);
        // Decodificar el JSON
        $imagenes = json_decode($imagenesJson, true);
        // Comprobar si se decodificó correctamente
        if (is_array($imagenes) && count($imagenes) > 0) {
            // Obtener la primera URL de imagen
            $firstImage = reset($imagenes);
            $image_url = key($firstImage);
        } else {
            $image_url = null; // En caso de que el JSON sea inválido o esté vacío
        }

        $precio = $row[5];
        $precio = str_replace(["₹", ",", " "], "", $precio);
        $unit_price = number_format((floatval($precio)/83.10),2);

        // Crear la consulta SQL para insertar los datos en la tabla "products"
        $sql = "INSERT INTO products (name, description, category, unit_price, image_url, gender) VALUES (?, ?, ?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Enlazar los parámetros con los valores y especificar los tipos de datos
        $stmt->bind_param('ssssss', $name, $description, $category, $unit_price, $image_url, $gender);

        // Ejecutar la consulta
        $stmt->execute();

        // Verificar si la inserción fue exitosa
        if ($stmt->affected_rows > 0) {
            echo "Datos insertados correctamente.<br>";
        } else {
            echo "Error al insertar datos: " . $stmt->error . "<br>";
        }

        // Cerrar la declaración
        $stmt->close();
    }

    // Cerrar el archivo CSV
    fclose($fileHandle);
} else {
    die("Error al abrir el archivo CSV.");
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
