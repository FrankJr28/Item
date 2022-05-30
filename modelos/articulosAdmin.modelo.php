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

    static public function mdlActualizarAdaptador($datos){

        $sql="UPDATE adaptador SET marca_a=:marca,modelo_a=:modelo,obs_a=:obs,disp_a=:disp WHERE id_a=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlActualizarBocina($datos){

        $sql="UPDATE bocina SET marca_b=:marca,modelo_b=:modelo,obs_b=:obs,disp_b=:disp WHERE id_b=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_STR);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlActualizarCable($datos){

        $sql="UPDATE cable SET marca_c=:marca,id_tc=:tipoCable,disp_c=:disp WHERE id_c=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":tipoCable",$datos["conexion"],PDO::PARAM_INT);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

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

    static public function mdlActualizarProyector($datos){

        $sql="UPDATE proyector SET marca_p=:marca,modelo_p=:modelo,sn_p=:sn,obs_p=:obs,disp_p=:disp WHERE id_p=:id";

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

    static public function mdlObtenerTipoConexion(){

        $sql="SELECT * FROM tipoCable";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){
            
            return $stmt->fetchAll();
            
        }

    }

    static public function mdlInsertarAdaptador($datos){

        $sql="INSERT INTO adaptador(id_a, marca_a, modelo_a, obs_a, disp_a, actS_a) VALUES (:id, :marca, :modelo, :obs, :disp,'1')";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlInsertarBocina($datos){

        $sql="INSERT INTO bocina (id_b, marca_b, modelo_b, obs_b, disp_b, actS_b) VALUES (:id, :marca, :modelo, :obs, :disp,'1')";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlInsertarCable($datos){

        $sql="INSERT INTO cable (id_c, marca_c, id_tc, disp_c, actS_c) VALUES (:id, :marca, :tc, :disp,'1')";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":tc",$datos["conexion"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlInsertarLaptop($datos){

        $sql="INSERT INTO laptop (id_l, marca_l, modelo_l, sn_l, obs_l, disp_l, actS_l) VALUES (:id, :marca, :modelo, :sn, :obs, :disp,'1')";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":sn",$datos["sn"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlInsertarProyector($datos){

        $sql="INSERT INTO proyector (id_p, marca_p, modelo_p, sn_p, obs_p, disp_p, actS_p) VALUES (:id, :marca, :modelo, :sn, :obs, :disp,'1')";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":sn",$datos["sn"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }

    }

    static public function mdlEliminarAdaptador($id){

        //try {
            //UPDATE `adaptador` SET `disp_a` = b'0', `actS_a` = b'0' WHERE `adaptador`.`id_a` = 10
            $sql="UPDATE adaptador SET actS_a=0 WHERE id_a=:id";

            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":id",$id,PDO::PARAM_INT);

            if($stmt->execute()){
                
                return "ok";
                
            }
            else{
                return "Error en la petición";
            }

        //} catch (Exception $e) {
            
        //    return $e->getMessage();
        
        //}

    }

}

?>