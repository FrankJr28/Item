<?php

    require_once "../controladores/formularios.controlador.php";
    require_once "../modelos/formularios.modelo.php";
    require_once "../modelos/user.modelo.php";

    session_start();

    switch($_GET["op"]){

        case "adapts":

                $u = $_SESSION["usuario"]["codigo_u"];

                $respuesta = ModeloUsuario::mdlGetAdapt($u);

                $respuesta=array_values($respuesta);    //Rordena el array de manera que elimina el array asociativo y se puede trabajar un json en el front
                
                echo json_encode($respuesta);

                /*
                SELECT adaptador.*, esp_adapt.codigo_u from adaptador LEFT JOIN esp_adapt ON esp_adapt.codigo_u IS NULL WHERE adaptador.disp_a=1 UNION 
                SELECT adaptador.*, esp_adapt.codigo_u FROM adaptador LEFT JOIN esp_adapt ON esp_adapt.id_a = adaptador.id_a WHERE esp_adapt.codigo_u = :u AND adaptador.disp_a=1 ORDER BY id_a ASC
                */

            break;
    
        case "insertAdapt":
    
            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $a=$_POST["valor"];

                $r=ControladorFormularios::ctrInsertarEspacioAdapt($a,$u);
                echo "usuario: ".$u;
                echo "adaptador: ".$a;
                echo $r;

            }
            break;

        case "eliminarAdapt":

            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $a=$_POST["valor"];

                $r=ControladorFormularios::ctrEliminarEspacioAdapt($a,$u);
                echo "usuario: ".$u;
                echo "adaptador: ".$a;
                echo $r;

            }
            break;
        
        case "consultAdapt":

            if(isset($_POST["valor"])){
                
                $a=$_POST["valor"];

                $r=ControladorFormularios::ctrConsultarAdapt($a);
                
                if($r==0){
                    $u = $_SESSION["usuario"]["codigo_u"];
                
                    $a=$_POST["valor"];

                    $re=ControladorFormularios::ctrEliminarEspacioAdapt($a,$u);

                    if($re!="ok"){
                        $r=1;
                    }
                }

                echo $r;

            }
            break;

        case "bocs":

                $u = $_SESSION["usuario"]["codigo_u"];

                $respuesta = ModeloUsuario::mdlGetBoc($u);

                $respuesta=array_values($respuesta);

                echo json_encode($respuesta);

            break;
        
        case "insertBoc":

            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $a=$_POST["valor"];

                $r=ControladorFormularios::ctrInsertarEspacioBoc($a,$u);
                echo "usuario: ".$u;
                echo "adaptador: ".$a;
                echo $r;

            }
            break;

        case "eliminarBoc":

            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $a=$_POST["valor"];

                $r=ControladorFormularios::ctrEliminarEspacioBoc($a,$u);
                echo "usuario: ".$u;
                echo "adaptador: ".$a;
                echo $r;

            }
            break;

        case "consultBoc":

            if(isset($_POST["valor"])){
                
                $a=$_POST["valor"];

                $r=ControladorFormularios::ctrConsultarBoc($a);
                
                if($r==0){

                    $u = $_SESSION["usuario"]["codigo_u"];
                
                    $a=$_POST["valor"];

                    $re=ControladorFormularios::ctrEliminarEspacioBoc($a,$u);

                    if($re != "ok"){
                        
                        $r=1;
                    
                    }

                }

                echo $r;

            }

            break;


        //Falta cambiarlo    
        
        case "cables":

            $u = $_SESSION["usuario"]["codigo_u"];

            $respuesta = ModeloUsuario::mdlGetCab($u);

            $respuesta=array_values($respuesta);

            echo json_encode($respuesta);

        break;

        case "insertCab":

            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $c=$_POST["valor"];

                $r=ControladorFormularios::ctrInsertarEspacioCab($c,$u);
                echo "usuario: ".$u;
                echo "adaptador: ".$c;
                echo $r;

            }
            break;


        //Falta cambiarlo
        case "eliminarCab":

            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $c=$_POST["valor"];

                $r=ControladorFormularios::ctrEliminarEspacioCab($c,$u);
                echo "usuario: ".$u;
                echo "adaptador: ".$c;
                echo $r;

            }
            break;


        //Falta Cambiarlo
        case "consultCab":

            if(isset($_POST["valor"])){
                
                $a=$_POST["valor"];

                $r=ControladorFormularios::ctrConsultarCab($a);
                
                if($r==0){

                    $u = $_SESSION["usuario"]["codigo_u"];
                
                    $c=$_POST["valor"];

                    $re=ControladorFormularios::ctrEliminarEspacioCab($c,$u);

                    if($re != "ok"){
                        
                        $r=1;
                    
                    }

                }

                echo $r;

            }

            break;
        
        case "laptops":
            
            $u = $_SESSION["usuario"]["codigo_u"];

            $respuesta = ModeloUsuario::mdlGetLap($u);

            $respuesta=array_values($respuesta);

            echo json_encode($respuesta);

            break;
        
        case "insertLap":

            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $c=$_POST["valor"];

                $r=ControladorFormularios::ctrInsertarEspacioLap($c,$u);
                echo $r;

            }
            break;

        case "eliminarLap":

            if(isset($_POST["valor"])){
                //var_dump($_POST);
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $c=$_POST["valor"];

                $r=ControladorFormularios::ctrEliminarEspacioLap($c,$u);
                echo $r;

            }
            break;

        case "proyectores":
        
            $u = $_SESSION["usuario"]["codigo_u"];

            $respuesta = ModeloUsuario::mdlGetProy($u);

            $respuesta=array_values($respuesta);

            echo json_encode($respuesta);

            break;
            
        case "insertProy":

            if(isset($_POST["valor"])){
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $c=$_POST["valor"];
                
                $r=ModeloFormularios::mdlInsertarEspacioProy($c,$u);
                
                echo $r;

            }
            break;

        case "eliminarProy":

            if(isset($_POST["valor"])){
                
                $u = $_SESSION["usuario"]["codigo_u"];
                
                $c=$_POST["valor"];

                $r=ModeloFormularios::mdlEliminarEspacioProy($c,$u);
                
                echo $r;

            }
            break;
    }

?>