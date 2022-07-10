<?php

class ModeloInfoUsuario{

    static public function mdlActualizarInfoUsuario($datos){

        /*
        $datos = array('nombre' => $_POST["nombre"],
            'carrera' => $_POST["carrera"],
            'semestre' => $_POST["semestre"],
            'correo' => $_POST["correo"],
            'telefono' => $_POST["telefono"]);
        */

        $sql='UPDATE usuario SET nombre_u =:nom, app_u=:app, apm_u=:apm, correo_u=:cor, telefono=:tel, semestre=:sem, id_car=:car  WHERE codigo_u=:cod';

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nom",$datos["nombre"],PDO::PARAM_INT);
        $stmt->bindParam(":app",$datos[""],PDO::PARAM_INT);
        $stmt->bindParam(":apm",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
        $stmt->bindParam(":cor",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
        $stmt->bindParam(":tel",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
        $stmt->bindParam(":sem",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
        $stmt->bindParam(":car",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
        $stmt->bindParam(":cod",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);

        if($stmt->execute()){
        
        }

    }

}

?>