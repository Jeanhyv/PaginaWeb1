<?php
session_start();

// Agregar productos al carrito desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
    $id = $_POST["id_producto"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $imagen = $_POST["imagen"];

    // Si el producto ya está en el carrito, solo actualiza la cantidad
    if (isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id]["cantidad"] += $cantidad;
    } else {
        $_SESSION["carrito"][$id] = [
            "nombre" => $nombre,
            "precio" => $precio,
            "cantidad" => $cantidad,
            "imagen" => $imagen
        ];
    }
}

// Borrar un solo producto
if (isset($_POST["borrar_producto"])) {
    $id = $_POST["borrar_producto"];
    unset($_SESSION["carrito"][$id]);
}

// Borrar todo el carrito
if (isset($_POST["borrar_todo"])) {
    unset($_SESSION["carrito"]);
}

// Calcular total
$total = 0;
if (!empty($_SESSION["carrito"])) {
    foreach ($_SESSION["carrito"] as $producto) {
        $total += $producto["precio"] * $producto["cantidad"];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
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
            text-align: center;
        }

        header h1 {
            font-size: 1.5rem;
        }

        header p {
            font-size: 0.9rem;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .product-img {
            width: 50px;
            height: auto;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        button {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #b71c1c;
        }

        .delete-btn {
            background-color: #444;
        }

        .delete-btn:hover {
            background-color: #222;
        }

        .disabled {
            background-color: gray;
            cursor: not-allowed;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Carnes y Pescados - Tienda "La Rosa"</h1>
    <p>Av. Neza Manzana 004, Sta. Maria Nativitas, Méx.</p>
</header>

<div class="container">
    <h2>Carrito de Compras</h2>

    <?php if (!empty($_SESSION["carrito"])): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Artículo</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($_SESSION["carrito"] as $id => $producto): ?>
        <tr>
            <td><img src="<?= htmlspecialchars($producto["imagen"]) ?>" class="product-img"></td>
            <td><?= htmlspecialchars($producto["nombre"]) ?></td>
            <td>$<?= number_format($producto["precio"], 2) ?> MXN</td>
            <td><?= $producto["cantidad"] ?></td>
            <td>$<?= number_format($producto["precio"] * $producto["cantidad"], 2) ?> MXN</td>
            <td>
                <form method="POST">
                    <input type="hidden" name="borrar_producto" value="<?= $id ?>">
                    <button type="submit" class="delete-btn">X</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Total: $<?= number_format($total, 2) ?> MXN</h3>

    <div class="buttons">
        <a href="PaginaWeb.html"><button type="button">Seguir Comprando</button></a>
        <form method="POST">
            <button type="submit" name="borrar_todo">Borrar Todo</button>
        </form>
        <a href="http://localhost/Hola/pago.php"><button type="button" <?= ($total == 0) ? 'class="disabled" disabled' : '' ?>>Pagar</button></a>
    </div>
    <?php else: ?>
    <p>Tu carrito está vacío.</p>
    <a href="PaginaWeb.html"><button>Ir a la tienda</button></a>
    <?php endif; ?>
</div>

<footer>
    <p>© 2025 Tienda "La Rosa" - Todos los derechos reservados.</p>
</footer>

</body>
</html>
