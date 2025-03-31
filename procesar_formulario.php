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
    $message = ''; // Mensaje para la alerta
    $alertType = 'error'; // Tipo de alerta (éxito o error)

    switch ($numeroGenerado) {
        case 1:
            $idProducto = $_POST['idProducto'];
            $idCantidad = $_POST['idCantidad'];
            $sql = "INSERT INTO almacen (IdProducto, IdCantidad) VALUES ('$idProducto', '$idCantidad')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nuevo registro en Almacén agregado exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 2:
            $nombre = $_POST['nombre'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $diaNacimiento = $_POST['diaNacimiento'];
            $idVendedor = $_POST['idVendedor'];
            $password = $_POST['password'];
            $sql = "INSERT INTO jefe (Nombre, ApellidoMaterno, ApellidoPaterno, DiaNacimiento, IdVendedor, Password)
                    VALUES ('$nombre', '$apellidoMaterno', '$apellidoPaterno', '$diaNacimiento', '$idVendedor', '$password')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nuevo registro de Jefe agregado exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 3:
            $nombreLocalidad = $_POST['nombreLocalidad'];
            $sql = "INSERT INTO localidad (NombreLocalidad) VALUES ('$nombreLocalidad')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nueva localidad agregada exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 4:
            $nombreMarca = $_POST['nombreMarca'];
            $sql = "INSERT INTO marcas (NombreMarca) VALUES ('$nombreMarca')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nueva marca agregada exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 5:
            $nombreProducto = $_POST['nombreProducto'];
            $idMarca = $_POST['idMarca'];
            $fechaCaducidad = $_POST['fechaCaducidad'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $idTipoDano = $_POST['idTipoDano'];
            $imagenes = $_POST['imagenes'];
            $sql = "INSERT INTO productos (Nombre, IdMarca, FechaCaducidad, Cantidad, Precio, IdTipoDano, imagenes)
                    VALUES ('$nombreProducto', '$idMarca', '$fechaCaducidad', '$cantidad', '$precio', '$idTipoDano', '$imagenes')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nuevo producto agregado exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 6:
            $idMarca = $_POST['idMarca'];
            $idProducto = $_POST['idProducto'];
            $sql = "INSERT INTO proveedor (IdMarca, IdProducto) VALUES ('$idMarca', '$idProducto')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nuevo proveedor agregado exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 7:
            $idVendedor = $_POST['idVendedor'];
            $sueldo = $_POST['sueldo'];
            $sql = "INSERT INTO sueldo (IdVendedor, Sueldo) VALUES ('$idVendedor', '$sueldo')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nuevo sueldo agregado exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 8:
            $idLocalidad = $_POST['idLocalidad'];
            $idVendedor = $_POST['idVendedor'];
            $idJefe = $_POST['idJefe'];
            $idProveedor = $_POST['idProveedor'];
            $sql = "INSERT INTO tienda (IdLocalidad, IdVendedor, IdJefe, IdProveedor)
                    VALUES ('$idLocalidad', '$idVendedor', '$idJefe', '$idProveedor')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nueva tienda agregada exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 9:
            $descripcion = $_POST['descripcion'];
            $sql = "INSERT INTO tiposdano (Descripcion) VALUES ('$descripcion')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nuevo tipo de daño agregado exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 10:
            $nombre = $_POST['nombre'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $diaNacimiento = $_POST['diaNacimiento'];
            $password = $_POST['password'];
            $sql = "INSERT INTO vendedor (Nombre, ApellidoMaterno, ApellidoPaterno, DiaNacimiento, Password)
                    VALUES ('$nombre', '$apellidoMaterno', '$apellidoPaterno', '$diaNacimiento', '$password')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nuevo vendedor agregado exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        case 11:
            $idVendedor = $_POST['idVendedor'];
            $fecha = $_POST['fecha'];
            $monto = $_POST['monto'];
            $sql = "INSERT INTO venta (IdVendedor, Fecha, Monto) VALUES ('$idVendedor', '$fecha', '$monto')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nueva venta registrada exitosamente.";
                $alertType = 'success';
            } else {
                $message = "Error al agregar el registro: " . $conn->error;
            }
            break;

        default:
            $message = "Selección no válida.";
    }

    // Mostrar la alerta flotante y redirigir al formulario
    echo "<script type='text/javascript'>
            alert('$message');
            window.location.href = 'http://localhost/Hola/formulario_producto.php'; // Cambia 'formulario.php' por la URL de tu formulario
        </script>";
}

// Cerrar la conexión
$conn->close();
?>
