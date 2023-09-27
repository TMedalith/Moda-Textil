<?php
// Iniciar la sesión (asegúrate de haber iniciado la sesión en tus otros archivos, si es necesario)
session_start();

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

$registroExitoso = false; // Variable de bandera para el registro exitoso
$registroError = "";     // Variable para almacenar mensajes de error de registro
$inicioSesionError = "";  // Variable para almacenar mensajes de error de inicio de sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register-submit'])) {
        // Recuperar datos del formulario de registro
        $newuname = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['new-password'];

        $sql = "SELECT * FROM customers WHERE email = '$email' OR username = '$newuname'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['email'] == $email) {
                    $registroError = "El correo electrónico ya existe en la base de datos. ";
                }
                if ($row['username'] == $newuname) {
                    $registroError .= "El nombre de usuario ya existe en la base de datos.";
                }
            }
        } else {
            // Si no existe un usuario con el mismo correo o nombre de usuario, entonces procede con la inserción
            $sql_insert = "INSERT INTO customers (username, email, password) VALUES ('$newuname', '$email', '$pass')";
            if ($conn->query($sql_insert) === TRUE) {
                $registroExitoso = true;
            } else {
                $registroError = "Error al registrar el usuario: " . $conn->error;
            }
        }
    } elseif (isset($_POST['login-submit'])) {
        // Recuperar datos del formulario de inicio de sesión
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM customers WHERE username = '$uname' AND password = '$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $uname;
            $row_customer_id =$row_customer_id = $result->fetch_assoc();
            $_SESSION['customer_id'] = $row_customer_id['id'];
            header("Location: /index.php");
            exit();
        } else {
            $inicioSesionError = "Inicio de sesión fallido. La cuenta no existe.";
        }
    }
}
?>

<!-- Formulario de Registro -->
<div class="form-popup" id="register-popup" style="display: none;">
    <div class="form-content">
        <h3>Registrarse</h3>
        <form action="" method="post">
            <input type="text" id="name" name="name" placeholder="Usuario" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="new-password" name="new-password" placeholder="Contraseña" required>
            <p class="error-message"><?php echo $registroError; ?></p> <!-- Mostrar mensaje de error aquí -->
            <?php if ($registroExitoso) { ?>
                <p class="success-message">Registro exitoso. Puede iniciar sesión.</p>
            <?php } ?>
            <button type="submit" id="register-button" class="form-button" name="register-submit">Registrarse</button>
            <a class="auth-link" id="login-link1">Iniciar Sesión</a>
        </form>
    </div>
</div>

<!-- Formulario de Inicio de Sesión -->
<div class="form-popup" id="login-popup">
    <div class="form-content">
        <h3>Iniciar Sesión</h3>
        <form action="" method="post">
            <input type="text" id="username" name="username" placeholder="Usuario" required>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>
            <p class="error-message"><?php echo $inicioSesionError; ?></p> <!-- Mostrar mensaje de error aquí -->
            <button type="submit" id="auth-button" class="form-button" name="login-submit">Iniciar Sesión</button>
            <a class="auth-link" id="register-link">Registrarse</a>
        </form>
    </div>
</div>
