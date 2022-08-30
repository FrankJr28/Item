<?php

require_once "conexion.php";

class ModeloReportes{

    static public function mdlPrestamosReporte($fechaInicio,$fechaFin){

        $sql='SELECT * FROM prestamo LEFT JOIN ubicacion ON prestamo.id_ubi = ubicacion.id_ubi 
        LEFT JOIN usuario ON usuario.codigo_u = prestamo.codigo_u 
        WHERE prestamo.inicio >= :ini AND prestamo.finalizo <= :fin';

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":ini",$fechaInicio,PDO::PARAM_STR);
        
        $stmt->bindParam(":fin",$fechaFin,PDO::PARAM_STR);
        
        if($stmt->execute()){

            return $stmt->fetchAll();

        }
        $stmt->close();
        $stmt=NULL;
    }

    static public function mdlObtenerPeriodo($fechaInicio,$fechaFin){

        $sql='SELECT DATE(finalizo) AS finalizo, COUNT(finalizo) AS cantidad, 
        (SELECT COUNT(id_a) FROM pres_adapt WHERE pres_adapt.id_pres=prestamo.id_pres) AS adaptadores,
        (SELECT COUNT(id_b) FROM pres_boc WHERE pres_boc.id_pres=prestamo.id_pres) AS bocinas, 
        (SELECT COUNT(id_c) FROM pres_cab WHERE pres_cab.id_pres=prestamo.id_pres) AS cables,
        (SELECT COUNT(id_l) FROM pres_lap WHERE pres_lap.id_pres=prestamo.id_pres) AS laptops,
        (SELECT COUNT(id_p) FROM pres_proy WHERE pres_proy.id_pres=prestamo.id_pres) AS proyectores 
        from prestamo WHERE prestamo.inicio>=:ini AND prestamo.finalizo<=:fin GROUP BY DATE(finalizo)';

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":ini",$fechaInicio,PDO::PARAM_STR);
        
        $stmt->bindParam(":fin",$fechaFin,PDO::PARAM_STR);
        
        if($stmt->execute()){

            return $stmt->fetchAll();

        }
        $stmt->close();
        $stmt=NULL;
    }

    /*
        SELECT COUNT(column_name)
        FROM table_name
        WHERE condition;
    */

    /*
        SELECT prestamo.finalizo AS pf, (SELECT COUNT(prestamo.finalizo) from prestamo WHERE prestamo.finalizo=pf) FROM prestamo;
        SELECT finalizo, COUNT(finalizo) from prestamo GROUP BY finalizo;

        SELECT DATE(finalizo) AS pf, (SELECT COUNT(DATE(finalizo)) from prestamo WHERE finalizo=pf) FROM prestamo;
        
        Select * From NOMBRE_TABLA order by  Convert(DATE, campo_fecha)

        //FINALIZO
        SELECT DATE(finalizo), COUNT(DATE(finalizo)) from prestamo GROUP BY DATE(finalizo);

        Esta es la wena
        SELECT DATE(finalizo) AS finalizo, COUNT(finalizo) AS cantidad from prestamo GROUP BY DATE(finalizo);

        SELECT DATE(finalizo) AS finalizo, COUNT(finalizo) AS cantidad from prestamo WHERE prestamo.inicio>="2022-02-08" GROUP BY DATE(finalizo);

        */

}