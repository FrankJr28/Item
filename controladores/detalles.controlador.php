<?php
class ControladorDetalles{

    static public function ctrObtenerDetallePrestamo(){
        if(isset($_POST["folio"])){
            $fol = $_POST["folio"];
            $respuesta = ModeloDetalles::mdlObtenerDetallePrestamo($fol);
            return $respuesta; 
        }
    }
    public function ctrObtenerPrestamosUsuario($u){

        $respuesta = ModeloDetalles::mdlObtenerPrestamosUsuario($u);

        if($respuesta != 'error'){
            $informacion="";//formatear fecha date("d/m/y",strtotime($dato["inicio"]));
            if($respuesta){
                foreach($respuesta as $dato){

                    $informacion.='<tr>
                        <td><form action="index.php?pagina=detallePrestamo"
                        method="post"><input type="hidden" value="'.$dato["id_pres"].'" name="folio">
                        <button type="submit" style="background:transparent; border:none;">'.$dato["id_pres"].'</button></form></td>
                        
                        <td>'.date("d-m-y",strtotime($dato["solicitud"])).'</td>
                        <td>'; 
                        if($dato["finalizo"]){
                            $informacion.= date("d-m-y",strtotime($dato["finalizo"]));
                        }
                    $informacion.='</td></tr>'; 
                }
                echo $informacion;
                //echo var_dump($respuesta);
            }
        }
        else{
            echo "<script>alert('ocurrió un error');</script>";
        }

    }
    static public function ctrObtenerDetalleUsuario(){
        if(isset($_POST["codigo"])){
            $u = $_POST["codigo"];
            $respuesta = ModeloDetalles::mdlObtenerDetalleUsuario($u);
            return $respuesta; 
        }
    }
    static public function ctrObtenerDetallePresAdapt(){
        if(isset($_POST["folio"])){
            $fol = $_POST["folio"];
            $respuesta = ModeloDetalles::mdlObtenerDetallePresAdapt($fol);
            return $respuesta; 
        }
    }
    static public function ctrObtenerDetallePresBoc(){
        if(isset($_POST["folio"])){
            $fol = $_POST["folio"];
            $respuesta = ModeloDetalles::mdlObtenerDetallePresBoc($fol);
            return $respuesta; 
        }
    }
    static public function ctrObtenerDetallePresCab(){
        if(isset($_POST["folio"])){
            $fol = $_POST["folio"];
            $respuesta = ModeloDetalles::mdlObtenerDetallePresCab($fol);
            return $respuesta; 
        }
    }
    static public function ctrObtenerDetallePresLap(){
        if(isset($_POST["folio"])){
            $fol = $_POST["folio"];
            $respuesta = ModeloDetalles::mdlObtenerDetallePresLap($fol);
            return $respuesta; 
        }
    }
    static public function ctrObtenerDetallePresProy(){
        if(isset($_POST["folio"])){
            $fol = $_POST["folio"];
            $respuesta = ModeloDetalles::mdlObtenerDetallePresProy($fol);
            return $respuesta; 
        }
    }
}
?>