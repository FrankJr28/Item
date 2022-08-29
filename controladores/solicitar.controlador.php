<?php

class ControladorSolicitar{

    public function ctrSolicitarPrestamo(){

        if(isset($_POST["btnSoli"])){
            
            $u = $_SESSION["usuario"]["codigo_u"];

                $disponible = ModeloSolicitar::mdlObtenerPrestamoEnSolicitud($u);

                if($disponible=="disponible"){

                    $respuesta = ModeloSolicitar::mdlSolicitarPrestamo($u);

                    if($respuesta=="ok"){
                        echo "<script>
                        
                        if ( window.history.replaceState ) {

                            window.history.replaceState( null, null, window.location.href);

                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: 'Solicitud enviada',
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
                else{
                    
                    if($disponible=="ocupado"){

                        echo "<script>
                            
                            if ( window.history.replaceState ) {

                                window.history.replaceState( null, null, window.location.href);

                                Swal.fire({
                                    position: 'top',
                                    title: 'Debes finalizar el préstamo activo para solicitar otro',
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

}