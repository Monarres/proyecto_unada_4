<?php
    //importamos la conexion a la base de datos
    require_once '../config/conexion.php';

    //usamos la funcion session_start para manejar variables de secion
    session_start();

    //recupera datos del cliente
    $t_usuario = $_POST['usuario'];
    $password = $POST['password'];


    //consulta datos a la base de datos

    //preparamos la consulta
    $consulta = $conexion->("SELECT * FROM tienda WHERE t_usuario = :t_usuario");

    //brindamos los parametros de consulta
    $consulta->bindParam(":t_usuario",$t_usuario);

    //ejecutamos la consulta
    $consulta->execute();
    //obtenemos los datos y los guardamos en una variable 
    $datos = $consulta->fetch(PDO::FETCH_ASSOC);


    //validar que se recuperen datos
    if($datos){
        //validacion del password
        if($datos['password']== $password){

            //creacion de nueva variable de secion
            $_SESSION['usuario'] = $datos;

            //Regresamos respuesta en formato json
            echo json_encode([1,"Secion iniciada!"]);
        }else{
            echo json_encode([0,"Error en credenciales de acceso"]);
        }
    }else{
        echo json_encode([0,"Error al buscar informacion"]);
    }


?>