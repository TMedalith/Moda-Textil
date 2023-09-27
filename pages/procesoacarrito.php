<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['cart'][$product_id])) {
        // Si el producto ya está en el carrito, aumenta la cantidad en 1
        $_SESSION['cart'][$product_id]++;
    } else {
        // Si el producto no está en el carrito, agrégalo con una cantidad de 1
        $_SESSION['cart'][$product_id] = 1;
    }
    
    // Puedes responder con un mensaje de éxito o redirigir al usuario a la página del carrito
    echo "El producto se agregó al carrito correctamente";
} 
?>
