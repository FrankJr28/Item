<?php

class ModeloInfoUsuario{

    static public function mdlActualizarInfoUsuario($datos){
        //como las variables de codigo y correo estan en la variable global de sesion no es necesario encriptarlas
        $sql='SELECT cuentaGoogle FROM usuario WHERE codigo_u=:cod';    //SQL para consultar si es de la cuenta
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":cod",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
        if($stmt->execute()){
            $c = $stmt->fetchAll();
            if($c[0][0]){//Si esta cuentaGoogle marcado en la db entonce el correo no cambia
                
                $sql='SELECT * FROM usuario WHERE codigo_u=:cod';//Traemos todos los registros de ese codigo y lo comparamos con el correo   
                $stmt = Conexion::conectar()->prepare($sql);
                $stmt->bindParam(":cod",$datos["codigo"],PDO::PARAM_INT);
                if($stmt->execute()){
                    $u=$stmt->fetchAll();
                    if(!$u||$u[0]["correo_u"]==$_SESSION["usuario"]["correo_u"]){ //sino esta ese codigo en algun registro o es el registro de ese usuario entonces actualizalo
                        $sql='UPDATE usuario SET codigo_u =:cod, nombre_u =:nom, app_u=:app, apm_u=:apm, telefono=:tel, semestre=:sem, id_car=:car, act=1 WHERE correo_u=:cor';
                        if($datos["credencial"])
                            $sql='UPDATE usuario SET codigo_u =:cod, nombre_u =:nom, app_u=:app, apm_u=:apm, telefono=:tel, semestre=:sem, id_car=:car, act=1, cred_u=:cred WHERE correo_u=:cor';
                        $pdo = Conexion::conectar();
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(":cod",$datos["codigo"],PDO::PARAM_INT);
                        $stmt->bindParam(":nom",$datos["nombre"],PDO::PARAM_STR);
                        $stmt->bindParam(":app",$datos["apellidoP"],PDO::PARAM_STR);
                        $stmt->bindParam(":apm",$datos["apellidoM"],PDO::PARAM_STR);
                        $stmt->bindParam(":tel",$datos["telefono"],PDO::PARAM_INT);
                        $stmt->bindParam(":sem",$datos["semestre"],PDO::PARAM_INT);
                        $stmt->bindParam(":car",$datos["carrera"],PDO::PARAM_INT);
                        if($datos["credencial"])
                            $stmt->bindParam(":cred",$datos["credencial"],PDO::PARAM_LOB);
                        $stmt->bindParam(":cor",$_SESSION["usuario"]["correo_u"],PDO::PARAM_STR);
                        
                        if($stmt->execute()){
                            $_SESSION["usuario"]["codigo_u"]=$datos["codigo"];
                            return "ok";
                        }
                        else{
                            return implode(",",$pdo->errorInfo());
                        }
                    }
                    else{
                        return "El codigo ya está registrado con otro usuario, contacte al administrador";
                    }
                }
            }
            else{//Sino entonce el codigo del usuario no debe cambiar                
                $sql='SELECT * FROM usuario WHERE correo_u=:cor';//Traemos todos los registros de ese codigo y lo comparamos con el correo   
                $stmt = Conexion::conectar()->prepare($sql);
                $stmt->bindParam(":cor",$datos["correo"],PDO::PARAM_STR);
                if($stmt->execute()){
                    $u=$stmt->fetchAll();
                    if(!$u||$u[0]["codigo_u"]==$_SESSION["usuario"]["codigo_u"]){ //sino esta ese codigo en algun registro o es el registro de ese usuario entonces actualizalo
                        $sql='UPDATE usuario SET correo_u=:cor, nombre_u =:nom, app_u=:app, apm_u=:apm, telefono=:tel, semestre=:sem, id_car=:car, act=1 WHERE codigo_u =:cod';
                        if($datos["credencial"])
                            $sql='UPDATE usuario SET nombre_u =:nom, app_u=:app, apm_u=:apm, telefono=:tel, semestre=:sem, id_car=:car,  correo_u=:cor, act=1, cred_u=:cred WHERE codigo_u =:cod';
                        $pdo = Conexion::conectar();
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(":cod",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
                        $stmt->bindParam(":nom",$datos["nombre"],PDO::PARAM_STR);
                        $stmt->bindParam(":app",$datos["apellidoP"],PDO::PARAM_STR);
                        $stmt->bindParam(":apm",$datos["apellidoM"],PDO::PARAM_STR);
                        $stmt->bindParam(":tel",$datos["telefono"],PDO::PARAM_INT);
                        $stmt->bindParam(":sem",$datos["semestre"],PDO::PARAM_INT);
                        $stmt->bindParam(":car",$datos["carrera"],PDO::PARAM_INT);
                        if($datos["credencial"])
                            $stmt->bindParam(":cred",$datos["credencial"],PDO::PARAM_LOB);
                        $stmt->bindParam(":cor",$datos["correo"],PDO::PARAM_STR);
                        if($stmt->execute()){
                            $_SESSION["usuario"]["correo_u"]=$datos["correo"];
                            return "ok";
                        }
                        else{
                            return implode(",",$pdo->errorInfo());
                        }
                    }
                    else{
                        return "El correo ya está registrado con otro usuario, contacte al administrador";
                    }
                }
            }
        }
    }
    //SELECT * from prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE usuario.codigo_u = 210569874 AND prestamo.finalizo IS NULL;

    static public function mdlObtenerContrasenaUsuario($u){
        
        $sql='SELECT contra_u FROM usuario WHERE codigo_u=:cod';

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":cod",$u,PDO::PARAM_INT);

        if($stmt->execute()){
            
            return $stmt->fetchAll();

        }

    }

    static public function mdlRestablecerContrasenaUsuario($u, $contra){
    
        $sql='UPDATE usuario SET contra_u=:contra WHERE codigo_u=:cod';

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":contra",$contra,PDO::PARAM_STR);

        $stmt->bindParam(":cod",$u,PDO::PARAM_INT);

        if($stmt->execute()){
            
            return "ok";

        }
    
    }

    static public function mdlObtenerPrestamoActivo($c){

        $sql="SELECT * from prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE usuario.codigo_u = :c AND prestamo.finalizo IS NULL";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":c",$c,PDO::PARAM_INT);

        if($stmt->execute()){
            
            $resultado = $stmt->fetchAll();

            return $resultado;

        }

    }

    static public function mdlObtenerCarreras($c){

        $sql='SELECT * FROM carrera';
        $stmt = Conexion::conectar()->prepare($sql);
        $informacion='';
        if($stmt->execute()){
            $carreras = $stmt->fetchAll();
            $informacion.='<option value="'.$c.'">...</option>';
            foreach($carreras as $dato){
                $informacion.='<option value="' . $dato["id_car"] . '"';
                if($dato["id_car"]==$c){
                    $informacion.=" selected ";
                }
                $informacion.=">". $dato["carrera"] . '</option>';
            }
        }
        else{
            $informacion='error';
        }
    
        return $informacion;
        
    }

    static public function mdlObtenerDatosUsuario(){

        $sql="SELECT * FROM usuario LEFT JOIN carrera ON usuario.id_car=carrera.id_car WHERE correo_u=:login";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":login",$_SESSION["usuario"]["correo_u"],PDO::PARAM_STR);

        if($stmt->execute()){
            
            $resultado = $stmt->fetch();

            return $resultado;

        }

    }

}

?>