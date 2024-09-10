<?php
session_start(); 

if (isset($_SESSION['id_usuario']) && isset($_SESSION['id_restaurante']) && isset($_SESSION['total'])) {
    // Obtener los datos de la sesión
    $id_usuario = $_SESSION['id_usuario'];
    $id_restaurante = $_SESSION['id_restaurante'];
    $total = $_SESSION['total'];
    $fecha_pedido = date("Y-m-d H:i:s"); // Fecha y hora actual
    $metodo_pago = "Efectivo"; // Puedes cambiar esto según el método de pago seleccionado
    $estado = "Pendiente"; // Estado inicial del pedido

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "karina";
    $dbname = "App_Pedidos2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar el pedido en la base de datos
    $query = "INSERT INTO orden (id_usuario, id_restaurante, fecha_pedido, total, metodo_pago, estado)
              VALUES ('$id_usuario', '$id_restaurante', '$fecha_pedido', '$total', '$metodo_pago', '$estado')";

    if ($conn->query($query) === TRUE) {
        // Obtener el ID de la orden insertada
        $id_orden = $conn->insert_id;

        // Mostrar el recibo
        echo '<h1 style="color:white;">Recibo de Compra</h1>';
        echo '<div class="container-recibo"> ';
        echo "<p>ID de Orden: " . $id_orden . "</p>";
        echo "<p>ID de Usuario: " . $id_usuario . "</p>";
        echo "<p>ID de Restaurante: " . $id_restaurante . "</p>";
        echo "<p>Fecha de Pedido: " . $fecha_pedido . "</p>";
        echo "<p>Total: $" . number_format($total, 2) . "</p>";
        echo "<p>Método de Pago: " . $metodo_pago . "</p>";
        echo "<p>Estado: " . $estado . "</p>";
        echo '</div>';


        // Opcional: Limpiar las variables de sesión
        // session_unset();
        // session_destroy();
    } else {
        echo "Error al guardar el pedido: " . $conn->error;
    }

    $conn->close();
} else {
    echo "No se han encontrado datos del pedido.";
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Pedido Guardado</title>
    <link rel="stylesheet" href="../css/styles.css"> 
</head>
<body>
<button onclick="window.location.href='../order-status.html'">Realizar pago</button>

</form>


<!-- <script>

window.location.href = "order-status.html";

</script> --> 
</body>
</html>
