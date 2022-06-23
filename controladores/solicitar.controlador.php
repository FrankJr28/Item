<?php

class ControladorSolicitar{

    public function ctrSolicitarPrestamo(){

        if(isset($_POST["btnSoli"])){
            
            $u = $_SESSION["usuario"]["codigo_u"];
        
            $respuesta = ModeloSolicitar::mdlSolicitarPrestamo($u);

            if($respuesta=="xd"){
                echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Solicitud enviada3',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 2000
                    });
                }

                setTimeout(function(){
                    window.location = 'index.php?pagina=solicitar';
                }, 2000);
                
            </script>";
            }

            else{
                echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'top',
                        title: 'error ".$respuesta."',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 5000
                    });
                }
                
                </script>";
            }
        
        }

    }

}