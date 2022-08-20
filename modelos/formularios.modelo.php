<?php

require_once "conexion.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class ModeloFormularios{
    
    /*                          Validar Sesiones                            */

    static public function mdlIniciarSesionUsuario($datos){

        $sql="SELECT * FROM usuario WHERE codigo_u=:login AND contra_u=:password AND actS_u=1";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":login",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            return $stmt->fetch();

        }

        else{

            return "error";
        
        }

    }

    static public function mdlIniciarSesionAdmin($datos){

        $sql="SELECT * FROM admin WHERE codigo_a=:login AND contra_a=:password AND actS_a=1";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":login",$datos["id"],PDO::PARAM_INT);

        $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);

        if($stmt->execute()){
   
            return $stmt->fetch();

        }
        else{

            return "error";
        
        }

    }

    /*                          Fin Validar Sesiones                            */

/*                          Visualiza el Usuario                            */
    

    /*              Para Articulos en la vista del Admin            */

    static public function mdlObtenerLaptopsA(){

        $sql='SELECT * FROM laptop WHERE disp_l=1 AND actS_l=1';

        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $laptops = $stmt->fetchAll();

            foreach($laptops as $dato){
                $informacion=$informacion.'<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold">' . $dato["marca_l"] ." ". $dato["modelo_l"] . '</div></div>
                <span class="badge bg-primary rounded-pill">1</span>';
            //$informacion=$informacion .'<option value=5>edificio</option>';
            }

        }
        else{
            $informacion='error';
        }
        
        return $informacion;
        
    }

    static public function mdlObtenerProyectores(){

        $sql='SELECT * FROM proyector WHERE disp_p=1 AND actS_p=1';

        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $proyectores = $stmt->fetchAll();

            foreach($proyectores as $dato){
                $informacion=$informacion.'<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold">' . $dato["marca_p"] ." ". $dato["modelo_p"] . '</div></div>
                <span class="badge bg-primary rounded-pill">1</span>';
            //$informacion=$informacion .'<option value=5>edificio</option>';
            }

        }
        else{
            $informacion='error';
        }
        
        return $informacion;
        
    }

    

    static public function mdlObtenerCarreras(){

        $sql='SELECT * FROM carrera';

        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $carreras = $stmt->fetchAll();

            foreach($carreras as $dato){
                $informacion=$informacion.
                '<option value=' . $dato["id_car"] .">". $dato["carrera"] . '</div>';
            //$informacion=$informacion .'<option value=5>edificio</option>';
            }

        }
        else{
            $informacion='error';
        }
        
        return $informacion;
        
    }

    static public function mdlObtenerPhoto(){

        $sql="SELECT link_photo FROM usuario WHERE correo_u=:login";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":login",$_SESSION["usuario"]["correo_u"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            $resultado = $stmt->fetch();

            return $resultado["link_photo"];

        }

    }

/*                          Fin Visualiza el Usuario                            */

/*                          Visualiza Admin                            */

    static public function mdlSeleccionarRegistrosPrestamos(){

        $sql='SELECT * from prestamo LEFT JOIN ubicacion on prestamo.id_Ubi = ubicacion.id_Ubi LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u ORDER by prestamo.id_pres desc';
        
        $stmt = Conexion::conectar()->prepare($sql);

        if($stmt->execute()){

            return $stmt -> fetchAll();

        }
    }
/*                          Fin Visualiza Admin                            */    

    public function get_login_social($usu_correo,$nombre,$apellidoP,$apellidoM,$link){

        $sql="select * from usuario where correo_u=:cor";
        
        $stmt=Conexion::conectar()->prepare($sql);
        
        $stmt->bindParam(":cor", $usu_correo, PDO::PARAM_STR);
        
        $stmt->execute();
        
        $resultado=$stmt->fetchAll();

        if(!$resultado){
            
            $sql="insert into usuario (codigo_u, nombre_u, app_u, apm_u, correo_u, link_photo) VALUES (NULL, :nom, :app, :apm, :correo, :link)";
        
            $stmt=Conexion::conectar()->prepare($sql);
            
            $stmt->bindParam(":nom", $nombre, PDO::PARAM_STR); 
            
            $stmt->bindParam(":app", $apellidoP, PDO::PARAM_STR);

            $stmt->bindParam(":apm", $apellidoM, PDO::PARAM_STR);

            $stmt->bindParam(":correo", $usu_correo, PDO::PARAM_STR);

            $stmt->bindParam(":link", $link, PDO::PARAM_STR);

            if($stmt->execute()){

                $cu=$stmt->lastInsertId();

                $array = array(
                    "codigo_u" => $cu,
                    "nombre_u" => $nombre,
                    "app_u" => $apellidoP,
                    "apm_u" => $apellidoM,
                    "correo_u" => $usu_correo,
                );

                $_SESSION["usuario"] = $array;
                
                return "insert success";
                
            }
    
            else{
    
                return "insert fallido";
    
            }

        }

        else{
            $cu=$resultado[0]["codigo_u"];

            $array = array(
                "codigo_u" => $cu,
                "nombre_u" => $nombre,
                "app_u" => $apellidoP,
                "apm_u" => $apellidoM,
                "correo_u" => $usu_correo,
            );

            $_SESSION["usuario"] = $array;        

            return "ya esta"; 
        
        }

        return "0"; 

    }

    

    static public function mdlAceptarPrestamo($p){

        //Obtener Adaptadores
        $sql="SELECT id_a FROM pres_adapt WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionA = $stmt->fetchAll();
        foreach($informacionA as $dato){
            $sql="UPDATE adaptador SET disp_a=0 WHERE id_a=".$dato["id_a"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ua";
            }
        }

        //Obtener Bocina
        $sql="SELECT id_b FROM pres_boc WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionB = $stmt->fetchAll();
        foreach($informacionB as $dato){
            $sql="UPDATE bocina SET disp_b=0 WHERE id_b=".$dato["id_b"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }

        //Obtener Cables
        $sql="SELECT id_c FROM pres_cab WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionC = $stmt->fetchAll();
        foreach($informacionC as $dato){
            $sql="UPDATE cable SET disp_c=0 WHERE id_c=".$dato["id_c"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }
        
        //Obtener Laptops
        $sql="SELECT * FROM pres_lap WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionL = $stmt->fetchAll();
        foreach($informacionL as $dato){
            $sql="UPDATE laptop SET disp_l=0 WHERE id_l=".$dato["id_l"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }

        //Obtener Proyectores
        $sql="SELECT * FROM pres_proy WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionP = $stmt->fetchAll();
        foreach($informacionP as $dato){
            $sql="UPDATE proyector SET disp_p=0 WHERE id_p=".$dato["id_p"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }

        $sql="UPDATE prestamo SET inicio=current_timestamp() WHERE prestamo.id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

    }

    static public function mdlFinalizarPrestamo($p){
        //Obtener Adaptadores
        $sql="SELECT * FROM pres_adapt WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionA = $stmt->fetchAll();
        foreach($informacionA as $dato){
            $sql="UPDATE adaptador SET disp_a=1 WHERE id_a=".$dato["id_a"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ua";
            }
        }
        //Obtener Bocina
        $sql="SELECT * FROM pres_boc WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionB = $stmt->fetchAll();
        foreach($informacionB as $dato){
            $sql="UPDATE bocina SET disp_b=1 WHERE id_b=".$dato["id_b"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }
        //Obtener Cables
        $sql="SELECT * FROM pres_cab WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionC = $stmt->fetchAll();
        foreach($informacionC as $dato){
            $sql="UPDATE cable SET disp_c=1 WHERE id_c=".$dato["id_c"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }
        
        //Obtener Laptops
        $sql="SELECT * FROM pres_lap WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionL = $stmt->fetchAll();
        foreach($informacionL as $dato){
            $sql="UPDATE laptop SET disp_l=1 WHERE id_l=".$dato["id_l"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }

        //Obtener Proyectores
        $sql="SELECT * FROM pres_proy WHERE id_pres=:p";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":p",$p,PDO::PARAM_INT);
        if(!$stmt->execute()){
            return "error";
        }
        $informacionP = $stmt->fetchAll();
        foreach($informacionP as $dato){
            $sql="UPDATE proyector SET disp_p=1 WHERE id_p=".$dato["id_p"];
            $stmt = Conexion::conectar()->prepare($sql);
            if(!$stmt->execute()){  
                return "error ub";
            }
        }
        
        $sql="UPDATE prestamo SET finalizo=current_timestamp() WHERE prestamo.id_pres=:p";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":p",$p,PDO::PARAM_INT);

        if($stmt->execute()){

            
            return "ok";

        }

        else{

            return "error";

        }

    }

    static public function mdlRechazarPrestamo($p){

        $sql="DELETE FROM prestamo WHERE prestamo.id_pres=:p";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":p",$p,PDO::PARAM_INT);

        if($stmt->execute()){

            
            return "ok";

        }

        else{

            return "error";

        }

    }


    static public function mdlInsertarEspacioAdapt($a,$u){

        $sql="INSERT INTO esp_adapt (codigo_u, id_a) VALUES (:u, :a)";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":a",$a,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }

        else{

            return "error";

        }

    }

    static public function mdlEliminarEspacioAdapt($a,$u){

        $sql="DELETE FROM esp_adapt WHERE codigo_u=:u AND id_a=:a";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":a",$a,PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

    }

    static public function mdlConsultarAdapt($a){
        //SELECT disp_a FROM `adaptador` WHERE id_a=10

        $sql="SELECT disp_a FROM adaptador WHERE id_a=:a";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":a",$a,PDO::PARAM_INT);

        if($stmt->execute()){

            $resultado = $stmt->fetchAll();

            $d = $resultado[0]["disp_a"];

            return $d;
        }
        else{
            return "error";
        }

    }

    static public function mdlInsertarEspacioBoc($b,$u){

        $sql="INSERT INTO esp_boc (codigo_u, id_b) VALUES (:u, :b)";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":b",$b,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }

        else{

            return "error";

        }

    }

    static public function mdlEliminarEspacioBoc($b,$u){

        $sql="DELETE FROM esp_boc WHERE codigo_u=:u AND id_b=:b";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":b",$b,PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

    }

    static public function mdlConsultarBoc($b){
        //SELECT disp_a FROM `adaptador` WHERE id_a=10

        $sql="SELECT disp_b FROM bocina WHERE id_b=:b";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":b",$b,PDO::PARAM_INT);

        if($stmt->execute()){

            $resultado = $stmt->fetchAll();

            $d = $resultado[0]["disp_b"];

            return $d;
        }

        else{
            
            return "error";
        
        }

    }

    static public function mdlInsertarEspacioCab($c,$u){

        $sql="INSERT INTO esp_cab (codigo_u, id_c) VALUES (:u, :c)";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }

        else{

            return "error";

        }

    }

    static public function mdlEliminarEspacioCab($c,$u){

        $sql="DELETE FROM esp_cab WHERE codigo_u=:u AND id_c=:c";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

    }

    static public function mdlConsultarCab($c){
        //SELECT disp_a FROM `adaptador` WHERE id_a=10

        $sql="SELECT disp_c FROM cable WHERE id_c=:c";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){

            $resultado = $stmt->fetchAll();

            $d = $resultado[0]["disp_c"];

            return $d;
        }

        else{
            
            return "error";
        
        }

    }

    static public function mdlInsertarEspacioLap($c,$u){

        $sql="INSERT INTO esp_lap (codigo_u, id_l) VALUES (:u, :c)";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }

        else{

            return "error ";

        }

    }

    static public function mdlEliminarEspacioLap($c,$u){

        $sql="DELETE FROM esp_lap WHERE codigo_u=:u AND id_l=:c";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

    }

    static public function mdlInsertarEspacioProy($c,$u){

        $sql="INSERT INTO esp_proy (codigo_u, id_p) VALUES (:u, :c)";

        $stmt = Conexion::conectar()->prepare($sql);
        
        //$_SESSION["usuario"]["codigo_u"]

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }

        else{

            return "error ip".implode(" ",$stmt->errorInfo());

        }

    }

    static public function mdlEliminarEspacioProy($c,$u){

        $sql="DELETE FROM esp_proy WHERE codigo_u=:u AND id_p=:c";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":u",$u,PDO::PARAM_INT);

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){
        
            return "ok";
        
        }
        
        else{

            return "error ep";
        
        }

    }

}   //Fin de la clase

