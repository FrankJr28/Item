<?php

session_start();

require_once "../modelos/formularios.modelo.php";

$modelo = new ModeloFormularios();

switch($_GET["op"]){
    
    case "accesosocial":                                            /*  */
        
        if(isset($_POST["usu_nombre"]) && isset($_POST["usu_correo"])){

            $correo = $_POST["usu_correo"];

            $arroba = strripos($correo, "@");

            $dominio = substr($correo, $arroba+1);

            if($dominio=="alumnos.udg.mx"){

                $nombre = $_POST["usu_nombre"];

                $nombre = trim($nombre, " ");   //Retiramos espacios

                $pos=strripos($nombre, " ");    //buscamos espacios para separar apellidos

                $apM = substr($nombre, $pos+1); //Obtenemos apellido paterno

                $nombre = substr($nombre, 0, $pos);

                $pos=strripos($nombre, " ");

                $apP = substr($nombre, $pos+1); //Obtenemos apellido paterno

                $nombre = substr($nombre, 0, $pos); //Recortamos el nombre
                
                $link = $_POST["link"];

                //echo "nombre: ".$nombre." apellido paterno: ".$apP." apellido materno: ".$apM;
                
                $datos=$modelo->get_login_social($_POST["usu_correo"],$nombre, $apP, $apM, $link);
                
                if($datos=="insert success" || $datos=="ya esta"){
                    /*
                    $array = array(
                        "nombre_u" => $nombre,
                        "app_u" => $apP,
                        "apm_u" => $apM,
                        "correo_u" => $correo,
                    );

                    $_SESSION["usuario"] = $array;
                    */
                    echo "redirect";

                }

                else{

                    echo $datos;

                }
 
                
            }

            else{

                echo "invalid domain";
            
            }


            /*  Separacion del nombre   */

            
        }
        /*                          */

        //$datos=$modelo->get_login_social($_POST["usu_correo"],);
        //echo $datos;
        
        
        /*
        if(is_array($datos)==true and count($datos)>0){
            var_dump($datos[0]["codigo_u"]);
            //echo $_POST["usu_nombre"];
        }else{
            echo "0";
        }
        break;*/

    /*
    case "registro":
        $datos=$usuario->get_correo($_POST["usu_correo"]);
        if(is_array($datos)==true and count($datos)>0){
           echo "1";
        }else{
            $usuario->register_usuario($_POST["usu_nom"],$_POST["usu_correo"],$_POST["usu_pass"]);
            echo "0";
        }
        break;

    */

}

//echo "hola";


?>