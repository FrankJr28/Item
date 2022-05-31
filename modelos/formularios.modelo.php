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

    static public function mdlObtenerBocinas($u){

        $sql = "SELECT bocina.*, esp_boc.codigo_u from bocina LEFT JOIN esp_boc ON esp_boc.codigo_u IS NULL WHERE bocina.disp_b=1 
        UNION SELECT bocina.*, esp_boc.codigo_u FROM bocina LEFT JOIN esp_boc ON esp_boc.id_b = bocina.id_b WHERE esp_boc.codigo_u = :u AND bocina.disp_b=1 ORDER BY id_b ASC";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $bocinas = $stmt->fetchAll();

            $bocinas=array_values($bocinas);
              
            for($i = count($bocinas)-1; $i>=0; --$i){
                //if($i>0){
                    if(!$bocinas[$i]["codigo_u"]){

                        if(isset($bocinas[$i-1]["id_b"])){

                            if($bocinas[$i]["id_b"]==$bocinas[$i-1]["id_b"]){
                                
                                    unset($bocinas[$i]);
                                
                            }

                        }
                        else if(isset($bocinas[$i+1]["id_b"])){

                            if($bocinas[$i]["id_b"]==$bocinas[$i+1]["id_b"]){

                                unset($bocinas[$i]);

                            }   

                        }
                        
                         
                    }
                    
            }           

            foreach($bocinas as $dato){

                $informacion=$informacion.'<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
                <h6> Id: ' .  $dato[0] . "  Modelo: " . $dato["marca_b"] ." ". $dato["modelo_b"] . '</h6>
                <div class="form-check form-switch">
                        
                            <input class="form-check-input boc" type="checkbox" id="flexSwitchCheckDefault" value="'.$dato[0].'" name="boc"';
                            
                            if($dato["codigo_u"])
                                $informacion=$informacion.'checked';

                            $informacion=$informacion.'>
                        
                </div>
            </a>';

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

    static public function mdlObtenerCables($u){
        
        /*
        SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable LEFT join tipocable on tipocable.id_tc = cable.id_tc LEFT JOIN esp_cab ON esp_cab.codigo_u IS NULL WHERE cable.disp_c=1 
        UNION SELECT cable.*, esp_cab.codigo_u FROM cable LEFT JOIN esp_cab ON esp_cab.id_c = cable.id_c WHERE esp_cab.codigo_u = :u AND cable.disp_c=1 ORDER BY id_c ASC
        SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable LEFT join tipocable on tipocable.id_tc = cable.id_tc LEFT JOIN esp_cab ON esp_cab.codigo_u IS NULL WHERE cable.disp_c=1 UNION SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable LEFT join tipocable on tipocable.id_tc = cable.id_tc LEFT JOIN esp_cab ON esp_cab.id_c = cable.id_c WHERE esp_cab.codigo_u = 3000000013 AND cable.disp_c=1 ORDER BY id_c ASC
        */

        $sql='SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable 
        LEFT join tipocable on tipocable.id_tc = cable.id_tc 
        LEFT JOIN esp_cab ON esp_cab.codigo_u IS NULL WHERE cable.disp_c=1 
        UNION SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable 
        LEFT join tipocable on tipocable.id_tc = cable.id_tc 
        LEFT JOIN esp_cab ON esp_cab.id_c = cable.id_c WHERE esp_cab.codigo_u = :u AND cable.disp_c=1 
        ORDER BY id_c ASC';

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $cables = $stmt->fetchAll();

            $cables=array_values($cables);
              
            for($i = count($cables)-1; $i>=0; --$i){
                
                    if(!$cables[$i]["codigo_u"]){
                        
                        if(isset($cables[$i-1]["id_c"])){

                            if($cables[$i]["id_c"]==$cables[$i-1]["id_c"]){
                                
                                    unset($cables[$i]);
                                
                            }

                        }

                        //
                        else if(isset($cables[$i+1]["id_c"])){

                            if($cables[$i]["id_c"]==$cables[$i+1]["id_c"]){

                                unset($cables[$i]);

                            }   

                        }
                        //
                    }
                    
            }
            //
            //

            foreach($cables as $dato){

                $informacion=$informacion.'<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
                <h6> Id: ' .  $dato[0] . "  Modelo: " . $dato["marca_c"] ." ". $dato["conexion"] . '</h6>
                <div class="form-check form-switch">
                        
                            <input class="form-check-input cab" type="checkbox" id="flexSwitchCheckDefault" value="'.$dato[0].'" name="cab"';
                            
                            if($dato["codigo_u"])
                                $informacion=$informacion.'checked';

                            $informacion=$informacion.'>
                        
                </div>
            </a>';

            //$informacion=$informacion .'<option value=5>edificio</option>';
            }

        }
        else{
            $informacion='error';
        }
        
        return $informacion;
        
    }

    static public function mdlObtenerAdaptadores($u){

        $sql='SELECT adaptador.*, esp_adapt.codigo_u from adaptador LEFT JOIN esp_adapt ON esp_adapt.codigo_u IS NULL WHERE adaptador.disp_a=1 UNION 
        SELECT adaptador.*, esp_adapt.codigo_u FROM adaptador LEFT JOIN esp_adapt ON esp_adapt.id_a = adaptador.id_a WHERE esp_adapt.codigo_u = :u AND adaptador.disp_a=1 ORDER BY id_a ASC';

        //$sql='SELECT adaptador.*, esp_adapt.codigo_u FROM adaptador LEFT JOIN esp_adapt ON esp_adapt.codigo_u = :u AND actS_a=1 AND disp_a=1 group by adaptador.id_a';

        $stmt = Conexion::conectar()->prepare($sql);

        //$stmt->bindParam(":c",$c,PDO::PARAM_INT);

        $stmt->bindParam(':u',$u,PDO::PARAM_INT);

        $informacion='';

        if($stmt->execute()){
            
            $informacion = $stmt->fetchAll();

            //$informacion=array_values($informacion);
              
            for($i = count($informacion)-1; $i>=0; --$i){
                //if($i>0){
                    if(!$informacion[$i]["codigo_u"]){

                        if(isset($informacion[$i-1]["id_a"])){

                            if($informacion[$i]["id_a"]==$informacion[$i-1]["id_a"]){
                                
                                    unset($informacion[$i]);
                                
                            }

                        }
                        else if(isset($informacion[$i+1]["id_a"])){

                            if($informacion[$i]["id_a"]==$informacion[$i+1]["id_a"]){

                                unset($informacion[$i]);

                            }   

                        }
                        
                         
                    }
                    
            }

            //

            $informacion2='';

            foreach($informacion as $dato){
                
                $informacion2=$informacion2.'<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
                    <h6>'.$dato[1].' '.$dato[2].'</h6>
                        <div class="form-check form-switch">

                            <input class="form-check-input adapt" type="checkbox" value="'.$dato[0].'" name="adapt" dbs-name="'.$dato["codigo_u"].'"';
                            
                        if($dato["codigo_u"])
                            $informacion2=$informacion2.'checked';                                

                    $informacion2=$informacion2.'>
                        </div>
                </a>';

            }

        }
        else{
            $informacion2='error';
        }
        
        return $informacion2;
        
    }

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

        $sql='SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable 
        LEFT join tipocable on tipocable.id_tc = cable.id_tc 
        LEFT JOIN esp_cab ON esp_cab.codigo_u IS NULL WHERE cable.disp_c=1 
        UNION SELECT cable.*, tipocable.*, esp_cab.codigo_u FROM cable 
        LEFT join tipocable on tipocable.id_tc = cable.id_tc 
        LEFT JOIN esp_cab ON esp_cab.id_c = cable.id_c WHERE esp_cab.codigo_u = :u AND cable.disp_c=1 
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

    static public function mdlObtenerPrestamosAceptar(){
    
        $sql='SELECT * FROM prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE inicio is NULL';
    
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
                <td>'.$dato["solicitud"].'</td>
                <td id="actions" >
                    <div class="d-flex justify-content-center" >
                        <form action="#" method="post"><input type="hidden" value="'.$dato["id_pres"].'" name="cPA"><button type="submit" style="background:transparent; border:none;"><i class="bi bi-check-square"></i></button></form>
                        <form action="#" method="post"><input type="hidden" value="'.$dato["id_pres"].'" name="cPR"><button type="submit" style="background:transparent; border:none;"><i class="bi bi-trash"></i></button></form>
                    </div>
                </td>
            </tr>';
            }

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

    

}   //Fin de la clase

