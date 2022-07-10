<?php
class ControladorDetalles{
    static public function ctrObtenerDetallePrestamo(){
        if(isset($_POST["folio"])){
            $fol = $_POST["folio"];
            $respuesta = ModeloDetalles::mdlObtenerDetallePrestamo($fol);
            return $respuesta; 
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