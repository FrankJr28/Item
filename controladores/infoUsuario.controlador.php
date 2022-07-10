<?php

class ControladorInfoUsuario{

    static public function ctrActualizarInfoUsuario(){

        if(isset($_POST["codigo"])){
            $datos = array('nombre' => $_POST["nombre"],
            'carrera' => $_POST["carrera"],
            'semestre' => $_POST["semestre"],
            'correo' => $_POST["correo"],
            'telefono' => $_POST["telefono"]);

            $respuesta = ModeloInfoUsuario::mdlActualizarInfoUsuario($datos);
            return $respuesta;
        }

    }

}

?>