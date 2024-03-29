<?php

class ModeloArticulos{

    /*                  Obtener Registros                   */

    static public function mdlObtenerAdaptadores(){
        
        $sql = "SELECT * from adaptador WHERE adaptador.actS_a=1";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

        $stmt->close();
        $stmt=NULL;

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
        $stmt->close();
        $stmt=NULL;
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
        $stmt->close();
        $stmt=NULL;
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

        $stmt->close();
        $stmt=NULL;

    }

    static public function mdlObtenerProyectores(){

        $sql="SELECT * FROM proyector WHERE actS_p=1";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt->fetchAll();
        
        }
        else{

            return "error";

        }

        $stmt->close();
        $stmt=NULL;

    }

    static public function mdlObtenerTipoConexion(){

        $sql="SELECT * FROM tipoCable";

        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){
            
            return $stmt->fetchAll();
            
        }
        $stmt->close();
        $stmt=NULL;
    }

    /*                  Fin Obtener Registros                   */

    /*                  Actualizar Registros                    */

    static public function mdlActualizarAdaptador($datos){

        if(!$datos["disp"]){
            
            $sql="DELETE FROM esp_adapt WHERE id_a =:ida";
            
            $stmt = Conexion::conectar()->prepare($sql);
            
            $stmt->bindParam(":ida",$datos["id"],PDO::PARAM_INT);
            
            if(!$stmt->execute()){  
            
                return "error dea";
            }
            $stmt->close();
            $stmt=NULL;
        }

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
        $stmt->close();
        $stmt=NULL;
    }

    static public function mdlActualizarBocina($datos){

        if(!$datos["disp"]){
            
            $sql="DELETE FROM esp_boc WHERE id_b =:idb";
            
            $stmt = Conexion::conectar()->prepare($sql);
            
            $stmt->bindParam(":idb",$datos["id"],PDO::PARAM_INT);
            
            if(!$stmt->execute()){  
            
                return "error dea";
            }
            $stmt->close();
            $stmt=NULL;
        }

        $sql="UPDATE bocina SET marca_b=:marca,modelo_b=:modelo,obs_b=:obs,disp_b=:disp WHERE id_b=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }
        $stmt->close();
        $stmt=NULL;
    }

    static public function mdlActualizarCable($datos){

        if(!$datos["disp"]){
            
            $sql="DELETE FROM esp_cab WHERE id_c =:idc";
            
            $stmt = Conexion::conectar()->prepare($sql);
            
            $stmt->bindParam(":idc",$datos["id"],PDO::PARAM_INT);
            
            if(!$stmt->execute()){  
            
                return "error dec";
            }

        }

        $sql="UPDATE cable SET marca_c=:marca,id_tc=:tipoCable,disp_c=:disp WHERE id_c=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":tipoCable",$datos["conexion"],PDO::PARAM_INT);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }
        $stmt->close();
        $stmt=NULL;
    }

    static public function mdlActualizarLaptop($datos){

        if(!$datos["disp"]){
            
            $sql="DELETE FROM esp_lap WHERE id_l =:idl";
            
            $stmt = Conexion::conectar()->prepare($sql);
            
            $stmt->bindParam(":idl",$datos["id"],PDO::PARAM_INT);
            
            if(!$stmt->execute()){  
            
                return "error dec";
            }

        }

        $sql="UPDATE laptop SET marca_l=:marca,modelo_l=:modelo,sn_l=:sn,obs_l=:obs,disp_l=:disp WHERE id_l=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);

        $stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);

        $stmt->bindParam(":sn",$datos["sn"],PDO::PARAM_STR);

        $stmt->bindParam(":obs",$datos["obs"],PDO::PARAM_STR);

        $stmt->bindParam(":disp",$datos["disp"],PDO::PARAM_INT);

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }
        $stmt->close();
        $stmt=NULL;
    }

    static public function mdlActualizarProyector($datos){

        if(!$datos["disp"]){
            
            $sql="DELETE FROM esp_proy WHERE id_p =:idp";
            
            $stmt = Conexion::conectar()->prepare($sql);
            
            $stmt->bindParam(":idp",$datos["id"],PDO::PARAM_INT);
            
            if(!$stmt->execute()){  
            
                return "error dep";
            }

        }

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
        $stmt->close();
        $stmt=NULL;
    }

    /*                  Fin Actualizar Registros                    */

    /*                  Insertar Registros                      */

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
        $stmt->close();
        $stmt=NULL;
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
        $stmt->close();
        $stmt=NULL;
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
        $stmt->close();
        $stmt=NULL;
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
        $stmt->close();
        $stmt=NULL;
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
        $stmt->close();
        $stmt=NULL;
    }

    /*                  Fin Insertar Registros                  */

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
        $stmt->close();
        $stmt=NULL;
    }

    static public function mdlEliminarBocina($id){

            $sql="UPDATE bocina SET actS_b=0 WHERE id_b=:id";

            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":id",$id,PDO::PARAM_INT);

            if($stmt->execute()){
                
                return "ok";
                
            }
            else{
                return "Error en la petición";
            }

            $stmt->close();
            $stmt=NULL;

    }

    static public function mdlEliminarCable($id){

        $sql="UPDATE cable SET actS_c=0 WHERE id_c=:id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":id",$id,PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";
            
        }
        else{
            return "Error en la petición";
        }
        $stmt->close();
        $stmt=NULL;
    }

}

?>