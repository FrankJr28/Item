<?php

require_once "conexion.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class ModeloFormularios{
    
    /*                          Validar Sesiones                            */

    static public function mdlIniciarSesionUsuario($datos){

        $sql="SELECT * FROM usuario WHERE codigo_u=:login AND contra_u=:password AND banned=0";

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

    static public function mdlObtenerPrestamosAceptar(){
    
        $sql='SELECT * FROM prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE inicio is NULL';
    
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
    
        $sql='SELECT * FROM prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE inicio AND Finalizo is NULL';
    
        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $presa = $stmt->fetchAll();

            foreach($presa as $dato){
                $informacion=$informacion.'<tr>
                <td><form action="index.php?pagina=detallePrestamo"
                method="post"><input type="hidden" value="'.$dato["id_pres"].'" name="folio">
                <button type="submit" style="background:transparent; border:none;">'.$dato["id_pres"].'</button></form></td>
                
                <td><form action="index.php?pagina=detalleUsuario" method="post">
                    <input type="hidden" id="start" name="codigo" value="'.$dato["codigo_u"].'">
                    <button type="submit" style="background:transparent; border:none;">'.$dato["codigo_u"].'</button>
                </form></td>

                <td>'.$dato["nombre_u"].' '.$dato["app_u"].'</td>
                <td>'.$dato["inicio"].'</td>
                <td id="actions" >
                    <div class="d-flex justify-content-center" >
                        <form action="#" method="post"><input type="hidden" value="'.$dato["id_pres"].'" name="cPF"><button type="submit" style="background:transparent; border:none;"><i class="bi bi-check-circle-fill"></i></button></form>
                    </div>
                </td>
            </tr>';
            //$informacion=$informacion .'<option value=5>edificio</option>';
            }

        }
        else{
            $informacion='error';
        }

        return $informacion;
    
    }

    static public function mdlObtenerPrestamosHistorial(){
    
        $sql='SELECT * FROM prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE inicio AND Finalizo';
    
        $stmt = Conexion::conectar()->prepare($sql);

        $informacion='';

        if($stmt->execute()){
            
            $presa = $stmt->fetchAll();

            foreach($presa as $dato){
                $informacion=$informacion.'<tr>
                <td><form action="index.php?pagina=detallePrestamo"
                method="post"><input type="hidden" value="'.$dato["id_pres"].'" name="folio">
                <button type="submit" style="background:transparent; border:none;">'.$dato["id_pres"].'</button></form></td>
                
                <td><form action="index.php?pagina=detalleUsuario" method="post">
                    <input type="hidden" id="start" name="codigo" value="'.$dato["codigo_u"].'">
                    <button type="submit" style="background:transparent; border:none;">'.$dato["codigo_u"].'</button>
                </form></td>

                <td>'.$dato["nombre_u"].' '.$dato["app_u"].'</td>
                <td>'.$dato["inicio"].'</td>
                <td>'.$dato["finalizo"].'</td>
                
            </tr>';
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

    static public function mdlObtenerDatosUsuario(){

        $sql="SELECT * FROM usuario LEFT JOIN carrera ON usuario.id_car WHERE correo_u=:login";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":login",$_SESSION["usuario"]["correo_u"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            $resultado = $stmt->fetch();

            return $resultado;

        }

    }

    static public function mdlActualizarDatos($datos){

        $sql="update";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":login",$_SESSION["usuario"]["correo_u"],PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }

        else{

            return "error";

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
            //return "inserta";
 
            //INSERT INTO `usuario` (`codigo_u`, `nombre_u`, `app_u`, `apm_u`, `correo_u`, `telefono`, `semestre`, 
            //`id_car`, `cred_u`, `hol_u`, `contra_u`, `actS_u`, `banned`) 
            //VALUES ('2188874217', 'Joaquin', 'Leonardo', 'Lázaro', 
            //'joaquinll@alumnos.udg.mx', '3429874561', '3', '0', '', b'1', 'joa123', b'1', b'0');

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

