<?php

require_once "conexion.php";

class ModeloReportes{

    static public function mdlPrestamosReporte($fechaInicio,$fechaFin){

        $sql='SELECT * FROM prestamo LEFT JOIN ubicacion ON prestamo.id_ubi = ubicacion.id_ubi 
        LEFT JOIN usuario ON usuario.codigo_u = prestamo.codigo_u 
        WHERE prestamo.inicio >= :ini AND prestamo.finalizo <= :fin';

        /*
        SELECT * FROM prestamo LEFT JOIN ubicacion ON prestamo.id_ubi = ubicacion.id_ubi 
        LEFT JOIN usuario ON usuario.codigo_u = prestamo.codigo_u 
        WHERE prestamo.inicio >= 2022-03-31 AND prestamo.finalizo <= 2023-03-31
        */

        /*$sql='SELECT * from ticket LEFT JOIN ubicacion on ticket.id_Ubi = ubicacion.id_Ubi 
        LEFT JOIN personal on ticket.id_Per = personal.id_Per 
        LEFT JOIN usuario on ticket.id_Usu = usuario.id_Usu 
        WHERE ticket.fh_tic >= :ini AND ticket.fh_tic <= :fin';*/
        
        
        
        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":ini",$fechaInicio,PDO::PARAM_STR);
        
        $stmt->bindParam(":fin",$fechaFin,PDO::PARAM_STR);
        
        if($stmt->execute()){

            return $stmt->fetchAll();

        }
    
    }
}