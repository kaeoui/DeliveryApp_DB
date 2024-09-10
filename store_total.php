<?php
session_start(); // Iniciar la sesión

if (isset($_POST['total'])) {
    $_SESSION['total'] = floatval($_POST['total']); // Almacenar el total en la sesión
    echo "Total guardado en la sesión.";
} else {
    echo "No se recibió el total.";
}
?>
