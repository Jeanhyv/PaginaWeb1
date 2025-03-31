<?php
// Procesar la selección del usuario
if (isset($_POST['seleccion'])) {
    $seleccion = $_POST['seleccion'];

    // Redirigir a la página correspondiente con el parámetro 'seleccion'
    exit;
} else {
    echo "No se ha realizado ninguna selección.";
}
?>
