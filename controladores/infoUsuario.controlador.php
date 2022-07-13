<?php

class ControladorInfoUsuario{

    public function ctrActualizarInfoUsuario(){
        
        if(isset($_POST["codigo"])){
            //$image = $_FILES['Imagen']['tmp_name'];
            //$imgContenido = addslashes(file_get_contents($image));
            
            //$credencial = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"]));
            $file="";
            if(isset($_FILES['Imagen']['tmp_name']) && $_FILES['Imagen']['tmp_name']!=""){
                $file = fopen($_FILES['Imagen']['tmp_name'], 'rb');
            }
            
            $direccion=  "/^([a-zA-Z0-9\.]+@+(alumnos.udg.mx|cusur.udg.mx))$/";
            $nomappValidos = '~^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$~';
            $numerosValidos = '~^[0-9\s]+$~';

            if(preg_match($numerosValidos,$_POST["codigo"]) &&
            preg_match($nomappValidos,$_POST["nombre"]) &&
            preg_match($nomappValidos,$_POST["apellidoP"]) &&
            preg_match($nomappValidos,$_POST["apellidoM"]) &&
            preg_match($numerosValidos,$_POST["carrera"]) &&
            preg_match($numerosValidos,$_POST["semestre"]) &&
            preg_match($numerosValidos,$_POST["telefono"]) &&
            preg_match($direccion,$_POST["correo"])){

                $datos = array('codigo' => $_POST["codigo"],
                'nombre' => $_POST["nombre"],
                'apellidoP' => $_POST["apellidoP"],
                'apellidoM' => $_POST["apellidoM"],
                'carrera' => $_POST["carrera"],
                'semestre' => $_POST["semestre"],
                'correo' => $_POST["correo"],
                'telefono' => $_POST["telefono"],
                'credencial' => $file);

                $respuesta = ModeloInfoUsuario::mdlActualizarInfoUsuario($datos);
                
                if($respuesta=="ok"){
                    echo "<script>
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href);
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Datos Actualizados Correctamente',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                timer: 2400
                            });
                        }
                        setTimeout(function(){
                            location.reload();
                        },2500);
                    </script>";
                }

                else{
                    echo "<script>
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href);
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Error: ".$respuesta."',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                timer: 4000
                            });
                        }
                        setTimeout(function(){
                            location.reload();
                        },3900);
                    </script>";
                }

            }
            else{
                if(preg_match($direccion,$_POST["correo"])){
                    echo "<script>
                            if ( window.history.replaceState ) {
                                window.history.replaceState( null, null, window.location.href);
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'ERROR puedes ser bloqueado',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    timer: 3000
                                });
                            }
                            setTimeout(function(){
                                location.reload();
                            },2900);
                        </script>";
                }
                else{
                    echo "<script>
                            if ( window.history.replaceState ) {
                                window.history.replaceState( null, null, window.location.href);
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error Ingresa un correo válido',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    timer: 3000
                                });
                            }
                            setTimeout(function(){
                                location.reload();
                            },2900);
                        </script>";
                }

            }
    
        }

    }

    public function ctrObtenerPrestamoActivo(){
        
        $respuesta = ModeloInfoUsuario::mdlObtenerPrestamoActivo($_SESSION["usuario"]["codigo_u"]);

        if($respuesta){
            echo 'Id del prestamo: '.$respuesta[0]["id_pres"].'<br>';
            echo 'Fecha de Solicitud: '.date("d-m-y",strtotime($respuesta[0]["solicitud"])).'<br>';
        }
        else{
            echo '<div class="col-12 bg-info">No tienes prestamos activos</div>';
        }

    }
    /** */
    
    public function ctrObtenerCarreras($carUsu){
        $respuesta = ModeloInfoUsuario::mdlObtenerCarreras($carUsu);
        if($respuesta != 'error'){
            echo $respuesta;    
        }
    }

    static public function ctrObtenerDatosUsuario(){
        
        $respuesta = ModeloInfoUsuario::mdlObtenerDatosUsuario();

        return $respuesta;
    
    }

}

?>