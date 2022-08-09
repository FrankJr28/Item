<?php

class controladorUsuarios{

    public function ctrObtenerUsuarios(){

        $informacion = ModeloUsuarios::mdlObtenerUsuarios();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-sm table-responsive" id="adminCab">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Paterno</th>
                        <th scope="col">Materno</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Carrera</th>
                        <th scope="col">Semestre</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $index => $dato){

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarUsuario" data-id="'.$dato["codigo_u"].'" 
                    data-nombre="'.$dato["nombre_u"].'" data-app="'.$dato["app_u"].'" data-apm="'.$dato["apm_u"].'" data-correo="'.$dato["correo_u"].'"
                    data-telefono="'.$dato["telefono"].'" data-carrera="'.$dato["id_car"].'" data-semestre="'.$dato["semestre"].'" data-act="'.$dato["act"].'" class="usuario" >
                                <td>'.$dato["codigo_u"].'</td>
                                <td><i class="bi bi-circle-fill text-success';
                                
                                    if($dato["act"]){
                                        $info.=" text-danger";
                                    }

                                $info.='"></td><td>'.$dato["nombre_u"].'</td>
                                <td>'.$dato["app_u"].'</td>
                                <td>'.$dato["apm_u"].'</td>
                                <td>'.$dato["correo_u"].'</td>
                                <td>'.$dato["telefono"].'</td>
                                <td>'.$dato["carrera"].'</td>
                                <td>'.$dato["semestre"].'</td>
                            </tr>';

                }

                $info.='</tbody>
                </table>';               
                        
            }

            else{
                $info="No hay Usuarios";
            }

            echo $info;

        }

    }

    public function ctrObtenerCarreras(){

        $respuesta = ModeloUsuarios::mdlObtenerCarreras();
        if($respuesta!="error"){
            foreach($respuesta as $dato){
                $info.="<option value=".$dato["id_car"].">".$dato["carrera"]."</option>";
            }
            echo $info;
        }
    }

    static public function ctrActualizarUsuario(){

        if(isset($_POST["codigou"])){
            $numerosValidos = '~^[\d]+$~';
            $nomappValidos = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$~';
            $correoValido = '~^([a-zA-ZáéíóúÁÉÍÓÚñÑ\.\-\d]+)@alumnos.udg.mx$~';
            //$direccionValida = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.\#\d\s]+$~';
            if(preg_match($numerosValidos,$_POST["codigou"]) &&
            preg_match($nomappValidos,$_POST["nombreu"]) &&
            preg_match($nomappValidos,$_POST["paternou"]) &&
            preg_match($nomappValidos,$_POST["maternou"]) &&
            preg_match($numerosValidos,$_POST["telefonou"]) &&
            preg_match($correoValido,$_POST["correou"])){
                
                $ar = array('codigo' => $_POST["codigou"],
                            'nombre' => $_POST["nombreu"],
                            'paterno' => $_POST["paternou"],
                            'materno' => $_POST["maternou"],
                            'correo' => $_POST["correou"],
                            'telefono' => $_POST["telefonou"],
                            'carrera' => $_POST["carrerau"],
                            'semestre' => $_POST["semestreu"],
                            'act' => $_POST["verificadou"]
                        );
              
                $respuesta = ModeloUsuarios::mdlActualizarUsuario($ar);

                return $respuesta;
            }
            else{
                return "errorDatos";
            }            

        }

    }

    static public function ctrInsertarUsuario(){

        if(isset($_POST["codigou"])){
            $numerosValidos = '~^[\d]+$~';
            $nomappValidos = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$~';
            $correoValido = '~^([a-zA-ZáéíóúÁÉÍÓÚñÑ\.\-\d]+)@alumnos.udg.mx$~';
            //$direccionValida = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.\#\d\s]+$~';
            
            if(preg_match($numerosValidos,$_POST["codigou"]) &&
            preg_match($nomappValidos,$_POST["nombreu"]) &&
            preg_match($nomappValidos,$_POST["paternou"]) &&
            preg_match($nomappValidos,$_POST["maternou"]) &&
            preg_match($numerosValidos,$_POST["telefonou"]) &&
            preg_match($correoValido,$_POST["correou"])){
                
                if($_POST["contraseña1"]==$_POST["contraseña2"]){
                    $ar = array('codigo' => $_POST["codigou"],
                                'nombre' => $_POST["nombreu"],
                                'paterno' => $_POST["paternou"],
                                'materno' => $_POST["maternou"],
                                'correo' => $_POST["correou"],
                                'telefono' => $_POST["telefonou"],
                                'carrera' => $_POST["carrerau"],
                                'semestre' => $_POST["semestreu"],
                                'contra' => $_POST["contraseña1"]
                            );
                
                    $respuesta = ModeloUsuarios::mdlInsertarUsuario($ar);

                    return $respuesta;
                }
                else{
                    return "errorC";
                }
            }
            else{
                return "errorDatos";
            }            

        }

    }

    static public function ctrEliminarUsuario(){

        if(isset($_POST["EliUsu"])){
            $numerosValidos = '~^[\d]+$~';
            
            if(preg_match($numerosValidos,$_POST["EliUsu"])){
                
                $respuesta = ModeloUsuarios::mdlEliminarUsuario($_POST["EliUsu"]);

                return $respuesta;

            }
            else{
                return "errorDatos";
            }            

        }

    }
}

?>