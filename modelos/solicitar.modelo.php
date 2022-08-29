<?php

require_once "conexion.php";

class ModeloSolicitar{

    static public function mdlObtenerPrestamoEnSolicitud($u){
        $sql="SELECT * FROM prestamo WHERE finalizo IS NULL AND codigo_u=:u";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":u",$u,PDO::PARAM_INT);
        if($stmt->execute()){
            if($stmt->fetchAll()){
                return "ocupado";
            }
            else{
                return "disponible";
            }
        }
    }
    
    static public function mdlSolicitarPrestamo($u){
        /*                  OBTIENE LOS ARTICULOS QUE ESTAN EN EL ESPACIO DEL USUARIO EN LA BASE DE DATOS                  */
        /*                  ADAPTADOR                   */  
        $sql="SELECT adaptador.id_a, adaptador.disp_a FROM esp_adapt LEFT JOIN adaptador ON adaptador.id_a = esp_adapt.id_a WHERE codigo_u=:u";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":u",$u,PDO::PARAM_INT);
        if($stmt->execute()){
            $resultadoA = $stmt->fetchAll();
            foreach($resultadoA as $dato){
                if($dato["disp_a"]==0){
                    return "ocupado Adaptador";
                }
            }
        }
        else{   
            return "error ocA";
        }
        
        /*                  FIN ADAPTADOR                   */
        /*                  BOCINAS                   */
        $sql="SELECT bocina.id_b, bocina.disp_b FROM esp_boc LEFT JOIN bocina ON bocina.id_b = esp_boc.id_b WHERE codigo_u=:u";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":u",$u,PDO::PARAM_INT);
        if($stmt->execute()){
            $resultadoB = $stmt->fetchAll();
            foreach($resultadoB as $dato){
                if($dato["disp_b"]==0){
                    return "ocupado Bocina";
                }
            }
        }
        else{
            return "error ocB";
        }
        /*                  FIN BOCINAS                   */
        /*                  CABLES                   */
        $sql="SELECT cable.id_c, cable.disp_c FROM esp_cab LEFT JOIN cable ON cable.id_c = esp_cab.id_c WHERE codigo_u=:u";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":u",$u,PDO::PARAM_INT);
        if($stmt->execute()){
            $resultadoC = $stmt->fetchAll();
            foreach($resultadoC as $dato){
                if($dato["disp_c"]==0){
                    return "ocupado Cable";
                }
            }
        }
        else{   
            return "error ocC";
        }
        /*                  FIN CABLES                   */
        /*                  LAPTOPS                   */
        $sql="SELECT laptop.id_l, laptop.disp_l FROM esp_lap LEFT JOIN laptop ON laptop.id_l = esp_lap.id_l WHERE codigo_u=:u";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":u",$u,PDO::PARAM_INT);
        if($stmt->execute()){
            $resultadoL = $stmt->fetchAll();
            foreach($resultadoL as $dato){
                if($dato["disp_l"]==0){
                    return "ocupado Laptop";
                }
            }
        }
        else{   
            return "error ocC";
        }
        /*                  FIN LAPTOPS                   */
        /*                  PROYECTORES                   */
        $sql="SELECT proyector.id_p, proyector.disp_p FROM esp_proy LEFT JOIN proyector ON proyector.id_p = esp_proy.id_p WHERE codigo_u=:u";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":u",$u,PDO::PARAM_INT);
        if($stmt->execute()){
            $resultadoP = $stmt->fetchAll();
            foreach($resultadoP as $dato){
                if($dato["disp_p"]==0){
                    return "ocupado Proyector";
                }
            }
        }
        else{   
            return "error ocC";
        }
        /*                  FIN PROYECTORES                   */
        /*                  CREA EL PRESTAMO                    */
        if($resultadoA || $resultadoB || $resultadoC || $resultadoL || $resultadoP){
            $sql="INSERT INTO prestamo (id_pres, id_ubi, solicitud, inicio, finalizo, codigo_a, codigo_u, activo_pres, nota) VALUES (NULL, 7, current_timestamp(), NULL, NULL, NULL, :u, 1, NULL)";
            $pdo=Conexion::conectar();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":u",$u,PDO::PARAM_INT);
            if($stmt->execute()){
                $pres = $pdo->lastInsertId();
            }
            else{   
                return "error al crearPres";
            }
        }
        else{
            return "Seleccione algún artículo";
        }

        /*                  FIN PRESTAMO                   */

        /*                  RECORRE EL ARRAY DE ADAPTADORES PARA INSERTARLOS                  */

        if($resultadoA){
        
            $valAdapts = "";
            $valAdaptsUpdate ="";
            
            foreach($resultadoA as $index=>$dato){
                if($index){
                    $valAdapts.=",";
                    $valAdaptsUpdate.=" OR ";
                }
                $valAdapts.="(".$pres.",".$dato["id_a"].")";
                $valAdaptsUpdate.="id_a=".$dato["id_a"];
            }

            /*                  RECORRE EL ARRAY DE ADAPTADORES PARA INSERTARLOS                  */        
            $sql="INSERT INTO pres_adapt (id_pres, id_a) VALUES ".$valAdapts;
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error aa";
            }

            //Limpia el espacio del usuario
            $sql="DELETE FROM esp_adapt WHERE codigo_u =:u";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":u",$u,PDO::PARAM_INT);
            if(!$stmt->execute()){  
                return "error dea";
            }
        }

        /*                  RECORRE EL ARRAY DE BOCINAS PARA INSERTARLOS                  */

        if($resultadoB){
            $valBocs = "";
            $valBocsUpdate = "";
            foreach($resultadoB as $index=>$dato){
                if($index){
                    $valBocs.=",";
                    $valBocsUpdate.=" OR ";
                }
                $valBocs.="(".$pres.",".$dato["id_b"].")";
                $valBocsUpdate.="id_b=".$dato["id_b"];
            }

            /*                  RECORRE EL ARRAY DE ADAPTADORES PARA INSERTARLOS                  */        
            $sql="INSERT INTO pres_boc (id_pres, id_b) VALUES ".$valBocs;
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error bb";
            }

            
            //Limpia el espacio del usuario
            $sql="DELETE FROM esp_boc WHERE codigo_u =:u";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":u",$u,PDO::PARAM_INT);
            if(!$stmt->execute()){  
                return "error db";
            }
        }

        /*                  RECORRE EL ARRAY DE CABLES PARA INSERTARLOS                  */

        if($resultadoC){
            $valCabs = "";
            $valCabsUpdate = "";
            foreach($resultadoC as $index=>$dato){
                if($index){
                    $valCabs.=",";
                    $valCabsUpdate.=" OR ";
                }
                $valCabs.="(".$pres.",".$dato["id_c"].")";
                $valCabsUpdate.="id_c=".$dato["id_c"];
            }

            /*                  RECORRE EL ARRAY DE ADAPTADORES PARA INSERTARLOS                  */        
            $sql="INSERT INTO pres_cab (id_pres, id_c) VALUES ".$valCabs;
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error cc";
            }

            //Limpia el espacio del usuario
            $sql="DELETE FROM esp_cab WHERE codigo_u =:u";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":u",$u,PDO::PARAM_INT);
            if(!$stmt->execute()){  
                return "error db";
            }

        }

        /*                  RECORRE EL ARRAY DE LAPTOPS PARA INSERTARLOS                  */

        if($resultadoL){
            $valLaps = "";
            $valLapsUpdate = "";
            foreach($resultadoL as $index=>$dato){
                if($index){
                    $valLaps.=",";
                    $valLapsUpdate.=" OR ";
                }
                $valLaps.="(".$pres.",".$dato["id_l"].")";
                $valLapsUpdate.="id_l=".$dato["id_l"];
            }

            /*                  RECORRE EL ARRAY DE ADAPTADORES PARA INSERTARLOS                  */        
            $sql="INSERT INTO pres_lap (id_pres, id_l) VALUES ".$valLaps;
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error cc";
            }

            //Limpia el espacio del usuario
            $sql="DELETE FROM esp_lap WHERE codigo_u =:u";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":u",$u,PDO::PARAM_INT);
            if(!$stmt->execute()){  
                return "error db";
            }

        }

        /*                  RECORRE EL ARRAY DE PROYECTORES PARA INSERTARLOS                  */

        if($resultadoP){
            $valProys = "";
            $valProysUpdate = "";
            foreach($resultadoP as $index=>$dato){
                if($index){
                    $valProys.=",";
                    $valProysUpdate.=" OR ";
                }
                $valProys.="(".$pres.",".$dato["id_p"].")";
                $valProysUpdate.="id_p=".$dato["id_p"];
            }

            /*                  RECORRE EL ARRAY DE ADAPTADORES PARA INSERTARLOS                  */        
            $sql="INSERT INTO pres_proy (id_pres, id_p) VALUES ".$valProys;
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error cc";
            }

            //Limpia el espacio del usuario
            $sql="DELETE FROM esp_proy WHERE codigo_u =:u";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":u",$u,PDO::PARAM_INT);
            if(!$stmt->execute()){  
                return "error db";
            }

        }

        return "ok";

    }

}