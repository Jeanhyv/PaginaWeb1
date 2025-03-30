<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";  // Cambia esto si tu usuario de MySQL es diferente
$password = "";      // Cambia esto si tu contraseña es diferente
$dbname = "MiTienda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los registros de la tabla Usuarios
$sql = "SELECT id, nombre, correo FROM Usuarios";
$result = $conn->query($sql);

// Mostrar los resultados en una tabla HTML
if ($result->num_rows > 0) {
    echo "<h2>Lista de Usuarios</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>";
    
    // Mostrar los datos de cada usuario
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["correo"] . "</td>
            </tr>";
    }
    
    echo "</table>";
} else {
    echo "No hay usuarios registrados.";
}

// Cerrar la conexión
$conn->close();
?>
