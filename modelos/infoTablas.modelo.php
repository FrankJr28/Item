<?php

require_once "conexion.php";

Class ModeloInfoTablas{

    static public function mdlObtenerPrestamosAceptar(){
    
        $sql='SELECT id_pres, prestamo.codigo_u, nombre_u, inicio, solicitud, act FROM prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE inicio is NULL';
    
        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

        }
        else{
            $informacion='error';
        }

        return $informacion;
    
    }

    static public function mdlObtenerPrestamosActivos(){
    
        $sql='SELECT id_pres, usuario.codigo_u, nombre_u, inicio FROM prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE inicio AND Finalizo is NULL';
    
        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

        }
        
        else{
        
            $informacion='error';
        
        }

        return $informacion;
    
    }

    static public function mdlObtenerPrestamosHistorial(){
    
        $sql='SELECT id_pres, usuario.codigo_u, nombre_u, app_u, inicio, finalizo FROM prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE inicio AND Finalizo';
    
        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

        }
        else{
            $informacion='error';
        }

        return $informacion;
    
    }

}