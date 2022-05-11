<?php

class ModeloArticulos{

    static public function mdlObtenerAdaptadores(){
        
        $sql = "SELECT * from adaptador WHERE adaptador.actS_a=1";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }
    }

    static public function mdlObtenerBocinas(){

        $sql="SELECT * from bocina where bocina.actS_b=1";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

    }

    static public function mdlObtenerCables(){

        $sql = "SELECT * FROM cable LEFT JOIN tipocable 
        ON tipocable.id_tc = cable.id_tc WHERE actS_c=1";

        ///

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

        //
    } 

    static public function mdlObtenerLaptops(){

        $sql="SELECT * FROM laptop WHERE actS_l=1";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

    }

    static public function mdlObtenerProyectores(){

        $sql="SELECT * FROM proyector WHERE disp_p=1";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

    }

}

?>