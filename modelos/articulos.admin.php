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

    static public function mdlObtenerCables(){

        $sql = "SELECT * FROM cable LEFT JOIN tipocable 
        ON tipocable.id_tc = cable.id_tc WHERE cable.disp_c=1";

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

}

?>