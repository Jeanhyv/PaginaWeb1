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
                    echo "Registro de Almacén eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Registro de Jefe eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Registro de Localidad eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Registro de Marca eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Producto eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Proveedor eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Sueldo eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Tienda eliminada exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Tipo de Daño eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Vendedor eliminado exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo "Venta eliminada exitosamente.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            break;

        default:
            echo "Selección no válida.";
    }

    // Si no se encuentra el registro, mostrar un mensaje
    if (!$recordExists) {
        echo "No se encontró el registro con ID: $idRegistro.";
    }
}

// Cerrar la conexión
$conn->close();
?>
