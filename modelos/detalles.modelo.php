<?php
class ModeloDetalles{
    static public function mdlObtenerDetallePrestamo($f){
        $sql="SELECT * FROM prestamo LEFT JOIN usuario ON prestamo.codigo_u LEFT JOIN ubicacion ON prestamo.id_ubi 
        WHERE prestamo.id_pres=:f";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":f",$f,PDO::PARAM_INT);
        if($stmt->execute()){  
            return $stmt->fetch();
        }
        else{
            return "error";
        }
    }

    static public function mdlObtenerDetalleUsuario($u){
        $sql="SELECT * FROM usuario  LEFT JOIN carrera ON usuario.id_car WHERE codigo_u=:login";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":login",$u,PDO::PARAM_INT);
        if($stmt->execute()){
            $resultado = $stmt->fetch();
            return $resultado;
        }
    }

    static public function mdlObtenerDetallePresAdapt($f){
        $sql="SELECT * FROM prestamo 
        LEFT JOIN pres_adapt on prestamo.id_pres = pres_adapt.id_pres 
        LEFT JOIN adaptador on pres_adapt.id_a = adaptador.id_a
        WHERE prestamo.id_pres=:f";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":f",$f,PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }
        else{
            return "error";
        }
    }

    static public function mdlObtenerDetallePresBoc($f){
        $sql="SELECT * FROM prestamo 
        LEFT JOIN pres_boc on prestamo.id_pres = pres_boc.id_pres
        LEFT JOIN bocina on pres_boc.id_b = bocina.id_b 
        WHERE prestamo.id_pres=:f";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":f",$f,PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }
        else{
            return "error";
        }
    }

    
    static public function mdlObtenerDetallePresCab($f){
        $sql="SELECT * FROM prestamo 
        LEFT JOIN pres_cab on pres_cab.id_pres = prestamo.id_pres 
        LEFT JOIN cable on pres_cab.id_c = cable.id_c 
        LEFT JOIN tipocable ON tipocable.id_tc = cable.id_tc
        WHERE prestamo.id_pres=:f";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":f",$f,PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }
        else{
            return "error";
        }
    }

    static public function mdlObtenerDetallePresLap($f){
        $sql="SELECT * FROM prestamo 
        LEFT JOIN pres_lap on prestamo.id_pres = pres_lap.id_pres
        LEFT JOIN laptop on pres_lap.id_l = laptop.id_l 
        WHERE prestamo.id_pres=:f";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":f",$f,PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }
        else{
            return "error";
        }
    }
    static public function mdlObtenerDetallePresProy($f){
        $sql="SELECT * FROM prestamo 
        LEFT JOIN pres_proy on prestamo.id_pres = pres_proy.id_pres
        LEFT JOIN proyector on pres_proy.id_p = pres_proy.id_p 
        WHERE prestamo.id_pres=:f";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":f",$f,PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }
        else{
            return "error";
        }
    }
}
?>