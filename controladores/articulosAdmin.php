<?php

    require_once "../modelos/conexion.php";
    require_once "../controladores/articulosAdmin.controlador.php";
    require_once "../modelos/articulosAdmin.modelo.php";

    switch($_GET["op"]){
        
        case "cables":

            //$u = $_SESSION["usuario"]["codigo_u"];

            $respuesta = ModeloArticulos::mdlObtenerCables();

            //$respuesta=array_values($respuesta);    //Rordena el array de manera que elimina el array asociativo y se puede trabajar un json en el front
            
            echo json_encode($respuesta);

        break;
    
    }

?>