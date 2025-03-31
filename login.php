<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Tienda12");

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


    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error en la consulta SQL: " . $conn->error);
    }


    $stmt->bind_param("is", $id, $password);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();  
        $_SESSION["user"] = $id;
        $_SESSION["role"] = $role;  
        

        if ($role == "vendedor") {
            $_SESSION["nombre"] = $user["Nombre"];  
            header("Location: PaginaWeb.html");  
        } elseif ($role == "jefe") {
            $_SESSION["nombre"] = $user["Nombre"];  
            header("Location: Administrador.html");  
        }
        exit();  
    } else {

        echo "<script>alert('ID o contraseña incorrectos');</script>";
    }
    $stmt->close();
}

$conn->close();
?>
