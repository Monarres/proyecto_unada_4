<?php
require_once '../config/conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['t_producto']) && isset($data['precio']) && isset($data['cantidad'])) {
    $t_producto = $data['t_producto'];
    $precio = $data['precio'];
    $cantidad = $data['cantidad'];

    $insercion = $conexion->prepare("INSERT INTO tienda (t_producto, precio, cantidad) VALUES (:t_producto, :precio, :cantidad)");
    $insercion->bindParam(':t_producto', $t_producto);
    $insercion->bindParam(':precio', $precio);
    $insercion->bindParam(':cantidad', $cantidad);

    $ejecutado = $insercion->execute();

    if ($ejecutado) {
        echo "Inserción correcta";
    } else {
        echo "Inserción no realizada";
    }
} else {
    echo "Datos incompletos";
}
?>
