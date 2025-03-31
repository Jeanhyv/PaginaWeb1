<?php
$host = "localhost";
$usuario = "root"; 
$contrasena = "";  
$base_datos = "tienda12"; 

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$productos_por_pagina = 10;

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$inicio = ($pagina - 1) * $productos_por_pagina;

$sql = "SELECT * FROM productos WHERE IdProducto BETWEEN 1 AND 10 LIMIT $inicio, $productos_por_pagina";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $productos = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    $productos = [];
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carnes y Pescados - Tienda "La Rosa"</title>
    <style>
        /* Aquí va tu CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
        }

        header h1 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        header p {
            font-size: 0.9rem;
        }

        nav {
            background-color: #eee;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav .breadcrumb {
            display: flex;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        nav .breadcrumb a {
            color: #333;
            text-decoration: none;
        }

        nav .order-section {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        aside {
            background-color: #fff;
            width: 200px;
            padding: 1rem;
        }

        aside h2 {
            margin-bottom: 1rem;
            font-size: 1.1rem;
            border-bottom: 1px solid #ccc;
            padding-bottom: 0.5rem;
        }

        aside ul {
            list-style: none;
        }

        aside ul li {
            margin: 0.5rem 0;
        }

        aside ul li a {
            text-decoration: none;
            color: #333;
            font-size: 0.95rem;
        }

        main {
            flex: 1;
            background-color: #fff;
            padding: 1rem;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            gap: 1rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1rem;
        }

        .product {
            border: 1px solid #ccc;
            padding: 1rem;
            text-align: center;
            background-color: #fafafa;
        }

        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 0.5rem;
        }

        .product h3 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .product p {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 0.5rem;
        }

        .product button {
            background-color: #d32f2f;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .product button:hover {
            background-color: #b71c1c;
        }

        .product .quantity {
            margin: 10px 0;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
            margin-top: 1rem;
        }
    </style>
</head>
<body>

<header>
    <h1>Carnes y Pescados</h1>
    <p>Av. Neza Manzana 004, Sta. Maria Nativitas, Méx.</p>
</header>

<nav>
    <div class="breadcrumb">
        <a href="PaginaWeb.html">Inicio</a>
        <span>&gt;</span>
        <span>Carnes y Pescados</span>
    </div>
</nav>

<div class="container">
    <aside>
        <h2>Productos</h2>
        <ul>
            <li><a href="http://localhost/Hola/conexion3.php">Lácteos</a></li>
            <li><a href="http://localhost/Hola/conexion4.php">Bebidas</a></li>
            <li><a href="http://localhost/Hola/conexion5.php">Mascotas</a></li>
            <li><a href="http://localhost/Hola/conexion1.php">Frutas y Verduras</a></li>
            <li><a href="PaginaWeb.html">Página principal</a></li>
            <li><a href="http://localhost/Hola/ver_carrito.php">Carrito</a></li>
        </ul>
    </aside>

    <main>
        <div class="product-grid">
            <?php
            foreach ($productos as $producto) {
                $imagenes = $producto['imagenes']; 
                $cantidad_disponible = $producto['Cantidad'];  

                $options = "";
                for ($i = 1; $i <= $cantidad_disponible; $i++) {
                    $options .= "<option value='$i'>$i</option>";
                }

                echo "
                <div class='product'>
                    <img src='$imagenes' alt='" . $producto['Nombre'] . "'>
                    <h3>" . $producto['Nombre'] . "</h3>
                    <p>Precio: $" . number_format($producto['Precio'], 2) . " MXN</p>
                    
                    <!-- Formulario para agregar al carrito -->
            <form action='carrito.php' method='POST'>
                <input type='hidden' name='id_producto' value='". $producto['IdProducto'] ."'>
                <input type='hidden' name='nombre' value='". htmlspecialchars($producto['Nombre']) ."'>
                <input type='hidden' name='precio' value='". $producto['Precio'] ."'>
                <input type='hidden' name='imagen' value='". htmlspecialchars($imagenes) ."'>
    
                <!-- Campo de selección de cantidad -->
                <div class='quantity'>
                    <label for='cantidad_". $producto['IdProducto'] ."'>Cantidad:</label>
                    <select id='cantidad_". $producto['IdProducto'] ."' name='cantidad'>
                        $options
                    </select>
                </div>
                
                <button type='submit' name='agregar'>Agregar al carrito</button>
            </form>
                </div>
                ";
            }
            ?>
        </div>
    </main>
</div>

<footer>
    <p>© 2025 Copyright. Todos los derechos reservados Tienda "La Rosa".</p>
</footer>

</body>
</html>
