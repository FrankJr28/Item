<?php

class ControladorSolicitar{

    public function ctrSolicitarPrestamo(){

        if(isset($_POST["btnSoli"])){
            
            $u = $_SESSION["usuario"]["codigo_u"];
        
            $respuesta = ModeloSolicitar::mdlSolicitarPrestamo($u);

            if($respuesta=="ok"){
                echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Solicitud enviada3',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 6000
                    });
                }

                setTimeout(function(){
                    window.location = 'index.php?pagina=solicitar';
                }, 1500);
                
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