<?php

   require_once '../config/conexion.php';

    $eliminar = $conexion->prepare("DELETE FROM tienda WHERE id_producto = :id_producto");
    $id_producto = "4";
    $eliminar->bindParam(':id_producto',$id_producto);
    $eliminar->execute();
    if($eliminar){
        echo "Eliminacion del producto correcta";
    }else{
        echo "No se realizo la eliminacion del producto o el ID no existe";
    }

?>