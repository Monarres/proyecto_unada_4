<?php
   
   require_once '../config/conexion.php';

   $actualizacion = $conexion->prepare("UPDATE tienda SET t_producto = :t_producto WHERE id_producto = :id_producto");
   $t_producto = "producto actualizado";
   $id_producto = 2;
   $actualizacion->bindParam(':t_producto',$t_producto);
   $actualizacion->bindParam(':id_producto',$id_producto);
   $actualizacion->execute();
   if($actualizacion){
       echo "actualizacion correcta";
   }else{
       echo "actualizacion no realizada";
   } 

?>