<?php

require_once "conexion.php";

class ModeloUsuarios{

    static public function mdlObtenerUsuarios(){
        
        $sql = "SELECT codigo_u, nombre_u, app_u, apm_u, correo_u, telefono, carrera.id_car, carrera, semestre, act FROM `usuario` LEFT JOIN carrera ON usuario.id_car = carrera.id_car WHERE usuario.actS_u=1";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }
    }
    
    static public function mdlActualizarUsuario($datos){

        $sql="UPDATE usuario SET nombre_u=:nom, app_u=:app, apm_u=:apm, correo_u=:cor, telefono=:tel, semestre=:sem, id_car=:idc, act=:ac WHERE codigo_u=:cod";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nom",$datos["nombre"],PDO::PARAM_STR);

        $stmt->bindParam(":app",$datos["paterno"],PDO::PARAM_STR);

        $stmt->bindParam(":apm",$datos["materno"],PDO::PARAM_STR);

        $stmt->bindParam(":cor",$datos["correo"],PDO::PARAM_STR);

        $stmt->bindParam(":tel",$datos["telefono"],PDO::PARAM_INT);

        $stmt->bindParam(":sem",$datos["semestre"],PDO::PARAM_INT);

        $stmt->bindParam(":idc",$datos["carrera"],PDO::PARAM_INT);

        $stmt->bindParam(":cod",$datos["codigo"],PDO::PARAM_INT);
        
        $stmt->bindParam(":ac",$datos["act"],PDO::PARAM_INT);
        
        if($stmt->execute()){
            
            return "ok";
            
        }
        else{
            return "errorE";

        }

    }

    static public function mdlInsertarUsuario($datos){

        $sql="INSERT INTO usuario (codigo_u, nombre_u, app_u, apm_u, correo_u, telefono, semestre, id_car, contra_u, actS_u) VALUES (:cod, :nom, :app, :apm, :cor, :tel, :sem, :idc, :contra, 1)";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nom",$datos["nombre"],PDO::PARAM_STR);

        $stmt->bindParam(":app",$datos["paterno"],PDO::PARAM_STR);

        $stmt->bindParam(":apm",$datos["materno"],PDO::PARAM_STR);

        $stmt->bindParam(":cor",$datos["correo"],PDO::PARAM_STR);

        $stmt->bindParam(":tel",$datos["telefono"],PDO::PARAM_INT);

        $stmt->bindParam(":sem",$datos["semestre"],PDO::PARAM_INT);

        $stmt->bindParam(":idc",$datos["carrera"],PDO::PARAM_INT);

        $stmt->bindParam(":cod",$datos["codigo"],PDO::PARAM_INT);

        $stmt->bindParam(":contra",$datos["contra"],PDO::PARAM_STR);
        
        if($stmt->execute()){
            
            return "ok";
            
        }
        else{
            return "errorE";

        }

    }

    static public function mdlObtenerCarreras(){
        
        $sql = "SELECT * FROM carrera";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }
    
    }

    static public function mdlEliminarUsuario($id){

        $sql = "DELETE FROM usuario WHERE codigo_u=:cod";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":cod",$id,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";
        
        }
        else{

            return "error";

        }

    }

}

?>