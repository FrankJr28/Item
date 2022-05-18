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

    static public function mdlActualizarAdaptador(){

        $sql="UPDATE `adaptador` SET marca_a=:marca,modelo_a=:modelo,obs_a=:obs,disp_a=:disp,actS_a=:act WHERE id_a=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_STR);

        $stmt->bindParam(":act",$datos["act"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlActualizarBocinas(){

        $sql="UPDATE bocina SET marca_b=:marca,modelo_b=:modelo,obs_b=:obs,disp_b=:disp,actS_b=:act WHERE id_b=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_STR);

        $stmt->bindParam(":act",$datos["act"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlActualizarCable(){

        $sql="UPDATE cable SET marca_c=:marca,id_tc=:tipoCable,disp_c=:disp,actS_c=:act WHERE id_c=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":tipoCable",$datos["tc"],PDO::PARAM_INT);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_STR);

        $stmt->bindParam(":act",$datos["act"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlActualizarLaptop($datos){

        $sql="UPDATE laptop SET marca_l=:marca,modelo_l=:modelo,sn_l=:sn,obs_l=:obs,disp_l=:disp WHERE id_l=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":sn",$datos["sn"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_STR);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }
/*
    static public function mdlActualizarLaptop(){

        $sql="UPDATE proyector SET marca_p=:marca,modelo_p=:modelo,sn_p=:sn,obs_p=:obs,disp_p=:disp,actS_l=:act WHERE id_p=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":sn",$datos["sn"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_STR);

        $stmt->bindParam(":act",$datos["act"],PDO::PARAM_STR);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }
*/
}

?>