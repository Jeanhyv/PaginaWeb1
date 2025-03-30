<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "MiTienda";



if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO Productos (nombre, descripcion, precio, stock) VALUES ('$nombre_producto', '$descripcion', '$precio', '$stock')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo producto agregado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
</head>
<body>
    <h2>Formulario para Agregar un Producto</h2>
    <form method="POST">
        <label for="nombre_producto">Nombre del Producto:</label>
        <input type="text" id="nombre_producto" name="nombre_producto" required><br><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>
        
        <label for="stock">Cantidad en Stock:</label>
        <input type="number" id="stock" name="stock" required><br><br>

        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>

