<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Selección - La Rosa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"], input[type="number"], input[type="date"], input[type="password"], input[type="file"] {
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .regresar {
            text-align: right;
            margin-top: 10px;
        }
        .regresar a {
            color: #007BFF;
            text-decoration: none;
        }
        .regresar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>La Rosa</h1>
        <form action="" method="POST">
            <label for="seleccion">Seleccionar opción:</label>
            <select id="seleccion" name="seleccion">
                <option value="almacen">Almacén</option>
                <option value="Jefe">Jefe</option>
                <option value="Localidad">Localidad</option>
                <option value="Marcas">Marcas</option>
                <option value="Producto">Producto</option>
                <option value="Proveedor">Proveedor</option>
                <option value="Sueldo">Sueldo</option>
                <option value="Tienda">Tienda</option>
                <option value="Tipos de Daño">Tipos de Daño</option>
                <option value="Vendedor">Vendedor</option>
                <option value="Venta">Venta</option>
            </select>
            <button type="submit">Mostrar formulario</button>
        </form>

        <div class="regresar">
            <a href="Administrador.html">Menu principal</a>
        </div>

        <?php
        if (isset($_POST['seleccion'])) {
            $seleccion = $_POST['seleccion'];
            echo "<h2>Formulario para $seleccion</h2>";
            switch ($seleccion) {
                case 'almacen':
                    $numeroGenerado = 1;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="idProducto">ID del Producto:</label><input type="number" id="idProducto" name="idProducto" required><br>';
                    echo '<label for="idCantidad">Cantidad:</label><input type="number" id="idCantidad" name="idCantidad" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Jefe':
                    $numeroGenerado = 2;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="nombre">Nombre:</label><input type="text" id="nombre" name="nombre" required><br>';
                    echo '<label for="apellidoPaterno">Apellido Paterno:</label><input type="text" id="apellidoPaterno" name="apellidoPaterno" required><br>';
                    echo '<label for="apellidoMaterno">Apellido Materno:</label><input type="text" id="apellidoMaterno" name="apellidoMaterno" required><br>';
                    echo '<label for="diaNacimiento">Fecha de Nacimiento:</label><input type="date" id="diaNacimiento" name="diaNacimiento" required><br>';
                    echo '<label for="idVendedor">ID del Vendedor:</label><input type="number" id="idVendedor" name="idVendedor"><br>';
                    echo '<label for="password">Contraseña:</label><input type="password" id="password" name="password" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Localidad':
                    $numeroGenerado = 3;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="nombreLocalidad">Nombre de la Localidad:</label><input type="text" id="nombreLocalidad" name="nombreLocalidad" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Marcas':
                    $numeroGenerado = 4;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="nombreMarca">Nombre de la Marca:</label><input type="text" id="nombreMarca" name="nombreMarca" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Producto':
                    $numeroGenerado = 5;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="nombreProducto">Nombre del Producto:</label><input type="text" id="nombreProducto" name="nombreProducto" required><br>';
                    echo '<label for="idMarca">ID de la Marca:</label><input type="number" id="idMarca" name="idMarca"><br>';
                    echo '<label for="fechaCaducidad">Fecha de Caducidad:</label><input type="date" id="fechaCaducidad" name="fechaCaducidad"><br>';
                    echo '<label for="cantidad">Cantidad:</label><input type="number" id="cantidad" name="cantidad"><br>';
                    echo '<label for="precio">Precio:</label><input type="number" step="0.01" id="precio" name="precio"><br>';
                    echo '<label for="idTipoDano">Tipo de Daño:</label><input type="number" id="idTipoDano" name="idTipoDano"><br>';
                    echo '<label for="imagenes">Imagen del Producto (Ingrese descripción de la imagen):</label><input type="text" id="imagenes" name="imagenes"><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Proveedor':
                    $numeroGenerado = 6;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="idMarca">ID de Marca:</label><input type="number" id="idMarca" name="idMarca" required><br>';
                    echo '<label for="idProducto">ID de Producto:</label><input type="number" id="idProducto" name="idProducto" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Sueldo':
                    $numeroGenerado = 7;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="idVendedor">ID del Vendedor:</label><input type="number" id="idVendedor" name="idVendedor" required><br>';
                    echo '<label for="sueldo">Sueldo:</label><input type="number" step="0.01" id="sueldo" name="sueldo" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Tienda':
                    $numeroGenerado = 8;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="idLocalidad">ID de Localidad:</label><input type="number" id="idLocalidad" name="idLocalidad" required><br>';
                    echo '<label for="idVendedor">ID del Vendedor:</label><input type="number" id="idVendedor" name="idVendedor"><br>';
                    echo '<label for="idJefe">ID del Jefe:</label><input type="number" id="idJefe" name="idJefe"><br>';
                    echo '<label for="idProveedor">ID del Proveedor:</label><input type="text" id="idProveedor" name="idProveedor"><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Tipos de Daño':
                    $numeroGenerado = 9;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="descripcion">Descripción del Daño:</label><input type="text" id="descripcion" name="descripcion" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Vendedor':
                    $numeroGenerado = 10;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="nombre">Nombre:</label><input type="text" id="nombre" name="nombre" required><br>';
                    echo '<label for="apellidoPaterno">Apellido Paterno:</label><input type="text" id="apellidoPaterno" name="apellidoPaterno" required><br>';
                    echo '<label for="apellidoMaterno">Apellido Materno:</label><input type="text" id="apellidoMaterno" name="apellidoMaterno" required><br>';
                    echo '<label for="diaNacimiento">Fecha de Nacimiento:</label><input type="date" id="diaNacimiento" name="diaNacimiento" required><br>';
                    echo '<label for="password">Contraseña:</label><input type="password" id="password" name="password" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                case 'Venta':
                    $numeroGenerado = 11;
                    echo '<form action="http://localhost/Hola/procesar_formulario.php" method="post">';
                    echo '<label for="idVendedor">ID del Vendedor:</label><input type="number" id="idVendedor" name="idVendedor" required><br>';
                    echo '<label for="fecha">Fecha de la Venta:</label><input type="date" id="fecha" name="fecha" required><br>';
                    echo '<label for="monto">Monto:</label><input type="number" step="0.01" id="monto" name="monto" required><br>';
                    echo '<input type="hidden" name="numero" value="' . $numeroGenerado . '">';
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                    break;
                default:
                    echo "Selección no válida.";
            }
        } else {
            echo "<p>No se ha realizado ninguna selección.</p>";
        }
        ?>
    </div>

</body>
</html>
