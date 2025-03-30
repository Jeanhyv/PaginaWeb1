<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Tienda10");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    
    if ($role == "vendedor") {
        $query = "SELECT * FROM Vendedor WHERE IdVendedor = ? AND password = ?";
    } elseif ($role == "jefe") {
        $query = "SELECT * FROM Jefe WHERE IdJefe = ? AND password = ?";
    } else {
        die("Rol no válido");
    }

    // Comprobar si la consulta es válida
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error en la consulta SQL: " . $conn->error);
    }

    // Usar bind_param correctamente (tipo i para enteros y s para cadenas)
    $stmt->bind_param("is", $id, $password);  // El primer parámetro es el ID (entero), el segundo es la contraseña (cadena)
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();  // Obtener los datos del usuario
        $_SESSION["user"] = $id;
        $_SESSION["role"] = $role;  // Guardar el rol en la sesión
        
        // Guardar el nombre en la sesión
        if ($role == "vendedor") {
            $_SESSION["nombre"] = $user["Nombre"];  // Suponiendo que la columna se llama "Nombre" en la tabla Vendedor
        } elseif ($role == "jefe") {
            $_SESSION["nombre"] = $user["Nombre"];  // Suponiendo que la columna se llama "Nombre" en la tabla Jefe
        }

        header("Location: PaginaWeb.html");  // Redirigir a la página principal
        exit();  // Asegúrate de que no se ejecute código adicional después de redirigir
    } else {
        // Si no se encuentra el usuario, mostrar un error
        echo "<script>alert('ID o contraseña incorrectos');</script>";
    }
    $stmt->close();
}

$conn->close();
?>
