<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";  // Cambia esto por tu servidor de base de datos
$username = "root";         // Cambia esto por tu usuario de base de datos
$password = "";             // Cambia esto por tu contraseña de base de datos
$dbname = "tienda12";       // Cambia esto por el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar qué formulario se ha enviado
if (isset($_POST['numero'])) {
    $numeroGenerado = $_POST['numero']; // La opción seleccionada en el formulario
    $idRegistro = $_POST['idRegistro']; // El ID del registro a eliminar

    // Consultar si el registro existe antes de eliminar
    $recordExists = false;
    $message = "";
    $alertType = "error"; // Variable para el tipo de mensaje

    switch ($numeroGenerado) {
        case 1:
            // Verificar si el registro existe en la tabla 'almacen'
            $sqlCheck = "SELECT * FROM almacen WHERE IdAlmacen = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'almacen'
                $sql = "DELETE FROM almacen WHERE IdAlmacen = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Registro de Almacén eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 2:
            // Verificar si el registro existe en la tabla 'jefe'
            $sqlCheck = "SELECT * FROM jefe WHERE IdJefe = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'jefe'
                $sql = "DELETE FROM jefe WHERE IdJefe = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Registro de Jefe eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 3:
            // Verificar si el registro existe en la tabla 'localidad'
            $sqlCheck = "SELECT * FROM localidad WHERE IdLocalidad = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'localidad'
                $sql = "DELETE FROM localidad WHERE IdLocalidad = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Registro de Localidad eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 4:
            // Verificar si el registro existe en la tabla 'marcas'
            $sqlCheck = "SELECT * FROM marcas WHERE IdMarca = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'marcas'
                $sql = "DELETE FROM marcas WHERE IdMarca = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Registro de Marca eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 5:
            // Verificar si el registro existe en la tabla 'productos'
            $sqlCheck = "SELECT * FROM productos WHERE IdProducto = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'productos'
                $sql = "DELETE FROM productos WHERE IdProducto = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Producto eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 6:
            // Verificar si el registro existe en la tabla 'proveedor'
            $sqlCheck = "SELECT * FROM proveedor WHERE IdProveedor = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'proveedor'
                $sql = "DELETE FROM proveedor WHERE IdProveedor = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Proveedor eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 7:
            // Verificar si el registro existe en la tabla 'sueldo'
            $sqlCheck = "SELECT * FROM sueldo WHERE IdVendedor = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'sueldo'
                $sql = "DELETE FROM sueldo WHERE IdVendedor = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Sueldo eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 8:
            // Verificar si el registro existe en la tabla 'tienda'
            $sqlCheck = "SELECT * FROM tienda WHERE IdTienda = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'tienda'
                $sql = "DELETE FROM tienda WHERE IdTienda = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Tienda eliminada exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 9:
            // Verificar si el registro existe en la tabla 'tiposdano'
            $sqlCheck = "SELECT * FROM tiposdano WHERE IdTipoDano = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'tiposdano'
                $sql = "DELETE FROM tiposdano WHERE IdTipoDano = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Tipo de Daño eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 10:
            // Verificar si el registro existe en la tabla 'vendedor'
            $sqlCheck = "SELECT * FROM vendedor WHERE IdVendedor = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'vendedor'
                $sql = "DELETE FROM vendedor WHERE IdVendedor = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Vendedor eliminado exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        case 11:
            // Verificar si el registro existe en la tabla 'venta'
            $sqlCheck = "SELECT * FROM venta WHERE IdVenta = '$idRegistro'";
            $result = $conn->query($sqlCheck);
            if ($result->num_rows > 0) {
                $recordExists = true;
                // Eliminar de la tabla 'venta'
                $sql = "DELETE FROM venta WHERE IdVenta = '$idRegistro'";
                if ($conn->query($sql) === TRUE) {
                    $message = "Venta eliminada exitosamente.";
                    $alertType = "success"; // Mensaje de éxito
                } else {
                    $message = "Error al eliminar el registro: " . $conn->error;
                }
            }
            break;

        default:
            $message = "Selección no válida.";
    }

    // Si no se encuentra el registro, mostrar un mensaje
    if (!$recordExists) {
        $message = "No se encontró el registro con ID: $idRegistro.";
    }

    // Mostrar la ventana emergente con el mensaje
    echo "<script type='text/javascript'>
            alert('$message');
            window.location.href = 'eliminar.html'; // Cambia 'formulario.php' por la URL de tu formulario
        </script>";

    // Cerrar la conexión
    $conn->close();
}
?>
