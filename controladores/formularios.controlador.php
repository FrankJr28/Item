<?php

/*          HTML2PDF            */
/*
require 'vendor/autoload.php';
    
use Spipu\Html2Pdf\Html2Pdf;
*/
/*          HTML2PDF            */

class ControladorFormularios{

    public function ctrGenerarReporte(){

        if(isset($_POST['fI']) && isset($_POST["fF"])){

            echo "Sí hay variables post";

            ob_end_clean();
            ob_start();

            require_once 'vistas/paginas/print_view.php';

            $html = ob_get_clean();

            $html2pdf = new Html2Pdf('P','A4','es', true, 'UTF-8', array(5, 6, 5, 6));//if we want horizontal instead of P we put L
        
        
            $html2pdf->writeHTML($html);
         
            $html2pdf ->output();

        }

    }

    public function ctrIniciarSesionUsuario(){

        if(isset($_POST["codigo"]) && isset($_POST["contra"])){
            
            $datos = array("id" => $_POST["codigo"], 
                        "password" => $_POST["contra"]);
        
            $respuesta = ModeloFormularios::mdlIniciarSesionUsuario($datos);

            if($respuesta){

                if($respuesta["codigo_u"] == $_POST["codigo"] && $respuesta["contra_u"] == $_POST["contra"]){                    

                    $_SESSION["usuario"] = $respuesta;

                    echo '<script>

                        if ( window.history.replaceState ) {

                            window.history.replaceState( null, null, window.location.href );

                            window.location = "index.php?pagina=solicitar";
                            
                        }

                    </script>';
                    
                }

                if($respuesta=="error"){
                    echo '<script>

                        if ( window.history.replaceState ) {

                            window.history.replaceState( null, null, window.location.href );

                            Swal.fire({
                                icon: "error",
                                title: "Error general",
                                text: "Contacte al administrador"
                                
                            })
                        }

                    </script>';
                }

            }


            $respuesta = ModeloFormularios::mdlIniciarSesionAdmin($datos);

            if($respuesta){

                if($respuesta["codigo_a"] == $_POST["codigo"] && $respuesta["contra_a"] == $_POST["contra"]){

                    $_SESSION["admin"] = $respuesta;

                    echo '<script>

                        if ( window.history.replaceState ) {

                            window.history.replaceState( null, null, window.location.href );

                            window.location = "index.php?pagina=adminAccept";
                            
                        }

                    </script>';
                    
                }

                if($respuesta=="error"){
                    echo '<script>

                        if ( window.history.replaceState ) {

                            window.history.replaceState( null, null, window.location.href );

                            Swal.fire({
                                icon: "error",
                                title: "Error general",
                                text: "Contacte al administrador"
                                
                            })
                            
                        }

                    </script>';
                }

            }
           
            else{

				echo '<script>

                    window.history.replaceState( null, null, window.location.href );

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

                        Swal.fire({
                            icon: "error",
                            title: "X",
                            text: "Error al ingresar al sistema, el email o la contraseña no coinciden"
                            
                        })
            
					}

				</script>';
			}

        }                        

    }

    public function ctrObtenerLaptops(){
        
        $u = $_SESSION["usuario"]["codigo_u"];

        $informacion = ModeloFormularios::mdlGetLap($u);

        if($informacion != 'error'){

            $info="";

            $marca_l1="";

            $marca_l2="";

            $c=0;



            foreach($informacion as $index => $dato){
                
                if($marca_l1!=$dato["marca_l"]){     //Si la marca cambió en la iteracion 

                    if(!($index === array_key_first($informacion))){       //y no es el primero

                                        $info.='</div>
                                    </div>
                                </div>
                            </div>
                        </div>';

                    }

                    if($marca_l1){

                        $info.='<li class="list-group-item list-group-item-action d-flex align-items-start" data-bs-toggle="modal" data-bs-target="#modal-lap-' . $marca_l1 . '" id="li-lap-'.$marca_l1.'">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">' . $marca_l1 . '</div>
                            </div>
                                <span class="badge bg-primary rounded-pill" id="sp-' . $marca_l1 . '">'.$c.'</span>
                        </li>';

                        $c=0;

                    }

                    $info.='<div class="modal fade" id="modal-lap-'.$dato["marca_l"].'" tabindex="-1" aria-labelledby="modal-lap" aria-hidden="true">
                        
                            <div class="modal-dialog">
                            
                                <div class="modal-content">
                        
                                    <div class="modal-header">
                                        <i class="fa fa-light fa-laptop"></i>
                                        <h5 class="modal-title" id="exampleModalLabel">Laptops</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="list-group" id="cont'.$dato["marca_l"].'">
                                            
                                            <a class="list-group-item actit d-flex justify-content-between align-items-start">
                                                <h6>Laptop Id</h6>
                                                <h6>Solicitar</h6>
                                            </a>';
                }                                   // IF Si la marca cambió en la iteracion 
                
                $info.='<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">
                            <h6>
                                '.$dato["id_l"]." ".$dato["modelo_l"].'
                            </h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input lap" type="checkbox" id="flexSwitchCheckDefault" value="'.$dato["id_l"].'" name="'.$dato["marca_l"].'">
                            </div>
                        </a>';   

                $c++;
                
                $marca_l2=$marca_l1;

                $marca_l1=$dato["marca_l"];

            }   // IF foreach    

            if($marca_l1){
                            $info.='</div>
                            </div>
                        </div>
                    </div>
                </div>';

                $info.='<li class="list-group-item list-group-item-action d-flex align-items-start" data-bs-toggle="modal" data-bs-target="#modal-lap-' . $marca_l1 . '">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">' . $marca_l1 . '</div>
                    </div>
                        <span class="badge bg-primary rounded-pill">'.$c.'</span>
                </li>';
            }
            
            echo $info;

        }

    }

    public function ctrObtenerProyectores(){
        
        $u = $_SESSION["usuario"]["codigo_u"];

        $informacion = ModeloFormularios::mdlGetProy($u);

        if($informacion != 'error'){

            $info="";

            $marca_p1="";

            $c=0;

            foreach($informacion as $index => $dato){
                
                if($marca_p1!=$dato["marca_p"]){     //Si la marca cambió en la iteracion 

                    if(!($index === array_key_first($informacion))){       //y no es el primero

                                        $info.='</div>
                                    </div>
                                </div>
                            </div>
                        </div>';

                    }

                    if($marca_p1){

                        $info.='<li class="list-group-item list-group-item-action d-flex align-items-start" data-bs-toggle="modal" data-bs-target="#modal-lap-' . $marca_p1 . '">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">' . $marca_p1 . '</div>
                            </div>
                                <span class="badge bg-primary rounded-pill">'.$c.'</span>
                        </li>';

                        $c=0;

                    }

                    $info.='<div class="modal fade" id="modal-lap-'.$dato["marca_p"].'" tabindex="-1" aria-labelledby="modal-lap" aria-hidden="true">
                        
                            <div class="modal-dialog">
                            
                                <div class="modal-content">
                        
                                    <div class="modal-header">
                                        <i class="fa fa-light fa-laptop"></i>
                                        <h5 class="modal-title" id="exampleModalLabel">Laptops</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="list-group">
                                            
                                            <a class="list-group-item actit d-flex justify-content-between align-items-start">
                                                <h6>Laptop Id</h6>
                                                <h6>Solicitar</h6>
                                            </a>';
                }                                   // IF Si la marca cambió en la iteracion 
                
                $info.='<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">
                            <h6>
                                '.$dato["id_p"]." ".$dato["modelo_p"].'
                            </h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="'.$dato["id_p"].'" name=pro>
                            </div>
                        </a>';   

                $c++;

                $marca_p1=$dato["marca_p"];

            }   // IF foreach    

            if($marca_p1){
                            $info.='</div>
                            </div>
                        </div>
                    </div>
                </div>';

                $info.='<li class="list-group-item list-group-item-action d-flex align-items-start" data-bs-toggle="modal" data-bs-target="#modal-lap-' . $marca_p1 . '">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">' . $marca_p1 . '</div>
                    </div>
                        <span class="badge bg-primary rounded-pill">'.$c.'</span>
                </li>';
            }
            
            echo $info;

        }

    }

    public function ctrObtenerBocinas(){

        $u = $_SESSION["usuario"]["codigo_u"];
         
        $respuesta = ModeloFormularios::mdlObtenerBocinas($u);

        if($respuesta != 'error'){

            echo $respuesta;    

        }

    }

    public function ctrObtenerCables(){

        $u = $_SESSION["usuario"]["codigo_u"];
         
        $respuesta = ModeloFormularios::mdlObtenerCables($u);

        if($respuesta != 'error'){

            echo $respuesta;    

        }

    }

    public function ctrObtenerAdaptadores(){
        
        $u = $_SESSION["usuario"]["codigo_u"];

        $respuesta = ModeloFormularios::mdlObtenerAdaptadores($u);

        if($respuesta != 'error'){

            echo $respuesta;    

        }

    }

    public function ctrObtenerCarreras(){
        
        $respuesta = ModeloFormularios::mdlObtenerCarreras();

        if($respuesta != 'error'){

            echo $respuesta;    

        }
    
    }

    static public function ctrObtenerPhoto(){

        $respuesta = 0;

        if(isset($_SESSION["usuario"]))
            $respuesta = ModeloFormularios::mdlObtenerPhoto();

        if($respuesta){
        
            return $respuesta;
        
        }
        else{

            return "img/usuario.png";

        }

    }

    public function ctrActualizarDatos(){

        if(isset($_POST["codigo_u"])){

            $respuesta = ModeloFormularios::mdlActualizarDatos();

            if($respuesta == "ok"){
                echo "Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Datos Actualizados Correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })";
            }

        }

    }

    public function ctrObtenerPrestamosAceptar(){

        $respuesta = ModeloFormularios::mdlObtenerPrestamosAceptar();

        if($respuesta != 'error'){
            //echo "<script>alert('no ocurrió un error"+$respuesta+"');</script>";
            echo $respuesta;    

        }
        else{
            echo "<script>alert('ocurrió un error');</script>";
        }

    }

    public function ctrObtenerPrestamosActivos(){

        $respuesta = ModeloFormularios::mdlObtenerPrestamosActivos();

        if($respuesta != 'error'){
            echo $respuesta;    

        }
        else{
            echo "<script>alert('ocurrió un error');</script>";
        }

    }

    public function ctrObtenerPrestamosHistorial(){

        $respuesta = ModeloFormularios::mdlObtenerPrestamosHistorial();

        if($respuesta != 'error'){
            echo $respuesta;    

        }
        else{
            echo "<script>alert('ocurrió un error');</script>";
        }

    }

    static public function ctrObtenerDatosUsuario(){
        
        $respuesta = ModeloFormularios::mdlObtenerDatosUsuario();

        return $respuesta;
    
    }

    public function ctrValidarSesionUsuario(){
       
        if(!isset($_SESSION["usuario"])){
       
            echo '<script>
        
                window.location = "index.php";
        
            </script>';

            return;
        }
        else{

            if(!($_SESSION["usuario"]["codigo_u"]>0)){
       
                echo '<script>
        
                    window.location = "index.php";
        
                </script>';

                return;
            } 
        }
    }

    public function ctrValidarSesionAdmin(){
       
        if(!isset($_SESSION["admin"])){
       
            echo '<script>
        
                window.location = "index.php";
        
            </script>';

            return;
        }
        else{

            if(!($_SESSION["admin"]["codigo_a"]>0)){
       
                echo '<script>
        
                    window.location = "index.php";
        
                </script>';

                return;
            } 
        }
    }

    static public function ctrSeleccionarRegistrosPrestamos(){
        
        $respuesta = ModeloFormularios::mdlSeleccionarRegistrosPrestamos();

        return $respuesta;
    
    }

    public function ctrCerrarSesion(){

        session_destroy();

        echo '<script>

            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href );

                window.location = "index.php?pagina=inicio";
                
            }

        </script>';

    }

    public function ctrLoginGoogle(){
        
        include_once('config.php');

        if (isset($_GET["code"])) {

            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);   //token validado por google
            if (!isset($token['error'])) {

                $google_client->setAccessToken($token['access_token']);

                $_SESSION['access_token'] = $token['access_token'];

                $google_service = new Google_Service_Oauth2($google_client);

                $data = $google_service->userinfo->get();

                var_dump($data);

                if (!empty($data['given_name'])) {
                    $_SESSION['user_first_name'] = $data['given_name'];
                }

                if (!empty($data['family_name'])) {
                    $_SESSION['user_last_name'] = $data['family_name'];
                }

                if (!empty($data['email'])) {
                    $_SESSION['user_email_address'] = $data['email'];
                }

                if (!empty($data['gender'])) {
                    $_SESSION['user_gender'] = $data['gender'];
                }

                if (!empty($data['picture'])) {
                    $_SESSION['user_image'] = $data['picture'];
                }
            }
        }
    }

    static public function ctrObtenerDetallePrestamo(){
        if(isset($_POST["folio"])){
            
            $fol = $_POST["folio"];

            $respuesta = ModeloFormularios::mdlObtenerDetallePrestamo($fol);

            return $respuesta; 

        }
    }

    static public function ctrObtenerDetalleUsuario(){
        if(isset($_POST["codigo"])){
            
            $u = $_POST["codigo"];

            $respuesta = ModeloFormularios::mdlObtenerDetalleUsuario($u);

            return $respuesta; 

        }
    }

    static public function ctrObtenerDetallePresProy(){

        if(isset($_POST["folio"])){
            
            $fol = $_POST["folio"];

            $respuesta = ModeloFormularios::mdlObtenerDetallePresProy($fol);

            return $respuesta; 

        }

    }

    static public function ctrObtenerDetallePresLap(){

        if(isset($_POST["folio"])){
            
            $fol = $_POST["folio"];

            $respuesta = ModeloFormularios::mdlObtenerDetallePresLap($fol);

            return $respuesta; 

        }

    }

    static public function ctrObtenerDetallePresBoc(){

        if(isset($_POST["folio"])){
            
            $fol = $_POST["folio"];

            $respuesta = ModeloFormularios::mdlObtenerDetallePresBoc($fol);

            return $respuesta; 

        }

    }

    public function ctrAceptarPrestamo(){

        if(isset($_POST["cPA"])){

            
            //echo '<script>alert("has pulado aceptar '.$_POST["cPA"].'");</script>';

            $p = $_POST["cPA"];

            $respuesta = ModeloFormularios::mdlAceptarPrestamo($p);

            if($respuesta=="ok"){
                echo "
                <script>
                    
                    if ( window.history.replaceState ) {

                        window.history.replaceState( null, null, window.location.href );
    
                    }
                    
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Prestamo Aprobado',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    setTimeout(function(){
                        window.location = 'index.php?pagina=adminAccept';
                    }, 1500);

                    
                  
                </script>";
            }

            else{

				echo '<script>

                    window.history.replaceState( null, null, window.location.href );

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

                        Swal.fire({
                            icon: "error",
                            title: "X",
                            text: "Ocurrió un error"
                            
                        })
            
					}

				</script>';
			}

        }

    }

    public function ctrRechazarPrestamo(){
        
        if(isset($_POST["cPR"])){

            $p = $_POST["cPR"];

            $respuesta = ModeloFormularios::mdlRechazarPrestamo($p);

            if($respuesta=="ok"){
                echo "
                <script>
                    
                    if ( window.history.replaceState ) {

                        window.history.replaceState( null, null, window.location.href );
    
                    }
                    
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Prestamo Rechazado',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    setTimeout(function(){
                        window.location = 'index.php?pagina=adminAccept';
                    }, 1500);

                    
                  
                </script>";
            
            }

            else{

                echo '<script>

                    window.history.replaceState( null, null, window.location.href );

                    if ( window.history.replaceState ) {

                        window.history.replaceState( null, null, window.location.href );

                        Swal.fire({
                            icon: "error",
                            title: "X",
                            text: "Ocurrió un error"
                            
                        })
            
                    }

                </script>';
            }


        }
    
    }

    public function ctrFinalizarPrestamo(){
        
        if(isset($_POST["cPF"])){

            $p = $_POST["cPF"];

            $respuesta = ModeloFormularios::mdlFinalizarPrestamo($p);

            if($respuesta=="ok"){
                echo "
                <script>
                    
                    if ( window.history.replaceState ) {

                        window.history.replaceState( null, null, window.location.href );
    
                    }
                    
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Prestamo Concluido',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    setTimeout(function(){
                        window.location = 'index.php?pagina=adminActive';
                    }, 1500);

                    
                  
                </script>";
            
            }

            else{

                echo '<script>

                    window.history.replaceState( null, null, window.location.href );

                    if ( window.history.replaceState ) {

                        window.history.replaceState( null, null, window.location.href );

                        Swal.fire({
                            icon: "error",
                            title: "X",
                            text: "Ocurrió un error"
                            
                        })
            
                    }

                </script>';
            }


        }
    
    }

    static public function ctrInsertarEspacioAdapt($a,$u){

        $respuesta = ModeloFormularios::mdlInsertarEspacioAdapt($a,$u);
        
        if($respuesta!="ok"){
            return "error";
        }
        else{
            return "ok";
        }

    }

    static public function ctrEliminarEspacioAdapt($a,$u){

        $respuesta = ModeloFormularios::mdlEliminarEspacioAdapt($a,$u);
        
        if($respuesta!="ok"){
            return "error";
        }
        else{
            return "ok";
        }

    }

    static public function ctrConsultarAdapt($a){

        $respuesta = ModeloFormularios::mdlConsultarAdapt($a);
        
        if($respuesta=="error"){
            return "error";
        }
        else{
            return $respuesta;
        }

    }

    static public function ctrInsertarEspacioBoc($b,$u){

        $respuesta = ModeloFormularios::mdlInsertarEspacioBoc($b,$u);
        
        if($respuesta!="ok"){
            return "error";
        }
        else{
            return "ok";
        }

    }

    static public function ctrEliminarEspacioBoc($b,$u){

        $respuesta = ModeloFormularios::mdlEliminarEspacioBoc($b,$u);
        
        if($respuesta!="ok"){
            return "error";
        }
        else{
            return "ok";
        }

    }

    static public function ctrConsultarBoc($b){

        $respuesta = ModeloFormularios::mdlConsultarBoc($b);
        
        if($respuesta=="error"){
            return "error";
        }
        else{
            return $respuesta;
        }

    }

    static public function ctrInsertarEspacioCab($c,$u){

        $respuesta = ModeloFormularios::mdlInsertarEspacioCab($c,$u);
        
        if($respuesta!="ok"){
            return "error";
        }
        else{
            return "ok";
        }

    }

    static public function ctrEliminarEspacioCab($c,$u){

        $respuesta = ModeloFormularios::mdlEliminarEspacioCab($c,$u);
        
        return $respuesta;
        

    }

    static public function ctrConsultarCab($c){

        $respuesta = ModeloFormularios::mdlConsultarCab($c);
        
        if($respuesta=="error"){
            return "error";
        }
        else{
            return $respuesta;
        }

    }

}//Fin de la clase