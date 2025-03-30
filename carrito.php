<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_producto = $_POST['IdProducto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $cantidad = $_POST['cantidad'];

    // Crear estructura del producto
    $producto = [
        'id_producto' => $id_producto,
        'nombre' => $nombre,
        'precio' => $precio,
        'imagen' => $imagen,
        'cantidad' => $cantidad
    ];

    // Si el carrito no está definido, lo inicializamos
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar producto al carrito
    $_SESSION['carrito'][] = $producto;

    // Redireccionar de vuelta a la página anterior
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
