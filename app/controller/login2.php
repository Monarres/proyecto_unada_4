<?php
    require_once '../config/conexion.php';
    session_start();

    $usuario =$_POST['usuario'];
    $password = $_POST['password'];
    

    $consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE usuario = :usuario");
    $consulta->bindParam(':usuario',$usuario);
    $consulta->execute();
    $datos = $consulta->fetch(PDO::FETCH_ASSOC);

    if($datos){
        if($datos['password'] == $password){
            $_SESSION['usuario']=$datos;
            echo json_encode([1, "Secion iniciada"]);
        }else{
            echo json_encode([0,"Error en credenciales de acceso!"];)
        }
    }else{
        echo json_encode([0,"Informacion no localizada"]);
    }

?>