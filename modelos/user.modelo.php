<?php

require_once "conexion.php";

class ModeloUsuario{

    static public function mdlGetAdapt($u){

        //$sql='SELECT adaptador.*, esp_adapt.codigo_u FROM adaptador LEFT JOIN esp_adapt ON esp_adapt.codigo_u = :u AND actS_a=1 AND disp_a=1 group by adaptador.id_a';

        $sql='SELECT adaptador.*, esp_adapt.codigo_u from adaptador LEFT JOIN esp_adapt ON esp_adapt.codigo_u IS NULL WHERE adaptador.disp_a=1 UNION 
        SELECT adaptador.*, esp_adapt.codigo_u FROM adaptador LEFT JOIN esp_adapt ON esp_adapt.id_a = adaptador.id_a WHERE esp_adapt.codigo_u = :u AND adaptador.disp_a=1 ORDER BY id_a ASC';

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

            $informacion=array_values($informacion);
              
            for($i = count($informacion)-1; $i>=0; --$i){
                
                    if(!$informacion[$i]["codigo_u"]){
                        
                        if(isset($informacion[$i-1]["id_a"])){

                            if($informacion[$i]["id_a"]==$informacion[$i-1]["id_a"]){
                                
                                    unset($informacion[$i]);
                                
                            }

                        }
         
                    }
                    
            }
            
        }

        else{

            $informacion='error';
        
        }
        
        return $informacion;
        
    }

    static public function mdlGetBoc($u){

        $sql = "SELECT bocina.*, esp_boc.codigo_u from bocina LEFT JOIN esp_boc ON esp_boc.codigo_u IS NULL WHERE bocina.disp_b=1 
        UNION SELECT bocina.*, esp_boc.codigo_u FROM bocina LEFT JOIN esp_boc ON esp_boc.id_b = bocina.id_b WHERE esp_boc.codigo_u = :u AND bocina.disp_b=1 ORDER BY id_b ASC";

        $stmt = Conexion::conectar()->prepare($sql);

        //$stmt->bindParam(":c",$c,PDO::PARAM_INT);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

            $informacion=array_values($informacion);
              
            for($i = count($informacion)-1; $i>=0; --$i){
                
                    if(!$informacion[$i]["codigo_u"]){
                        
                        if(isset($informacion[$i-1]["id_b"])){

                            if($informacion[$i]["id_b"]==$informacion[$i-1]["id_b"]){
                                
                                    unset($informacion[$i]);
                                
                            }

                        }

                        else if(isset($informacion[$i+1]["id_b"])){

                            if($informacion[$i]["id_b"]==$informacion[$i+1]["id_b"]){

                                unset($informacion[$i]);

                            }   

                        }
         
                    }
    
            }

        }

        else{

            $informacion='error';
        
        }
        
        return $informacion;
        
    }

    static public function mdlGetCables($u){

        $sql='SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable LEFT join tipocable on tipocable.id_tc = cable.id_tc LEFT JOIN esp_cab ON esp_cab.codigo_u IS NULL WHERE cable.disp_c=1 
        UNION SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable LEFT join tipocable on tipocable.id_tc = cable.id_tc LEFT JOIN esp_cab ON esp_cab.id_c = cable.id_c WHERE esp_cab.codigo_u = :u AND cable.disp_c=1 
        ORDER BY id_c ASC';

        //$sql = "SELECT bocina.*, esp_boc.codigo_u from bocina LEFT JOIN esp_boc ON esp_boc.codigo_u IS NULL WHERE bocina.disp_b=1 
        //UNION SELECT bocina.*, esp_boc.codigo_u FROM bocina LEFT JOIN esp_boc ON esp_boc.id_b = bocina.id_b WHERE esp_boc.codigo_u = :u AND bocina.disp_b=1 ORDER BY id_b ASC";

        $stmt = Conexion::conectar()->prepare($sql);

        //$stmt->bindParam(":c",$c,PDO::PARAM_INT);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

            $informacion=array_values($informacion);
              
            for($i = count($informacion)-1; $i>=0; --$i){
                
                    if(!$informacion[$i]["codigo_u"]){
                        
                        if(isset($informacion[$i-1]["id_c"])){

                            if($informacion[$i]["id_c"]==$informacion[$i-1]["id_c"]){
                                
                                    unset($informacion[$i]);
                                
                            }

                        }
         
                    }
                    
            }

        }

        else{

            $informacion='error';
        
        }
        
        return $informacion;
        
    }

    static public function mdlGetProy($u){
        
        $sql="SELECT proyector.*, esp_proy.codigo_u from proyector LEFT JOIN esp_proy ON esp_proy.codigo_u IS NULL WHERE proyector.disp_p=1 
        UNION SELECT proyector.*, esp_proy.codigo_u FROM proyector LEFT JOIN esp_proy ON esp_proy.id_p = proyector.id_p 
        WHERE esp_proy.codigo_u = :u AND proyector.disp_p=1 ORDER BY id_p ASC";

        $stmt = Conexion::conectar()->prepare($sql);

        //$stmt->bindParam(":c",$c,PDO::PARAM_INT);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

            $informacion=array_values($informacion);
            
            for($i = count($informacion)-1; $i>=0; --$i){
                
                    if(!$informacion[$i]["codigo_u"]){
                        
                        if(isset($informacion[$i-1]["id_p"])){

                            if($informacion[$i]["id_p"]==$informacion[$i-1]["id_p"]){
                                
                                    unset($informacion[$i]);
                                
                            }

                        }
        
                    }
                    
            }

        }

        else{

            $informacion='error';

        }

        return $informacion;

    }

    static public function mdlGetLap($u){
        
        $sql="SELECT laptop.*, esp_lap.codigo_u FROM laptop LEFT JOIN esp_lap ON esp_lap.codigo_u IS NULL WHERE laptop.disp_l=1
        UNION SELECT laptop.*, esp_lap.codigo_u FROM laptop LEFT JOIN esp_lap ON esp_lap.id_l = laptop.id_l 
        WHERE esp_lap.codigo_u = :u AND laptop.disp_l=1 ORDER BY marca_l ASC";

        $stmt = Conexion::conectar()->prepare($sql);

        //$stmt->bindParam(":c",$c,PDO::PARAM_INT);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

            $informacion=array_values($informacion);
            
            for($i = count($informacion)-1; $i>=0; --$i){
                
                    if(!$informacion[$i]["codigo_u"]){
                        
                        if(isset($informacion[$i-1]["id_l"])){

                            if($informacion[$i]["id_l"]==$informacion[$i-1]["id_l"]){
                                
                                    unset($informacion[$i]);
                                
                            }

                        }

                        //
                        else if(isset($informacion[$i+1]["id_l"])){

                            if($informacion[$i]["id_l"]==$informacion[$i+1]["id_l"]){

                                unset($informacion[$i]);

                            }   

                        }
                        //
        
                    }
                    
            }

        }

        else{

            $informacion='error';

        }

        return $informacion;
    
    }

}