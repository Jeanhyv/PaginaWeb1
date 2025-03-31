<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda12";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Sanitizar entrada (prevención básica de SQL Injection)
$busqueda = isset($_GET['busqueda']) ? $conn->real_escape_string($_GET['busqueda']) : '';

// Consulta segura
$sql = "SELECT * FROM productos WHERE Nombre LIKE '%$busqueda%'";
$resultado = $conn->query($sql); // ✅ Usa $conn

if ($resultado->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Caducidad</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Damage</th>
            <th>Imagen</th>
        </tr>";

    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>
            <td>".$fila['IdProducto']."</td>
            <td>".htmlspecialchars($fila['Nombre'])."</td>
            <td>".$fila['IdMarca']."</td>
            <td>".$fila['FechaCaducidad']."</td>
            <td>".$fila['Cantidad']."</td>
            <td>$".number_format($fila['Precio'], 2)."</td>
            <td>".$fila['IdTipoDamage']."</td>
            <td><img src='".htmlspecialchars($fila['imagenes'])."' width='50'></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados";
}

$conn->close(); // ✅ Cierra $conn
?>