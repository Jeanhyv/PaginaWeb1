<?php
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "Tienda10");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar que el usuario sea un vendedor
if (!isset($_SESSION["user"]) || $_SESSION["role"] !== "vendedor") {
    die("Error: No se ha iniciado sesión como vendedor.");
}

$vendedor_id = $_SESSION["user"];
$vendedor_nombre = $_SESSION["nombre"];  // Usar el nombre del vendedor guardado en la sesión

// Obtener el id de la siguiente venta (iniciar desde 300)
$query = "SELECT MAX(IdVenta) AS max_venta FROM Venta";
$result = $conn->query($query);
$row = $result->fetch_assoc();

// Si no existen ventas, comienza desde 300
$venta_id = $row['max_venta'] ? $row['max_venta'] + 1 : 300;

// Calcular total de la compra
$total = 0;
$productos_carrito = [];
if (!empty($_SESSION["carrito"])) {
    foreach ($_SESSION["carrito"] as $producto) {
        $total += $producto["precio"] * $producto["cantidad"];
        $productos_carrito[] = $producto;  // Guardar los productos del carrito para mostrarlos
    }
}

// Registrar la venta en la base de datos
$fecha = date("Y-m-d");
$query = "INSERT INTO Venta (IdVenta, IdVendedor, Fecha, Monto) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iisd", $venta_id, $vendedor_id, $fecha, $total);
$stmt->execute();
$stmt->close();

// Limpiar el carrito de compras
unset($_SESSION["carrito"]);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .ticket {
            width: 320px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 14px;
            color: #333;
        }

        .ticket h2 {
            font-size: 1.4rem;
            color: #2d3e50;
            margin-bottom: 15px;
        }

        .ticket p {
            margin: 5px 0;
            color: #555;
        }

        .ticket hr {
            margin: 15px 0;
            border: 1px solid #f0f0f0;
        }

        .ticket .productos-list {
            list-style: none;
            padding: 0;
            margin-bottom: 15px;
            text-align: left;
        }

        .ticket .productos-list li {
            margin: 8px 0;
            font-size: 0.9rem;
            color: #444;
        }

        .ticket .productos-list li span {
            font-weight: bold;
        }

        .ticket .total {
            font-size: 1.2rem;
            font-weight: bold;
            color: #d32f2f;
            margin-top: 10px;
        }

        .ticket .footer {
            margin-top: 20px;
            font-size: 0.8rem;
            color: #999;
        }

        .ticket .footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="ticket">
        <h2>Tienda "La Rosa"</h2>
        <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
        <p><strong>Vendedor:</strong> <?php echo $vendedor_nombre; ?></p>
        <p><strong>ID de Venta:</strong> <?php echo $venta_id; ?></p>
        <hr>
        <h3>Productos</h3>
        <ul class="productos-list">
            <?php if (!empty($productos_carrito)): ?>
                <?php foreach ($productos_carrito as $producto): ?>
                    <li>
                        <span><?php echo $producto["nombre"]; ?></span> - 
                        <?php echo $producto["cantidad"]; ?> x 
                        $<?php echo number_format($producto["precio"], 2); ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No hay productos en el carrito.</li>
            <?php endif; ?>
        </ul>
        <hr>
        <p class="total">Total: $<?php echo number_format($total, 2); ?> MXN</p>
        <hr>
        <div class="footer">
            <p>¡Gracias por su compra!</p>
        </div>
    </div>

</body>
</html>
