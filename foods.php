<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Restaurante</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


<div class="grid-container">

<?php
// Conectar a la base de datos
$mysqli = new mysqli('localhost', 'root', 'karina', 'App_Pedidos2');

if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Obtener el id del restaurante desde la URL
$id_restaurante = intval($_GET['id']);

// Preparar la consulta
$query = "SELECT * FROM productos WHERE id_restaurante = ?";
$stmt = $mysqli->prepare($query);

if ($stmt === false) {
    die('Error al preparar la consulta: ' . $mysqli->error);
}

$stmt->bind_param('i', $id_restaurante);
$stmt->execute();
$result = $stmt->get_result();

echo '<h1>Menú del Restaurante</h1>';
echo '<ul id="foodItems">';  // ID para enlazar con el JS
while ($productos = $result->fetch_assoc()) {
    echo '<li>';
    echo '<div class="food">';
    echo '<h3>' . $productos['nombre_producto'] . '</h3>';
    echo '<p>' . $productos['descripcion'] . '</p>';
    echo '<p>Precio: $' . number_format($productos['precio'], 2) . '</p>';
    echo '<button class="addToCart" data-name="' . $productos['nombre_producto'] . '" data-price="' . $productos['precio'] . '">Añadir al carrito</button>';
    echo '</div>';
    echo '</li>';
}
echo '</ul>';

echo '<button id="viewCartButton">Ver Carrito</button>';
echo '<p>Productos en el carrito: <span id="cartCount">0</span></p>';

$stmt->close();
$mysqli->close();
?>


<script src="js/foods.js"></script>
</body>
</html>